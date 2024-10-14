
<?php
/**
 * Description of autoloder
 *
 * @author tvosgiens
 */
class Autoloader{

    public static function chargerClasses(){
        // Paramètres : le nom de la classe (ici la classe en cours Autoloader)
        // et de la méthode qui s'occupe du chargement
      spl_autoload_register(array(__CLASS__,'autoload'));

    }

    public static function autoload($maClasse){
        //$maClasse accepte le nom de la classe : Accueil,
        //AccueilControleur, AccueilModele ou AccueilVue par exemple

        //mettre en minuscule la première lettre de la classe
        //Puisque nous recherchons le chemein (nom du script) qui est en minuscule
        $maClasse = lcfirst($maClasse);

        // chargement dans une variable "repertoires" de la liste
        // des répertoires qui peuvent contenir les classes
        $repertoires = array(
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_paymenttypes/',
            'mod_paymenttypes/controleur/',
            'mod_paymenttypes/modele/',
            'mod_paymenttypes/vue/'
        );

        //Recherche dans chaque répertoire listé
        foreach($repertoires as $repertoire)
        {
            //vérifie si un fichier .php existe dans les répertoires
            // stockés dans le tableau repertoires ? si oui il l'enregistre !
            if(file_exists($repertoire.$maClasse. '.php'))
            {
                require_once($repertoire.$maClasse. '.php');
                return;
            }
        }
    }
}


