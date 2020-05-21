@extends('layouts.common')
@section('content')

@foreach ($articles as $article)
{{$article->title}}
{{$article->image}}
{{$article->user_id}}
{{$article->created_at}}
@endforeach

@endsection