<?php
use components\Controller;
use models\Products;

class ProductController extends Controller
{
    public function actionIndex()
    {

        $modelProduct = Products::getProductList();

        $this->render($modelProduct,
            array(
                'nameView'=>'productEdit'
                )
            );

        return true;
    }

    public function actionEdit($id){
        var_dump($id);
    }

    public function actionView($id)
    {
        if(!isset($id)) return false;

        $modelProduct = Products::getProduct($id);
        //d($modelProduct);
        $this->render($modelProduct,
            array(
                'nameView'=>'productEdit'
            )
        );

        return true;
    }

}