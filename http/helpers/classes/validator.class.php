<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author qtran
 */
class Validator {
    
    public static function validate($rules, $theRequest, $filters = array()) {
        $validator = new GUMP;
        
        if ( !empty($filters) && is_array($filters) ) $theRequest = $validator->filter($theRequest, $filters);
        
        $validated = $validator->validate($theRequest, $rules);
        if( $validated === TRUE ) return $validated;
        
        return $validated;
    }
}
