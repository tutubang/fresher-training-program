<?php
abstract class Document
{
    private $code;
    private $name;
    private $price;
    private $count_borrow;

    /**
     * Document constructor.
     * @param $code
     * @param $name
     * @param $price
     * @param $count_borrow
     */
    public function __construct($code, $name, $price) {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    abstract function borrow_book($code);
    abstract function give_book_back($code);

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCountBorrow() {
        return $this->count_borrow;
    }

    /**
     * @param mixed $count_borrow
     */
    public function setCountBorrow($count_borrow) {
        $this->count_borrow = $count_borrow;
    }

    /**
     * @return mixed
     */


}