@extends('layouts.index')

@section('categories')

@endsection


@section('content')
	<div style="margin-left: 40px;">
	<h2>{{ $message }}</h2>


	<br>
	<a href="{{ route('home') }}">Назад</a>
	</div>
@endsection