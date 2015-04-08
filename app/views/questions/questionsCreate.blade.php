
@extends('layouts.basic')
@section('maincontent')
    <h1>create a Question</h1>

        {{ Form::open( array('action' => 'QuestionsController@store')) }}
    <div class="form-group">
        {{Form::text('category', 'category')}}
        {{$errors->first('category')}}
    </div>

    <br>{{Form::text('question', 'question')}}

    <br>{{Form::text('answer', 'answer')}}
    {{$errors->first('answer')}}

    <br> {{Form::submit('submit', ['class' => 'btn btn-danger'])}}

    <!--<br><input class="btn btn-danger" type="submit" value="Submit">-->

    {{ Form::token() . Form::close() }}

@stop


