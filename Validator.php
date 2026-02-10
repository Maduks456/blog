<?php
class Validator{
    public function string($value, $min = 1){
        $value = trim($value);

        if (is_string($value) && strlen($value)>= $min){
            return true;
        }else{
            return false;
        }
    }
}