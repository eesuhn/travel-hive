<?php
//Check session
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
if (session_status() == PHP_SESSION_ACTIVE){
echo "session active";
echo $_SESSION["Uid"];
}
else{
echo "not active";
}