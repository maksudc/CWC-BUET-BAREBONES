<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidationHelper
 *
 * @author SALEH
 */
class ValidationHelper {

    public static function not_empty($input_string) {
        $trimmed_string = trim($input_string);
        return !empty($trimmed_string);
    }

    public static function is_numeric($input_string) {
        return ctype_digit($input_string);
    }

    public static function is_valid_url($input_string) {
        $valid_url = filter_var($input_string, FILTER_VALIDATE_URL);
        if ($valid_url != FALSE) {
            return true;
        }
        return false;
    }

    public static function is_valid_email($input_string) {
        $valid_email = filter_var($input_string, FILTER_VALIDATE_EMAIL);
        if ($valid_email != FALSE) {
            return true;
        }
        return false;
    }
    
     /**
     *@assert  ('29th March,2009') == true 
     */

    public static function is_valid_date($input_string) {
        $date_array=explode('/', $input_string);
        if(checkdate($date_array[0], $date_array[1], $date_array[2])){
            return true;
        }
        return FALSE;
    }
    
    public static function valid_date_range($start_date,$end_date){
        if(ValidationHelper::is_valid_date($start_date) && ValidationHelper::is_valid_date($end_date)){
            $get_start_date=strtotime($start_date);
            $get_end_date=strtotime($end_date);
            $get_current_time=getdate();
            if($get_start_date>$get_end_date)
                return FALSE;
            
            elseif($get_current_time>$get_end_date)
                return FALSE;
            else
                return TRUE;
        }
        return FALSE;
    }

}

?>
