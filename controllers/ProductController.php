<?php
include_once (ROOT.'/components/Controller.php');
include_once (ROOT.'/models/Products.php');

class ProductController extends Controller
{
    public function actionIndex()
    {
        $productList = array();
        $modelProduct = Products::getProductList();

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