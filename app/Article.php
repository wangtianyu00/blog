<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 不可以注入的字段
    protected $guarded = [];
    // 可以注入的字段
    // protected $fillable;
    //
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
