@extends('layouts.app')

@section('content')
	@php 
		/** @var \App\Models\ProductCategory $item	*/
	@endphp
	<form method="POST" action="{{ route('basket.sendEmail') }}">
		@csrf
		<div class="content">
		@if($orderList->isNotEmpty())
			<div class="order-form">	
				<div class="card">
				<table class="table">
					<thead>
						<tr>
							<th>Загаловок</th>
							<th>Цена</th>
							<th>Кол-во</th>
						</tr>
					</thead>
					<tbody>
					@php $price = 0; @endphp
						@foreach($orderList as $key => $item)
							@php /** @var \App\Models\ProductCategory $item */ 
								$price += $item['item']->price * $item['count'];
							@endphp

							<tr>
								<th><a href="{{ route('products.show', $item['item']->slug) }}">{{ $item['item']->title }}</a></th>
								<th>{{ $item['item']->price }} р.</th>
								<th>{{$item['count']}}</th>
							</tr>
						@endforeach
						<tr>
							<th></th>
							<th><span id="total-price">{{ $price }}</span> р.</th>
							<th></th>
						</tr>
					</tbody>
				</table>
					<div class="card-body">
						<div class="card-title"></div>
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a href="#maindata" data-toggle="tab" class="nav-link active">
									Оформление заказа
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content">
							<div class="tab-pane active" id="maindata" role="tabpanel">
								<div class="form-group">
									<label for="fio">ФИО*</label>
									<input name="fio"
										id="fio"
										type="text"
										class="form-control"
										minlength="3"
										required>
								</div>

								<div class="form-group">
									<label for="tel">Номер телефона</label>
									<input name="tel"
										id="tel" 
										type="tel" 
										class="form-control"
										required>
								</div>
								
								<div class="form-group">
									<label for="email">Email</label>
									<input name="email"
										id="email" 
										type="e-mail" 
										class="form-control"
										required>
								</div>
								
								<div class="from-group">
									<label for="description">Коментарий к заказу</label>
									<textarea name="description" 
										id="description"
										class="form-control" 
										rows="3"></textarea>
								</div>
							</div>
						</div>
						<div class="card-body justify-content-space-around row">
							<a href="{{ route('basket.index') }}" class="btn btn-primary">Редактировать коризину</a>
							<button type="submit" class="btn btn-primary">Заказать</button>
						</div>
					</div>
				</div>
			</div>
			@else
				<div class="content-content">
				<p class="not-found-title">Ваша корзина пуста</p>
			</div>
			@endif
		</div>
	</form>
@endsection