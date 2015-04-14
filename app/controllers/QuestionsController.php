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

        return View::make("questions/questionsIndex", ['categories'=>$this->question->select('category')->distinct()->get(), 'questions'=>$this->question->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make("questions/questionsCreate", ['categories'=>$this->question->select('category')->distinct()->get()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(Input::get('categoryText') != ''){
            $this->question->category = Input::get('categoryText');
        } else
            $this->question->category = Input::get('category');

        $this->question->question = Input::get('question');
        $this->question->answer = Input::get('answer');

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

        return View::make('questions/questionsEdit', ['categories'=>$this->question->select('category')->distinct()->get(), 'q'=>$q]);
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


    public function resetViewed()
    {
        Session::forget('viewedQ');

        return $this::randomQuestion();
    }

    public function randomQuestion()
    {
        if (Input::has('category'))
        {
            $category = Input::get('category');
            Cookie::queue('categoryCookie', $category, 10080);
        } else if(Cookie::get('categoryCookie') != false) {
            $category = Cookie::get('categoryCookie');
        } else{
            $category = 'php';
        }




        $viewedQuestions = Session::get('viewedQ');
        if($viewedQuestions == null)
            $viewedQuestions = [];


        $randomizedQuestions = DB::table('questions')
            ->where('category', $category)
            ->whereNotIn('id', $viewedQuestions)
            ->orderByRaw("RAND()")->get();

        if($randomizedQuestions == null)
        {
            Session::forget('viewedQ');

            $randomizedQuestions = DB::table('questions')
                ->where('category', $category)
                ->orderByRaw("RAND()")->get();
        }
        $randomQuestion = $randomizedQuestions[0];

       $distinctCategories = $this->question->select('category')->distinct()->get();

        if(!in_array($randomQuestion->id, $viewedQuestions))
        {
            Session::push('viewedQ', $randomQuestion->id);
        }

        return View::make("questions/questionsCard", ['categories'=> $distinctCategories,
                'randomQuestion'=>$randomQuestion, 'viewedQuestions'=>$viewedQuestions]);

    }

}
