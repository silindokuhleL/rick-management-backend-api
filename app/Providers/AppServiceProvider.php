<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
//        $roleAdmin = Role::create(['name' => 'risk owner']);
//        $roleSuperAdmin = Role::create(['name' => 'super admin']);
//
//        // Permissions
//        Permission::create(['name' => 'view admin dashboard']);
//        Permission::create(['name' => 'manage users']);
//
//        // Assign permissions to roles
//        $roleAdmin->givePermissionTo('view admin dashboard');
//        $roleSuperAdmin->givePermissionTo(['view admin dashboard', 'manage users']);


        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

    }
}
