<?php 
    define('DB_DATABASE', 'phpkiso');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);
    
    try {
        $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
 ?>
