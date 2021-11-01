<?php

require_once 'slow.php';

// Generate a unique-looking ID for our job
$jobId = 'sync-' . bin2hex(random_bytes(5));

echo "<pre>Starting job $jobId at " . date('Y-m-d H:i:s') . "</pre>";

do_something($jobId);
