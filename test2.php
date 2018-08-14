<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Test usage example
 *
 * @package   local_fancybox3
 * @copyright 2018 Darko Miletic
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');

require_login();

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/fancybox3/test2.php');
$PAGE->set_title('Page title');
$PAGE->set_heading('Heading');

// Ensure CSS is loaded.
local_fancybox3\helper::initialize();

/** @var core_renderer $OUTPUT */
$OUTPUT;

$context = [
    'images' => [
    (object)['image' => 'https://images.freeimages.com/images/large-previews/8ee/multicolor-drop-2-1056473.jpg',
        'caption' => 'caption1' , 'alttext' => 'text', 'printable' => true],
    (object)['image' => 'https://images.freeimages.com/images/large-previews/583/multicolor-drop-3-1187778.jpg',
        'caption' => 'caption1' , 'alttext' => ''],
    (object)['image' => 'https://images.freeimages.com/images/large-previews/5ac/multicolor-drop-1-1188001.jpg',
        'caption' => 'caption1' , 'alttext' => ''],
    (object)['image' => 'https://images.freeimages.com/images/large-previews/b7b/texture-069-1055779.jpg',
        'caption' => 'caption1' , 'alttext' => '']
    ]
];

echo $OUTPUT->header();

echo $OUTPUT->render_from_template('local_fancybox3/gallery', $context);

echo $OUTPUT->footer();