<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Time;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index() {
        $time = DB::table('times')->get();
        return view('report.index',compact('time'));
       
    }

        public function edit($id)
    {
        $time = DB::table('times')->where('id',$id)->first();

        return view('report.edit', compact('time'));
    }


    public function update(Request $request, $id)
    {
        
    $data=array();
    //$data['user_name']=$request->user_name;
    $data['punchIn']=$request->punchIn;
    $data['punchOut']=$request->punchOut;
    $data['workTime']=$request->workTime;

    $startDateTime = $data['punchIn'];
    $endDateTime = new Carbon($startDateTime);
    $startDateTime2 = $data['punchOut'];
    $endDateTime2 = new Carbon($startDateTime2);

    $breakTime = $endDateTime-> diffInMinutes($endDateTime2);
    $workingHour = $breakTime / 60;
    
    
    

    $update=DB::table('times')->where('id',$id)->update($data);
    //dd($data,$endDateTime,$endDateTime2,$breakTime,$workingHour);


        
        return Redirect()->route('searchproduct');
    
    
    }



    public function SearchByMonth(Request $request){

    $month = $request->month;

    
    
    $time = DB::table('times')->where('month',$month)->get();
    return view('report.search_by_month',compact('time')); 


    }
}
