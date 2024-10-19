<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\RemoveImageProductContract;
use Illuminate\Support\Facades\Storage;

class RemoveImageProductAction implements RemoveImageProductContract
{
    public function remove(array $data): bool
    {
        if(!$data['path_sm'] || !$data['path_lg']){
            return false;
        }

        if(
            !Storage::disk('images')->delete($data['path_sm'])
            || !Storage::disk('images')->delete($data['path_lg'])){

            return false;
        }

        return true;
    }
}
