<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title', 'description', 'for_sale'];

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function getLastReporterAttribute()
    {
        $latestReport = $this->reports()->latest()->first();
        return $latestReport ? $latestReport->user->name : 'No report yet';
    }
    public static function countReportedProjects()
    {
        return self::has('reports')->count();
    }
}
