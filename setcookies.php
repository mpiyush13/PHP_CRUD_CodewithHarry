<?php
echo "Welcome to the world of cookies<br>";
// Syntax to set a cookie
// echo time();
setcookie("category", "Books are the playing", time() + 86400, "/"); 
echo "The cookie is set<br>";
?>