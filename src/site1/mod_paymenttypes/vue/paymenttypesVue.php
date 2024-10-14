<?php


class PaymenttypesVue
{

    private $parametre = array(); //tableau
    private $tpl; // objet smarty



    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    private function chargementValeurs() {

        $this->tpl->assign('login', 'Ici le nom de la personne identifiée');

        $this->tpl->assign('titreVue', 'Les Hôtels');

    }


    public function genererAffichagePaymenttypes($valeurs){


        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Liste des types de paiements');

        $this->tpl->assign('listePaymenttypes', $valeurs);

        $this->tpl->display('mod_paymenttypes/vue/paymenttypesListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs,$action){

        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Consultation');

        $this->tpl->assign('unPaiementtype', $valeurs);

        $this->tpl->assign('action', $action);

        $this->tpl->display('mod_paymenttypes/vue/paymenttypesFicheVue.tpl');

    }



}
