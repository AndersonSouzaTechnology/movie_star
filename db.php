<?php

  $db_name = "moviestar";
  $db_host = "localhost";
  $db_user = "cursoPHP";
  $db_pass = "123456";

  $conn = new PDO("mysql:dbname=". $db_name .";host=". $db_host, $db_user, $db_pass);

  // Habilitar erros PDO
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);