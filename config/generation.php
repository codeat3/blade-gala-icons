<?php

use Illuminate\Support\Str;
use Codeat3\BladeIconGeneration\IconProcessor;

$svgNormalization = static function (string $tempFilepath, array $iconSet, SplFileInfo $sourceFile) {

    // dd($sourceFile);
    // perform generic optimizations
    $iconProcessor = new IconProcessor($tempFilepath, $iconSet, $sourceFile);
    $iconProcessor
        ->optimize()
        ->postOptimizationAsString(function ($svgLine) {

            $svgLine = str_replace('stroke:#000000;', 'stroke:currentColor;', $svgLine);
            // $svgLine = str_replace('fill="black"', 'fill="currentColor"', $svgLine);

            return $svgLine;
        })
        ->save(function ($name, $file) use ($sourceFile, $iconSet) {
            return Str::replace('svg', '', Str::replace('gala-', '', $sourceFile->getFilename()));
        });

};

return [
    [
        // Define a source directory for the sets like a node_modules/ or vendor/ directory...
        'source' => __DIR__.'/../dist/*',

        // Define a destination directory for your icons. The below is a good default...
        'destination' => __DIR__.'/../resources/svg',

        // Enable "safe" mode which will prevent deletion of old icons...
        'safe' => false,

        // Call an optional callback to manipulate the icon
        // with the pathname of the icon and the settings from above...
        'after' => $svgNormalization,

        'is-solid' => true,

    ],
];