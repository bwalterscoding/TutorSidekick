<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function studentAdded() {
          var txt;
          if (confirm("Student Added Successfully!")) {
            txt = "You pressed OK!";
          } else {
            txt = "You pressed Cancel!";
          }
          document.getElementById("submitAddStudentButton").innerHTML = txt;
        }
    </script>
</head>


<body>
    <div class="page-header">
        <h1 style="color: white;">Hi, <i><?php echo htmlspecialchars($_SESSION["username"]); ?></i>. Welcome to <b>TutorSidekick<b>.</h1>
        <br>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>    
    </div>

    <!-- The USER INTERFACE starts here  -->

    <h2><b>User Interface<b></h2>

    <div class="container modal-content" id="form-box">
        <div class="row" id="row1-form"> <!-- This is the first row of the user-interface -->
        	
            <!--Input Classroom Data Form -->
           	
            	<div class="col-sm-12" style="background-color: #a4cabc" id="forms">
	            <form action="" method="POST">
	                <div class="form-group benCenter">
	                    <h2>When you finish a class... <br><small>Fill this out.</small></h2>
	                    <label for="classCode">Classroom Code</label>
	                    <input type="text" class="form-control" id="inputClassCode" name="classCode" aria-describedby="classCodeHelp" placeholder="ABC123">
	                    <small id="classCodeHelp" class="form-text text-muted">Enter the unique classroom number you have created or your company has provided.</small>
	                </div>
	                <div class="form-group">
	                    <label for="dateOfClass">Date</label>
	                    <input type="date" class="form-control" name="dateOfClass" id="inputDate">
	                </div>
	                <div class="form-group">
	                    <label for="classStartTime">Class Start Time</label>
	                    <input type="time" class="form-control" name="classStartTime" id="inputTime">
	                </div>
	                <div class="form-group">
	                    <label for="classLength">Class Length</label>
	                    <select name="classLength" class="form-control" required>
	                        <option value=".5">.5 hour</option>
	                        <option value="1">1 hour</option>
	                        <option value="1.5">1.5 hours</option>
	                        <option value="2">2 hours</option>
	                        <option value="2.5">2.5 hours</option>
	                        <option value="3">3 hours</option>
	                        <option value="3.5">3.5 hours</option>
	                        <option value="4">4 hours</option>
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label for="comment">Comment:</label>
	                    <textarea class="form-control" rows="5" id="comment" name="classComment" placeholder="Ex. Comment: James was did well but a bit naughty!  Angel was amazing but has plateaud a bit."></textarea>
	                </div> 
	                <div class="form-group">
	                    <label for="hourlyRate">Hourly Rate</label>
	                    <input class="form-control" type="number" step="0.1" name="hourlyRate" value="20" required>
	                </div>
	                <div class="form-check">
	                    <input type="checkbox" class="form-check-input" id="noShowCheck">
	                    <label class="form-check-label" for="noShowCheck">Check If No Student Showed Up</label>
	                </div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit_btn">Submit</button>
					</div>
	            </form>


	        <!-- PHP code to process classroom data inputs starts here -->

            <?php  
            // Include config file
            require_once "config.php";

            if(isset($_REQUEST['submit_btn']))
            {
                // Variables from form
            $classCode = $_POST['classCode'];
            $dateOfClass = $_POST['dateOfClass'];
            $classStartTime = $_POST['classStartTime'];
            $classLength = $_POST['classLength'];
            $classComment = $_POST['classComment'];
            $hourlyRate = $_POST['hourlyRate'];
            $paymentEarned = $hourlyRate * $classLength;
            $userTeacher = htmlspecialchars($_SESSION["username"]);

            $userQuery = ("INSERT INTO classdata (payment_earned, class_length, class_code, date_of_class, class_start_time, teacher, class_comments) 
            VALUES ('$paymentEarned', '$classLength', '$classCode', '$dateOfClass', '$classStartTime', '$userTeacher', '$classComment') ");

            $result = mysqli_query($link, $userQuery);
            
            
              
            }

            ?>
        	</div>
        
    </div> <!-- end Row 1 -->


        <!-- DISPLAY Earnings in a table -->
        <div class="row" id="row2-form"> <!-- This is the second row of the user-interface -->
	        <div class="col-sm-12" style="background-color: #eab364" id="forms">

	            <?php  
	            
	            require_once "config.php"; // include config file

	            $userTeacher2 = htmlspecialchars($_SESSION["username"]);

	                $userQuery = "
	                	SELECT SUM(c.payment_earned) AS Money_Earned, 
	                	SUM(c.class_length) AS Hours_Worked, 
	                	AVG(c.payment_earned) AS Avg_Each_Class 
	                	FROM classdata c, users u
	                	WHERE c.date_of_class = CURRENT_DATE
	                	AND c.teacher = '$userTeacher2'";
	                $result = mysqli_query($link, $userQuery);

	                if (!$result)
	                {
	                    die("Could not successfully run query ($userQuery) from your DB: ". mysqli_error($link) );
	                }

	                if (mysqli_num_rows($result) == 0)
	                {
	                    print("No records found with query $userQuery");
	                }
	                else
	                {
	                    print("<h2>Your Earnings Today</h2>");
	                    print("<div style = \"background-color: #ffffff\">");
	                    print("<table class = \"table table-bordered\">");
	                    print("<tr> <th>Money Earned</th><th>Hours Worked</th> <th>Class Average</th> </tr>");
	                    while ($row = mysqli_fetch_assoc($result))
	                    {
	                        print("<tr><td id=\"cash-money\"> $".number_format($row['Money_Earned'], 2, '.', '')."</td> <td id=\"hours-worked\">".number_format($row['Hours_Worked'], 1, '.', '')."</td> <td id=\"cash-money\"> $".number_format($row['Avg_Each_Class'], 2, '.', '')."</td> </tr>");
	                    }
	                    print("</table>");
	                    print("</div>");
	                    
	                }
	                    



	                    
	                //DISPLAY Students Taught SQL Query

	                $userQuery2 = "SELECT (c.class_start_time), s.class_code, s.name, c.date_of_class
	                            FROM classdata c, students s
	                            WHERE c.class_code = s.class_code 
	                            AND c.date_of_class = CURRENT_DATE()
	                            AND c.teacher = '$userTeacher2' 
	                            ORDER BY c.class_start_time
	                            ";
	                $result2 = mysqli_query($link, $userQuery2);

	                if (!$result2)
	                {
	                    die("Could not successfully run query ($userQuery2) from $db: ". mysqli_error($link) );
	                }

	                if (mysqli_num_rows($result2) == 0)
	                {
	                    print("Nothing to show yet");
	                }
	                else
	                {
	                    print("<h2>Students you've taught today</h2>");
	                    print("<div style = \"background-color: #ffffff\">");
	                    print("<table class = \"table table-bordered\">");
	                    print("<tr> <th>Time</th> <th>Class Code</th> <th>Name</th> <th>Date</th> </tr>");
	                    while ($row = mysqli_fetch_assoc($result2))
	                    {
	                        print("<tr><td>".$row['class_start_time']."</td><td>".$row['class_code']."</td><td>".$row['name']."</td> <td>".$row['date_of_class']."</td> </tr>");
	                    }
	                    print("</table>");
	                    print("</div>");
	                }
	            
	            ?>

	        </div>
	    </div> <!-- end Row 2 -->

    </div>


</body>
</html>
