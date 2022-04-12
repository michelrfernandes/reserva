<?php

if(isset($_REQUEST['sair'])){
    session_destroy();
    session_unset();
    header("Location:index.php?aviso=error");
}