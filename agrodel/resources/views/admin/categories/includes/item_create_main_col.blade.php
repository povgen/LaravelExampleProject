@php
	/** @var \App\Models\ProductCategory $item */
@endphp
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title"></div>
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a href="#maindata" data-toggle="tab" class="nav-link active">
							Основные данные
						</a>
					</li>
				</ul>
				<br>
				<div class="tab-content">
					<div class="tab-pane active" id="maindata" role="tabpanel">
						<div class="form-group">
							<label for="title">Заголовок</label>
							<input name="title"
								id="title"
								type="text"
								class="form-control"
								minlength="3"
								required>
						</div>

						<div class="form-group">
							<label for="slug">Индефикатор</label>
							<input name="slug"
								id="slug" 
								type="text" 
								class="form-control">
						</div>

						<div class="form-group">
							<label for="parent_id">Родитель</label>
							<select name="parent_id"
								id="parent_id"
								class="form-control"
								palceholder="выберите категорию"
								required>
							@foreach($categoryList as $categoryOption)
								<option value="{{ $categoryOption->id }}">
										{{ $categoryOption->id }}. {{ $categoryOption->title }}
									</option>
							@endforeach
							</select>
						</div>
						<div class="from-group">
							<label for="description">Описание</label>
							<textarea name="description" 
								id="description"
								class="form-control" 
								rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="card-body justify-content-center row">
					<button type="submit" class="btn btn-primary">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
</div>