<?php
include_once (ROOT.'/components/Controller.php');
include_once (ROOT.'/models/Users.php');

class UsersController extends Controller
{
    public function actionLogin()
    {
        $this->layoutName = 'clear';
        if(isset($_POST['submit']) &&  Users::validationPassword($_POST['idUser'], $_POST['password']))
        {
                header("Location: /site/");

            }
            else {

                $usersList = Users::getUsersList();

                    $this->render($usersList,
                        array(
                            'nameView' => 'login'
                        )
                    );

            }
    }
    public function actionView()
    {
        $usersList = 1;
        $this->render($usersList,
            array(
                'nameView'=>'login'
            )
        );
    }

}