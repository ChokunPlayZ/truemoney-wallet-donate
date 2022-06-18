<?php
  $CI = get_instance();

  $config['ckpz_config'] = 'ckpz_config';

//Burl
  $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
  $config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
  $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
  defined('BURL') OR define('BURL', $config['base_url']);
//Info
  defined('INFO_NAME') OR define('INFO_NAME', 'chokunplayz');

  defined('PASSWDSALT') OR define('PASSWDSALT', 'b&BMrYEbphjdwmBuv!NoEwrrJEC^Eim%5GhwR^abM7aZSa9ArxkmjvEKADeU');

// Database
  defined('DB_HOSTNAME') OR define('DB_HOSTNAME', 'localhost');
  defined('DB_USERNAME') OR define('DB_USERNAME', 'root');
  defined('DB_PASSWORD') OR define('DB_PASSWORD', '');
  defined('DB_DATABASE') OR define('DB_DATABASE', 'tmwdonate');
  defined('DB_DBDRIVER') OR define('DB_DBDRIVER', 'mysqli');

  //define custom values
  defined('PAGES_ASSETS_BURL') OR define('PAGES_ASSETS_BURL', (BURL."assets/page/"));
  defined('ADMIN_ASSETS_BURL') OR define('ADMIN_ASSETS_BURL', (BURL."assets/admin/"));
 ?>