<?php

require_once(__DIR__ . '/../../models/Section.php');


$story = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));


$sections = Section::getAll($story);


// json_encode($sections);

echo html_entity_decode(json_encode($sections));