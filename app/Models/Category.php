<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categoryGroup()
{
    return $this->belongsTo(CategoryGroup::class);
}
}
