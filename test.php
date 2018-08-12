<?php
/**
 * Created by PhpStorm.
 * User: darko
 * Date: 31/07/18
 * Time: 15:48
 */

require_once(__DIR__.'/../../config.php');

require_login();

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/fancybox3/test.php');
$PAGE->set_title('Page title');
$PAGE->set_heading('Heading');

// Ensure CSS is loaded.
local_fancybox3\helper::initialize();

// Your code goes here.
$PAGE->requires->js_amd_inline("
require(['jquery', 'local_fancybox3/jquery.fancybox'], function($) {

    $().fancybox({
        selector : '[data-fancybox=\"gallery\"]',
        loop     : true
    });

});"
);

/** @var core_renderer $OUTPUT */
$OUTPUT;

$images = [
    'https://images.freeimages.com/images/large-previews/8ee/multicolor-drop-2-1056473.jpg',
    'https://images.freeimages.com/images/large-previews/583/multicolor-drop-3-1187778.jpg',
    'https://images.freeimages.com/images/large-previews/5ac/multicolor-drop-1-1188001.jpg',
    'https://images.freeimages.com/images/large-previews/b7b/texture-069-1055779.jpg'
];

$title = html_writer::span("Show Gallery");
$added = false;
$outputimages = '';
foreach ($images as $image) {
    if (!$added) {
        $stitle = $title;
        $added = true;
    } else {
        $stitle = '';
    }
    $outputimages .= html_writer::link(
        $image,
        html_writer::img($image, 'some text', ['style' => 'display: none;']).
        $stitle,
        ['data-fancybox' => 'gallery', 'data-caption' => 'Caption for single image']
    );
}

echo $OUTPUT->header();

echo $outputimages;

echo $OUTPUT->footer();