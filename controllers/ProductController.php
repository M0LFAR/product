<?php
use components\Controller;
use models\Products;
use models\Users;

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


        return true;
    }

}