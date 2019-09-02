@extends('layouts.index')

@section('categories')

@endsection

@section('content')
<div class="container">
<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p><h3>Информация о заказе</h3> <b>выбрано товаров :</b> @if(isset($count)) {{ $count }} @endif<br>
							<b>На сумму :</b> @if(isset($totalSum)) {{ $totalSum }} @endif <br>

							<b>Все товары :</b> <br>
							@if(isset($totalItems))
								
								@foreach($totalItems as $item)

								 {{ $item }} <br>

								@endforeach
							@endif
							</p>
			@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
							<form method="post" action="{{ route('storeorder') }}">

								<input type="text" placeholder="Ваше_имя" name="name" @if(Auth::check()) value="{{ Auth::user()->name }} @endif">
								<input type="text" placeholder="Номер_телефона" name="tel">
								<input type="text" name="user_id"  @if(Auth::check()) value="{{ Auth::user()->id }} @endif">
								<input type="text"  name="total_sum" @if(isset($totalSum)) value="{{ $totalSum }} @endif">

								<input type="text"  name="order_items" @if(isset($totalItems)) value="@foreach($totalItems as $item) {{ $item }}  @endforeach @endif">

								<textarea name="message"  placeholder="Сообщение" rows="8"></textarea>
								<button type="submit" class="btn btn-primary">Оформить</button><br>
								@csrf
							</form>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection