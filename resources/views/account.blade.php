@extends('layouts.index')


@section('categories')

@endsection

@section('content')
<br>
<br>
<br>
<br>
<a href="{{ route('editprofile') }}">Редактировать данные</a><br>
<a href="{{ route('boughtlist') }}">Список покупок</a>

<br>
<br>
<br>
<br>

@endsection