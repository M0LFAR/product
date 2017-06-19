<?php
use components\Controller;
use models\Purchases;
use models\Products;
use models\Users;

class PurchasesController extends Controller
{
    public function actionPurchases(){

        $purchases['openPurchases'] = Purchases::getListPurchases(true);
        $purchases['closedPurchases']= Purchases::getListPurchases(false);

        $this->render($purchases);

    }

    public function actionPurList($id)
    {

        $purchases=1;
        $this->render($purchases, array(
                'nameView'=>'purchasess_list'
            )
        );
    }
    public function actionProductList($id){
        $purchasesProducts['product'] = Products::getProductForPurchase($id);
        //var_dump($purchasesProducts);exit();
        $this->render($purchasesProducts['product'], array(
                        'nameView'=>'productList'
                        )
            );

    }
    public function actionCreate()
    {

        $baseSelect=\models\Base::getBaseSelect();

        if ($_POST['id_base']) {
            Purchases::open($_POST['id_base']);
            header("Location: /purchases");
        }

        $this->render($baseSelect, array(
                'nameView'=>'purchases_create'
            )
        );
    }

    public function actionClose($id){
        Purchases::purchasesClose($id);
    }
}