<?php

namespace Fluxter\OctoberCMS\Plugin\Webpack\Classes;

use Cms\Classes\Page;

class WebpackCore
{
    protected function loadEntrypoints(Page $page, string $entrypointFile)
    {
        $theme = $page->getThemeAttribute()->getDirName();
        return json_decode(file_get_contents(__DIR__ . "/../../../../themes/" . $theme . "/" . $entrypointFile), true);
    }

    public function renderTags(Page $page, string $entrypoint, string $type, string $entrypointFile = "asets/build/entrypoints.json")
    {
        $webpack = $this->loadEntrypoints($page, $entrypointFile);
        
        $rows = "";
        foreach ($webpack["entrypoints"][$entrypoint][$type] as $path) {
            if ($type == "js") {
                $rows .= '<script src="' . $path . '" />';
            } elseif ($type == "css") {
                $rows .= '<link rel="stylesheet" type="text/css" href="' . $path . '" />';
            } else {
                throw new \Exception("Unsupported webpack type! Only css and js are supported");
            }
        }
        return $rows;

        $rows = $this->getRows($webpack["entrypoints"][$this->property('webpackEntrypoint')]);
    }
}
