<?php

class Router{
   public function isApiCall () {
     $uri= parse_url($_SERVER["REQUEST_URI"])["path"];
    $explode = explode("/",$uri);
    return array_search("api",$explode) !== false;
   }

   public function isTelegram() {
          return false;
   }

   public function get($path,$callback){
    if($_SERVER["REQUEST_METHOD"]=="GET" && parse_url($_SERVER["REQUEST_URI"])["path"]==$path ){
          $callback();
    }
   }

   public function post($path,$callback){
    if($_SERVER["REQUEST_METHOD"]=="POST" && parse_url($_SERVER["REQUEST_URI"])["path"]==$path){
          $callback();
    }
   }
}
