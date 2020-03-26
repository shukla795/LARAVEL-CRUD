nameste
@extends('layouts.app');

@section('content')

    <h1>EDIT POSTS</h1>
    {!! Form::open([ 'action'=>['pagecontroller@update',$post->id],'method'=>'POST']) !!}

    <div class="form-group">
       {{Form::label('title','TITLE')}}
       {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'TITLE'])}}

       {{Form::label('body','BODY')}}
       {{Form::textarea('body',$post->body,['id' =>'article-ckeditor','class'=>'form-control','placeholder'=>'BODY TEXT'])}}
    </div>

    {{form::hidden('_method','PUT')}}
    {{Form::submit('submit',['class'=> 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

