@extends('layouts.app');

@section('content')


{!! Form::open([ 'action'=>['pagecontroller@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
   {{form::hidden('_method','DELETE')}}
   {{form::submit('delete',['class'=>'btn btn-danger'])}}
{{!!form::close()!!}}
@endsection
