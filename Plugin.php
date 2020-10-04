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

    private function getEntrypoints(string $theme)
    {
        return json_decode(file_get_contents(__DIR__ . "/../../../themes/" . $theme . "/assets/build/entrypoints.json"), true);
    }

    public function webpackStyles(string $entrypoint)
    {
        $ep = $this->getEntrypoints("theme-fx2020");
        foreach ($ep["entrypoints"][$entrypoint]["css"] as $path) {
            $html = '<link rel="stylesheet" type="text/css" href="' . $path . '" />';
        }
        return $html;
    }

    public function webpackScripts(string $entrypoint)
    {
        $ep = $this->getEntrypoints("theme-fx2020");
        $html = "";
        foreach ($ep["entrypoints"][$entrypoint]["js"] as $path) {
            $html = '<script src="' . $path . '" />';
        }
        return $html;
    }
}
