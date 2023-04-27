<?php

session_start();
include('config/dbcon.php');

function getProduct($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE pro_status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getCatNameOnly($table)
{
    global $con;
    $query = "SELECT cat_name FROM $table WHERE cat_status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getCatName($table, $catid)
{
    global $con;
    $query = "SELECT cat_name FROM $table WHERE cat_id='$catid' ";
    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE pro_slug='$slug' AND pro_status='1' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllCatActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE cat_status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllSubCatActive($table, $catid)
{
    global $con;
    $query = "SELECT * FROM $table WHERE cat_id='$catid' AND sub_cat_status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getProActive($table, $catid)
{
    global $con;
    $query = "SELECT * FROM $table WHERE cat_id='$catid' AND pro_status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getFilterProActive($table, $catid, $subcatid)
{
    global $con;
    $query = "SELECT * FROM $table WHERE cat_id = '$catid' AND sub_cat_id = '$subcatid' AND pro_status='1'";
    return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM product WHERE cat_id='$category_id' AND status='1'";
    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit(0);
}
