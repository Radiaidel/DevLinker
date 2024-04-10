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
}
