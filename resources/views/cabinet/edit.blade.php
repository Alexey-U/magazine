@extends('layouts.index')


@section('categories')

@endsection

@section('content')

<br>

@if(isset($message))
    <h3>{{ $message }}</h3>
@endif

<br>
<br>
<br>
<form enctype="miltimart/form-data" action="{{ route('editprofile') }}" method="post">
    
    <input type="file" name="file" multiple><br>
    <button type="submit">Добавить фото</button>

    {{ csrf_field() }}
</form>

<br>
<br>
<br>
<br>

@endsection