<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>Career Prediction</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="partials/css/bootstrap.min.css">
        <link rel="stylesheet" href="partials/css/style.css">
        <link rel="stylesheet" href="partials/css/pattern.min.css" rel="stylesheet">
        <link rel="stylesheet" href="partials/css/style-form.css">
        <link rel="stylesheet" href="partials/css/responsive-form.css">
        <link rel="stylesheet" href="partials/css/pattern.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
  
        <script src="partials/js/form-buttons.js"></script>
        <script src="partials/js/form-validations.js"></script>
    </head>
    <!-- body -->
    <body class="main-layout pattern-zigzag-xl">
      <div class="wrapper">
         <!-- end loader -->
         <div id="content">
             <!-- main -->
             <?php
            session_start();
            if(isset($_SESSION['useremail']) && $_SESSION['loggedin'] = true ) {
             echo '
             <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
                <form class="col-xl-6 col-lg-6 col-md-10 col-sm-10 col-10" action="form.php" runat="server">';
                
                $userId = $_SESSION['userid'];
                include 'partials/php/_dbconnect.php';
               
                $isNewUserQ = "SELECT * FROM `userdata` WHERE userId = '$userId';";
                $isNewUserQResult = mysqli_query($connectionquery, $isNewUserQ);
                $isRecorded = mysqli_num_rows($isNewUserQResult);
                $record = mysqli_fetch_assoc($isNewUserQResult);

                $values = array("Not Intrested", "Poor", "Beginner", "Average", "Intermediate", "Excellent", "Professional");

                if ( $isRecorded == 1 ){
                    echo '<div class="result " style="display: flex;">
                            <span class="pred" style="text-align: center;">It seems you have already taken this test. </span>
                            <h2 id="result" class="mt-4">Previous record</h2>
                            <table>
                                    <tr>
                                        <th> <span class="pred" style="text-align: center;"> Intrest In </span></th>
                                        <th> <span class="pred" style="text-align: center;"> Response </span></th>
                                    </tr>
                                    <tr>
                                        <td> Database Fundamentals</td>
                                        <td>' . $values[$record["df"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Computer Architecture</td>
                                        <td>' . $values[$record["ca"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Distributed Computing Systems</td>
                                        <td>' . $values[$record["cs"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Cyber Security</td>
                                        <td>' . $values[$record["cybrsec"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Networking</td>
                                        <td>' . $values[$record["net"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Software Development</td>
                                        <td>' . $values[$record["sd"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Programming Skills</td>
                                        <td>' . $values[$record["ps"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Project Management</td>
                                        <td>' . $values[$record["pm"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Computer Forensics Fundamentals</td>
                                        <td>' . $values[$record["cff"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Technical Communication</td>
                                        <td>' . $values[$record["tc"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> AI ML</td>
                                        <td>' . $values[$record["aiml"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Software Engineering</td>
                                        <td>' . $values[$record["se"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Business Analysis</td>
                                        <td>' . $values[$record["ba"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Communication skills</td>
                                        <td>' . $values[$record["comski"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Data Science</td>
                                        <td>' . $values[$record["ds"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Troubleshooting skills</td>
                                        <td>' . $values[$record["ts"]-1]  . '</td>
                                    </tr>
                                    <tr>
                                        <td> Graphics Designing</td>
                                        <td>' . $values[$record["gd"]-1]  . '</td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2">
                                            <span class="pred">Prediction</span>
                                            <h2 id="result" class="mt-1">'. $record["result"].'</h2>
                                        </td>
                                    </tr> 
                            </table>

                            </div>
                            <div class="section-personal-details">
                            <div class="form-buttons">
                                <button class="btn btn-primary right" type="submit" >Retest</button>
                            </div>
                        </div>';
                }
                else{
                    echo '<div class="section-personal-details">
                            <h2 class="card-title">Lets complete a quick questionnaire, to know your choice.. &#128578;</h2>
                            <div class="form-buttons">
                            <button class="btn btn-primary right" type="submit" >Begin</button>
                            </div>
                        </div>';
                }
             echo '</form>
             </div>';
            }
            else{
               header("location: index.php");
            }
            ?>
             <!-- end main -->
         </div>
       </div>
        <div class="overlay"></div>
    </body>
    <!-- body-end-->
</html>