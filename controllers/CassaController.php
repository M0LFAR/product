<?php
use components\Controller;
use models\Products;

class CassaController extends Controller
{
    public function actionIndex(){
        $modelProduct['product'] = Products::getProductList();
        $modelProduct['cart'] =Products::getProductList();
        $this->render($modelProduct);
    }

    public function actionBack($id){
        var_dump($id);
    }

    public function actionClose(){
        var_dump(2);
    }

}