<?php


$baseRef = (getenv('GITHUB_BASE_REF') ?: 'master');
$headRef = getenv('GITHUB_HEAD_REF');
$event   = getenv('GITHUB_EVENT_NAME');

if ($headRef === false) {
    echo "No HEAD ref found";
    exit(1);
}//end if

if (!in_array($event, ['push', 'pull_request'])) {
    echo "Invalid event: {$event}";
    exit(1);
}//end if

$command = sprintf('git diff --name-only %s', $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = sprintf('git diff --name-only %s..%s', $baseRef, $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = sprintf('git diff --name-only %s...%s', $baseRef, $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = sprintf('git diff --name-only %s...', $baseRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = sprintf('git diff --name-only %s...', $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = sprintf('git rev-parse --abbrev-ref %s', $baseRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = sprintf('git rev-parse --abbrev-ref %s', $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = 'git rev-parse --abbrev-ref HEAD';
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$command = 'git status';
exec($command, $output, $return);
var_dump($command);
var_dump($output);


var_dump(getenv());
