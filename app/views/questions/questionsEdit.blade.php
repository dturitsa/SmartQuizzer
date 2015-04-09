
@extends('layouts.basic')
@section('maincontent')
    <h1>edit a Question...</h1>
    {{Form::open(['method' => 'PUT', 'route' => ['questions.update', $q->id]])}}

    <div class="form-group">
        {{Form::text('category', $q->category)}}
        {{$errors->first('category')}}
    </div>

    <br>{{Form::text('question', $q->question)}}

    <br>{{Form::text('answer', $q->answer)}}
    {{$errors->first('answer')}}

    <br><input class="btn btn-danger" type="submit" value="Submit">

    {{ Form::token() . Form::close() }}

@stop

