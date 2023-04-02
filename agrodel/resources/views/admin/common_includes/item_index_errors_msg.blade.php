@if($errors->any())
	<div class="justify-contentcenter row">
		<div class="col-md-12">
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
	<div class="justify-contentcenter row">
		<div class="col-md-12">
			<div role="alert" class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				{{ session()->get('success') }}
				<a href="{{ session()->get('recovery_url') }}"> Восстановить</a>
			</div>
		</div>
	</div>
@endif