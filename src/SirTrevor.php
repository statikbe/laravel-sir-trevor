<?php

namespace Statikbe\LaravelSirTrevor;

use HTML;

class SirTrevor
{
    const CONFIG = 'sir-trevor';

    public static function includeScripts()
    {
        $config = self::getConfig();

        $html = HTML::script($config['js_path']);
        $html .= HTML::script("js/sir-trevor/blocks/rich_text.js") . PHP_EOL;
        $html .= HTML::script("js/sir-trevor/blocks/image_extended.js") . PHP_EOL;
        $html .= HTML::script("js/quill/quill.js") . PHP_EOL;
        $html .= HTML::script("js/sir-trevor/blocks/iframe.js") . PHP_EOL;
        $html .= HTML::script("https://cdn.jsdelivr.net/npm/underscore@1.13.6/underscore-umd-min.js") . PHP_EOL;

        return $html.view('sirtrevor::js', ['config' => $config]);
    }

    public static function includeStylesheets()
    {
        $config = self::getConfig();

        $html = HTML::style($config['css_path']);
        $html .= HTML::style("/css/quill/quill.core.css");
        $html .= HTML::style("/css/quill/quill.snow.css");

        return $html;
    }

    public static function getConfig() {
        $config = config(self::CONFIG);

        if (isset($config['blocktypes']) && is_array($config['blocktypes'])) {
            $blockTypes = json_encode($config['blocktypes']);
            $config['blocktypes'] = $blockTypes;
        }

        return $config;
    }
}
