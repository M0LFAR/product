<?php
 return array(
     'product/([0-9]+)' => 'product/view/$1',
     'product/edit/([0-9]+)' => 'product/edit/$1',
     'product'=>'product/index',
     'statistic'=>'site/statistic',

     'cassa/close/' => 'cassa/close/',
     'cassa/back/([0-9]+)' => 'cassa/back/$1',
     'cassa'=>'cassa/index',


     'base/edit/([0-9]+)' => 'base/edit/$1',
     'base/delete/([0-9]+)'=>'base/delete/$1',
     'base/create'=>'base/create',
     'base'=>'base/index',

     'purchases/create'=>'purchases/create',
     'purchases/productList'=>'purchases/productList',
     'purchases/purList/([0-9]+)'=>'purchases/purList/$1',
     'purchases/close/([0-9]+)'=>'purchases/close/$1',
     'purchases'=>'purchases/purchases',

     'site' => 'site/index',
     'logout'=>'users/logout',
     'login'=>'users/login',
     'messages'=>'users/messages',

     'access' => 'site/accessDenied',
     'setting'=>'users/setting',
     ''=>'users/login',
 );