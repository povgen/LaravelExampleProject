@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="content-content">
			@if($paginator->isEmpty())
				<p class="not-found-title">По вашему запросу ничего не найдено</p>
			@endif
			@foreach($paginator as $item)
			@php /** @var \App\Models\Product $item */ @endphp
				<div class="product">
					<a href="{{ route('products.show', $item->slug) }}"><img src="{{ $item->image_url}}" alt="product" class="product-img">
					<p class="product-op">{{ $item->title}}</p></a>
					<p class="product-p">Цена : {{ $item->price}} р.</p>
				</div>
			@endforeach
		</div>
		<div class="paginator-container">
		@if($paginator->total() > $paginator->count())

			{{ $paginator->links() }}
					
		@endif
		</div>
		
	</div>
@endsection