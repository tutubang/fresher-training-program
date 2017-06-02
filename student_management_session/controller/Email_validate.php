<?php

Class Email_Validate {
    public function is_email($string) {
        return (!filter_var($string, FILTER_VALIDATE_EMAIL)) ? FALSE : TRUE;
    }
}