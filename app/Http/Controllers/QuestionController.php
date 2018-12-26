<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $q;
    public function __construct(Question $question)
    {
        $this->middleware('auth', ['except' => ['index']]);
        $this->q = $question;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->q::paginate(4);
        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }


    public function store(Request $request)
    {
        // validate data
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        //process and submit
        $this->q->title = $request->title;
        $this->q->description = $request->description;
        $this->q->user()->associate(Auth::id());


        //redirect
        if ($this->q->save()){
            return redirect()->route('question.show', $this->q->id);
        }else{
            return redirect()->route('question.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->q::findOrFail($id);
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->q = Question::findOrFail($id);
        return view('questions.edit')->with('question', $this->q);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->q = Question::findOrFail($id);
        $this->q->title = $request->title;
        $this->q->description = $request->description;
        $this->q->user()->associate(Auth::id());


        //redirect
        if ($this->q->save()){
            return redirect()->route('question.show', $this->q->id);
        }else{
            return redirect()->route('question.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
