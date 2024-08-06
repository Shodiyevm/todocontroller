<?php

$router = new Router();

if ($router ->isApiCall()){
  return 'routes/api.php';
}


if ($router ->isTelegram()){
    return 'routes/telegram.php';
  }
  
require'routes/web.php';
require_once 'src/Router.php';
