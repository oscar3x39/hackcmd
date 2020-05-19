#!/usr/bin/env php
<?php
/*
 * (c) OscarLee oscar3x39@gmail.com
 */

define("USAGE", "Usage: hackcmd .hackcmd");
define("FILE_ERROR", "Check your yaml file syntax");
define("SPACE", "			");

$bash = "";
$file = $argv[1] ?? ".hackcmd";

if (!file_exists($file)) exit(USAGE);

$hackcmd = new hackcmd($file);
file_put_contents("./cmd.sh", $hackcmd->render());

class hackcmd {
    private $env;
    private $alias;
    private $command_list = [];
    private $head;

    public function __construct($file) {
        // Get global env variable
        $yaml = yaml_parse_file($file);
        $this->env = $yaml["env"] ?? false;
        $this->alias = $yaml["alias"];
    }

    function reSpace($str) {
        return str_replace(["\r", "\n", "\r\n", "\n\r"], '', $str);
    }

    function getHandle($head) {
        $list = implode("\r\n", $this->command_list);
        $handle = "Commands:\r\n$list";

        $path = shell_exec("which $head") ?? false;
        $path = $this->reSpace($path);
        if ($path) {
            $handle = "$path \$1";
        }
        return $handle;
    }

    function setHandle($head, $template) {
        $handle = $this->getHandle($head);
        var_dump($handle);
        return str_replace("%handle%", $handle, $template);
    }

    function setEnv($template) {
        $env = $this->env;
        if ($env) {
            foreach ($env as $source => $replace) {
                $template = str_replace("\$$source", $replace, $template);
            }
        }
        return $template;
    }

    function render() {
        if (!count($this->alias)) exit(FILE_ERROR);

        $shell = "";
        foreach ($this->alias as $head => $funcs) {
            // generate template
            $template = $this->template();
            $template = $this->setHead($template, $head);

            $command_arr = [];
            foreach ($funcs as $source => $func) {
                // get values
                $command = $func["command"];
                $command_arr[] = $this->getCommand($source, $command);
                $this->command_list[] = $source;
            }

            $command = implode(PHP_EOL, $command_arr);
            $shell .= $this->setCommand($template, $command).PHP_EOL;
            $shell = $this->setHandle($head, $shell);
        }

        $shell = $this->setEnv($shell);
        return $shell;
    }

    function setHead($template, $head) {
        if ($head) {
            $template = str_replace("%head%", $head, $template);
        }
        return $template;
    }

    function setCommand($template, $command) {
        if ($command) {
            $template = str_replace("%command%", $command, $template);
        }
        return $template;
    }

    function getCommand($source, $command) {
        $command_case = false;
        if ($source && $command) {
            $command_case = sprintf(SPACE."\"%s\"* ) command %s ;;", $source, $command);
        }
        return $command_case;
    }

    function template() {
        return file_get_contents("./template.txt");
    }
}

