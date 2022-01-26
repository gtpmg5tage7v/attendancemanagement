<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Time;

class SearchController extends Controller
{
    //
    public function show(Request $request){
        
        $user = new User;
        $users = $user->getLists();
        $searchWord = $request->input('searchWord');
        $userId = $request->input('userId');

        return view('searchproduct', [
            'users' => $users,
            'searchWord' => $searchWord,
            'userId' => $userId
        ]);
    }
    


    
    public function search(Request $request)
    {
        
        $searchWord = $request->input('searchWord');
        $userId = $request->input('userId');

        $query = Time::query();
        
        if (isset($searchWord)) {
            $query->where('punchIn', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        
        if (isset($userId)) {
            $query->where('user_id', $userId);
        }

        
        $products = $query->orderBy('user_id', 'asc')->paginate(15);
        
        $total = $query->sum('workTime');

        
        $user = new User;
        $users = $user->getLists();

        return view('searchproduct', [
            'products' => $products,
            'users' => $users,
            'searchWord' => $searchWord,
            'total' => $total,
            'userId' => $userId
        ]);
    }

    
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
