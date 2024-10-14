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

    public function genererAffichageFiche($valeurs,$action): void
    {

        $this->chargementValeurs();


        $this->tpl->assign('unPaiementtype', $valeurs);


        switch ($action) {
            case 'form_consulter':
                $this->tpl->assign('titreBtnSubmit', '');
                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Consultation');
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('readonly', 'readonly');
                break;
            case 'form_ajouter':
                $this->tpl->assign('titreBtnSubmit', 'ajouter');
                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : ajout');
                $this->tpl->assign('action', 'ajouter');
                $this->tpl->assign('readonly', '');
                break;
            case 'form_modifier':
                $this->tpl->assign('titreBtnSubmit', 'modifier');
                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : modification');
                $this->tpl->assign('action', 'modifier');
                $this->tpl->assign('readonly', '');
                break;
            case 'form_supprimer':
                $this->tpl->assign('titreBtnSubmit', 'supprimer');
                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Suppression');
                $this->tpl->assign('action', 'supprimer');
                $this->tpl->assign('readonly', 'readonly');
                break;
        }

        $this->tpl->display('mod_paymenttypes/vue/paymenttypesFicheVue.tpl');

    }



}
