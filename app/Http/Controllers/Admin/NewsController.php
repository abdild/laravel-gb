<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Queries\QueryBuilderNews;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderNews $news)
    {
        // Урок 5. На 6 уроке все это удалили, потому что реализовали по-другому в QueryBuilderCategories
        // $model = app(News::class);
        // $news = $model->getNews();

        // dd($news);

        return view('admin.news.index', [
            'news' => $news->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(request()->ip());
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'title' => ['required', 'string']
        //     ]
        // );

        // // if($request->ajax()) {
        // //     //
        // // }

        // // dd($request->all());

        // return response()->json($request->only(['title', 'author', 'status', 'description']), 201);



        // $validated = $request->only(['title', 'author', 'categories_id', 'slug', 'image', 'status', 'description']);

        // $news = new News($validated); // Так удобно использовать при одной записи в БД и она становится объектом.


        $validated = $request->except(['_token', 'image']);
        $validated['slug'] = \Str::slug($validated['title']);

        $news = News::create($validated);

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Ошибка добавления');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        // $validated = $request->only(['title', 'author', 'categories_id', 'slug', 'image', 'status', 'description']);

        // $news = $news->fill($validated); // Так удобно использовать при одной записи в БД и она становится объектом.

        $validated = $request->except(['_token', 'image']);
        $validated['slug'] = \Str::slug($validated['title']);

        $news = $news->fill($validated);

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Ошибка обновления');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
