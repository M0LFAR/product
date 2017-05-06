<?php

class Controller
{
    protected $layoutName;
    private  $config;

    function __construct(){
        $this->config= include(ROOT.'/config/view.php');

    }

    private function getLayout(){
        $fileNameLayout = $this->layoutName? $this->layoutName : $this->config['defaultLayout'].'.php';
        return  $this->config['layoutPath'].$fileNameLayout;
    }

    private function getView($viewName, $pathView=false, $model){
        $className = str_replace('Controller', '', get_class($this));
        $pathName = lcfirst($className).'/';

        $pathView = $pathView  ?  $pathView: $pathName;
        $fileNameView = ($viewName ? $viewName : $this->config['defaultView'] ) . '.php';

       return include_once ($this->config['allViewPath'].$pathView .$fileNameView);

    }

    protected function render($model, array $view = array()){

         $content = $this->getView($view['nameView'], $view['pathView'],$model);
        //include_once ($this->getLayout());

    }

}