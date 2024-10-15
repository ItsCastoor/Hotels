<?php


class ReservationsControleur
{

    private $parametre = array(); //tableau
    private $oModele; // Object
    private $oVue; // Object

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new ReservationsModele($parametre);

        $this->oVue = new ReservationsVue($parametre);
    }

    public function lister(){

        $valeurs = $this->oModele->getListeReservations();

        $this->oVue->genererAffichageReservations($valeurs);

    }

    public function form_consulter(){

        $valeurs = $this->oModele->getUneReservation();

        $action = $_POST['action'];

        $this->oVue->genererAffichageFiche($valeurs,$action);


    }
    public function form_ajouter(){

        $valeurs = "";

        $action = $_POST['action'];

        $this->oVue->genererAffichageFiche($valeurs,$action);

    }
    public function ajouter()
    {
        if($this->oModele->addUneReservation()) {
            $this->lister();
        }else{
            $this->form_ajouter();
        }
    }
    public function form_modifier(){

        $valeurs = $this->oModele->getUneReservation();

        $action = $_POST['action'];

        $this->oVue->genererAffichageFiche($valeurs,$action);

    }
    public function modifier()
    {
        if($this->oModele->updateUneReservation()) {
            $this->lister();
        }else{
            $this->form_modifier();
        }
    }
    public function form_supprimer(){

        $valeurs = $this->oModele->getUneReservation();

        $action = $_POST['action'];

        $this->oVue->genererAffichageFiche($valeurs,$action);

    }
    public function supprimer(): void
    {

        if($this->oModele->deleteUneReservation()) {
            $this->lister();
        }else{
            $this->form_supprimer();
        }

    }
}
