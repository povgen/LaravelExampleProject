@extends('layouts.app')

@section('content')
<div class="content">
	<div class="content-content">
		<div class="categories-content">
			@php /** @var string $htmlHieracyCategories */ 
				echo $htmlHieracyCategories;
			@endphp
			</ul>
		</div>
	</div>
</div>
@endsection