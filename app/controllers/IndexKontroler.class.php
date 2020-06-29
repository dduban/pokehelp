<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\PersonSearchForm;

class IndexKontroler {

    private $records;


 
  public function action_index() {

  		


        $sqlpoks = "SELECT `pokemons`.*, `webo`.`Nazwa` as 'WEBO', `typ`.`nazwa` as 'TYP' FROM `pokemons` LEFT JOIN `webo` ON `pokemons`.`webo` = `webo`.`idWebo` LEFT JOIN `typ` ON `pokemons`.`typ` = `typ`.`idTyp` WHERE `pokemons`.`widoczny`='1';";


        try {
            $this->pokemons = App::getDB()->query($sqlpoks);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }





        

        $sqlpoki = "SELECT `event`.*, `pokinaevencie`.`pokemons_idpokemons`, `pokemons`.`nazwa` FROM `event` LEFT JOIN `pokinaevencie` ON `pokinaevencie`.`event_idevent` = `event`.`idevent` LEFT JOIN `pokemons` ON `pokinaevencie`.`pokemons_idpokemons` = `pokemons`.`idpokemons` WHERE `event`.`aktywny`='1'; ";


        try {
            $this->eventpoki = App::getDB()->query($sqlpoki);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        $sqlevent ="SELECT `event`.* FROM `event` WHERE `aktywny` = '1';";

       try {
            $this->events = App::getDB()->query($sqlevent);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    App::getSmarty()->assign('eventpoki', $this->eventpoki);
 	App::getSmarty()->assign('event', $this->events);
 	App::getSmarty()->assign('pokemons', $this->pokemons);
    App::getSmarty()->display("index.tpl");
 
  }
 
}