
@extends('layouts.main')

@section('pagetitle')
    Edit a Question...
@stop

@section('maincontent')

    <div class="form-group">


    <Fieldset>
        <legend></legend>
        {{Form::open(['class' => 'form-horizontal', 'method' => 'PUT', 'route' => ['questions.update', $q->id]])}}
        <div class="form-group">
            <label for="categorySelect" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
                <select name="category" class="form-control" id="categorySelect">

                    <option> {{ $q->category}}</option>

                    @foreach($categories as $qc)
                        <option>{{$qc-> category}}</option>
                    @endforeach

                </select>

            </div>
        </div>
        <div class="form-group">
            <label for="questionTextArea" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
                {{Form::textarea('question', $q->question,
                    ['class' => "form-control",'id' => 'questionTextArea'])}}
                {{$errors->first('question')}}
            </div>
        </div>
        <div class="form-group">
            <label for="answerTextArea" class="col-sm-2 control-label">Answer</label>
            <div class="col-sm-10">
                {{Form::textarea('answer', $q->answer,
                    ['class' => "form-control", 'id' => 'answerTextArea'])}}
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

