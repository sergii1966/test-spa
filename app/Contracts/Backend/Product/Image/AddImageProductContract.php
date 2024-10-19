<?php

namespace App\Contracts\Backend\Product\Image;

interface AddImageProductContract
{
    public function setImageData(array $data): object;

    public function setDirName(string $name): object;

    public function makeSmAndLgDirs(): object;

    public function putImageToTmp(): object;

    public function dataImgToSave(): array;

    public function putImage(): bool;

}
