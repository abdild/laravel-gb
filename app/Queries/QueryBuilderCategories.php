<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderCategories implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Category::query();
    }

    // public function getCategories(): Collection
    public function getCategories(): LengthAwarePaginator // Нужно поменять возвращаемое значение, чтобы была пагинация
    {
        return Category::select(['id', 'title', 'description', 'created_at', 'updated_at'])
            // ->get();
            ->paginate(10); // Для пагинации
    }

    public function getCategoryById(int $id)
    {
        return Category::select(['id', 'title', 'description', 'created_at', 'updated_at'])
            // ->find($id); // В случае отсутствия такого id выдаст null
            ->findOrFail($id); // В случае отсутствия такого id выдаст исключение, ошибку
    }
}
