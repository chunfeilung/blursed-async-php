<?php

/**
 * Queue a job with $jobId.
 *
 * Most developers use something like MySQL, Redis, or MongoDB to store jobs,
 * but here I’ve chosen to use the filesystem to keep things simple.
 *
 * @param string $jobId
 */
function queue_job(string $jobId)
{
    // Create a temporary file on the filesystem that tells our cron worker that
    // it should start a job with a certain $jobId
    $directory = '/tmp/jobs';
    if (!is_dir($directory)) {
        mkdir($directory);
    }
    file_put_contents("$directory/$jobId", '');
}

// -----------------------------------------------------------------------------

// Generate a unique-looking ID for our job
$jobId = time() . '-cron-' . bin2hex(random_bytes(5));

echo '<pre>';
echo "Queuing async job $jobId at " . date('Y-m-d H:i:s') . "\n";

queue_job($jobId);

echo 'Bye!';
