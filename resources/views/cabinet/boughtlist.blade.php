@extends('layouts.index')


@section('categories')

@endsection

@section('content')

<br>

<br>
<br>
<br>
<div class="container">
	
	
		@foreach($order as $orderItem)
			<h3>Заказ : </h3>
			<p>{{ $orderItem->oder_items }}</p>
			<h3>Сообщение : </h3>
			<p>{{ $orderItem->message }}</p>
			<h3>Сумма : </h3>
			<p>{{ $orderItem->total_sum }}</p>
			<h3>Время : </h3>
			<p>{{ $orderItem->created_at }}</p>
			<hr>
		@endforeach
	

</div>

<br>
<br>
<br>
<br>

@endsection