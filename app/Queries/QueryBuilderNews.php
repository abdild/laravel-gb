<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderNews implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function getNews(): LengthAwarePaginator // Нужно поменять возвращаемое значение, чтобы была пагинация
    {
        // return News::select(['id', 'categories_id', 'title', 'slug', 'author', 'image', 'status', 'description', 'only_admin', 'created_at', 'updated_at'])
        //     // ->get();
        //     ->paginate(10); // Для пагинации
        return News::with('category') // category - это имя связи
            ->paginate(5);
    }

    public function getNewsById(int $id)
    {
        return News::select(['id', 'categories_id', 'title', 'slug', 'author', 'image', 'status', 'description', 'only_admin', 'created_at', 'updated_at'])
            // ->find($id); // В случае отсутствия такого id выдаст null
            ->findOrFail($id); // В случае отсутствия такого id выдаст исключение, ошибку
    }
}
