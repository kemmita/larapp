<?php


namespace App\Http\Controllers;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function Submitcontact()
    {
        return "Contact submitted";
    }

    public function profile($id)
    {
        $user = User::with(['questions', 'answers', 'answers.question'])->findOrFail($id);
        return view('profile')->with('user', $user);
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        Mail::to('admin@example.com')->send(new ContactForm($request));
        return redirect('/');
    }
}