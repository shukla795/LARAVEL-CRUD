@extends('layouts.app');

@section('content')

    <h1>POSTS</h1>
     @if (count($post)>0)
         @foreach($post as $post)
          <div class ="well">
          <h3><a href="/pkproject/public/posts/{{$post->id}}">{{$post->title}}</a></h3>
          <small>written on {{$post->created_at}}</small>
           </div>
         @endforeach

        @else
           <p>NO POST FOUND</p>
     @endif

@endsection
