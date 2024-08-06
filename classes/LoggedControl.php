<?php
class LoggedControl{
    public static function isLogged(){
        return isset($_SESSION["is_logged"]) && $_SESSION["is_logged"];
    }
}