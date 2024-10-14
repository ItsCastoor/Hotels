<?php
/**
 *  Class PaymenttypesModele
 * 	Classe héritée de la classe abstraite Modele (modele.php)
 *
 */

class PaymenttypesModele extends modele
{
    private $parametre = array(); //tableau


    function __construct($parametre)
    {

        $this->parametre = $parametre;
    }


    public function getListePaymenttypes(): ?array
    {

        $sql = "SELECT * FROM paymenttypes";

        $resultat = $this->executeRequete($sql);


       if ($resultat->rowCount() > 0) {

            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {

                $listePaymenttypes[] = new PaymenttypesTable($row);

            }

            return $listePaymenttypes;

        } else {

            return null;
        }


    }

    public function getUnPaymenttypes(): PaymenttypesTable
    {


        $sql = "SELECT * FROM paymenttypes WHERE Payment = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['Payment']));

        $unPaymenttype = new PaymenttypesTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $unPaymenttype;

    }
    public function addUnPaymenttypes(): bool
    {

// Fetch the last ID
        $lastIdQuery = "SELECT MAX(Payment) as max_id FROM paymenttypes";
        $resultatLastID = $this->executeRequete($lastIdQuery);
        $lastIdRow = $resultatLastID->fetch(PDO::FETCH_ASSOC);
        $lastId = $lastIdRow['max_id'] + 1;

// Insert the new record
        $sql = "INSERT INTO paymenttypes (Payment, Description) VALUES (?, ?)";
        $resultat = $this->executeRequete($sql, array($lastId, $this->parametre['type_paiement']));

        if ($resultat->rowCount() > 0) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }
    public function updateUnPaymenttypes(): bool
    {


        $sql = "UPDATE paymenttypes SET Description = ? WHERE Payment = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['type_paiement'], $this->parametre['Payment']));

        if ($resultat->rowCount() > 0) {
            return true; // modification effectué
        } else {
            return false; // Modification échoué
        }
    }
    public function deleteUnPaymenttypes(): bool
    {


        $sql = "DELETE FROM paymenttypes WHERE Payment = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['id']));

        if ($resultat->rowCount() > 0) {
            return true; // modification effectué
        } else {
            return false; // Modification échoué
        }
    }

}
