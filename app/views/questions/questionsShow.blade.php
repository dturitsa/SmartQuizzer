@extends('layouts.basic')
@section('maincontent')
    <h1>Selected Question info</h1>
    <h3>Category: {{$q->category}}</h3>
    <br> {{$q->question}}
    <br> {{$q->answer}}
@stop