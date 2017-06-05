<?php
use  components\Controller;
use  models\Users;

class UsersController extends Controller
{
    public function actionLogin()
    {

        $this->layoutName = 'clear';

        if( Users::getUserId() || (isset($_POST['submit']) &&  Users::validationPassword( $_POST['idUser'], $_POST['password'])))
        {
            header("Location: /product/");
        }
            else {
                $model['usersList'] = Users::getUsersList();

                $this->render($model,
                        array(
                            'nameView' => 'login'
                        )
                    );

            }
    }
    public function actionMessages()
    {

        $idUser = Users::getUserId();

        if (isset($_POST['submit']) && !empty($_POST['message'])){
            Users::insertMessages($idUser,$_POST['message']);
        }


        $messages = Users::getListMessages();
        $this->render($messages,
            array(
                'nameView'=>'messages'
            )
        );
    }



    public  function actionLogout(){
        Users::logOut();
        header("Location: /login/");
    }

}