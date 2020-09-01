<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
    	$entries = Entry::where('user_id',$user->id)->paginate(10);
    	return view('user.show',compact('user','entries'));

    }
}
