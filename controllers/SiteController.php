<?php
use components\Controller;
use models\Products;
class SiteController extends Controller
{
    public function actionIndex()
    {
        var_dump(\models\Users::getUserId());
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

}