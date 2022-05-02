<?php
class CreditCard {
  private int $cc_number;
  private int $cvv;
  private int $expiration_year;
  private int $expiration_month;
  private string $name;
  
  public function __construct(int $cc_number, int $cvv, int $expiration_year, int $expiration_month, string $name) {
    $this->cc_number = $cc_number;
    $this->cvv = $cvv;
    $this->setExpiration($expiration_year, $expiration_month);
    $this->name = $name;
  }

  // Getters

  public function getCcNumber() :int {
    return $this->cc_number;
  }

  public function getCvv() :int {
    return $this->cvv;
  }

  public function getExpirationYear() :int {
    return $this->expiration_year;
  }

  public function getExpirationMonth() :int {
    return $this->expiration_month;
  }

  public function getExpitation() :string {
    return $this->expiration_month . '/' . $this->expiration_year;
  }

  public function getName() :string {
    return $this->name;
  }

  // Setters

  public function setCcNumber(int $cc_number) :void {
    $this->cc_number = $cc_number;
  }

  public function setCvv(int $cvv) :void {
    $this->cvv = $cvv;
  }

  public function setExpiration(int $expiration_year, int $expiration_month) :void {
    try {
      if ($expiration_year < date('Y')) {
        throw new Exception('Invalid expiration year');
      } else if ($expiration_year == date('Y') && $expiration_month < date('m')) {
        throw new Exception('Invalid expiration month');
      } else {
        $this->expiration_year = $expiration_year;
        $this->expiration_month = $expiration_month;
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setName(string $name) :void {
    $this->name = $name;
  }

  // Other methods

  public function isValid() :bool {
    if ($this->expiration_year < date('Y') || ($this->expiration_year == date('Y') && $this->expiration_month < date('m'))) {
      return false;
    } else {
      return true;
    }
  }
}

// $cc = new CreditCard(1234567890123456, 123, 2024, 12, 'John Doe');
