<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function getCategories()
    {
        // return DB::select("select * from categories");
        return DB::table($this->table)
            ->select(['id', 'title', 'description', 'created_at', 'updated_at'])
            ->get();
    }

    public function getCategory(int $id)
    {
        // return DB::selectOne("SELECT * FROM categories WHERE id = :id", ['id' => $id]);
        return DB::table($this->table)
            ->select(['id', 'title', 'description', 'created_at', 'updated_at'])
            ->find($id); // В случае отсутствия такого id выдаст null
        // ->findOr Fail($id); // В случае отсутствия такого id выдаст исключение, ошибку
    }

    public function getCategoryWithParams(int $id)
    {
        // Один запрос
        // return DB::table($this->table)->min('id');

        // Другой запрос
        // return DB::table($this->table)
        //     ->join('news', 'news.categories_id', '=', 'categories.id')
        //     ->select('news.*', 'categories.title as categoryTitle')
        //     ->get();
        // // ->toSql(); // Показывает SQL-запрос

        // Еще запрос
        // return DB::table($this->table)
        //     // ->where('id', '>', 5)
        //     // ->where('title', 'like', '%' . request()->query('s') . '%')
        //     ->where([
        //         ['id', '>', 10],
        //         ['title', 'like', '%' . request()->query('s') . '%']
        //     ])
        //     ->orWhere('id', '=', 9)
        //     ->get();

        // Еще запрос
        return DB::table($this->table)
            // ->whereIn('id', [1, 3, 7])
            // ->whereNotIn('id', [5, 14, 19])
            // ->whereBetween('id', [5,12])
            ->whereNotBetween('id', [5,12])
            // ->orderBy('description', 'desc')
            ->orderBy('description', 'asc')
            ->get();
    }


    // protected $fillable = [
    //     'title', 'description'
    // ];

    // public function news(): HasMany
    // {
    //     return $this->hasMany(
    //         News::class,
    //         'category_id',
    //         'id'
    //     );
    // }
}
