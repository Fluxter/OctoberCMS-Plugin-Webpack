<?php return [
    'plugin' => [
        'name' => 'Webpack',
        'description' => 'loads webpack styles and scripts for your theme.',
    ],
    "settings" => [
        "entrypoint" => "Entrypoint",
        "entrypoint_description" => "The entrypoint identifier inside of your entrypoints.json",
        "entrypointFile" => "Entrypoints file",
        "entrypointFile_description" => "Path to your entrypoints.json relative to your theme directory"
    ]
];
