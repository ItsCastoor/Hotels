<?php


class ReservationsVue
{

    private $parametre = array(); //tableau
    private $tpl; // objet smarty



    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    private function chargementValeurs(): void
    {

        $this->tpl->assign('login', 'Ici le nom de la personne identifiée');

        $this->tpl->assign('titreVue', 'Les Hôtels');

    }


    public function genererAffichageReservations($valeurs): void
    {


        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Liste des réservations');

        $this->tpl->assign('listeReservations', $valeurs);

        $this->tpl->display('mod_reservations/vue/reservationsListeVue.tpl');
    }

    /**
     * @throws SmartyException
     */
    public function genererAffichageFiche($valeurs, $action): void
    {

        $this->chargementValeurs();

        $this->tpl->assign('uneReservation', $valeurs);


        switch ($action) {
            case 'form_consulter':
                $this->tpl->assign('titreBtnSubmit', '');
                $this->tpl->assign('titrePage', 'Fiche réservation : Consultation');
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('readonly', 'readonly');
                break;
            case 'form_ajouter':
                $this->tpl->assign('titreBtnSubmit', 'ajouter');
                $this->tpl->assign('titrePage', 'Fiche réservation : ajout');
                $this->tpl->assign('action', 'ajouter');
                $this->tpl->assign('readonly', '');
                break;
            case 'form_modifier':
                $this->tpl->assign('titreBtnSubmit', 'modifier');
                $this->tpl->assign('titrePage', 'Fiche réservation : modification');
                $this->tpl->assign('action', 'modifier');
                $this->tpl->assign('readonly', '');
                break;
            case 'form_supprimer':
                $this->tpl->assign('titreBtnSubmit', 'supprimer');
                $this->tpl->assign('titrePage', 'Fiche réservation : Suppression');
                $this->tpl->assign('action', 'supprimer');
                $this->tpl->assign('readonly', 'readonly');
                break;
        }

        $this->tpl->display('mod_reservations/vue/reservationsFicheVue.tpl');

    }



}
