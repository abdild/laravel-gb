<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, Sluggable;

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

    // Урок 7 Scope
    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'DRAFT');
    }

    public function scopeBlocked($query)
    {
        return $query->where('status', 'BLOCKED');
    }

    // Урок 10
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    // -----------------

    // Создание объекта carbon для работы с датами
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
