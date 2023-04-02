<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Аунтификация</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main class="py-4">
		<form method="GET" action="{{ route('admin.auth') }}" enctype="multipart/form-data">
			@csrf
			<div class="container">
				@include('admin.common_includes.item_errors_msg')
				<div class="row justify-content-center">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="card-title">Вход</div>
									<br>
									<div class="tab-pane active" id="maindata" role="tabpanel">
										<div class="form-group">
											<label for="pass">Пароль</label>
											<input name="pass"
												id="pass"
												type="password"
												class="form-control"
												minlength="3"
												required>
										</div>
										<button type="submit" class="btn btn-primary">Сохранить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</main>
</body>
</html>