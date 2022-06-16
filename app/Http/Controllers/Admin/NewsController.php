<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Queries\QueryBuilderNews;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

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
    public function store(StoreRequest $request)
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


        $validated = $request->validated();
        $validated['slug'] = \Str::slug($validated['title']);

        $news = News::create($validated);

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('message.admin.news.create.success'));
        }
        return back()->with('error', trans('message.admin.news.create.fail'));



        // $validated = $request->validated(); // Предыдущая строка теперь не нужна, т.к. наши данные валидируются с помощью CreateNewsRequest
        // // dd($validated);
        // $validated['slug'] = \Str::slug($validated['title']);

        // // $news = $news->fill($validated);
        // $news = News::create($validated);

        // if ($news->save()) {
        //     return redirect()->route('admin.news.index')
        //         // ->with('success', 'Запись успешно обновлена');
        //         ->with('success', trans('message.admin.news.create.success')); // Хелпер trans можно заменить __
        // }
        // // return back()->with('error', 'Ошибка обновления');
        // return back()->with('error', __('message.admin.news.create.fail'));
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
    // public function update(Request $request, News $news)
    public function update(UpdateRequest $request, News $news)
    {

        // $validated = $request->only(['title', 'author', 'categories_id', 'slug', 'image', 'status', 'description']);

        // $news = $news->Ffill($validated); // Так удобно использовать при одной записи в БД и она становится объектом.

        // $validated = $request->except(['_token', 'image']);
        $validated = $request->validated(); // Предыдущая строка теперь не нужна, т.к. наши данные валидируются с помощью UpdateRequest
        // dd($validated);
        $validated['slug'] = \Str::slug($validated['title']);

        $news = $news->fill($validated);

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                // ->with('success', 'Запись успешно обновлена');
                ->with('success', trans('message.admin.news.update.success')); // Хелпер trans можно заменить __
        }
        // return back()->with('error', 'Ошибка обновления');
        return back()->with('error', __('message.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json('ok');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            return response()->json('error', 400);
        }
    }
}
