<?php


class Paymenttypes
{

    private $parametre = array(); //tableau
    private $oControleur; // Object

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oControleur = new PaymenttypesControleur($parametre);
    }



    public function choixAction(){

        if(isset($this->parametre['action'])){

            switch($this->parametre['action']){

                case 'form_ajouter' :

                    echo "Vers formulaire en ajout";
                    die();

                    $this->oControleur->form_ajouter();

                    break;

                case 'form_consulter' :

                    $this->oControleur->form_consulter();

                    break;

                case 'form_modifier' :

                    echo "Vers formulaire en modification";
                    die();

                    $this->oControleur->form_modifier();

                    break;

                case 'form_supprimer' :

                    echo "Vers formulaire en suppression";
                    die();

                    $this->oControleur->form_supprimer();

                    break;
            }

        }else{

            $this->oControleur->lister();
        }

    }

}
