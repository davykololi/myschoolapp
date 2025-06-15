<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Model::shouldBeStrict();
        ServiceProvider::addProviderToBootstrapFile(Provider::class);

        //whereLike Macro
        Builder::macro('whereLike', function ($attributes, string $search) {
            $this->where(function (Builder $query) use ($attributes, $search) {
                foreach ($attributes as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $search) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $search) {
                                $query->where($relationAttribute, 'LIKE', "%{$search}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $search) {
                            $query->orWhere($attribute, 'LIKE', "%{$search}%");
                        }
                    );
                }
            });

            return $this;
        });
    }
}
