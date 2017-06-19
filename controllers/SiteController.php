<?php
use components\Controller;
use models\Products;
class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->goHome();
    }

    public function actionShop()
    {

        $this->render(array('1','shop'));
    }


    public function actionCart()
    {
        $this->layoutName="clear";

        $modelProduct = array();
        $modelProduct = Products::getProductList();

        $this->render($modelProduct,
            array(
                'nameView'=>'cart'
            )
        );
    }

    public function actionStatistic()
    {
        $modelProduct = array();
        $modelProduct = Products::getProductList();

        $this->render($modelProduct,
            array(
                'nameView'=>'statistic'
            )
        );
    }

    public function actionAccessDenied(){
        $this->layoutName="clear";

        $id = \models\Users::getUserId();
        $model['userName'] = \models\Users::getNameForUser($id);

        $this->render($model,
            array(
                'nameView'=>'access_denied'
            )
        );
    }

}