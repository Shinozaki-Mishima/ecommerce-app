<?php 

class Customimage 
{
    public $input_name = "";
    public $required = 0;
    public $selected = 0;
    public $new_name = "none";
    public $full_path = "";

    public function __construct($input_name, $required = 0, $prev_name = "none")
    {
        $this->input_name = $input_name;
        $this->required = $required;
        $this->prev_name = $prev_name;
        $this->setDirectory();
    }

    private function setDirectory() 
    {
        $projectDir = ($_ENV["PROJECT_PATH"] == "/") ? "" : "{$_ENV["PROJECT_NAME"]}/";
        $rootDir = ROOT_DIR;
        $this->full_path = $rootDir . $projectDir;
    }
}