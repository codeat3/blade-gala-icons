<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeGalaIcons\BladeGalaIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('gala-add')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" fill="currentColor"><defs id="defs2"/><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('gala-add', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" fill="currentColor"><defs id="defs2"/><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('gala-add', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" fill="currentColor"><defs id="defs2"/><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-gala-icons.class', 'awesome');

        $result = svg('gala-add')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" fill="currentColor"><defs id="defs2"/><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-gala-icons.class', 'awesome');

        $result = svg('gala-add', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" fill="currentColor"><defs id="defs2"/><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeGalaIconsServiceProvider::class,
        ];
    }
}
