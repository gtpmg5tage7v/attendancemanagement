<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Time;
use DB;

class TimeController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $today = Carbon::today();
            $month = intval($today->month);
            $day = intval($today->day);
            $format = $today->format('Y年m月d日');
            
            $items = Time::GetMonthAttendance($month)->GetDayAttendance($day)->get();
            return view('time.index',['itmes'=>$items,'day' => $format]);
        } else {
            return redirect('/');
        }
    }

    
    public function timein() {
        
        $user = Auth::user();
        $oldtimein = Time::where('user_id',$user->id)->latest()->first();

        $oldDay = '';

        
        if($oldtimein) {
            $oldTimePunchIn = new Carbon($oldtimein->punchIn);
            $oldDay = $oldTimePunchIn->startOfDay();
        }
        $today = Carbon::today();

        if(($oldDay == $today) && (empty($oldtimein->punchOut))) {
            return redirect()->back()->with('message','出勤打刻済みです');
        }

        
        if($oldtimein) {
            $oldTimePunchOut = new Carbon($oldtimein->punchOut);
            $oldDay = $oldTimePunchOut->startOfDay();
        }

        if(($oldDay == $today)) {
            return redirect()->back()->with('message','退勤打刻済みです');
        }

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);


        $time = Time::create([
            'user_id' => $user->id,
            'user_name' =>$user->name,
            'punchIn' => Carbon::now(),
            'month' => $month,
            'day' => $day,
            'year' => $year,
        ]);

        return redirect('/time');
    }

    
    public function timeOut() {
        
        $user = Auth::user();
        $timeOut = Time::where('user_id',$user->id)->latest()->first();

        
        $now = new Carbon();
        $punchIn = new Carbon($timeOut->punchIn);
        $breakIn = new Carbon($timeOut->breakIn);
        $breakOut = new Carbon($timeOut->breakOut);
        
        $stayTime = $punchIn->diffInMinutes($now);
        $breakTime = $breakIn-> diffInMinutes($breakOut);
        $workingMinute = $stayTime - $breakTime;
        
        $workingHour = ceil($workingMinute / 15) * 0.15;

        
        if($timeOut) {
            if(empty($timeOut->punchOut)) {
                if($timeOut->breakIn && !$timeOut->breakOut) {
                    return redirect()->back()->with('message','休憩終了が打刻されていません');
                }else {
                    $timeOut->update([
                        'punchOut' => Carbon::now(),
                        'workTime' => $workingHour
                    ]);
                    return redirect()->back()->with('message','お疲れ様でした'); 
                }
            } else {
                $today = new Carbon();
                $day = $today->day;
                $oldPunchOut = new Carbon();
                $oldPunchOutDay = $oldPunchOut->day;
                if ($day == $oldPunchOutDay) {
                    return redirect()->back()->with('message','退勤済みです');
                } else {
                    return redirect()->back()->with('message','出勤打刻をしてください');
                }
            }
        } else {
            return redirect()->back()->with('message','出勤打刻がされていません');
        } 
    }

    
    public function breakIn() {
        $user = Auth::user();
        $oldtimein = Time::where('user_id',$user->id)->latest()->first();
        if($oldtimein->punchIn && !$oldtimein->punchOut && !$oldtimein->breakIn) {
            $oldtimein->update([
                'breakIn' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    
    public function breakOut() {
        $user = Auth::user();
        $oldtimein = Time::where('user_id',$user->id)->latest()->first();
        if($oldtimein->breakIn && !$oldtimein->breakOut) {
            $oldtimein->update([
                'breakOut' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    
    public function performance() {
        $items = [];
        return view('time.performance',['items'=>$items]);
    }

    public function result(Request $request) {
        $user = Auth::user();
        $items = Time::where('user_id',$user->id)->where('year',$request->year)->where('month',$request->month)->get();
        return view('time.performance',['items'=>$items]);
    }

    
    public function daily() {
        $items = [];
        return view('time.daily',['items'=>$items]);
    }
    public function dailyResult(Request $request) {
        $items = Time::where('year',$request->year)->where('month',$request->month)->where('day',$request->day)->get();
        return view('time.daily',['items'=> $items]);
    }
}
