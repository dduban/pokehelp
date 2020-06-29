<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('index'); #default action
App::getRouter()->setLoginRoute('index'); #action to forward if no permissions

Utils::addRoute('index', 'IndexKontroler');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('loginview', 'LoginCtrl');
Utils::addRoute('regSave', 'LoginCtrl');
Utils::addRoute('regNew', 'LoginCtrl');

Utils::addRoute('accessdenied', 'IndexKontroler');

Utils::addRoute('profilview', 'ProfilCtrl',	['user','admin']);
Utils::addRoute('kodSave', 'ProfilCtrl',	['user','admin']);
Utils::addRoute('kodNew', 'ProfilCtrl',	['user','admin']);
Utils::addRoute('pokSave', 'ProfilCtrl',	['user','admin']);
Utils::addRoute('pokNew', 'ProfilCtrl',	['user','admin']);


Utils::addRoute('adminview', 'AdminCtrl',	['admin']);
Utils::addRoute('pokemonDelete',  'AdminCtrl',	['admin']);
Utils::addRoute('pokemonAdd',  'AdminCtrl',	['admin']);
Utils::addRoute('eventActivate',  'AdminCtrl',	['admin']);
//Utils::addRoute('action_name', 'controller_class_name');