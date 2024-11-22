<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloggerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',     
        'user_name',   
        'bio',
        'website',
        'location',
        'date_of_birth'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
