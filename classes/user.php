<?php

include_once __DIR__ . '\CreditCard.php';
include_once __DIR__ . '\Item.php';

class User {
  private int $id;
  private string $name;
  private CreditCard $cc;
  private string $address;

  public function __construct(int $id, string $name, CreditCard $cc, string $address) {
    $this->id = $id;
    $this->name = $name;
    $this->cc = $cc;
    $this->address = $address;
  }

  // Getters

  public function getId() :int {
    return $this->id;
  }

  public function getName() :string {
    return $this->name;
  }

  public function getCreditCard() :CreditCard {
    return $this->cc;
  }

  public function getAddress() :string {
    return $this->address;
  }

  // Setters

  public function setId(int $id) :void {
    $this->id = $id;
  }

  public function setName(string $name) :void {
    $this->name = $name;
  }

  public function setCreditCard(CreditCard $cc) :void {
    $this->cc = $cc;
  }

  public function setAddress(string $address) :void {
    $this->address = $address;
  }

  // Other methods

  public function getPriceInDollars(Item $item) :string {
    return $item->getPriceInDollars();
  }
}

class RegisteredUser extends User {
  private string $email;
  private string $password;

  public function __construct(int $id, string $name, CreditCard $cc, string $address, string $email, string $password) {
    parent::__construct($id, $name, $cc, $address);
    $this->email = $email;
    $this->password = $password;
  }

  // Getters

  public function getEmail() :string {
    return $this->email;
  }

  public function getPassword() :string {
    return $this->password;
  }

  // Setters

  public function setEmail(string $email) :void {
    $this->email = $email;
  }

  public function setPassword(string $password) :void {
    $this->password = $password;
  }

  public function getDiscount() :int {
    return 20;
  }

  public function getPriceInDollars(Item $item) :string {
    return $item->getPriceInDollars($this->getDiscount());
  }

  public function getPriceInEuro(Item $item) :string {
    return $item->getPriceInEuro($this->getDiscount());
  }

  public function getPriceInPound(Item $item) :string {
    return $item->getPriceInPound($this->getDiscount());
  }
}
