<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';//后台api
    protected $miniAppNamespace = 'App\Http\Controllers\MiniApp';//小程序api

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        if(Str::is(config('route.admin_domain').'.*',request()->getHost()??'')){
            $this->adminApiRoutes();
        }else{
            $this->miniAppApiRoutes();
        }
//        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function adminApiRoutes()
    {
        Route::prefix('backend')
             ->middleware('api')
             ->namespace($this->adminNamespace)
             ->group(base_path('routes/admin-api.php'));
    }

    protected function miniAppApiRoutes()
    {
        Route::prefix('app')
            ->middleware('api')
            ->namespace($this->miniAppNamespace)
            ->group(base_path('routes/mini-app-api.php'));
    }
}
