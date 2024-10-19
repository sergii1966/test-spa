<?php

namespace App\Providers;

use App\Contracts\Backend\Product\AddNameDescriptionProductContract;
use App\Contracts\Backend\Product\AddPricesProductContract;
use App\Contracts\Backend\Product\AddStatusProductContract;
use App\Contracts\Backend\Product\Image\AddImageProductContract;
use App\Contracts\Backend\Product\Image\DelImageProductContract;
use App\Contracts\Backend\Product\Image\EditImageProductContract;
use App\Contracts\Backend\Product\Image\RemoveImageProductContract;
use App\Contracts\Backend\Product\Image\ValidateAddImageProductContract;
use App\Contracts\Backend\Product\Image\ValidateDelImageProductContract;
use App\Contracts\Backend\Product\Image\ValidateEditImageProductContract;
use App\Contracts\Backend\Product\ValidateAddNameDescriptionProductContract;
use App\Contracts\Backend\Product\ValidateAddPricesProductContract;
use App\Contracts\Backend\Product\ValidateAddStatusProductContract;
use App\Http\Actions\Backend\Product\AddNameDescriptionProductAction;
use App\Http\Actions\Backend\Product\AddPricesProductAction;
use App\Http\Actions\Backend\Product\AddStatusProductAction;
use App\Http\Actions\Backend\Product\Image\AddImageProductAction;
use App\Http\Actions\Backend\Product\Image\DelImageProductAction;
use App\Http\Actions\Backend\Product\Image\EditImageProductAction;
use App\Http\Actions\Backend\Product\Image\RemoveImageProductAction;
use App\Http\Actions\Backend\Product\Image\ValidateAddImageProductAction;
use App\Http\Actions\Backend\Product\Image\ValidateDelImageProductAction;
use App\Http\Actions\Backend\Product\Image\ValidateEditImageProductAction;
use App\Http\Actions\Backend\Product\ValidateAddNameDescriptionProductAction;
use App\Http\Actions\Backend\Product\ValidateAddPricesProductAction;
use App\Http\Actions\Backend\Product\ValidateAddStatusProductAction;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AddNameDescriptionProductContract::class, AddNameDescriptionProductAction::class);
        $this->app->bind(ValidateAddNameDescriptionProductContract::class, ValidateAddNameDescriptionProductAction::class);

        $this->app->bind(AddStatusProductContract::class, AddStatusProductAction::class);
        $this->app->bind(ValidateAddStatusProductContract::class, ValidateAddStatusProductAction::class);

        $this->app->bind(AddPricesProductContract::class, function (){
            return new AddPricesProductAction('price');
        });
        $this->app->bind(ValidateAddPricesProductContract::class, ValidateAddPricesProductAction::class);

        $this->app->bind(AddImageProductContract::class, AddImageProductAction::class);

        $this->app->bind(EditImageProductContract::class, function (){
            return new EditImageProductAction('images');
        });

        $this->app->bind(ValidateAddImageProductContract::class, ValidateAddImageProductAction::class);

        $this->app->bind(DelImageProductContract::class, function (){
            return new DelImageProductAction('images');
        });

        $this->app->bind(RemoveImageProductContract::class, RemoveImageProductAction::class);
        $this->app->bind(ValidateEditImageProductContract::class, ValidateEditImageProductAction::class);
        $this->app->bind(ValidateDelImageProductContract::class, ValidateDelImageProductAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
