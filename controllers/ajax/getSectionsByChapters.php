<?php

require_once(__DIR__ . '/../../models/Section.php');


$story = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));


$sections = Section::getAll($story);


echo json_encode($sections);