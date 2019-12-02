<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<style>
body {
  background-color: #ecd3ca;
}
</style>
<body>
    <?php
        include("init.php");

        if(!isset($_GET['dn']))
            $dn=null;
        else
        $dn=$_GET['dn'];
        $rn=$_GET['rn'];
        $lv=$_GET['lv'];
        $tm=$_GET['tm'];

        // validation
        if (empty($dn) or empty($rn) or empty($lv) or empty($tm)or preg_match("/[a-z]/i",$lv) or preg_match("/[a-z]/i",$tm) or preg_match("/[a-z]/i",$rn)) {
            if(empty($dn))
                echo '<p class="error">Please select your dept</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(empty($lv))
                echo '<p class="error">Please enter your level</p>';
            if(empty($tm))
                echo '<p class="error">Please enter your term</p>';
            if(preg_match("/[a-z]/i",$rn) || preg_match("/[a-z]/i",$lv) || preg_match("/[a-z]/i",$tm))
                echo '<p class="error">Please enter valid data</p>';
            
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `stud_name` FROM `stu` WHERE `stud_id`='$rn' and `level`='$lv' and `term`='$tm' and `dept_name`='$dn'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['stud_name'];
             
        }
        ?>

        <div class="container">
            <head>
            <style>
            table, td, th {
              border: 1px solid black;
              text-align: center;
            }

            table {
              border-collapse: collapse;
              width: 100%;
            }

            th {
              height: 50px;
            }
            </style>
            </head>
            <body>
            <div class="details">
            <table>
              <tr>
                <th><span>Name:</span> <?php echo $name ?> <br></th>
              </tr>
              <tr>
                <td><span>Department:</span> <?php echo $dn; ?> <br></td>
              </tr>
              <tr>
                <td><span>Roll No:</span> <?php echo $rn; ?> <br></td>
              </tr>
              <tr>
                <td><span>Level:</span> <?php echo $lv; ?> <br></td>
              </tr>
              <tr>
                <td><span>Term:</span> <?php echo $tm; ?> <br></td>
              </tr>
            </table>
            </div>
            </body>    
        </div>
    
        <?php
        $result_sql=mysqli_query($conn,"SELECT `course_title`, `course_no`, `grade`, `point` FROM `stu` WHERE `stud_id`='$rn' and `level`='$lv' and `term`='$tm' and `dept_name`='$dn'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['course_title'];
            $p2 = $row['course_no'];
            $p3 = $row['grade'];
            $p4 = $row['point'];
            ?>
        <div class="container">
            <div class="main">
                <div class="s1">
                    <p>Course title</p>
                    <p>Course no</p>
                    <p>Grade</p>
                    <p>Point</p>
                </div>
                <div class="s2">
                    <?php echo '<p>'.$p1.'</p>';?>
                    <?php echo '<p>'.$p2.'</p>';?>
                    <?php echo '<p>'.$p3.'</p>';?>
                    <?php echo '<p>'.$p4.'</p>';?>
                </div>
            </div>
        </div>
    <?php
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>