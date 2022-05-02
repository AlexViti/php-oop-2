<?php
include_once __DIR__ . '/classes/credit_card.php';

// User class
class User {
  private int $id;
  private string $name;
  private CreditCard $cc;
  private string $address;
  protected int $discount;
  
  
  public function __construct(int $id, string $name ,CreditCard $cc, string $address) {
    $this->setId($id);
    $this->setName($name);
    $this->setCc($cc);
    $this->setAddress($address);
    $this->discount = 0;
  }

  // Setters

  private function setId(int $id) :void {
    try {
      if ($id < 0) {
        throw new Exception("Id cannot be less than 0");
      } else {
        $this->id = $id;
      }
    } catch (Exception $e) {
      echo '<div class="error">' . $e->getMessage() . '</div>';
    }
  }

  public function setName(string $name) :void {
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

  public function setCreditCard(CreditCard $cc) :void {
    $this->cc = $cc;
  }

  public function setAddress(string $address) :void {
    try {
      if (strlen($address) < 5) {
        throw new Exception("Address must be at least 5 characters");
      } else {
        $this->address = $address;
      }
    } catch (Exception $e) {
      echo '<div class="error">' . $e->getMessage() . '</div>';
    }
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

  public function getDiscount() :int {
    return $this->discount;
  }
}

class RegisteredUser extends User {
  private string $email;
  private string $password;

  public function __construct(int $id, CreditCard $cc,  string $name, string $address, string $email, string $password) {
    parent::__construct($id, $name, $cc, $address);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->$discount = 20;
  }

  // Setters

  public function setEmail(string $email) :void {
    try {
      // Check if email is valid
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Email is not valid");
      } else {
        $this->email = $email;
      }
    } catch (Exception $e) {
      echo '<div class="error">' . $e->getMessage() . '</div>';
    }
  }

  public function setPassword(string $password) :void {
    try {
      if (strlen($password) < 3) {
        throw new Exception("Password must be at least 3 characters");
      } else {
        $this->password = $password;
      }
    } catch (Exception $e) {
      echo '<div class="error">' . $e->getMessage() . '</div>';
    }
  }

  // Getters

  public function getName() :string {
    return $this->name;
  }

  public function getEmail() :string {
    return $this->email;
  }

  public function getPassword() :string {
    return $this->password;
  }
}


