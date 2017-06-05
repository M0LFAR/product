<?php
use components\Controller;
use  models\Base;

class BaseController extends Controller
{
  public function actionIndex()
{
    $model=Base::getBaseList();
    $this->render($model);
}

    public function actionCreate()
    {
        if(isset($_POST['submit'])){
            $base = new  Base();

            $base ->name = $_POST['name'];
            $base->address = $_POST['address'];
            $base->contact_phone = $_POST['contact_phone'];
            $base->directory_phone = $_POST['directory_phone'];

            $base->save();
        }

        $this->render(null, array(
            'nameView'=>'create',
            'action'=>__FUNCTION__,
        ));
    }

    public function actionEdit($id)
    {
        $base = new  Base($id);

        if (isset($_POST['submit'])){
            $base ->name= $_POST['name'];
            $base->address=$_POST['address'];
            $base->contact_phone=$_POST['contact_phone'];
            $base->directory_phone=$_POST['directory_phone'];
            $base->save();
        }


        $this->render($base, array(
            'nameView'=>'update'
        ));
    }

}