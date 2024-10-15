<?php
/**
 *  Class ReservationsModele
 * 	Classe héritée de la classe abstraite Modele (modele.php)
 *
 */

class ReservationsModele extends modele
{
    private $parametre = array(); //tableau


    function __construct($parametre)
    {

        $this->parametre = $parametre;
    }


    public function getListeReservations(): ?array
    {

        $sql = "SELECT * FROM reservations";

        $resultat = $this->executeRequete($sql);


       if ($resultat->rowCount() > 0) {

            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {

                $listeReservations[] = new ReservationsTable($row);

            }

            return $listeReservations;

        } else {

            return null;
        }
    }

    public function getUneReservation(): ReservationsTable
    {


        $sql = "SELECT * FROM reservations WHERE ResNo = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['Payment']));

        return new ReservationsTable($resultat->fetch(PDO::FETCH_ASSOC));

    }
    public function addUneReservation(): bool
    {

// Fetch the last ID
        $lastIdQuery = "SELECT MAX(ResNo) as max_id FROM reservations";
        $resultatLastID = $this->executeRequete($lastIdQuery);
        $lastIdRow = $resultatLastID->fetch(PDO::FETCH_ASSOC);
        $lastId = $lastIdRow['max_id'] + 1;

// Insert the new record
        $sql = "INSERT INTO reservations (ResNo, Description) VALUES (?, ?)";
        $resultat = $this->executeRequete($sql, array($lastId, $this->parametre['type_paiement']));

        if ($resultat->rowCount() > 0) {
            return true; // Insert successful
        } else {
            return false; // Insert failed
        }
    }
    public function updateUneReservation(): bool
    {


        $sql = "UPDATE paymenttypes SET Description = ? WHERE Payment = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['type_paiement'], $this->parametre['Payment']));

        if ($resultat->rowCount() > 0) {
            return true; // modification effectué
        } else {
            return false; // Modification échoué
        }
    }
    public function deleteUneReservation(): bool
    {


        $sql = "DELETE FROM reservations WHERE ResNo = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['id']));

        if ($resultat->rowCount() > 0) {
            return true; // modification effectué
        } else {
            return false; // Modification échoué
        }
    }

}
