@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				
				@include('admin.common_includes.item_index_errors_msg')
				
				<nav class="navbar navbar-togglable-md navbar-light bg-faded">
					<a class="btn btn-primary" href="{{ route('admin.categories.create') }}">
						Добавить
					</a>
				</nav>
				<div class="card">
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Категория</th>
									<th>Родитель</th>
								</tr>
							</thead>
							<tbody>
							@foreach($paginator as $item)
								@php /** @var \App\Models\ProductCategory $item */ @endphp
								<tr>
									<td>{{ $item->id }}</td>
									<td>
										<a href="{{ route('admin.categories.edit', $item->id) }}">
											{{ $item->title }}
										</a>
									</td>
									<td @if(in_array($item->parent_id, [0])) style="color:#ccc" @endif>
										{{-- {{ dd($item)->parent_id }} --}}
										@if(in_array($item->parent_id, [0]))
											-
										@else
										 	{{ $item->parentCategory->title}}
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
