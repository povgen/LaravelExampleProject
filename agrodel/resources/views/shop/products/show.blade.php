@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="content-content">
			<p class="path">
				@php /** @var \App\Models\Product $item */ @endphp
				@foreach($item->category->getWay() as $itemCategory)
					<a href="{{ route('categories.show', $itemCategory->slug) }}">{{ $itemCategory->title }}</a>
					<font>/</font>
				@endforeach
				<a href="{{ route('categories.show', $item->slug) }}">{{  $item->title }}</a>
			</p>
		</div>
		<div class="product-content">
			@php /** @var \App\Models\Product $item */ @endphp
			<img src="{{ $item->image_url}}" alt="product" class="product-img">
			<div class="product-description">
				<h2 class="product-op">{{ $item->title}}</h2></a>
				<p class="text">{{ $item->description }}</p>
				<div class="product-description-price">
					<p class="avl">Наличие на складе: 
						@if($item->availabl)
							<font class="avl green"> Есть </font>
						@else
							<font class="avl red"> Нет </font>
						@endif
					</p>
					<a onclick="
						$.get( '{{ route('basket.addItem', $item->id) }}', function( data ) {
						  $( '.result' ).html( data );
						  alert( 'Товар добавлен в корзину' );
						});

					" class="buy-btn">Добавить в корзину</a>
					<p class="product-p">Цена : {{ $item->price}} р.</p>
				</div>

			</div>
		</div>
	</div>
@endsection