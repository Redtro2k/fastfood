<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class Food extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function image_url(){
        return Storage::url($this->fbimage);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
