<?php

require_once(__DIR__ . '/../../models/Chapter.php');
require_once(__DIR__ . '/../../models/Section.php');


$story = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));

$chapters = Chapter::getAll($story);

$sections = Section::getAll($story);

$data = array(
    'chapters' => $chapters,
    'sections' => $sections
);

// json_encode($sections);

echo json_encode($data);
// echo html_entity_decode(json_encode($sections));