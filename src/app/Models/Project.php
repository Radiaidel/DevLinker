<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'for_sale'];

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isLikedBy($user)
    {
        // Vérifie si l'utilisateur a aimé ce projet
        return $this->likes->contains('user_id', $user->id);
    }
    public function saves()
    {
        return $this->hasMany(Save::class);
    }
    public function isSavedBy($user)
    {
        // Vérifie si l'utilisateur a aimé ce projet
        return $this->saves->contains('user_id', $user->id);
    }
}
