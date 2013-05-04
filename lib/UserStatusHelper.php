<?php

class UserStatusHelper
{
     public static function isLoggedIn()
     {
         if(empty ($_SESSION['user']))
         {
             return false;
         }
         return true;
     }
}

?>
