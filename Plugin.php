<?php

namespace Fluxter\Webpack;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerMarkupTags()
    {
        return [
            "functions" => [
                "webpack_scripts" => [$this, "webpackScripts"],
                "webpack_styles" => [$this, "webpackStyles"]
            ]
        ];
    }

    public function webpackStyles(string $entrypoint)
    {
        // <link rel="stylesheet" type="text/css" href="{{ 'assets/build/app.css'|theme }}" />
        return "hello world styles." . $entrypoint;
    }

    public function webpackScripts(string $entrypoint)
    {
        // <link rel="stylesheet" type="text/css" href="{{ 'assets/build/app.css'|theme }}" />
        return "hello world";
    }
}
