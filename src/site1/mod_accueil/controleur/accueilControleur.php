<?php


class AccueilControleur
{
    private $parametre = [];
    private $oVue ; //Objet

    public function __construct($parametre){

        $this->parametre =$parametre;

        $this->oVue = new AccueilVue($this->parametre);
    }

    public function liste(){

        $this->oVue->genererAffichage();
    }
}
