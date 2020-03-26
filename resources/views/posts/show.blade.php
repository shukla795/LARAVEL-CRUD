@extends('layouts.app');

@section('content')


    <a href="/pkproject/public/posts"  class ="btn btn-default">GO BACK</a>
    <h1>{{$post->title}}</h1>
           <div >
           <h3>{{$post->body}}</h3>
            </div>
            <br>
           <small>written on {{$post->created_at}}</small>

           <br>
           <br>
           <br>

<a href="/pkproject/public/posts/{{$post->id}}/edit" class= 'btn btn-default' >EDIT</a>

<a href="/pkproject/public/posts/{{$post->id}}/delete" class= 'btn btn-default' >DELETE</a>


@endsection


