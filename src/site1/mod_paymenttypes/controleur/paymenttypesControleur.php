<?php


class PaymenttypesControleur
{

    private $parametre = array(); //tableau
    private $oModele; // Object
    private $oVue; // Object

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new PaymenttypesModele($parametre);

        $this->oVue = new PaymenttypesVue($parametre);
    }

    public function lister(){

        $valeurs = $this->oModele->getListePaymenttypes();

        $this->oVue->genererAffichagePaymenttypes($valeurs);

    }

    public function form_consulter(){

        $valeurs = $this->oModele->getUnPaymenttypes();

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
        if($this->oModele->addUnPaymenttypes()) {
            $this->lister();
        }else{
            $this->form_ajouter();
        }
    }
    public function form_modifier(){

        $valeurs = $this->oModele->getUnPaymenttypes();

        $action = $_POST['action'];

        $this->oVue->genererAffichageFiche($valeurs,$action);

    }
    public function modifier()
    {
        if($this->oModele->updateUnPaymenttypes()) {
            $this->lister();
        }else{
            $this->form_modifier();
        }
    }
    public function form_supprimer(){

        $valeurs = $this->oModele->getUnPaymenttypes();

        $action = $_POST['action'];

        $this->oVue->genererAffichageFiche($valeurs,$action);

    }
    public function supprimer(): void
    {

        if($this->oModele->deleteUnPaymenttypes()) {
            $this->lister();
        }else{
            $this->form_supprimer();
        }

    }
}
