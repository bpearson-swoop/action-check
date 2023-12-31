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


$output  = [];
$command = sprintf('git fetch -u origin %s', $baseRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = sprintf('git fetch -u origin %s', $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = sprintf('git diff --name-only origin/%s origin/%s', $baseRef, $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = 'git remote -v';
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = sprintf('git rev-parse --abbrev-ref %s', $baseRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = sprintf('git rev-parse --abbrev-ref %s', $headRef);
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = 'git rev-parse --abbrev-ref HEAD';
exec($command, $output, $return);
var_dump($command);
var_dump($output);

$output  = [];
$command = 'git status';
exec($command, $output, $return);
var_dump($command);
var_dump($output);


var_dump(getenv());
