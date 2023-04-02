@extends('layouts.admin')

@section('content')
	@php 
		/** @var \App\Models\ProductCategory $item	*/
	@endphp
	<form method="POST" action="{{ route('admin.categories.update', $item->id) }}">
		@method('PATCH')
		@csrf
		<div class="container">
			@include('admin.common_includes.item_errors_msg')
			<div class="row justify-content-center">
				<div class="col-md-8">
					@include('admin.categories.includes.item_edit_main_col')
				</div>
				<div class="col-md-3">
					@include('admin.categories.includes.item_edit_add_col')
				</div>
			</div>
		</div>
	</form>
	<form action="{{ route('admin.categories.destroy', $item->id ) }}" method="POST">
		@csrf
		@method('DELETE')

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					@if($item->id != 1)
					@include('admin.common_includes.item_delete')
					@endif
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</form>
@endsection

