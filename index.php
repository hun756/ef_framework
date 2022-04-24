<?php

/**
 * closing error erport
 */
error_reporting(E_ERROR);

/**
 * Application starting point..!
 */
 require_once('./app/bootstrap.php');

 /**
  * Init core application.
  */
  $app_init = new Core;