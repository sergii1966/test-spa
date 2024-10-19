<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\AddImageProductContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AddImageProductAction implements AddImageProductContract
{
    public static string $dirForImageSm = 'sm';
    public static string $dirForImageLg = 'lg';
    public float $imageWidthSm = 380;
    public float $imageHeightSm = 0;
    public float $imageWidthLg = 627;
    public float $imageHeightLg = 0;

    public array $imageData;

    public UploadedFile $image;

    public string|int $product_id;
    public string $dirName;

    public string $path_sm;
    public string $path_lg;
    public string $url_sm;
    public string $url_lg;
    public string $width_sm;
    public string $width_lg;
    public string $height_sm;
    public string $height_lg;

    public function setImageData(array $data): object
    {
        $this->imageData = $data;
        return $this;
    }

    public function setDirName(string $name): object
    {
        $this->dirName = strtolower($name);
        return $this;
    }

    public function makeSmAndLgDirs(): object
    {
        Storage::disk('images')->makeDirectory($this->getDirSm());
        Storage::disk('images')->makeDirectory($this->getDirLg());

        return $this;
    }

    public function getOriginalImageName()
    {
        return ($this->imageData)['image']->getClientOriginalName();
    }

    public function getNewImageName(): string
    {
        return substr(
            str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),
            0,
            8
        );
    }

    public function getDirNameForItem(): string
    {
        return $this->dirName . '/' . ($this->imageData)['product_id'];
    }

    public function getDirSm(): string
    {
        return $this->getDirNameForItem() . '/' . self::$dirForImageSm;
    }

    public function getDirLg(): string
    {
        return $this->getDirNameForItem() . '/' . self::$dirForImageLg;
    }

    public function getAbsolutePath(): string
    {
        return $this->getDirNameForItem() . '/' . $this->getOriginalImageName();
    }

    public function putImageToTmp(): object
    {
        Storage::disk('tmp')->putFileAs(
            $this->getDirNameForItem(),
            ($this->imageData)['image'],
            $this->getOriginalImageName()
        );

        return $this;
    }

    public function dataImgToSave(): array
    {
        return [
            'product_id' => ($this->imageData)['product_id'],
            'path_sm' => $this->path_sm,
            'path_lg' => $this->path_lg,
            'url_sm' => $this->url_sm,
            'url_lg' => $this->url_lg,
            'width_sm' => $this->width_sm,
            'width_lg' => $this->width_lg,
            'height_sm' => $this->height_sm,
            'height_lg' => $this->height_lg
        ];
    }

    public function putImage(): bool
    {
        $absolutePathInTmp = Storage::disk('tmp')->path($this->getAbsolutePath());
        $extension = strtolower(pathinfo($absolutePathInTmp, PATHINFO_EXTENSION));

        $file_name = $this->getNewImageName() . '.webp';
        $quality = 75;

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $im = imagecreatefromjpeg($absolutePathInTmp) ?? null;
                break;
            case 'png':
                $im = imagecreatefrompng($absolutePathInTmp) ?? null;
                break;
            case 'gif':
                $im = imagecreatefromgif($absolutePathInTmp) ?? null;
                break;
            default:
                return false;
        }

        $absolutePathToSaveWebpSm = Storage::disk('images')->path($this->getDirSm()) . '/' . $file_name;
        $absolutePathToSaveWebpLg = Storage::disk('images')->path($this->getDirLg()) . '/' . $file_name;

        if (
            !($im ?? null)
            || !($imSm = $this->imageResize($im, $this->imageWidthSm, $this->imageHeightSm))
            || !(imagewebp($imSm, $absolutePathToSaveWebpSm, $quality))
        ) {
            return false;
        }

        if (
            !($imLg = $this->imageResize($im, $this->imageWidthLg, $this->imageHeightLg))
            || !(imagewebp($imLg, $absolutePathToSaveWebpLg, $quality))
        ) {
            return false;
        }

        if (
            !Storage::disk('images')->exists($this->getDirSm() . '/' . $file_name)
            || !Storage::disk('images')->exists($this->getDirLg() . '/' . $file_name)
        ) {
            return false;
        }

        $this->path_sm = $this->getDirSm() . '/' . $file_name;
        $this->path_lg = $this->getDirLg() . '/' . $file_name;
        $this->url_sm = Storage::disk('images')->url($this->getDirSm() . '/' . $file_name);
        $this->url_lg = Storage::disk('images')->url($this->getDirLg() . '/' . $file_name);
        $this->width_sm = (getimagesize($absolutePathToSaveWebpSm))[0];
        $this->width_lg = (getimagesize($absolutePathToSaveWebpLg))[0];
        $this->height_sm = (getimagesize($absolutePathToSaveWebpSm))[1];
        $this->height_lg = (getimagesize($absolutePathToSaveWebpLg))[1];

        return true;
    }

    /**
     * @param \GdImage $image
     * @param float $w
     * @param float $h
     * @return false|\GdImage
     */
    public function imageResize(\GdImage $image, float $w = 0, float $h = 0): false|\GdImage
    {
        if ((gettype($image) != "object" || get_class($image) != "GdImage") && $w <= 0 && $h < 0) {
            return $image;
        }

        $oldW = imagesx($image);
        $oldH = imagesy($image);

        $ratio = $oldH / $oldW;

        $h = $h ?: $w * $ratio;

        $imageNew = imagecreatetruecolor($w, $h);
        imagecopyresampled($imageNew, $image, 0, 0, 0, 0, $w, $h, $oldW, $oldH);
        return $imageNew;
    }
}
