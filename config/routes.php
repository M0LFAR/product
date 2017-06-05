<?php
 return array(
     'product/([0-9]+)' => 'product/view/$1',
     'product/edit/([0-9]+)' => 'product/edit/$1',
     'product'=>'product/index',
     'statistic'=>'site/statistic',

     'cassa'=>'cassa/index',


     'base/edit/([0-9]+)' => 'base/edit/$1',
     'base/create'=>'base/create',
     'base'=>'base/index',

     'site' => 'site/index',
     'logout'=>'users/logout',
     'login'=>'users/login',
     'messages'=>'users/messages',

	);