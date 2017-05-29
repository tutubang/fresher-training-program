<?php
require 'Document.php';
class Book extends Document
{
    function borrow_book($code) {
        // TODO: Implement borrow_book() method.
        $array = array(
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'count_borrow' => $this->getCountBorrow()
        );
        if ($array['code'] == $code)
        {
            $array['count_borrow']+=1;
        }

        return $array;
    }

    function give_book_back($array) {
        // TODO: Implement give_book_back() method.
    }
}
$obj = new Book('B1','The Life','1000');
    print_r($obj->borrow_book('B1'));

