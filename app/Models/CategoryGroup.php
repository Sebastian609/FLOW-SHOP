<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class CategoryGroup extends Model
{
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
