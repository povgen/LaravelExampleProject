@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">

				@include('admin.common_includes.item_index_errors_msg')

				<nav class="navbar navbar-togglable-md navbar-light bg-faded">
					<a class="btn btn-primary" href="{{ route('admin.products.create') }}">
						Добавить
					</a>
				</nav>
				<div class="card">
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Заголовок</th>
									<th>Категория</th>
									<th>Арктикул</th>
									<th>Цена</th>
									<th>Наличие</th>
								</tr>
							</thead>
							<tbody>
							@foreach($paginator as $item)
								@php /** @var \App\Models\Product $item */ @endphp
								<tr>
									<td>{{ $item->id }}</td>
									<td>
										<a href="{{ route('admin.products.edit', $item->id) }}">
											{{ $item->title }}
										</a>
									</td>
									<td>
										{{ $item->category->title }}
									</td>
									<td>
										{{ $item->vendor_code }}
									</td>
									<td>
										{{ $item->price }} р.
									</td>
									<td>
										@if($item->availabl)
											<font color="lightgreen">Есть</font>
										@else
											<font color="red">Нет</font>
										@endif
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> 
		@if($paginator->total() > $paginator->count())
			<br>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							{{ $paginator->links() }}
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection
