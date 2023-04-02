@extends('layouts.app')

@section('content')
<div class="result"></div>
<div class="content">
	@if(!empty($orderList))
		<table class="table">
			<thead>
				<tr>
					<th>Загаловок</th>
					<th>Цена</th>
					<th>Кол-во</th>
					<th>-</th>
				</tr>
			</thead>
			<tbody>
			{{-- Отпавляем данные о пути для js скрипта, чтобы при смене хостинга всё корректно работало --}}
			<script>var route = '{{ route('basket.changeCount') }}';</script>
			@php $price = 0; @endphp
				@foreach($orderList as $key => $item)
					@php /** @var \App\Models\ProductCategory $item */ 
						$price += $item['item']->price * $item['count'];
					@endphp

					<tr>
						<th><a href="{{ route('products.show', $item['item']->slug) }}">{{ $item['item']->title }}</a></th>
						<th><span class="price">{{ $item['item']->price }}</span> р.</th>
						<th><button onclick="reduce({{$key}})" class="count-edit">-</button><input id="count-input{{ $key }}" value="{{ $item['count'] }}" type="number" min="1" class="count-input" id=""></input type="numeric"><button onclick="increase({{$key}})" class="count-edit">+</button></th>
						<th><a href="{{ route('basket.removeItem', $key)}}" class="buy-btn red-btn">Удалить</a></th>
					</tr>
				@endforeach
				<tr>
					<th><a href="{{ route('basket.clear')}}" class="buy-btn">Очистить корзину</a</th>
					<th><span id="total-price">{{ $price }}</span> р.</th>
					<th></th>
					<th><a href="{{ route('basket.orderForm', $key)}}" class="buy-btn">Заказать</a></th>
				</tr>
			</tbody>
		</table>
	@else
	<div class="content-content">
		<p class="not-found-title">Ваша корзина пуста</p>
	</div>
	@endif
</div>
@endsection