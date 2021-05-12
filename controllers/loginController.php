<?php
session_start();
include ('../models/Ldap.php');
$contrasenya = $_POST['contrasenya'];
echo $contrasenya;
if(!empty($contrasenya)){
    $ldap = new LdapCB('cn=admin,dc=dawCB,dc=cat');
    var_dump($ldap);
    if($ldap->authUser($contrasenya)){
        header('Location: ../vista/formulari_cerques.php');
    }else{
        $_SESSION['loginError'] = 'Login incorrecte';
        header('Location: ../vista/login.php');
    }
}else{
    $_SESSION['loginError'] = 'No pot haver-hi camps sense valor';
    header('Location: ../vista/login.php');
}


?>
