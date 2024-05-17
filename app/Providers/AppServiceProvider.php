<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
        Builder::macro('allowedFilters', function ($allowedFilters) {
            /** @var Builder $this */

            foreach ($allowedFilters as $filter => $value) {

                // dump($filter, $value);
                if ($value != "") {
                    $this->hasNamedScope($filter)
                        ? $this->{$filter}($value)
                        : $this->orWhere($filter, 'LIKE', '%' . $value . '%');
                }
            }

            return $this;
        });
    }
}
