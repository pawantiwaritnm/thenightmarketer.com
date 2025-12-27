<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\ContactDetail;

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
        Validator::extend('strip_tags', function ($attribute, $value, $parameters, $validator) {
            // Remove any HTML tags from the value
            $cleanValue = strip_tags($value);
            // Check if the cleaned value is equal to the original value
            return $cleanValue === $value;
        });
        View::composer('*', function ($view) {
            // Fetch the first row from the table
            $contactDetails = ContactDetail::first();

            // Convert to an associative array if not null
            $view->with('contactDetails', $contactDetails ? $contactDetails->toArray() : []);
        });
    }
}
