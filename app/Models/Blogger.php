<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    use HasFactory;

    public function bloggerProfile()
    {
        return $this->hasOne(BloggerProfile::class);
    }
    
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
}