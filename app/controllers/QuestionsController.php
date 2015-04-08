<?php

class questionsController extends \BaseController {
    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return View::make("questions/questionsIndex", ['questions'=>$this->question->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make("questions/questionsCreate");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $this->question->fill($input);
        if(!($this->question->isValid()))
        {
            return Redirect::back()->withInput()->withErrors($this->question->messages);
        }

        $this->question->save();
        return Redirect::route('questions.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return View::make('questions.questionsShow',
            ['q'=>$this->question->whereId($id)->first()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int
     * @return Response
     */
    public function edit($id)
    {
        $q = question::whereId($id)->first();

        return View::make('questions/questionsEdit', ['q'=>$q]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $q = Question::whereId($id)->first();
        $q -> category = Input::get('category');
        $q -> question = Input::get('question');
        $q -> answer = Input::get('answer');
        $q ->save();
        return View::make("questions/questionsIndex",['questions'=>Question::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $q = question::whereId($id)->first();
        $q ->delete();
        return View::make("questions/questionsIndex",['questions'=>question::all()]);

    }

}
