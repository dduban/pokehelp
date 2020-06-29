<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\SessionUtils;
use app\forms\loginForm;
use app\forms\RegisterForm;

class LoginCtrl {

	private $formLog;
	private $formReg;
	private $logindb;
	private $role;


	public function __construct(){

		$this->formLog = new LoginForm();
		$this->formReg = new RegisterForm();

	}

	public function validateRegSave() {
        //0. Pobranie parametrów z walidacją
        $this->formReg->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji');
        $this->formReg->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji');
        $this->formReg->password2 = ParamUtils::getFromRequest('password2', true, 'Błędne wywołanie aplikacji');



        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->formReg->login))) {
            Utils::addErrorMessage('Wprowadź login');
        }
        if (empty(trim($this->formReg->password))) {
            Utils::addErrorMessage('Wprowadź hasło');
        }
        if (empty(trim($this->formReg->password2))) {
            Utils::addErrorMessage('Wprowadź powtórzone hasło');
        }

        if ($this->formReg->password!=$this->formReg->password2) {
        	Utils::addErrorMessage('Hasła nie są takie same!');
        }

        $clogin = App::getDB()->select("user", [
          "login"
        ], [
          "login"=>$this->formReg->login,
        ]);

        if($clogin)
        {
          Utils::addErrorMessage('Podany login jest zajęty');
        }





        


        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_regNew() {
        $this->generateView();
    }

    public function action_regSave() {

          // 1. Walidacja danych formularza (z pobraniem)
          if ($this->validateRegSave()) {
              // 2. Zapis danych w bazie
              try {

                  //2.1 Nowy rekord

                  
                      	$hashpass=sha1($this->formReg->password);
                      
                          App::getDB()->insert("user", [
                             
                              "login" => $this->formReg->login,
                              "password" => $hashpass,
                              "role" => "user",
                              ]);
                          
                  
                  Utils::addInfoMessage('Pomyślnie utworzono konto');
              } catch (\PDOException $e) {
                  Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas tworzenia konta');
                  if (App::getConf()->debug)
                      Utils::addErrorMessage($e->getMessage());
              }

              App::getRouter()->forwardTo('loginview');
          } else {
              $this->generateView();
          }
      }






//eqwwwwwwwwwwwwwwwwwwwwwwww





	public function validateLog() {

		$this->formLog->login = ParamUtils::getFromRequest('login');
		$this->formLog->password = ParamUtils::getFromRequest('password');

		if(!isset($this->formLog->login))
			return false;

		if(empty($this->formLog->login))
			Utils::addErrorMessages('nie podano loginu');

		if(empty($this->formLog->password))
			Utils::addErrorMessages('nie podano hasła');

		if(App::getMessages()->isError())
			return false;

		$hashpasslog=sha1($this->formLog->password);


		$logindb = App::getDB()->Select("user", [
			"iduser",
			"role",
		],[
			'login' => $this->formLog->login,
			'password' => $hashpasslog,
		]);


		if ($logindb) {
		} else {
			Utils::addErrorMessage('Niepoprawny login lub hasło');
		}

		return !App::getMessages()->isError();

	}

	public function action_loginview(){
		$this->generateView();
	}

	public function action_login() {

		if($this->validateLog()) {

			Utils::addErrorMessage('Poprawnie zalogowano');

			


			$pobierz = App::getDB()->get("user", [
		        "role",
		        "iduser"], [
		        "login" => $this->formLog->login,
		      ]);
		      $this->formLog->role = $pobierz["role"];
		      $this->formLog->iduser = $pobierz["iduser"];


		      RoleUtils::addRole($this->formLog->role);
		      SessionUtils::store("iduser",$this->formLog->iduser);

		      App::getRouter()->redirectTo("profilview");


		} else {
			$this->generateView();
		}

 	}


 	public function action_logout() {

    //unieważnij sesję
    session_destroy();

    // i przekieruj do wybranej akcji (tej domyślnej po wylogowaniu)
    App::getRouter()->redirectTo("index");

	}
 
  public function generateView() {
 	App::getSmarty()->assign('formLog',$this->formLog);
    App::getSmarty()->display("loginview.tpl");
 
  }
 
}