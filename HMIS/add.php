<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <?php 
     // server variable
      $_servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hmis";

      //input variables
      
      $student_id_staff_id = $_POST["student_id_staff_id"];
      $student_staff_no = $_POST["student_staff_no"];
      $full_name = $_POST["full_names"];
      $date_attended = $_POST["date_attended"];
      $presenting_complain = $_POST["presenting_complain"];
      $investigations = $_POST["investigations"];
      $treatment = $_POST["treatment"];
      $referral = $_POST["referral"];


      $link = mysqli_connect($_servername, $username, $password, $dbname);
     // check connection
    if($link == false){
        die("ERROR : Could not connect". mysqli_connect_error());
    }

    // Attempt create database query execution
    $sql = "CREATE DATABASE IF NOT EXISTS HMIS";
    if(mysqli_query($link, $sql)){
      echo"successfully created database";
    }else{
        echo'error: Could ot execute sql CREATE' . mysqli_error($link);
    }

    $sql_table = "CREATE TABLE IF NOT EXISTS patient_records(
        id INT PRIMARY KEY AUTO_INCREMENT,
        full_names VARCHAR(30) NOT NULL,
        id_no VARCHAR(12) NOT NULL,
        student_no_staff_no int NOT NULL,
        date_attended DATE NOT NULL,
        presenting_complain TEXT NOT NULL,
        investigations CHAR NOT NULL,
        treatment TEXT NOT NULL,
        referral TEXT NOT NULL
    )";
    
        if(mysqli_query($link, $sql_table)){
            echo"successfully created table";
        }else{
            echo'error: Could not execute sql CREATE' . mysqli_error($link);
        }
    
    //insert data into table

    $sql_insert = "INSERT INTO patient_records (
            
               full_names,
               id_no, 
               student_no_staff_no,
               date_attended,
               presenting_complain,
               investigations,
               treatment,
               referral
               ) VALUES (
                   
                   '$full_name',
                   '$student_id_staff_id',
                   '$student_staff_no',
                   '$date_attended',
                   '$presenting_complain',
                   '$investigations',
                   '$treatment',
                   '$referral'
                   )";

    if(mysqli_query($link, $sql_insert)){
        echo "records succesfully inserted";

    }else{
        echo "ERROR: Could not insert data" . mysqli_error($link);
    }
    
    
    mysqli_close($link);
    ?>
</body>
</html>