<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\QueryBuilderCategories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderCategories $categories)
    {
        // Урок 5. На 6 уроке все это удалили, потому что реализовали по-другому в QueryBuilderCategories
        // // $model = app(Category::class);
        // // $categories = $model->getCategories();
        // // // dd($categories); // Проверка того, что приходит по категориям
        // // // dd($model->getCategory(15)); // Проверка того, что приходит в категории
        // // // dd($model->getCategoryWithParams(5));

        // // $categories = Category::all();
        // $categories = Category::select(['id', 'title', 'description', 'created_at', 'updated_at'])
        //     ->get();

        // // dd($categories);

        return view('admin.categories.index', [
            'categories' => $categories->getCategories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->only(['title', 'description']);
        // $category = Category::create($validated); // Так удобно использовать при массовой записи в БД. Возвращает либо объект модели, которая была создана, либо false.
        $category = new Category($validated); // Так удобно использовать при одной записи в БД и она становится объектом.

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->only(['title', 'description']);

        // $category->title = $request->title;
        // $category->description = $request->description;
        // $category->save();

        $category = $category->fill($validated);
        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Ошибка обновления');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
