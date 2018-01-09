@extends('layouts.site')

@section('content')
	<div class="container">
		<h1>{{ $post->title }}</h1>
		<img src="{{url('/uploads/news')}}/{{ $post->cover_page }}">
		<h4>{{ $post->subtitle }}</h4>
		{{ $post->content }}

	</div>
@endsection
