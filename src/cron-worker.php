<?php

require_once 'slow.php';

function get_queued_jobs(): array
{
    return array_slice(scandir('/tmp/jobs'), 2);
}

// -----------------------------------------------------------------------------

$jobs = get_queued_jobs();

foreach ($jobs as $jobId) {
    // If two cron executions overlap, the file may no longer exist
    if (!file_exists("/tmp/jobs/$jobId")) {
        continue;
    }

    do_something($jobId);

    // Mark the job as done by removing the file
    unlink("/tmp/jobs/$jobId");
}

echo "Bye!\n";
