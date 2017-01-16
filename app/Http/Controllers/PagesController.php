<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class PagesController extends Controller
{
    public function home(){
    	return view('welcome');
    }

    public function about(){
        $admins = User::where('role', 'admin')->get();
    	return view('about', compact('admins'));
    }
}
