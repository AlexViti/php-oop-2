<?php

// Credit card class

  class CreditCard {
    private int $cc_number;
    private int $cvv;
    private int $expiration_year;
    private int $expiration_month;
    private string $name;

    public function __construct(int $cc_number, int $cvv, int $expiration_year, int $expiration_month, string $name) {
      $this->setCcNumber($cc_number);
      $this->setCvv($cvv);
      $this->setExpiration($expiration_year, $expiration_month);
      $this->setName($name);
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

    private function setCcnumber(int $cc_number) :void {
      try {
        if (strlen($cc_number) != 16) {
          throw new Exception("Credit card number must be 16 digits");
        } else {
          $this->cc_number = $cc_number;
        }
      } catch (Exception $e) {
        echo '<div class="error">' . $e->getMessage() . '</div>';
      }
    }

    private function setCvv(int $cvv) :void {
      try {
        if (strlen($cvv) != 3) {
          throw new Exception("CVV must be 3 digits");
        } else {
          $this->cvv = $cvv;
        }
      } catch (Exception $e) {
        echo '<div class="error">' . $e->getMessage() . '</div>';
      }
    }

    private function setExpiration(int $expiration_year, int $expiration_month) :void {
      try {
        if ($expiration_year < date('Y')) {
          throw new Exception("Expiration year must be greater than current year");
        } else if ($expiration_year == date('Y') && $expiration_month < date('m')) {
          throw new Exception("Expiration month must be greater than current month");
        } else {
          $this->expiration_year = $expiration_year;
          $this->expiration_month = $expiration_month;
        }
      } catch (Exception $e) {
        echo '<div class="error">' . $e->getMessage() . '</div>';
      }
    }

    private function setName(string $name) :void {
      try {
        if (strlen($name) < 3) {
          throw new Exception("Name must be at least 3 characters");
        } else {
          $this->name = $name;
        }
      } catch (Exception $e) {
        echo '<div class="error">' . $e->getMessage() . '</div>';
      }
    }
  }