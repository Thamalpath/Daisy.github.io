<?php

session_start(); 
include('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getSelectSubCat($table, $catid)
{
    global $con;
    $query = "SELECT * FROM $table WHERE cat_id = $catid";
    return $query_run = mysqli_query($con, $query);
}

function getById($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getByCatId($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE cat_id = '$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getBySubCatId($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE sub_cat_id = '$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getByProId($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE pro_id = '$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getSubCategoryDetail($table)
{
    global $con;
    $query = "SELECT sub_cat_id, sub_cat_name, cat_name, sub_cat_status
    FROM $table INNER JOIN category ON ($table.cat_id = category.cat_id)";
    return $query_run = mysqli_query($con, $query);
    
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}
?>