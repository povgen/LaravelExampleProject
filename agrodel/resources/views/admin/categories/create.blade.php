@extends('layouts.admin')

@section('content')
	@php 
		/** @var \App\Models\ProductCategory $item	*/
	@endphp
	<form method="POST" action="{{ route('admin.categories.store') }}">
		@csrf
		<div class="container">
			@include('admin.common_includes.item_errors_msg')
			<div class="row justify-content-center">
				<div class="col-md-8">
					@include('admin.categories.includes.item_create_main_col')
				</div>
			</div>
		</div>
	</form>
@endsection

