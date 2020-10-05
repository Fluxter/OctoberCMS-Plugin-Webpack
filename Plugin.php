<?php

namespace Fluxter\Webpack;

use Backend\Classes\Controller;
use Fluxter\OctoberCMS\Plugin\Webpack\Classes\WebpackCore;
use Fluxter\OctoberCMS\Plugin\Webpack\Components\WebpackScripts;
use Fluxter\OctoberCMS\Plugin\Webpack\Components\WebpackStyles;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    private WebpackCore $webpack;
    
    public function boot()
    {
        $this->webpack = new WebpackCore();
    }

    public function pluginDetails()
    {
        return [
            "name" => "Webpack",
            "description" => "loads webpack styles and scripts for your theme.",
            "author" => "Marcel Kallen, Fluxter",
        ];
    }
    
    public function registerMarkupTags()
    {
        return [
            "functions" => [
                "webpack_styles" => [$this, "webpackStyles"],
                "webpack_scripts" => [$this, "webpackScripts"]
            ]
        ];
    }

    public function webpackStyles(string $entrypoint = "app", $entrypointsFile = "assets/build/entrypoints.json")
    {
        return $this->webpack->renderTags($entrypoint, "css", $entrypointsFile);
    }
    
    public function webpackScripts(string $entrypoint = "app", $entrypointsFile = "assets/build/entrypoints.json")
    {
        return $this->webpack->renderTags($entrypoint, "js", $entrypointsFile);
    }

    public function registerComponents()
    {
        return [
            WebpackStyles::class => "webpackStyles",
            WebpackScripts::class => "webpackScripts"
        ];
    }
}
