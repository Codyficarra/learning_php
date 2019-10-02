<?php

class toprb {
   public $rank;
   public $playername;
   public $rushyds;
   public $rushtds;
   public $recyds;
   public $rectds;
   public $points;

   public function __construct($rank, $playername, $rushyds, $rushtds, $recyds, $rectds, $points){

   $this->rank = $rank;
   $this->playername = $playername;
   $this->rushyds = $rushyds;
   $this->rushtds = $rushtds;
   $this->recyds = $recyds;
   $this->redtds = $rectds;
   $this->points = $points;
   }

   public function getrank(){
      return $this->rank;
   }

   public function getname(){
      return $this->playername;
   }

   public function getrushyds(){
      return $this->rushyds;
   }

   public function getrushtds(){
      return $this->rushtds;
   }

   public function getrecyds(){
      return $this->recyds;
   }

   public function getrectds(){
      return $this->rectds;
   }

   public function getpoints(){
      return $this->points;
   }
   
   public function getstats(){
      $all[] = $this->getrank();
      $all[] = $this->getname();
      $all[] = $this->getrushyds();
      $all[] = $this->getrushtds();
      $all[] = $this->getrecyds();
      $all[] = $this->getrectds();
      $all[] = $this->getpoints();
      return $all;
   }
}

?>
