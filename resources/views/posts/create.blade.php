@extends('layouts.app');

@section('content')

    <h1>CREATE POSTS</h1>
    {!! Form::open([ 'action'=>'pagecontroller@store','method'=>'POST']) !!}

    <div class="form-group">
       {{Form::label('title','TITLE')}}
       {{Form::text('title','',['class'=>'form-control','placeholder'=>'TITLE'])}}

       {{Form::label('body','BODY')}}
       {{Form::textarea('body','',['id' =>'article-ckeditor','class'=>'form-control','placeholder'=>'BODY TEXT'])}}
    </div>

    {{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection
