<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\AdminForm;
use app\forms\EventForm;

class AdminCtrl {
	private $formpok;
    private $aktywny;

    public function __construct() {
        $this->formpok = new AdminForm();
        $this->formevent = new EventForm();
    }

    public function validateeventEdit() {
        $this->formevent->idevent = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }



    public function action_eventActivate() {
        if ($this->validateeventEdit()) {
            try {$recordevent = App::getDB()->get("event", "*", [
                    "idevent" => $this->formevent->idevent,
                    "aktywny" => $this->formevent->aktywny
                ]);

            

                

                $sqleventdezaktywuj = "UPDATE `event` SET `aktywny` = '0';";

                try {
                    $this->dezaktywevent = App::getDB()->query($sqleventdezaktywuj);
                    Utils::addInfoMessage("dezaktywowano");
                  } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów2');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }


                $sqleventaktywuj = "UPDATE `event` SET `aktywny` = '1' WHERE `idevent`='".$this->formevent->idevent."';";

                try {
                    $this->aktywevent = App::getDB()->query($sqleventaktywuj);
                    Utils::addInfoMessage("aktywowano");
               } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów2');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }


                
                Utils::addInfoMessage('Pomyślnie aktywowano event, do aktywowania id: '.$this->formevent->idevent);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            
            
        }

        App::getRouter()->forwardTo('adminview');
    }


	 public function validateEdit() {
        $this->formpok->idpokemons = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }



	public function action_pokemonAdd() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("pokemons", "*", [
                    "idpokemons" => $this->formpok->idpokemons,
                    "widoczny" => $this->formpok->widoczny
                ]);

                App::getDB()->update("pokemons", [
                        "widoczny" => "1"
                            ], [
                        "idpokemons" => $this->formpok->idpokemons
                    ]);

                Utils::addInfoMessage('Pomyślnie zaakceptowano pokemona');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('adminview');
    }

    public function action_pokemonDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("pokemons", [
                    "idpokemons" => $this->formpok->idpokemons
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto pokemona');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('adminview');
    }
 
  public function action_adminview() {

  


        $sqlaccept = "SELECT `pokemons`.*, `webo`.`Nazwa` as 'WEBO' , `typ`.`nazwa` as 'TYP' FROM `pokemons`  LEFT JOIN `webo` ON `pokemons`.`webo` = `webo`.`idWebo` LEFT JOIN `typ` ON `pokemons`.`typ` = `typ`.`idTyp` WHERE `widoczny`='0';";

        try {
            $this->pokiaccept = App::getDB()->query($sqlaccept);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów1');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqlevents = "SELECT * FROM `event`;";

        try {
            $this->pokievent = App::getDB()->query($sqlevents);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów2');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqlevents1 = "SELECT * FROM `event` WHERE `aktywny`='1';";

        try {
            $this->pokievent1 = App::getDB()->query($sqlevents1);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów3');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqlevents0 = "SELECT * FROM `event` WHERE `aktywny`='0';";

        try {
            $this->pokievent0 = App::getDB()->query($sqlevents0);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        

	App::getSmarty()->assign('listaevent1', $this->pokievent1);
	App::getSmarty()->assign('listaevent0', $this->pokievent0);
 	App::getSmarty()->assign('listaevent', $this->pokievent);
 	App::getSmarty()->assign('listapokow', $this->pokiaccept);
    App::getSmarty()->display("adminview.tpl");
 
  }


 
}