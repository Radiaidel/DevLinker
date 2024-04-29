<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Profile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        User::created(function ($user) {
            // Créer un profil associé à l'utilisateur
            $user->profile()->create([
                'cover_image' => 'cover_default.jpeg',
                'profile_image' => 'unknown.png',
            ]);
        });
    }
}
