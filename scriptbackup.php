<?php
include("../Templates/header.php");
require_once '../Templates/login.php';
$dumpfile = "/path/to/dump";
$con=mysqli_connect($host,$un,$pw,$db); //connect to DB 


if(isset($_POST['backupfromscript']))//check if button was pressed on calling page
{
  if(!file_exists($dumpfile))
  {
    echo "cannot find file";
  }//if
  else
  {
    $source = $dumpfile;
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
