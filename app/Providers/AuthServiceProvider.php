<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerBalonmanoEnCubaPolicies();

        //
    }

    public function registerBalonmanoEnCubaPolicies()
    {
        if (Schema::hasTable('permissions')) {
            $permissions = Permission::all();
            foreach ($permissions as $perm) {
                $name = $perm->name;
                Gate::define($perm->name, function ($user) use ($name) {
                    return $user->hasAccess($name);
                });
            }
        }

    }
}
