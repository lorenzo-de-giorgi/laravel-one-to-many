<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'image', 'category_id'];

    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $count = 1;
        while (Project::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
