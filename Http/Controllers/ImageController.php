<?php

namespace Statikbe\LaravelSirTrevor\Http\Controllers;

use Statikbe\LaravelSirTrevor\SirTrevor;
use HTML;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ImageController extends Controller {

    public static function upload(Request $request)
    {
        $config = SirTrevor::getConfig();

        $path = null;
        foreach ($request->file('attachment') as $file) {
            $path = $file->store($config['upload_directory']);
        };

        $publicPath = str_replace('public', 'storage', $path);

        return ['image' => $publicPath];
    }
}
