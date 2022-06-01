<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

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
}
