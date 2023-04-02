@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="content-content">
			<p class="path">
				@php /** @var \App\Models\ProductCategory $currentCategory*/	@endphp
				@foreach($currentCategory->getWay() as $item)
						<a href="{{ route('categories.show', $item->slug) }}">{{ $item->title }}</a>
						<font>/</font>
				@endforeach
			</p>
			<div class="categories-content">
				<ul class="categories-show-page">
					@php /** @var \App\Models\ProductCategory $itemCategory */	@endphp
					@foreach($categoryList as $itemCategory)
						@if ($itemCategory->parent_id == $currentCategory->id)
							<a href="{{ route('categories.show', $itemCategory->slug) }}" class="sidebar-a">
								<li class="sidebar-li"><span class="nav-top"><img class="shest" src="{{ asset('images/shest.png') }}" alt="shest">{{ $itemCategory->title }}</span></li>
							</a>
						@endif
					@endforeach
				</ul>
			</div>
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