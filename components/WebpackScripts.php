<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components;

use Fluxter\OctoberCMS\Plugin\Webpack\Classes\WebpackCore;
use Fluxter\OctoberCMS\Plugin\Webpack\Components\Abstraction\AbstractWebpackComponent;

class WebpackScripts extends AbstractWebpackComponent
{
    public function componentDetails()
    {
        return [
            'name' => 'Scripts',
            'description' => 'Implements Webpack script files'
        ];
    }

    public function onRender()
    {
        $webpackCore = new WebpackCore();
        return $webpackCore->renderTags($this->page->page, $this->property('entrypoint'), "js", $this->property("entrypointsFile"));
    }
}
