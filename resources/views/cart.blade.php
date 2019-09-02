@extends('layouts.index')


@section('categories')

@endsection

@section('content')
	<section id="cart_items">
		<div class="container">

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Товар</td>
							<td class="description"></td>
							<td class="price">Цена</td>
							<td class="quantity">Количество</td>
							<td class="total">Всего</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						@if(isset($arrayItem))

						@foreach($arrayItem as $item)
						<tr>
							<td class="cart_product">
								<a href="{{ route('product-details', $item->id) }}"><img src="{{ $item->image }}" style="height: 40%; width: 30%;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $item->name }}</a></h4>
								<p>Web ID: {{ $item->code }}</p>
							</td>
							<td class="cart_price">
								<p>$ 
									@if(isset($itemVal))
									@foreach($itemVal as $key => $value)
									@if($item->id == $key)

										{{ $item->price}}
								
								</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $value }}" disabled="true">

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$ 
									
										{{ $item->price * $value }}
									
									@endif
									@endforeach
									@endif
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('deleteItem', $item->id) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

						@endif

			@if($totalSum)
			<tr style="margin-right: 0;">

								<td class="cart_total" >
			<p class="cart_total_price" style="color: red;">Всего: $ {{ $totalSum }}</p>
								</td>

				<td class="cart_total">
								<p class="cart_total_price"><a href="{{ route('checkout') }}">Оформить заказ</a></p>
				</td>
			</tr>
			@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

<script>	
</script>
@endsection
