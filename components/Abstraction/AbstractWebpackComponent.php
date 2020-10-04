<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Components\Abstraction;

use Cms\Classes\ComponentBase;

abstract class AbstractWebpackComponent extends ComponentBase
{
    protected function getEntrypoints(string $theme)
    {
        return json_decode(file_get_contents(__DIR__ . "/../../../../../themes/" . $theme . "/assets/build/entrypoints.json"), true);
    }

    public function defineProperties()
    {
        return [
            'webpackEntrypoint' => [
                'title'       => 'fluxter.webpack::lang.settings.posts_filter',
                'description' => 'fluxter.webpack::lang.settings.posts_filter_description',
                'type'        => 'string',
                'default'     => 'app',
            ],
        ];
    }

    abstract protected function getRows(array $entryPoint): array;

    public function onRender()
    {
        $webpack = $this->getEntrypoints("theme-fx2020");
        $rows = $this->getRows($webpack["entrypoints"][$this->property('webpackEntrypoint')]);
        $html = "";
        foreach ($rows as $row) {
            $html .= $row;
        }
        return $html;
    }
}
