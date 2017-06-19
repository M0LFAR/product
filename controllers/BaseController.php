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
            if ($this->savePostBase($base)){
                header("Location: /base/");
            }

        }

        $this->render(null, array(
            'nameView'=>'create',
            'action'=>__FUNCTION__,
        ));
    }

    public function actionEdit($id)
    {
        $base = new  Base($id);

        if (isset($_POST['submit'])) {
            $this->savePostBase($base);
        }

        $this->render($base, array(
            'nameView'=>'update'
        ));
    }

    public function actionDelete($id){
        Base::delete($id);
    }

    private function savePostBase(Base $base){
        $base ->name= $_POST['name'];
        $base->address=$_POST['address'];
        $base->contact_phone=$_POST['contact_phone'];
        $base->directory_phone=$_POST['directory_phone'];
        $ret = $base->save();

        header("Location: /base/");
        return $ret;
    }

}