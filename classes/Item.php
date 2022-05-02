<?php
// Item class

  class Item {
    private int $id;
    private string $name;
    private int $price_dollar_cents; // in cents
    private string $category;
    private string $description;

    public function __construct(int $id, string $name, int $price, string $category = 'misc', ?string $description = null) {
      $this->id = $id;
      $this->name = $name;
      $this->price_dollar_cents = $price;
      $this->category = $category;
      $this->description = $description;
    }

    // Getters

    public function getId() :int {
      return $this->id;
    }

    public function getName() :string {
      return $this->name;
    }

    public function getPrice(int $discount = 0) :float {
      return round($this->price_dollar_cents * ((100 - $discount) / 100) / 100, 2);
    }

    public function getCategory() :string {
      return $this->category;
    }

    public function getDescription() :?string {
      return $this->description;
    }

    // Setters

    public function setId(int $id) :void {
      $this->id = $id;
    }

    public function setName(string $name) :void {
      $this->name = $name;
    }

    public function setPrice(int $price) :void {
      $this->price = $price;
    }

    public function setCategory(string $category) :void {
      $this->category = $category;
    }

    public function setDescription(?string $description) :void {
      $this->description = $description;
    }

    // Other methods

    public function getPriceInDollars(int $discount = 0) :string {
      return number_format($this->getPrice($discount), 2) . '$';
    }

    public function getPriceInEuro(int $discount = 0) :string {
      return number_format($this->getPrice($discount) * 0.9, 2) . '€';
    }

    public function getPriceInPound(int $discount = 0) :string {
      return number_format($this->getPrice($discount) * 0.8, 2) . '£';
    }

    public function isAvailable() :bool {
      return true;
    }
  }

  class LimitedItem extends Item {
    private DateTime $start_date;
    private DateTime $end_date;

    public function __construct(int $id, string $name, int $price, DateTime $start_date, DateTime $end_date, string $category = 'misc', ?string $description = null) {
      parent::__construct($id, $name, $price, $category, $description);
      $this->start_date = $start_date;
      $this->end_date = $end_date;
    }

    // Getters

    public function getStartDate() :DateTime {
      return $this->start_date;
    }

    public function getEndDate() :DateTime {
      return $this->end_date;
    }

    // Setters

    public function setStartDate(DateTime $start_date) :void {
      $this->start_date = $start_date;
    }

    public function setEndDate(DateTime $end_date) :void {
      $this->end_date = $end_date;
    }

    public function isAvailable() :bool {
      return $this->start_date <= new DateTime() && $this->end_date >= new DateTime();
    }
  }

  // $item = new Item(1, 'Item 1', 1234567);
