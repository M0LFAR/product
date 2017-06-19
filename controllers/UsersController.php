<?php
use  components\Controller;
use  models\Users;

class UsersController extends Controller
{
    public function actionLogin()
    {
        $this->layoutName = 'clear';

        if((isset($_POST['submit']) &&  Users::validationPassword( $_POST['idUser'], $_POST['password'])) || Users::getUserId())
        {
            $this->goHome();
        }
            else {
                $model['usersList'] = Users::getUsersList();

                $this->render($model,
                        array(
                            'nameView' => 'login'
                        )
                    );
            header("Location: /login/");
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

    public function actionSetting()
    {
        $idUser = Users::getUserId();
        $model['userName'] = \models\Users::getNameForUser($idUser);


        if (isset($_POST['submit'])) {
            if (!Users::validationPassword($idUser, $_POST['old_password'], true)) {
                $model['message'] = "Старий пароль введено не вірно ";
            }
            elseif (!($_POST['new_password']===$_POST['repit_new_password'])){
                $model['message'] = "Нові паролі не співпадають";
            }else{
                Users::updatePassword($idUser, $_POST['new_password']);
                $model['message'] = "Дані успішно збережені";
            }
        }

        $this->render($model,
            array(
                'nameView'=>'change_password'
            )
        );
    }
}