<?php
include_once ROOT. '/models/Product.php';
include_once ROOT. '/components/Controller.php';

class ProductController extends Controller
{
    public function actionIndex()
    {
        $productList = array();
        $modelProduct = Product::getProductList();

        $this->render($modelProduct,
            array(
                'nameView'=>'productEdit'
                )
            );

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemByID($id);
        }

        return true;

    }

}