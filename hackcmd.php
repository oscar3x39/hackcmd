#!/usr/bin/env php
<?php
/*
 * (c) OscarLee oscar3x39@gmail.com
 */

define("USAGE", "Usage: hackcmd .hackcmd");

$bash = "";
$file = $argv[1];

if (!file_exists($file)) exit(USAGE);

$yaml = yaml_parse_file($file);

// Get global env variable
$env = $yaml["env"];
unset($yaml['env']);

foreach ($yaml as $func) {
    // Append template
    $template = template();
    sprintf($template, );
}
    
function template() {
    return file_get_contents("./template.txt");
}