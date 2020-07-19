<?php
namespace App\Services\Open;

class PromotionSubjectService
{
   private const SUBJECTS = [
       "oferta-facebook-000002"=>"OFERTA: Lavado, Corte y Peinado 26,99 €"
   ];

   public static function get_description($get){
       return self::SUBJECTS[$get] ?? "";
   }
}//PromotionSubjectService