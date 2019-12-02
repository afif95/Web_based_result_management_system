<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Student</legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Roll No">
                <input type="text" name="course_title" placeholder="Course Title">
                <input type="text" name="course_no" placeholder="Course No">
                <input type="text" name="level" placeholder="Level">
                <input type="text" name="term" placeholder="Term">
                <input type="text" name="grade" placeholder="Grade">
                <input type="text" name="point" placeholder="Point">
                <?php
                    include('init.php');
                    include('session.php');
                    
                   
                        echo '<select name="dept_name">';
                        echo '<option selected disabled>Select Dept</option>';
                    $count=10;
                    while($count>0){
                        if($count==10)
                        $display="cse";                        
                        else if($count==9)
                        $display="eee";                        
                        else if($count==8)
                        $display="me";                        
                        else if($count==7)
                        $display="ce";                        
                        else if($count==6)
                        $display="pme";                        
                        else if($count==5)
                        $display="urp";                        
                        else if($count==4)
                        $display="wre";                        
                        else if($count==3)
                        $display="ete";                        
                        else if($count==2)
                        $display="cwre";                        
                        else if($count==1)
                        $display="mie";
                        echo '<option value="'.$display.'">'.$display.'</option>';
                        $count--;
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

    <div class="footer">
        <!-- <span>&copy Designed & Coded By Jibin Thomas</span> -->
    </div>
</body>
</html>

<?php

    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['dept_name']))
            $dept_name=null;
        else
            $dept_name=$_POST['dept_name'];
        
        $level=$_POST['level'];
        $term=$_POST['term'];
        $course_title=$_POST['course_title'];
        $course_no=$_POST['course_no'];
        $grade=$_POST['grade'];
        $point=$_POST['point']; 

        // validation
        if (empty($name) or empty($rno) or empty($dept_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($dept_name))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `stu` (`stud_name`, `stud_id`, `dept_name`, `level`, `term`, `course_title`, `course_no`, `grade`, `point`) VALUES ('$name', '$rno', '$dept_name', '$level', '$term', '$course_title', '$course_no','$grade', '$point')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }

    }
?>


