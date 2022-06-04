<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    // Урок 5. На 6 уроке все это удалили, потому что реализовали по-другому в QueryBuilderCategories
    public function getNews()
    {
        return DB::table($this->table)
            ->select(['id', 'categories_id', 'title', 'slug', 'author', 'image', 'status', 'description', 'only_admin', 'created_at', 'updated_at'])
            ->get();
    }

    public function getOneNews(int $id)
    {
        return DB::table($this->table)
            ->select(['id', 'categories_id', 'title', 'slug', 'author', 'image', 'status', 'description', 'only_admin', 'created_at', 'updated_at'])
            ->find($id); // В случае отсутствия такого id выдаст null
    }

    // public $timestamps = false; // Чтобы время записи и перезаписи не обновлялись

    protected $fillable = ['title', 'author', 'categories_id', 'slug', 'image', 'status', 'description', 'only_admin']; // Перечисляются поля, которым запись разрешена. Лучше его использовать


    // protected $guarded = ['id']; // Перечисляются поля, которым запись запрещена. Нужен тогда, когда много полей.


    protected $casts = [
        'only_admin' => 'boolean'
    ]; // Будет проебразовывать при выборке данных в этот тип данных

    // Создание обратной связи с таблицей categories базы данных. Название в единственном числе, т.к. возвращается только одна категория у новости.
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
