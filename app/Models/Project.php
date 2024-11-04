<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function bloggers()
    {
        return $this->belongsTo(Blogger::class); 
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_project');
    }


}
