<div class="sidebar-left">
		<ul class="sidebar-ul">
			@foreach($categoryList as $item)
			@php /** @var \App\Models\ProductCategory $item */	@endphp
				@if ($item->parent_id == 1)
					<a href="{{ route('categories.show', $item->slug) }}" class="sidebar-a">
						<li class="sidebar-li"><span class="nav-top"><img class="shest" src="{{ asset('images/shest.png') }}" alt="shest">{{ $item->title }}</span></li>
					</a>
				@endif

			@endforeach
			<a href="{{ route('categories.index') }}" class="sidebar-a">
				<li class="sidebar-li"><span class="nav-top"><img class="shest" src="{{ asset('images/shest.png') }}" alt="shest">Все категории</span></li>
			</a>
		</ul>
		<form method="GET" class="searchForm" action="{{ route('search') }}">
			<input required name="search" type="text">
			<button class="buy-btn">Найти</button>
		</form>
</div>
<div class="sidebar-left-adaptive">
		<ul class="sidebar-ul-adaptive">
		<div class="li-center">
			@foreach($categoryList as $item)
			@php /** @var \App\Models\ProductCategory $item */	@endphp
				@if ($item->parent_id == 1)
					<a href="{{ route('categories.show', $item->slug) }}" class="sidebar-a">
						<li class="sidebar-li"><span class="nav-top"><img class="shest" src="{{ asset('images/shest.png') }}" alt="shest">{{ $item->title }}</span></li>
					</a>
				@endif

			@endforeach
			<a href="{{ route('categories.index') }}" class="sidebar-a">
				<li class="sidebar-li"><span class="nav-top"><img class="shest" src="{{ asset('images/shest.png') }}" alt="shest">Все категории</span></li>
			</a>
		</div>
		<form method="GET" class="searchForm" action="{{ route('search') }}">
			<input required name="search" type="text">
			<button class="buy-btn">Найти</button>
		</form>
	</ul>
</div>