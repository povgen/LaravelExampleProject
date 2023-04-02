@extends('layouts.admin')

@section('content')
	@php 
		/** @var \App\Models\Product $item	*/
	@endphp
	<form method="POST" action="{{ route('admin.products.store') }}"  enctype="multipart/form-data">
		@csrf
		<div class="container">
			@include('admin.common_includes.item_errors_msg')
			<div class="row justify-content-center">
				<div class="col-md-8">
					@include('admin.products.includes.item_create_main_col')
				</div>
			</div>
		</div>
	</form>
@endsection

