<?php
include_once (ROOT.'/components/Controller.php');

class SiteController extends Controller
{
    public function actionIndex()
    {

    }

    public function actionShop()
    {
        $this->render(array('1','shop'));
    }
}