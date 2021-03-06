@extends('layouts.main')

@section('headers')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="flipper/dist/jquery.flip.js"></script>

<script>

    $(function($) {
        $("#card").flip();
    });
</script>
<style>
    .front, .back {
        font-family: 'Just Another Hand', cursive;
        font-size: 300%;
        -moz-box-shadow:    3px 3px 5px 6px #ccc;
        -webkit-box-shadow: 3px 3px 5px 6px #ccc;
        box-shadow:         3px 3px 5px 6px #ccc;
        max-width: 365px;
        min-height: 200px;
        max-height: 500px;
    }
    .currentCategoryOption {
        background-color: #00D5F2;
    }

</style>
@stop

@section('maincontent')

<div>
    {{ Form::open( ['method' =>'GET', 'action' => 'QuestionsController@randomQuestion', 'class' => 'form-inline']) }}

    <div class="form-group">

        <label for="categorySelect">Quiz category:</label>

        <select name="category" class="form-control" id="categorySelect">

            <option class="currentCategoryOption"> {{$randomQuestion->category}}</option>

            @foreach($categories as $q)
                <option>{{$q-> category}}</option>
            @endforeach

        </select>


    </div>
    <div class="form-group">
            {{Form::submit('Next!', ['class' => 'btn btn-success'])}}
             <a href="/reset" class="btn btn-danger">Reset</a>

    </div>
</div>

<div>
    <div id="card">
        <div class="front">
            {{$randomQuestion->question}}
        </div>
        <div class="back">
            {{$randomQuestion->answer}}
        </div>
    </div>
</div>






@stop