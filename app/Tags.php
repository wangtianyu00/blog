<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    public function article() {
        return $this->belongToMany(Article::class);
    }
}
