<?php
require_once "../../../controllers/controllerPerson.php";
require_once "../../../models/crudPerson.php";
require_once "../../../models/maestro.php";

class AjaxPerson {

  public $personId;
  public $lastname;
  public $firstname;
  public $dni;
  public $email;
  public $movil;
  public $location;
  public $province;


  public function createPerson(){
    //$dato = $this->personId;
    $arrayPerson = array(
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'dni' => $this->dni,
            'email' => $this->email,
            'movil' => $this->movil,
            'location' => $this->location,
            'province' => $this->province
    );
    //Maestro::debbugPHP($arrayPerson);
    $create = ControllerPerson::createPersonController($arrayPerson);
    //Maestro::debbugPHP($guardar);
    echo $create;
  }

  public function updatePerson(){
    //$dato = $this->personId;
    $arrayPerson = array(
            'personId' => $this->personId,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'dni' => $this->dni,
            'email' => $this->email,
            'movil' => $this->movil,
            'location' => $this->location,
            'province' => $this->province
    );
    //Maestro::debbugPHP($arrayPerson);
    $guardar = ControllerPerson::updatePersonController($arrayPerson);
    //Maestro::debbugPHP($guardar);
    echo $guardar;
  }

  public function searchDni(){
    $person=0;
    $search = ControllerPerson::searchDniPersonController($this->dni);
    //Maestro::debbugPHP($search);
    echo $search;
  }
}

/******************************************************/

if (isset($_POST['personId'])) {
//Maestro::debbugPHP($_POST);
  $a = new AjaxPerson();

  $a->personId = $_POST['personId'];
  $a->lastname = $_POST['lastname'];
  $a->firstname = $_POST['firstname'];
  $a->dni = $_POST['dni'];
  $a->email = $_POST['email'];
  $a->movil = $_POST['movil'];
  $a->location = $_POST['location'];
  $a->province = $_POST['province'];
//Maestro::debbugPHP($a);
  $a->updatePerson();
}

/******************************************************/

if (isset($_POST['searchDni'])) {
  $person = new AjaxPerson();
  $person->dni = $_POST['dni'];


  $person->searchDni();
}

/******************************************************/

if (isset($_POST['saveNew'])) {

  $a = new AjaxPerson();

  $a->personId = $_POST['personId'];
  $a->lastname = $_POST['lastname'];
  $a->firstname = $_POST['firstname'];
  $a->dni = $_POST['dni'];
  $a->email = $_POST['email'];
  $a->movil = $_POST['movil'];
  $a->location = $_POST['location'];
  $a->province = $_POST['province'];
//Maestro::debbugPHP($a);
  $a->createPerson();
}
