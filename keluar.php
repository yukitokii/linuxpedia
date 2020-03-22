<?php

session_unset();
session_destroy();

if (!isset($_SESSION["login"])) {
     echo "
           <script>
                alert('Anda telah keluar');
           </script>
    ";
}

?>
<meta http-equiv="refresh" content="0; url=index.php" />