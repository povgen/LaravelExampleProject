<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div style=" font-size: 20px;">Данные о заказе</div>
	<table class="table">
		<thead>
			<tr>
				<th>Загаловок</th>
				<th>Цена</th>
				<th>Кол-во</th>
				<th>Арктикул</th>
			</tr>
		</thead>
		<tbody>
		@php $price = 0; @endphp
			@foreach($orderList as $key => $item)
				@php /** @var \App\Models\ProductCategory $item['item']
						 @var int $item['count'] */ 
					$price += $item['item']->price * $item['count'];
				@endphp

				<tr>
					<th style="text-align: left;" ><a href="{{ route('products.show', $item['item']->slug) }}">{{ $item['item']->title }}</a></th>
					<th>{{ $item['item']->price }} р.</th>
					<th>{{$item['count']}}</th>
					<th>{{ $item['item']->vendor_code }}</th>
				</tr>
			@endforeach
			<tr>
				<th></th>
				<th><span id="total-price">{{ $price }}</span> р.</th>
				<th></th>
				<th></th>
			</tr>
		</tbody>
	</table>
	<div style=" font-size: 20px;">Данные о заказчике</div>
	<table>
		<tr>
			<th>ФИО</th>
			<th>{{$data['fio']}}</th>
		</tr>
		<tr>
			<th>Телефон</th>
			<th>{{ $data['tel'] }}</th>
		</tr>
		<tr>
			<th>email</th>
			<th>{{ $data['email'] }}</th>
		</tr>
	</table>
	<div style=" font-size: 20px;">Коментарий к заказу</div>
	<p>{{ $data['description'] }}</p>

</body>
</html>