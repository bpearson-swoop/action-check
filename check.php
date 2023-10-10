<?php

var_dump(getenv());

$baseRef = (getenv('GITHUB_BASE_REF') ?: 'master');
$headRef = getenv('GITHUB_HEAD_REF');

if ($headRef === false) {
    echo "No HEAD ref found";
    exit(1);
}//end if


exec(sprintf('cd %s; git diff --name-only %s..%s', getenv('PWD'), $headRef, $baseRef), $output, $return);
var_dump($output);

