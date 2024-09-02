<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (auth('')->hasUser() && auth('')->user()->isAdmin() ?? false) {
                $event->menu->add([
                    'text' => 'Criar novo usuário',
                    'url' => 'user/create',
                    'icon' => 'fas fa-fw fa-user',
                ]);
            }
        });
        Gate::define('is-admin', function (User $user): bool {
            return $user->isAdmin();
        });
        Gate::define('is-owner', function (User $user, object $register): bool {
            return $user->id === $register->user_id;
        });
    }
}
