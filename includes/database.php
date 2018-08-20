<?php
  session_start();
  
  function ConnectDb() {
    global $connect;
    //$connect = mysqli_connect("localhost","root","1234","practice1");
    $connect = mysqli_connect("localhost","root","","intern");

    if(mysqli_connect_errno()) {
      echo "Unable to connect to database: " . mysqli_connect_error() ."<br/>";
    }
  }

  function query($query) {
    global $connect;
    $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
    return $result;
  }

  function GetDbId() {
    global $connect;
    return mysqli_insert_id($connect);
  }

  function escape($str) {
    global $connect;
    return mysqli_real_escape_string($connect,$str);
  }

  function CloseDb() {
    global $connect;
    mysqli_close($connect);
  }

  ConnectDb();
?>
