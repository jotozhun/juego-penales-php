<?php
setcookie('id_user', ' ', time() + (3600*24));
setcookie('login', 0, time() + (3600*24));
setcookie('isadmin', 0, time() + (3600*24));
echo " <meta http-equiv='refresh' content='0; url=index.php'>";
?>