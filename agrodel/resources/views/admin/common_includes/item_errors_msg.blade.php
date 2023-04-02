@php
/** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp
@if($errors->any())
	<div class="justify-content-center row">
		<div class="col-md-11">
			<div role="alert" class="alert-danger alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				{{ $errors->first() }}
			</div>
		</div>
	</div>
@endif
@if(session('success'))
	<div class="justify-content-center row">
		<div class="col-md-11">
			<div role="alert" class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				{{ session()->get('success') }}
			</div>
		</div>
	</div>
@endif