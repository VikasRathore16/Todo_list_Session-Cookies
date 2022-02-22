<?php
session_start();

if(isset($_POST['addButton'])){
    if(isset($_SESSION['todo'])){
        array_push($_SESSION['todo'],$_POST['input']);
    }else{
        $_SESSION['todo']=array($_POST['input']);

    }
}


if(isset($_POST['editButton'])){
    $_SESSION['val']=$_SESSION['todo'][$_POST['do']];
    unset($_SESSION['todo'][$_POST['do']]);
    if(isset($_SESSION['val'])){
        $_SESSION['count']=1;
    }else{
        $_SESSION['count']=0;
    }
}
if(isset($_POST['addButton'])){
    $_SESSION['count']=0;
}

if(isset($_POST['deleteButton'])){
    unset($_SESSION['todo'][$_POST['do']]);
}


if(isset($_POST['check'])){
    $_SESSION['val2']=$_SESSION['todo'][$_POST['do']];
    unset($_SESSION['todo'][$_POST['do']]);
    if(isset($_SESSION['checkBox'])){
    array_push($_SESSION['checkBox'],$_SESSION['val2']); 
}else{
    $_SESSION['checkBox']=array($_SESSION['val2']);
}
}


if(isset($_POST['editCompltBtn'])){
    $_SESSION['val']=$_SESSION['checkBox'][$_POST['do']];
    unset($_SESSION['checkBox'][$_POST['do']]);
    if(isset($_SESSION['val'])){
        $_SESSION['count']=1;
    }else{
        $_SESSION['count']=0;
    }
}


if(isset($_POST['deleteCompltBtn'])){
    unset($_SESSION['checkBox'][$_POST['do']]);
}
header('location: index.php');
?>