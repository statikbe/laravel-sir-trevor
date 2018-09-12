<?php

namespace Statikbe\LaravelSirTrevor\Controllers;

use HTML;
use Spatie\Image\Image;
use Statikbe\LaravelSirTrevor\SirTrevor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Image\Manipulations;

class ImageController extends Controller {

    const CONFIG_UPLOAD_DIRECTORY = 'upload_directory';
    const CONFIG_IMAGE_WIDTH = 'image_resize_width';
    const CONFIG_IMAGE_QUALITY = 'image_quality';

    public static function upload(Request $request)
    {
        $config = SirTrevor::getConfig();

        $path = null;
        foreach ($request->file('attachment') as $file) {
            $image = Image::load($file);
            $width = $config[self::CONFIG_IMAGE_WIDTH];
            if($image->getWidth() > $width){
                $image->width($width);
            }
            $path = $config[self::CONFIG_UPLOAD_DIRECTORY].'/'.$file->getClientOriginalName();
            $publicPath = str_replace('public', 'storage', $path);
            $image->format(Manipulations::FORMAT_JPG)
                ->quality($config[self::CONFIG_IMAGE_QUALITY])
                ->optimize()
                ->save($publicPath);
        };

        return ['image' => '/'.$publicPath];
    }
}
