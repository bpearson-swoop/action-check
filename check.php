<?php

var_dump(getenv());

$baseRef = (getenv('GITHUB_BASE_REF') ?: 'master');
$headRef = getenv('GITHUB_HEAD_REF');

if ($headRef === false) {
    echo "No HEAD ref found";
    exit(1);
}//end if


$command = sprintf('git diff --name-only %s', $baseRef);
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
