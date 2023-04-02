@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-mdd-12">
			<div class="card">
				<div class="card-body">
					<a href="{{ route('admin.categories.index') }}">Категории</a>
				</div>
				<div class="card-body">
					<a href="">Товары</a>
				</div>
			</div>
		</div>	
	</div>
@endsection