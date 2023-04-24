<?php

namespace App\Controllers;

class Security
{
  /**
   * *********Liste des méthodes******
   * sanitize() : permet de nettoyer les entrées des $_POST  
   */

  public static function sanitize($input)
  {
    
    $input = trim($input);

    
    $input = strip_tags($input);

    
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');


    return $input;
  }



}