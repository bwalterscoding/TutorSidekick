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
</head>
<body>
    <div class="page-header">
        <h1>Hi, <i><?php echo htmlspecialchars($_SESSION["username"]); ?></i>. Welcome to <b>TutorSidekick<b>.</h1>
        <br>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>    
    </div>

    <h2>User Interface</h2>

    <div class="container modal-content" id="user-interface">
        <div class="row">
        <div class="col-sm-4">
            <!--FORM -->
            <form action="" method="POST">
                <div class="form-group">
                    <h2>Did you just finish teaching a class? <br><small>Start Here.</small></h2>
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
              <button type="submit" class="btn btn-primary" name="submit_btn">Submit</button>
            </form>
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

            $userQuery = ("INSERT INTO classdata (payment_earned, class_length, class_code, date_of_class, class_start_time, class_comments) 
            VALUES ('$paymentEarned', '$classLength', '$classCode', '$dateOfClass', '$classStartTime', '$classComment') ");

            $result = mysqli_query($link, $userQuery);
            
            
              
            }

            ?>
        </div>
        
        <div class="col-sm-4">

            <?php  
            // Include config file
            require_once "config.php";

            
             
                $userQuery = "SELECT SUM(payment_earned) AS Money_Earned, SUM(class_length) AS Hours_Worked, AVG(payment_earned) AS Avg_Each_Class FROM classdata WHERE date_of_class = CURRENT_DATE";
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
                    print("<h1>This Is What You've Earned Today</h1>");
                    print("<table class = \"table table-bordered\">");
                    print("<tr> <th>Money_Earned</th><th>Hours_Worked</th> <th>Average $ Earned Per Class</th> </tr>");
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        print("<tr><td> $".$row['Money_Earned']."</td> <td>".$row['Hours_Worked']."</td> <td> $".$row['Avg_Each_Class']."</td> </tr>");
                    }
                    print("</table>");
                }
                    mysqli_close($link);   // close the connection 
             
            
            ?>
        </div>

        <div class="col-sm-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

    </div>   
    </div>


</body>
</html>