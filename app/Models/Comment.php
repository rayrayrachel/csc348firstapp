<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Comment extends Model
{
    use HasFactory;

    public function bloggers()
    {
        return $this->belongsTo(Blogger::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }



}
