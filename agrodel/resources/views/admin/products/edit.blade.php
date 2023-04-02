@extends('layouts.admin')

@section('content')
	@php 
		/** @var \App\Models\Product $item	*/
	@endphp
	<form method="POST" action="{{ route('admin.products.update', $item->id) }}" enctype="multipart/form-data">
		@method('PATCH')
		@csrf
		<div class="container">
			@include('admin.common_includes.item_errors_msg')
			<div class="row justify-content-center">
				<div class="col-md-8">
					@include('admin.products.includes.item_edit_main_col')
				</div>
				<div class="col-md-3">
					@include('admin.products.includes.item_edit_add_col')
				</div>
			</div>
		</div>
	</form>
	<form action="{{ route('admin.products.destroy', $item->id ) }}" method="POST">
		@csrf
		@method('DELETE')

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					@include('admin.common_includes.item_delete')
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</form>
@endsection

