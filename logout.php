<?php
if(isset($_SESSION['user_id']) && $_get['logout'] == 1){
    session_destroy();
    setcookie("rememberme", "", time()-3600);
}
?>