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
            <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)" sodipodi:docname="gala-add.svg" inkscape:export-xdpi="96" inkscape:export-ydpi="96" fill="currentColor"><title id="title851">Gala icon set</title><defs id="defs2"/><sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="1.979899" inkscape:cx="86.115504" inkscape:cy="143.18912" inkscape:document-units="px" inkscape:current-layer="layer1" inkscape:document-rotation="0" showgrid="true" units="px" inkscape:pagecheckerboard="true" inkscape:showpageshadow="false" inkscape:window-width="1920" inkscape:window-height="1016" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" inkscape:snap-page="true" inkscape:snap-text-baseline="true" inkscape:snap-center="true" inkscape:snap-others="true" inkscape:snap-object-midpoints="true" inkscape:snap-midpoints="true" inkscape:snap-smooth-nodes="true" inkscape:snap-intersection-paths="true" inkscape:object-paths="true" inkscape:snap-bbox="true" inkscape:bbox-paths="true" inkscape:bbox-nodes="true" inkscape:snap-bbox-midpoints="true" inkscape:snap-bbox-edge-midpoints="true" showguides="true" inkscape:guide-bbox="true" scale-x="0.16458"><inkscape:grid type="xygrid" id="grid986" dotted="false" empspacing="16"/></sodipodi:namedview><metadata id="metadata5"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/><dc:title>Gala icon set</dc:title><dc:source>https://github.com/sisyphusion/gala-icons</dc:source><dc:subject><rdf:Bag/></dc:subject><dc:creator><cc:Agent><dc:title>Jake Wells</dc:title></cc:Agent></dc:creator><dc:contributor><cc:Agent><dc:title/></cc:Agent></dc:contributor></cc:Work></rdf:RDF></metadata><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('gala-add', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)" sodipodi:docname="gala-add.svg" inkscape:export-xdpi="96" inkscape:export-ydpi="96" fill="currentColor"><title id="title851">Gala icon set</title><defs id="defs2"/><sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="1.979899" inkscape:cx="86.115504" inkscape:cy="143.18912" inkscape:document-units="px" inkscape:current-layer="layer1" inkscape:document-rotation="0" showgrid="true" units="px" inkscape:pagecheckerboard="true" inkscape:showpageshadow="false" inkscape:window-width="1920" inkscape:window-height="1016" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" inkscape:snap-page="true" inkscape:snap-text-baseline="true" inkscape:snap-center="true" inkscape:snap-others="true" inkscape:snap-object-midpoints="true" inkscape:snap-midpoints="true" inkscape:snap-smooth-nodes="true" inkscape:snap-intersection-paths="true" inkscape:object-paths="true" inkscape:snap-bbox="true" inkscape:bbox-paths="true" inkscape:bbox-nodes="true" inkscape:snap-bbox-midpoints="true" inkscape:snap-bbox-edge-midpoints="true" showguides="true" inkscape:guide-bbox="true" scale-x="0.16458"><inkscape:grid type="xygrid" id="grid986" dotted="false" empspacing="16"/></sodipodi:namedview><metadata id="metadata5"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/><dc:title>Gala icon set</dc:title><dc:source>https://github.com/sisyphusion/gala-icons</dc:source><dc:subject><rdf:Bag/></dc:subject><dc:creator><cc:Agent><dc:title>Jake Wells</dc:title></cc:Agent></dc:creator><dc:contributor><cc:Agent><dc:title/></cc:Agent></dc:contributor></cc:Work></rdf:RDF></metadata><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('gala-add', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)" sodipodi:docname="gala-add.svg" inkscape:export-xdpi="96" inkscape:export-ydpi="96" fill="currentColor"><title id="title851">Gala icon set</title><defs id="defs2"/><sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="1.979899" inkscape:cx="86.115504" inkscape:cy="143.18912" inkscape:document-units="px" inkscape:current-layer="layer1" inkscape:document-rotation="0" showgrid="true" units="px" inkscape:pagecheckerboard="true" inkscape:showpageshadow="false" inkscape:window-width="1920" inkscape:window-height="1016" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" inkscape:snap-page="true" inkscape:snap-text-baseline="true" inkscape:snap-center="true" inkscape:snap-others="true" inkscape:snap-object-midpoints="true" inkscape:snap-midpoints="true" inkscape:snap-smooth-nodes="true" inkscape:snap-intersection-paths="true" inkscape:object-paths="true" inkscape:snap-bbox="true" inkscape:bbox-paths="true" inkscape:bbox-nodes="true" inkscape:snap-bbox-midpoints="true" inkscape:snap-bbox-edge-midpoints="true" showguides="true" inkscape:guide-bbox="true" scale-x="0.16458"><inkscape:grid type="xygrid" id="grid986" dotted="false" empspacing="16"/></sodipodi:namedview><metadata id="metadata5"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/><dc:title>Gala icon set</dc:title><dc:source>https://github.com/sisyphusion/gala-icons</dc:source><dc:subject><rdf:Bag/></dc:subject><dc:creator><cc:Agent><dc:title>Jake Wells</dc:title></cc:Agent></dc:creator><dc:contributor><cc:Agent><dc:title/></cc:Agent></dc:contributor></cc:Work></rdf:RDF></metadata><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-gala-icons.class', 'awesome');

        $result = svg('gala-add')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)" sodipodi:docname="gala-add.svg" inkscape:export-xdpi="96" inkscape:export-ydpi="96" fill="currentColor"><title id="title851">Gala icon set</title><defs id="defs2"/><sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="1.979899" inkscape:cx="86.115504" inkscape:cy="143.18912" inkscape:document-units="px" inkscape:current-layer="layer1" inkscape:document-rotation="0" showgrid="true" units="px" inkscape:pagecheckerboard="true" inkscape:showpageshadow="false" inkscape:window-width="1920" inkscape:window-height="1016" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" inkscape:snap-page="true" inkscape:snap-text-baseline="true" inkscape:snap-center="true" inkscape:snap-others="true" inkscape:snap-object-midpoints="true" inkscape:snap-midpoints="true" inkscape:snap-smooth-nodes="true" inkscape:snap-intersection-paths="true" inkscape:object-paths="true" inkscape:snap-bbox="true" inkscape:bbox-paths="true" inkscape:bbox-nodes="true" inkscape:snap-bbox-midpoints="true" inkscape:snap-bbox-edge-midpoints="true" showguides="true" inkscape:guide-bbox="true" scale-x="0.16458"><inkscape:grid type="xygrid" id="grid986" dotted="false" empspacing="16"/></sodipodi:namedview><metadata id="metadata5"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/><dc:title>Gala icon set</dc:title><dc:source>https://github.com/sisyphusion/gala-icons</dc:source><dc:subject><rdf:Bag/></dc:subject><dc:creator><cc:Agent><dc:title>Jake Wells</dc:title></cc:Agent></dc:creator><dc:contributor><cc:Agent><dc:title/></cc:Agent></dc:contributor></cc:Work></rdf:RDF></metadata><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-gala-icons.class', 'awesome');

        $result = svg('gala-add', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 256 256" version="1.1" inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)" sodipodi:docname="gala-add.svg" inkscape:export-xdpi="96" inkscape:export-ydpi="96" fill="currentColor"><title id="title851">Gala icon set</title><defs id="defs2"/><sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="1.979899" inkscape:cx="86.115504" inkscape:cy="143.18912" inkscape:document-units="px" inkscape:current-layer="layer1" inkscape:document-rotation="0" showgrid="true" units="px" inkscape:pagecheckerboard="true" inkscape:showpageshadow="false" inkscape:window-width="1920" inkscape:window-height="1016" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" inkscape:snap-page="true" inkscape:snap-text-baseline="true" inkscape:snap-center="true" inkscape:snap-others="true" inkscape:snap-object-midpoints="true" inkscape:snap-midpoints="true" inkscape:snap-smooth-nodes="true" inkscape:snap-intersection-paths="true" inkscape:object-paths="true" inkscape:snap-bbox="true" inkscape:bbox-paths="true" inkscape:bbox-nodes="true" inkscape:snap-bbox-midpoints="true" inkscape:snap-bbox-edge-midpoints="true" showguides="true" inkscape:guide-bbox="true" scale-x="0.16458"><inkscape:grid type="xygrid" id="grid986" dotted="false" empspacing="16"/></sodipodi:namedview><metadata id="metadata5"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/><dc:title>Gala icon set</dc:title><dc:source>https://github.com/sisyphusion/gala-icons</dc:source><dc:subject><rdf:Bag/></dc:subject><dc:creator><cc:Agent><dc:title>Jake Wells</dc:title></cc:Agent></dc:creator><dc:contributor><cc:Agent><dc:title/></cc:Agent></dc:contributor></cc:Work></rdf:RDF></metadata><g inkscape:label="icon" inkscape:groupmode="layer" id="layer1"><circle style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" id="path868" cx="128" cy="128" r="112.00011"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="M 79.999992,128 H 176.0001" id="path872"/><path style="fill:none;stroke:currentColor;stroke-width:16;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" d="m 128.00004,79.99995 v 96.0001" id="path874"/></g></svg>
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
