<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Notifications\NewAnswerSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'answer_content' => 'required',
                'question_id' => 'required'
            ]);
            $answer = new Answer();
            $answer->content = $request->answer_content;
            $answer->user()->associate(Auth::id());

            $question = Question::findOrFail($request->question_id);
            $question->answers()->save($answer);
            $question->user->notify(new NewAnswerSubmitted($answer, $question, Auth::user()->name));
            return redirect()->route('question.show', $question->id);
    }


    public function destroy($id)
    {
        //
    }
}
