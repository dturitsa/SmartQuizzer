@extends('layouts.basic')
@section('maincontent')
    <h1>questions</h1>

    @foreach($questions as $q)

        <li>
            {{ HTML::linkAction('questions.show', $q->category . " " . $q->id, ['id' => "{$q->id}"]) }}
            {{ HTML::linkAction('questions.edit', 'edit', ['id' => "{$q->id}"]) }}
            {{ Form::open(['route' => ['questions.destroy', $q->id], 'method' => 'delete']) }}
            <button type="submit" >Delete</button><br>
            {{ Form::close() }}

        </li>

    @endforeach
    {{ HTML::linkAction('questions.create', 'add a question') }}
@stop