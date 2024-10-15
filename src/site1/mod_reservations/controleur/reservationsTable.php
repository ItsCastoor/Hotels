<?php

/**
 * Class ReservationsTable
 */
class ReservationsTable
{
    // 1 déclarer les propriétés (attributs)
    private $ResNo = "";
    private $LastName = "";
    private $FirstName = "";
    private $Address = "";
    private $City = "";
    private $State = "";
    private $Postal = "";
    private $Phone = "";
    private $Payment = "";
    private $Amout = "";
    private $Hotel = "";
    private $Room = "";
    private $DateIn = "";
    private $DateOut = "";
    private $DateNow = "";



    // 2 importer la méthode hydrater !
    public function hydrater(array $row) {

        foreach ($row as $k => $v) {
            // Concaténation : nom de la méthode setter à appeler
            $setter = 'set' . ucfirst($k);
            // fonction prend 2 paramètres : l'objet en cours et le nom de la méthode
            if (method_exists($this, $setter)) {
                // Invoquer la méthode
                $this->$setter($v);
            }
        }
    }

    // 3 puis  le constructeur !
    public function __construct($data = null) {

        if ($data != null) {

            $this->hydrater($data);
        }
    }

    //SETTERS
    public function setResNo(string $ResNo): void
    {
        $this->ResNo = $ResNo;
    }

    public function setLastName(string $LastName): void
    {
        $this->LastName = $LastName;
    }

    public function setFirstName(string $FirstName): void
    {
        $this->FirstName = $FirstName;
    }

    public function setAddress(string $Address): void
    {
        $this->Address = $Address;
    }

    public function setCity(string $City): void
    {
        $this->City = $City;
    }

    public function setState(string $State): void
    {
        $this->State = $State;
    }

    public function setPostal(string $Postal): void
    {
        $this->Postal = $Postal;
    }

    public function setPhone(string $Phone): void
    {
        $this->Phone = $Phone;
    }

    public function setPayment(string $Payment): void
    {
        $this->Payment = $Payment;
    }

    public function setAmout(string $Amout): void
    {
        $this->Amout = $Amout;
    }

    public function setHotel(string $Hotel): void
    {
        $this->Hotel = $Hotel;
    }

    public function setRoom(string $Room): void
    {
        $this->Room = $Room;
    }

    public function setDateIn(string $DateIn): void
    {
        $this->DateIn = $DateIn;
    }

    public function setDateOut(string $DateOut): void
    {
        $this->DateOut = $DateOut;
    }

    public function setDateNow(string $DateNow): void
    {
        $this->DateNow = $DateNow;
    }

    // GETTERS

    public function getResNo(): string
    {
        return $this->ResNo;
    }

    public function getLastName(): string
    {
        return $this->LastName;
    }

    public function getFirstName(): string
    {
        return $this->FirstName;
    }

    public function getAddress(): string
    {
        return $this->Address;
    }

    public function getCity(): string
    {
        return $this->City;
    }

    public function getState(): string
    {
        return $this->State;
    }

    public function getPostal(): string
    {
        return $this->Postal;
    }

    public function getPhone(): string
    {
        return $this->Phone;
    }

    public function getPayment(): string
    {
        return $this->Payment;
    }

    public function getAmout(): string
    {
        return $this->Amout;
    }

    public function getHotel(): string
    {
        return $this->Hotel;
    }

    public function getRoom(): string
    {
        return $this->Room;
    }

    public function getDateIn(): string
    {
        return $this->DateIn;
    }

    public function getDateOut(): string
    {
        return $this->DateOut;
    }

    public function getDateNow(): string
    {
        return $this->DateNow;
    }

}