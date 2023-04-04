<?php

require_once(__DIR__ . '/../../models/Chapter.php');


$story = intval(filter_input(INPUT_POST, 'story', FILTER_SANITIZE_NUMBER_INT));

$chapters = Chapter::getAll($story);

echo json_encode($chapters);

// echo json_encode($sections);

