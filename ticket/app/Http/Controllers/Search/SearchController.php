<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchstudent(Request $request){
        $search = $request->get('search');
        $posts= DB::table('users')
            ->Where('name','like',$search.'%')
            ->orWhere('id','like',$search.'%')->get();
        return view('search.searchstudent',compact('posts'));
    }
}
