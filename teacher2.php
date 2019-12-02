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
        
        // validation
        if (empty($dn) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($dn))
                echo '<p class="error">Please select your dept</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your course number</p>';
            
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid data</p>';
            
            exit();
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
                <td><span>Department:</span> <?php echo $dn; ?> <br></td>
              </tr>
              <tr>
                <td><span>Course_No:</span> <?php echo $rn; ?> <br></td>
              </tr>
             
            </table>
            </div>
            </body>    
        </div>
    
        <?php
        $result_sql=mysqli_query($conn,"SELECT `stud_name`,`stud_id`, `course_no`, `grade`, `point` FROM `stu` WHERE `course_no`='$rn' and  `dept_name`='$dn'");
        $count=0;
        $count1="";
        $count2=0;
        while($row = mysqli_fetch_assoc($result_sql))
        {  
            $p5 = $row['stud_name'];
            $p1 = $row['stud_id'];
            $p2 = $row['course_no'];
            $p3 = $row['grade'];
            $p4 = $row['point'];
            if($p4>$count){
                $count=$p4;
                $count1=$p3;
                $count2=$p1;
            }
            ?>
        <div class="container">
            <div class="main">
                <div class="s1">
                    <p>Student name</p>
                    <p>Student id</p>
                    <p>Course no</p>
                    <p>Grade</p>
                    <p>Point</p>
                </div>
                <div class="s2">
                    <?php echo '<p>'.$p5.'</p>';?>
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
            <div class="main">
                <div class="s1">
                    <p>Highest grade ID</p>
                    <p>Highest grade</p>
                    <p>Highest point</p>
                </div>
                <div class="s2">
                    <?php echo '<p>'.$count2.'</p>';?>
                    <?php echo '<p>'.$count.'</p>';?>
                    <?php echo '<p>'.$count1.'</p>';?>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>