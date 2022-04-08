<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $totalquizes= Result::where('user_id',$user_id)->count();
        return view('user.index',compact('totalquizes'));
    }
}
