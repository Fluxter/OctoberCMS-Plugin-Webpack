<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components\Abstraction;

use Cms\Classes\ComponentBase;

abstract class AbstractWebpackComponent extends ComponentBase
{

    public function defineProperties()
    {
        return [
            'webpackEntrypoint' => [
                'title'       => 'fluxter.webpack::lang.settings.entrypoint',
                'description' => 'fluxter.webpack::lang.settings.entrypoint_description',
                'type'        => 'string',
                'default'     => 'app',
            ],
            'entrypointsFile' => [
                'title'       => 'fluxter.webpack::lang.settings.entrypointFile',
                'description' => 'fluxter.webpack::lang.settings.entrypointFile_description',
                'type'        => 'string',
                'default'     => 'assets/build/entrypoints.json',
            ],
        ];
    }
}
