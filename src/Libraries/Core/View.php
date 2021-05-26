<?php


namespace App\Libraries\Core;
use \RuntimeException;

class View
{
    private $data = array();

    private $viewToRender;

    public function __construct($view)
    {
        try {
            $file = 'src/Views/' . $view . '.php';

            if (file_exists($file)) {
                $this->viewToRender = $view;
            } else {
                throw new RuntimeException("View not found");
            }
        }
        catch (RuntimeException $e) {
            echo $e->getMessage();
        }

    }

    public function assign($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function render()
    {
        extract($this->data,null);
        require_once 'src/Views/' . $this->viewToRender . '.php';
    }
}