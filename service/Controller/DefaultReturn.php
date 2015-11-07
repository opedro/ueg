<?php
/**
 * Created by @opedro Date: 26/10/2015 Time: 22:03
 */

class DefaultReturn {
    public function __construct($success, $item, $message){
        $this->success=$success;
        $this->data = $item;
        if(!$message){
            $this->message = "Sucesso";
        }else{
            $this->message = $message;
        }

    }
}