@php
	/** @var \App\Models\Product $item */
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
							<label for="vendor_code">Арктиукул</label>
							<input name="vendor_code"
								id="vendor_code" 
								type="text" 
								class="form-control"
								required>
						</div>

						<div class="form-group">
							<label for="price">Цена</label>
							<input name="price"
								id="price" 
								type="numeric" 
								class="form-control"
								required>
						</div>

						<div class="form-group">
							<label for="availabl">Наличие на складе</label>
							<input name="availabl"
								id="availabl" 
								type="checkbox" 
								class="form-control">
						</div>

						<div class="form-group">
							<label for="category_id">Категория</label>
							<select name="category_id"
								id="category_id"
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
					<div class="form-group">
						<label for="img">Изображение</label>
						<input style="border-width: 0;" class="form-control" type="file" name="image" id="img">
					</div>
				</div>
				<div class="card-body justify-content-center row">
					<button type="submit" class="btn btn-primary">Сохранить</button>
				</div>
			</div>
		</div>
	</div>
</div>