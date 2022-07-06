<?php

class Debugger
{


    public static function showCurrentDir()
    {
        echo "<h4>Current directories</h4>";
        echo "<Br>Current directory is " . getcwd();
        echo "<Br>Current __file__" . __FILE__;
        echo "<Br>Current dirname __file__" . dirname(__FILE__);
        echo "<Br>Up 2 level, dirname __file__" . dirname(__FILE__, 2);
        echo "<Br>Up 2 level, dirname __DIR__" . dirname(__DIR__, 2);
        echo "<Br>===== END ===== <Br><br>";
    }

    public static function showPathsCreated()
    {
        echo "<h4>Paths created</h4>";
        echo "<br>ROOT_DIR: " . ROOT_DIR;
        echo "<br>PROJECT_DIR: " . PROJECT_DIR;
        echo "<br>APP_DIR: " . APP_DIR;
        echo "<br>ROOT_URL: " . ROOT_URL;
        echo "<br>BASE_URL: " . BASE_URL;
        echo "<br>ASSETS_URL: " . ASSETS_URL;
        echo "<Br>===== END ===== <Br><br>";
    }

    public static function debug($value)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public static function showSessions()
    {
        echo "<h4>Session info</h4>";
        self::debug($_SESSION);
    }

    public static function showPost()
    {
        echo "<h4>POST info</h4>";
        self::debug($_POST);
    }
}



if (!empty($_ENV["SHOW_CURRENT_DIR"])) {
    Debugger::showCurrentDir();
}


if (!empty($_ENV["SHOW_PATHS"])) {
    Debugger::showPathsCreated();
}


if (!empty($_ENV["SHOW_SESSIONS"])) {
    Debugger::showSessions();
}

if (!empty($_ENV["SHOW_POST"])) {
    Debugger::showPost();
}
