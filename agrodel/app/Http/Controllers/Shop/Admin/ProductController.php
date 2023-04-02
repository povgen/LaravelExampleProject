<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    
    public function index()
    {
        $paginator = Product::paginate(20);

        return view('admin.products.index', compact('paginator'));
    }

    public function create()
    {
        //dd(__METHOD__);
        $categoryList = ProductCategory::all();

        return view('admin.products.create', compact('categoryList'));


    }

    public function store(ProductUpdateRequest $request)
    {
        $data = $request->input();
        // Сохранение изображения
      	if (!empty($request->file('image'))) {
	        $path = $request->file('image')->store('uploads', 'public');
	        $data['image_url'] = asset('/storage/'.$path);
		}

        // Создаст объект но не добавит а БД
        $item = new Product($data);
        $item->save();
        if ($item) {
            return redirect()->route('admin.products.edit', [$item->id])
                ->with(['success' => 'Успешное сохранение']);
        } else {
                return old()->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
        }
    }

    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $categoryList = ProductCategory::all();

        return view('admin.products.edit', compact('item', 'categoryList'));

    }

   
    public function update(ProductUpdateRequest $request, $id)
    {

        $item = Product::find($id);
        if (empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена", ])
                ->withInput();
        }

        $data   = $request->all();

		// Загрузка изображения
		if (!empty($request->file('image'))) {
	        $path = $request->file('image')->store('uploads', 'public');
	        $data['image_url'] = asset('/storage/'.$path);
		}


        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()
                ->route('admin.products.edit', $item->id)
                ->with(['success' => 'Успешное сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();            
        }
    }

    public function destroy($id) 
    {
        $result = Product::destroy($id);

        if ($result) {
            return redirect()
                ->route('admin.products.index')
                ->with([
                        'success' => "Товар с id {$id} Удалена",
                        'recovery_url' => route('admin.products.restore', ['id' => $id])
                    ]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удалеиня']);
        }
    }

    public function restore($id)
    {
        $forRestore = Product::withTrashed()
            ->where('id', $id)
            ->first();
 
        $restored = $forRestore->restore();
 
        if ($restored) {
            return redirect()
                ->route('admin.products.edit', $id)
                ->with(['success' => 'Запись ' . $id . ' восстановлена']);
        }
 
        return back()->withErrors(['msg' => 'Ошибка восстановления']);
    }

}
