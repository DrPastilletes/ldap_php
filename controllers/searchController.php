<?php
session_start();
include('../models/Ldap.php');

if(isset($_SESSION['resultats'])){
    unset($_SESSION['resultats']);
}

$ldap = new LdapCB();
$filtre = '(&';

if(!empty($_POST['nom'])){
    $aux = $_POST['nom'];
    $filtre = $filtre . '(cn='. $aux.')';
}

if(!empty($_POST['cognoms'])){
    $aux = $_POST['cognoms'];
    $filtre = $filtre . '(sn='. $aux.')';
}

if(!empty($_POST['telefon'])){
    $aux = $_POST['telefon'];
    $filtre = $filtre . '(telephone='. $aux.')';
}

if(!empty($_POST['mobil'])){
    $aux = $_POST['mobil'];
    $filtre = $filtre . '(mobile='. $aux.')';
}

if(!empty($_POST['email'])){
    $aux = $_POST['email'];
    $filtre = $filtre . '(email='. $aux.')';
}

if(!empty($_POST['institut-organització'])){
    $aux = $_POST['institut-organització'];
    $filtre = $filtre . '(o=' . $aux . ')';
}

if(!empty($_POST['grups'])){
    $group = $_POST['grups'];
}else{
    $group = "";
}

$filtre = $filtre . ')';

$resultats = $ldap->search($filtre,$group);
$_SESSION['filtre'] = $filtre;
$_SESSION['resultats'] = $resultats;
header('Location: ../vista/formulari_cerques.php');