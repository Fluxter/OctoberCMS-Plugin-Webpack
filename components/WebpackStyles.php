<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components;

use Fluxter\OctoberCMS\Plugin\Webpack\Classes\WebpackCore;
use Fluxter\OctoberCMS\Plugin\Webpack\Components\Abstraction\AbstractWebpackComponent;

class WebpackStyles extends AbstractWebpackComponent
{
    public function componentDetails()
    {
        return [
            'name' => 'Styles',
            'description' => 'Implements Webpack style files'
        ];
    }

    public function onRender()
    {
        $webpackCore = new WebpackCore();
        return $webpackCore->renderTags($this->page->page, $this->property('entrypoint'), "css", $this->property("entrypointsFile"));
    }
}
