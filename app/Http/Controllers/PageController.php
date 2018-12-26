<?php


namespace App\Http\Controllers;

use App\User;

class PageController extends Controller{
    public function about(){
        return view('about');
    }
    public function contact(){
        return "Contact";
    }
    public function Submitcontact(){
        return "Contact submitted";
    }

    public function profile($id){
        $user = User::with(['questions', 'answers', 'answers.question'])->findOrFail($id);
        return view('profile')->with('user', $user);
    }
}