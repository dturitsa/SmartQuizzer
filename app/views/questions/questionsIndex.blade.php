@extends('layouts.main')

@section('pagetitle')
    Questions
@stop
@section('maincontent')

    {{ Form::open(['route' => 'questions.create', 'method' => 'GET']) }}
    <button type="submit" class="btn btn-success">Add a new Question</button><br>
    {{ Form::close() }}

    <table class="table table-striped">
        <tr>
            <th>Category</th>
            <th>Question</th>
            <th>Answer</th>
            <th></th>
            <th></th>
        </tr>
    @foreach($questions as $q)

        <tr>

            <td>{{$q->category}}</td>

            <!-- <td>{{ HTML::linkAction('questions.show', $q->question, ['id' => "{$q->id}"]) }}</td> -->

            <td>{{$q->question}}</td>

            <td>{{$q->answer}}</td>

            <td>{{ Form::open(['route' => ['questions.edit', $q->id], 'method' => 'GET']) }}
                <button type="submit" class="btn btn-info">Edit</button><br>
                {{ Form::close() }}</td>

            <td>{{ Form::open(['route' => ['questions.destroy', $q->id], 'method' => 'delete']) }}
                <button type="submit" class="btn btn-danger">Delete</button><br>
            {{ Form::close() }}</td>

        </tr>

    @endforeach
    </table>

    {{ Form::open(['route' => 'questions.create', 'method' => 'GET']) }}
    <button type="submit" class="btn btn-success">Add a new Question</button><br>
    {{ Form::close() }}

@stop
