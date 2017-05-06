<?php
include_once ROOT. '/models/Base.php';
include_once ROOT. '/components/Controller.php';


class BaseController extends Controller
{
  public function actionIndex()
{
    $this->render(array('1','dssss'));
}

}