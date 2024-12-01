<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'featureimage',
        'methodology_used',
        'project_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_project');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }


}
