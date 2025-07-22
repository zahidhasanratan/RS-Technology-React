<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_category_id');
    }
}
