
@extends('layouts.main')

@section('pagetitle')
    Create a Question
@stop

@section('maincontent')

    <Fieldset>
        <legend></legend>

        {{ Form::open( ['action' => 'QuestionsController@store', 'class' => 'form-horizontal']) }}
        <div class="form-group">
            <label for="categorySelect" class="col-sm-2 control-label">Use existing category</label>
            <div class="col-sm-10">
                <select name="category" class="form-control" id="categorySelect">

                    @foreach($categories as $qc)
                        <option>{{$qc-> category}}</option>
                    @endforeach

                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="categoryText" class="col-sm-2 control-label">Or make a new Category</label>
            <div class="col-sm-10">
                {{Form::text('categoryText', null,
                    ['class' => "form-control", 'id' => 'categoryText'])}}
                {{$errors->first('category')}}
            </div>
        </div>

            <div class="form-group">
                <label for="questionTextArea" class="col-sm-2 control-label">Question</label>
                <div class="col-sm-10">
                    {{Form::textarea('question', null,
                        ['class' => "form-control", 'placeholder' => 'Enter your Question', 'id' => 'questionTextArea'])}}
                    {{$errors->first('question')}}
                </div>
            </div>
            <div class="form-group">
                <label for="answerTextArea" class="col-sm-2 control-label">Answer</label>
                <div class="col-sm-10">
                    {{Form::textarea('answer', null,
                        ['class' => "form-control", 'placeholder' => 'Enter the Answer', 'id' => 'answerTextArea'])}}
                    {{$errors->first('answer')}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{Form::submit('submit', ['class' => 'btn btn-danger'])}}
                </div>
            </div>

        {{Form::token()}}
        {{Form::close() }}
    </Fieldset>

@stop


