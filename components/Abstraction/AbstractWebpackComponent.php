<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components\Abstraction;

use Cms\Classes\ComponentBase;

abstract class AbstractWebpackComponent extends ComponentBase
{
    protected function loadEntrypoints()
    {
        $theme = $this->page->page->getThemeAttribute()->getDirName();
        return json_decode(file_get_contents(__DIR__ . "/../../../../../themes/" . $theme . "/" . $this->property('entrypointsFile')), true);
    }

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

    abstract protected function getRows(array $entryPoint): array;

    public function onRender()
    {
        $webpack = $this->loadEntrypoints();
        $rows = $this->getRows($webpack["entrypoints"][$this->property('webpackEntrypoint')]);
        $html = "";
        foreach ($rows as $row) {
            $html .= $row;
        }
        return $html;
    }
}
