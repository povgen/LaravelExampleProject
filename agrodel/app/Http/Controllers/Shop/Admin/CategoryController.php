<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatgegoryUpdateRequest;
use App\Http\Requests\ProductCatgegoryCreateRequest;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = ProductCategory::paginate(20);

        return view('admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(__METHOD__);
        $categoryList = ProductCategory::all();

        return view('admin.categories.create', compact('categoryList'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCatgegoryCreateRequest $request)
    {
        $data = $request->input();
      
        // Создаст объект но не добавит а БД
        $item = new ProductCategory($data);

        $item->save();
        if ($item) {
            return redirect()->route('admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешное сохранение']);
        } else {
                return old()->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ProductCategory::findOrFail($id);
        $categoryList = ProductCategory::all();

        return view('admin.categories.edit', compact('item', 'categoryList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCatgegoryUpdateRequest $request, $id)
    {
        $item = ProductCategory::find($id);
        
        if (empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена", ])
                ->withInput();
        }

        $data   = $request->all();
        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()
                ->route('admin.categories.edit', $item->id)
                ->with(['success' => 'Успешное сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();            
        }
    }



    public function destroy($id) 
    {
        if ($id == 1)
            return back()->withErrors(['msg' => 'Нельзя удалять корневую категорию']);

        $result = ProductCategory::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.categories.index')
                ->with([
                        'success' => "Категория с id {$id} Удалена",
                        'recovery_url' => route('admin.categories.restore', ['id' => $id])
                    ]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удалеиня']);
        }
    }

    public function restore(Request $request, $id)
    {
        $forRestore = ProductCategory::withTrashed()
            ->where('id', $id)
            ->first();
 
        $restored = $forRestore->restore();
 
        if ($restored) {
            return redirect()
                ->route('admin.categories.edit', $id)
                ->with(['success' => 'Запись ' . $id . ' восстановлена']);
        }
 
        return back()->withErrors(['msg' => 'Ошибка восстановления!']);
    }
}