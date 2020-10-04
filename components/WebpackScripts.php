<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components;

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

    protected function getRows(array $entryPoint): array
    {
        $rows = [];
        foreach ($entryPoint["js"] as $path) {
            $rows[] = '<script src="' . $path . '" />';
        }
        return $rows;
    }
}
