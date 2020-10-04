<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components;

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

    protected function getRows(array $entryPoint): array
    {
        $rows = [];
        foreach ($entryPoint["css"] as $path) {
            $rows[] = '<link rel="stylesheet" type="text/css" href="' . $path . '" />';
        }
        return $rows;
    }
}
