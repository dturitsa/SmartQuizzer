@extends('layouts.main')
@section('pagetitle')
    Question Details
@stop

@section('maincontent')
    <h3>Category: {{$q->category}}</h3>
    <br> {{$q->question}}
    <br> {{$q->answer}}
@stop