<?php

require_once 'slow.php';

// Generate a unique-looking ID for our job
$jobId = 'headers-' . bin2hex(random_bytes(5));

$output = '<pre>';
$output .= "Starting async job $jobId at " . date('Y-m-d H:i:s') . "\n";
$output .= 'Bye!';

header('Connection: close');
header('Content-Length: ' . strlen($output));
header('Content-Encoding: none');

echo $output;

flush();

do_something($jobId);
