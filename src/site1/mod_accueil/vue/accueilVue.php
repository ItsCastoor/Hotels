<?php

/**
 * Class AccueilVue
 * Classe gérant le mappage php <=> html à l'aide PROCHAINEMENT (!!) du moteur de template smarty
 */
class AccueilVue
{
    //Propriété récupérant les paramètres ($_REQUEST fichier index)
    private $parametre = array(); //tableau
    private $tpl; // objet smarty


    public function __construct($parametre){
        // initialisation de la propriété $parametre
        $this->parametre = $parametre;

        $this->tpl = new Smarty();


        // Prendre le fichier index.html du template modèle et le lancer
        // require_once('mod_accueil/vue/vue.php');
    }

    public function genererAffichage(){


        $this->tpl->assign('login', 'Ici le nom de la personne identifiée');

        $this->tpl->assign('tabBord', 'ICI MON TABLEAU DE BORD');

        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');

    }


}
