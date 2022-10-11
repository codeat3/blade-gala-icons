<?php

use Illuminate\Support\Str;
use Codeat3\BladeIconGeneration\IconProcessor;

$svgNormalization = static function (string $tempFilepath, array $iconSet, SplFileInfo $sourceFile) {

    // dd($sourceFile);
    // perform generic optimizations
    $iconProcessor = new IconProcessor($tempFilepath, $iconSet, $sourceFile);
    $iconProcessor
        ->optimize(pre: function (&$svgEl) {
            $metadata = $svgEl->getElementsByTagName('metadata');
            $svgEl->removeChild($metadata[0]);
            $title = $svgEl->getElementsByTagName('title');
            $svgEl->removeChild($title[0]);
            foreach ([
                'sodipodi:docname',
                'inkscape:version',
                'inkscape:export-xdpi',
                'inkscape:export-ydpi',
            ] as $attribute) {
                // dd($attribute);
                $svgEl->removeAttribute($attribute);
            }
        })
        ->postOptimizationAsString(function ($svgLine) {
            $replacePattern = [
                '/\<sodipodi\:namedview.*\<\/sodipodi\:namedview\>/s' => '',
            ];
            $svgLine = preg_replace(array_keys($replacePattern), array_values($replacePattern), $svgLine);
            $svgLine = str_replace('stroke:#000000;', 'stroke:currentColor;', $svgLine);
            return $svgLine;
        })
        ->save(function ($name, $file) use ($sourceFile, $iconSet) {
            return Str::replace('svg', '', Str::replace('gala-', '', $sourceFile->getFilename()));
        });
};

return [
    [
        // Define a source directory for the sets like a node_modules/ or vendor/ directory...
        'source' => __DIR__ . '/../dist/*',

        // Define a destination directory for your icons. The below is a good default...
        'destination' => __DIR__ . '/../resources/svg',

        // Enable "safe" mode which will prevent deletion of old icons...
        'safe' => false,

        // Call an optional callback to manipulate the icon
        // with the pathname of the icon and the settings from above...
        'after' => $svgNormalization,

        'is-solid' => true,

    ],
];
