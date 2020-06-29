<?php

namespace app\controllers;


use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\PersonSearchForm;
use core\Validator;
use app\forms\KodForm;
use app\forms\PokForm;

class ProfilCtrl {

  private $formkod; //dane formularza
  private $formpok; 
  private $formwoj; 

  public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->formPok = new PokForm();
        $this->formKod = new KodForm();
        $this->formwoj = new KodForm();
    }

  public function validatePokSave() {
        //0. Pobranie parametrów z walidacją
        $this->formPok->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->formPok->typ = ParamUtils::getFromRequest('typ', true, 'Błędne wywołanie aplikacji');
        $this->formPok->maxcp = ParamUtils::getFromRequest('maxcp', true, 'Błędne wywołanie aplikacji');
        $this->formPok->webo = ParamUtils::getFromRequest('webo', true, 'Błędne wywołanie aplikacji');
        $this->formPok->region = ParamUtils::getFromRequest('region', true, 'Błędne wywołanie aplikacji');



        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->formPok->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwę');
        }
        if (empty(trim($this->formPok->maxcp))) {
            Utils::addErrorMessage('Wprowadź maximum combat power');
        }


        $cnazwa = App::getDB()->select("pokemons", [
          "nazwa"
        ], [
          "nazwa"=>$this->formPok->nazwa,
        ]);

        if($cnazwa)
        {
          Utils::addErrorMessage('Pokemon z taką nazwą już istnieje lub oczekuje na akceptację');
        }



        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_pokNew() {
        $this->generateView();
    }

    public function action_pokSave() {

          // 1. Walidacja danych formularza (z pobraniem)
          if ($this->validatePokSave()) {
              // 2. Zapis danych w bazie
              try {

                  //2.1 Nowy rekord

                          
                          $selectWebo = $_POST['webo'];
                          $selectTyp = $_POST['typ'];
                          $selectRegion = $_POST['region'];
                  
                      
                      
                          App::getDB()->insert("pokemons", [
                             
                              "nazwa" => $this->formPok->nazwa,
                              "typ" => $selectTyp,
                              "maxcp" => $this->formPok->maxcp,
                              "webo" => $selectWebo,
                              "widoczny" => "0",
                              "region" => $selectRegion
                              ]);
                          
                  
                  Utils::addInfoMessage('Pomyślnie zapisano rekord');
              } catch (\PDOException $e) {
                  Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                  if (App::getConf()->debug)
                      Utils::addErrorMessage($e->getMessage());
              }

              App::getRouter()->forwardTo('profilview');
          } else {
              $this->generateView();
          }
      }






//inny formmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm













  public function validateKodSave() {
        //0. Pobranie parametrów z walidacją
        $this->formKod->nickname = ParamUtils::getFromRequest('nickname', true, 'Błędne wywołanie aplikacji');
        $this->formKod->kod = ParamUtils::getFromRequest('kod', true, 'Błędne wywołanie aplikacji');
        $this->formKod->team = ParamUtils::getFromRequest('team', true, 'Błędne wywołanie aplikacji');
        $this->formKod->lvl = ParamUtils::getFromRequest('lvl', true, 'Błędne wywołanie aplikacji');
        $this->formKod->wojew = ParamUtils::getFromRequest('wojew', true, 'Błędne wywołanie aplikacji');



        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->formKod->nickname))) {
            Utils::addErrorMessage('Wprowadź nickname');
        }
        if (empty(trim($this->formKod->kod))) {
            Utils::addErrorMessage('Wprowadź kod');
        }
        if (empty(trim($this->formKod->team))) {
            Utils::addErrorMessage('Wprowadź team');
        }
        if (empty(trim($this->formKod->lvl))) {
            Utils::addErrorMessage('Wprowadź poziom');
        }
        if (empty(trim($this->formKod->wojew))) {
            Utils::addErrorMessage('Wprowadź wojewodztwo');
        }


        $cnickname = App::getDB()->select("kody", [
          "nickname"
        ], [
          "nickname"=>$this->formKod->nickname,
        ]);

        if($cnickname)
        {
          Utils::addErrorMessage('Podany nickname jest już w bazie');
        }

        $ckod = App::getDB()->select("kody", [
          "kod"
        ], [
          "kod"=>$this->formKod->kod,
        ]);

        if($ckod)
        {
          Utils::addErrorMessage('Podany kod jest już w bazie');
        }


        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    public function action_kodNew() {
        $this->generateView();
    }

    public function action_kodSave() {

          // 1. Walidacja danych formularza (z pobraniem)
          if ($this->validateKodSave()) {
              // 2. Zapis danych w bazie
              try {

                  //2.1 Nowy rekord

                          
                          $selectTeam = $_POST['team'];
                          $selectWoj = $_POST['wojew'];
                  
                      
                      
                          App::getDB()->insert("kody", [
                             "user_iduser" => "1",
                              "nickname" => $this->formKod->nickname,
                              "kod" => $this->formKod->kod,
                              "team" => $selectTeam,
                              "lvl" => $this->formKod->lvl,
                              "wojew" => $selectWoj
                              ]);
                          
                  
                  Utils::addInfoMessage('Pomyślnie zapisano rekord');
              } catch (\PDOException $e) {
                  Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                  if (App::getConf()->debug)
                      Utils::addErrorMessage($e->getMessage());
              }

              App::getRouter()->forwardTo('profilview');
          } else {
              $this->generateView();
          }
      }

      public function validate() {

        $this->formwoj->wojew = ParamUtils::getFromRequest('sf_wojew'); 



        return !App::getMessages()->isError();
    }


 
  public function action_profilview() {


        $this->validate();

        
        if (isset($this->formwoj->wojew) && strlen($this->formwoj->wojew) > 0) {
            $filtr = $this->formwoj->wojew . '%';
            $sqlkody = "SELECT `kody`.*, `wojew`.`nazwa` FROM `kody` LEFT JOIN `wojew` ON `kody`.`wojew` = `wojew`.`idwoj` WHERE `wojew`.`nazwa` LIKE '".$filtr."';";

            try {
                $this->listakodow = App::getDB()->query($sqlkody);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        else
        {
          $sqlkody = "SELECT `kody`.*, `wojew`.`nazwa` FROM `kody` LEFT JOIN `wojew` ON `kody`.`wojew` = `wojew`.`idwoj`;";

            try {
                $this->listakodow = App::getDB()->query($sqlkody);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

      


        
        


  	 

        $sqlwojew = "SELECT * FROM `wojew`;";
        try {
            $this->listawojew = App::getDB()->query($sqlwojew);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }




        $sqlwebo = "SELECT * FROM `webo`;";

        try {
            $this->listawebo = App::getDB()->query($sqlwebo);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqltyp = "SELECT * FROM `typ`;";

        try {
            $this->listatyp = App::getDB()->query($sqltyp);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

      App::getSmarty()->assign('webo', $this->listawebo);
      App::getSmarty()->assign('typy', $this->listatyp);
      App::getSmarty()->assign('wojew', $this->listawojew);
    	App::getSmarty()->assign('kody', $this->listakodow);
      $this->generateView();



     
  }

  public function generateView() {
        //App::getSmarty()->assign('kody', $this->listakodow);
        App::getSmarty()->display('profilview.tpl');
    }
 
}