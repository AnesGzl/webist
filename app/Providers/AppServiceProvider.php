<?php

namespace App\Providers;
use App\Models\Student;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        // $this->DE = Student::find(2022001);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $this->DE = Student::find(2022001);
        // Livewire::component('search-convoncu', \App\Livewire\Searchconvoncu::class);
    }
}
