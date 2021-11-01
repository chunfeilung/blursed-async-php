<?php

// Generate a unique-looking ID for our job
$jobId = 'exec-' . bin2hex(random_bytes(5));

echo '<pre>';
echo "Starting async job $jobId at " . date('Y-m-d H:i:s') . "\n";

// exec() lets you execute a command on the system. We can use this to execute
// slow.php in another process. Normally, the script that contains the exec()
// call waits until the command has finished. We can “fix” this by adding
// “> /dev/null &” to the command.
exec("php slow.php $jobId > /dev/null &");

echo 'Bye!';
