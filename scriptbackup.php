<?php
include("../Templates/header.php");
require_once '../Templates/login.php';
$con=mysqli_connect($host,$un,$pw,$db); //CS340km
$con2=mysqli_connect($host,$un,$pw, $db04);//hw04 db

if(isset($_POST['backupfromscript']))
{
  if(!file_exists('./CS340dump.sql'))
  {
    echo "cannot find file";
  }//if
  else
  {
    $source = './CS340dump.sql';
    $sql  = "DROP DATABASE IF EXISTS $db;";
    $sql .= "Create DATABASE $db;";
    $sql .= file_get_contents($source);
    $qry = explode(";",$sql);
    $arrlength = count($qry);
    if($qry !=NULL)
    {
      for($i=0;$i<$arrlength - 1;$i++)
      {
        mysqli_select_db($con,$db);
        mysqli_query($con, $qry[$i].";") or die("Failure to Execute: ". mysqli_error($con));
      }//for
      echo "Backup From Script File Successful";
    }//if
  }//else
}//if
