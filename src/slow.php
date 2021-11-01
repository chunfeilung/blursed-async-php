<?php

/**
 * Helper function that makes it easier to see what’s going on.
 *
 * @param string $message Some text that we want to log and display
 */
function show_message(string $message): void
{
    error_log($message);
    echo $message . "\n";
}

/**
 * Something that takes a while to complete.
 *
 * @param string $jobId
 */
function do_something(string $jobId): void
{
    // This makes browsers show the output of this script using a monospaced
    // font
    echo '<pre>';

    show_message("Started  job $jobId at " . date('Y-m-d H:i:s'));

    // This would typically be a more useful task that may take a while to
    // complete
    sleep(5);

    show_message("Finished job $jobId at " . date('Y-m-d H:i:s'));
}

// -----------------------------------------------------------------------------

// $argv is a special variable that contains values that were passed to this
// script if it was called from the command line
if (isset($argv) && count($argv) > 1) {
    $jobId = $argv[1];
    do_something($jobId);
}
