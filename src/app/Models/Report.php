<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BroadcastsEvents;

class Report extends Model
{
    use HasFactory , BroadcastsEvents;

    protected $fillable = [
        'user_id',
        'project_id',
        'status',
    ];

    // Définir les relations avec d'autres modèles
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
