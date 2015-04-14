@extends('layouts.main')
@section('pagetitle')
    Your Quiz
@stop
@section('headers')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="flipper/dist/jquery.flip.js"></script>

<script>

    $(function($) {
        $("#card").flip();
    });
</script>

@stop

@section('maincontent')

    @foreach($viewedQuestions as $v)
        {{$v}}

    @endforeach

    {{ Form::open( ['method' =>'GET', 'action' => 'QuestionsController@randomQuestion', 'class' => 'form-inline']) }}

    <div class="form-group">

        <label for="categorySelect">Quiz category:</label>

        <select name="category" class="form-control" id="categorySelect">

            <option> {{$randomQuestion->category}}</option>

            @foreach($categories as $q)
                <option>{{$q-> category}}</option>
            @endforeach

        </select>


    </div>
    <div class="form-group">
            {{Form::submit('Next Question!', ['class' => 'btn btn-success'])}}

    </div>

    <a href="/reset">Reset</a>

    <div id="card">
        <div class="front">
            {{$randomQuestion->question}}
        </div>
        <div class="back">
           {{$randomQuestion->answer}}
        </div>
    </div>



@stop