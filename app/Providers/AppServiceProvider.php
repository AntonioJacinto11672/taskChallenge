<?php

namespace App\Providers;

use App\Http\repositories\TaskEloquentORM;
use App\Http\repositories\TaskRepositiryInterface;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositiryInterface::class, TaskEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
