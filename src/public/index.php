<?php

include_once('start.php');

$data = ['length' => 7];

/**
 * @param string $template_name Name of twig file
 * @param array $data This will get passed to the twig file
 * @return void
 */
start_twig('index.twig', $data);
