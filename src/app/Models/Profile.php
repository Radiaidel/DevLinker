<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_image',
        'profile_image',
        'title',
        'about',
        'experience',
        'education',
        'skills',
        'languages',
    ];

    protected $casts = [
        'experience' => 'json',
        'education' => 'json',
        'skills' => 'json',
        'languages' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
