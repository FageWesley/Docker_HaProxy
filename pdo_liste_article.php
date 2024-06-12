<?php

echo "<html>
 <head>
  <meta charset='utf-8'> 
  <title>PHP Test</title>
 </head>
 <body>";

$server = "mariadb_docker";
$user = "root";
$pwd = "rootpw";
$db = "magasin";

echo "Cette requête a été traitée par : <b>";
echo gethostname();
echo "</b><br><br>";

try {
    $connection = new PDO("mysql:host=$server;dbname=$db", $user, $pwd);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT  * FROM article';

    foreach  ($connection->query($sql) as $row) {
        print $row['description'] . "\t";
        print  $row['prix'] . "<BR>";
    }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


echo "
</body>
</html>
";
?> 
