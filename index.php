<?php

    $showAlert = false;
    $logedIn = false;
    $showError = false;


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $signUp = $_POST['signupConfPass'] ?? 0;
        if ($signUp != 0) {

            $email = $_POST["signupEmail"];
            $passwd = htmlspecialchars($_POST["signupPass"]);
            $cnrfPasswd = htmlspecialchars($_POST["signupConfPass"]);
            
            $mailExistsQuery = "SELECT * FROM `users` WHERE userEmail = '$email';";
            
            include 'partials/php/_dbconnect.php';
            $mailExists = mysqli_query($connectionquery, $mailExistsQuery);    
            $mailExistsResult = mysqli_fetch_assoc($mailExists);

            if( $mailExistsResult > 0){
                $showError = "Email Id is already Registered..! Please use another Email Id.";
            }elseif ($passwd != $cnrfPasswd) {
                $showError = "Confirm Password did not matched..!.";
            }
            else{
                $passwordHash = password_hash($passwd, PASSWORD_DEFAULT);
                $addUserSqlQuery = "INSERT INTO `users` ( `userEmail`, `password`) 
                                    VALUES ('$email', '$passwordHash')";
                $result = mysqli_query($connectionquery, $addUserSqlQuery);
                if ($result){
                    $showAlert = "Account sucessfully registered, kindly login..!";
                }
                else{
                    $showError = "Some error occurred. Please try again.";
                }
            }
    
        } else if ($_POST['lgPassword']){

            $logInId = htmlspecialchars($_POST['lgEmail']);  
            $logInPassword = htmlspecialchars($_POST['lgPassword']); 
    
            include 'partials/php/_dbconnect.php';
            $isLogInIdValidQuery = "SELECT * FROM `users` WHERE userEmail = '$logInId';";
            $logInIdValidResult = mysqli_query($connectionquery, $isLogInIdValidQuery);
            $isValidId = mysqli_num_rows($logInIdValidResult);
    
            if ( $isValidId == 1 ){
                $resultRow = mysqli_fetch_assoc($logInIdValidResult);
                if ( password_verify($logInPassword, $resultRow['password'] ) ) {
                    $logedIn = true;
                    session_start();
                    $_SESSION['loggedin'] = true ;
                    $_SESSION['useremail'] = $resultRow['userEmail'];
                    $_SESSION['userid'] = $resultRow['userId'];
                    $showAlert = "You have sucessufully Log In..! Click start to begin";
                }
                else {
                    $error = "Incorrect Login Id or Password..!" ;
                }
            }
            else {
                $error = "Invalid Log in Id..!";
            }
        }
    }    
?>

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
    <link rel="stylesheet" href="partials/css/style-form.css">
    <link rel="stylesheet" href="partials/css/responsive-form.css">
    <link rel="stylesheet" href="partials/css/pattern.min.css" rel="stylesheet">
    <link rel="stylesheet" href="partials/css/pattern.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script>

    <script src="partials/js/form-buttons.js"></script>
    <script src="partials/js/form-validations.js"></script>
</head>
<!-- body -->

<body class="main-layout pattern-zigzag-xl">
    <?php
        if($showAlert){
            echo '<div class="alert alert-warning fade show alerts" role="alert">
                    <span>'. $showAlert .'</span>
                    <button type="button" class="close" aria-label="Close" onclick="closeAlert()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
        if($showError){
            echo '<div class="alert alert-danger fade show alerts" role="alert">
                    <span>'. $showError .'</span>
                    <button type="button" class="close" aria-label="Close" onclick="closeAlert()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>    
    <div class="wrapper">
        <!-- end loader -->
        <div id="content">
            <!-- main -->
            <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
                <div class="carousel-inner display-main web">
                    <div class="text-bg">
                        <h2>Know about your intrest..</h2>
                        <h1 class="underlined underline-clip">Career Help</h1>
                        <p>Student Career and Personality Prediction</p>
                        <div class="button">
                        <?php
                            if($logedIn){
                                echo '<a class="read_more lg-btn mx-4" href="formConfirm.php" >Start</a>';
                            }
                            else{
                                echo '<a class="read_more lg-btn mx-4 " onclick="openLgForm()">Log In</a>
                                <a class="read_more su-btn mx-4 " onclick="openSuForm()">Sign Up</a>';
                            }
                        ?>    
                        </div>
                    </div>
                    <div class="carousel-item active web">
                        <form class="lg-form" action="" method="post">
                            <div class="form-group">
                              <h3 class="frm-label" for="exampleInputEmail1">Email address</h3>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="lgEmail" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                              <h3 class="frm-label" for="exampleInputPassword1">Password</h3>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="lgPassword" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary mb-5 px-5" value="login">Log In</button>
                        </form>

                        <form class="su-form" action="" method="post">
                            <div class="form-group">
                              <h3 class="frm-label" for="exampleInputEmail1">Email address</h3>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="signupEmail" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                              <h3 class="frm-label" for="exampleInputPassword1">Password</h3>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="signupPass" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <h3 class="frm-label" for="exampleInputPassword1">Confirm Password</h3>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="signupConfPass" placeholder="Password">
                              </div>  
                            <button type="submit" class="btn btn-primary mb-5 px-5" value="signup">Sign Up</button>
                        </form>

                        <div class="images_box">
                            <figure><img src="partials//images/PngItem_2159159.png"></figure>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- card cointainer -->
            <div id="myCarousel" class="carousel slide banner_main card-wrapper" data-ride="carousel">
                <div class="carousel-inner display-main web height-max-available">
                    <div class="cards">
                        <img class="card-img-top" src="partials/images/icons/4285603.png" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">Quick Test</h2>
                            <h5 class="card-text">Quick and easy test of only 17 question, with easily ansawerable
                                options.</>
                        </div>
                    </div>
                    <div class="cards">
                        <img class="card-img-top" src="partials/images/icons/4729423.png" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">97% Accuracy</h2>
                            <h5 class="card-text">Prediction made with 97% of accuracy trained Machine Learning model.
                                </>
                        </div>
                    </div>
                    <div class="cards">
                        <img class="card-img-top" src="partials/images/icons/folder.png" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">Save Record</h2>
                            <h5 class="card-text">Save your assignment, to know previous choices and predictions.</>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card cointainer -->

            <hr>

            <!-- carrer options -->
            <h2>CARRER OPTIONS</h2>
            <hr>
            <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
                <div class="card-cointainer">
                    <div class="card-columns">

                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">AI ML Specialist</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/aiml.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    An AI ML Specialist is an expert in artificial intelligence and machine learning technologies. They design and develop
                                     algorithms to analyze and learn from large datasets, and use this knowledge to solve complex problems in various industries.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.betterteam.com/machine-learning-engineer-job-description">Read More</a></div>
                                </div>
                            </div>
                        
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 bg-light">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">API Integration Specialist</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/api.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    An API Integration Specialist is a professional who specializes in integrating different software systems using application programming interfaces 
                                    (APIs). They work to connect different software applications, allowing them to share data and communicate with each other seamlessly.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://jobs.smartrecruiters.com/ISAACInstruments/743999731581955-api-integration-specialist">Read More</a></div>
                                </div>
                            </div>
                        
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Application Support Engineer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/ase.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    An Application Support Engineer is a professional who helps organizations maintain and troubleshoot their software applications. 
                                    They are responsible for ensuring that the applications are running smoothly, and that any issues are resolved quickly and efficiently.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.techtarget.com/whatis/definition/application-support-engineer-ASE">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 ">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Business Analyst</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/ba.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A Business Analyst is a professional who helps organizations improve their business processes and systems. 
                                    They analyze data and information to identify areas for improvement, and work with stakeholders to develop and implement solutions.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://targetjobs.co.uk/careers-advice/job-descriptions/business-analyst-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 ">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Customer Service Executive </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/cse.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A Customer Service Executive is a professional who interacts with customers to provide information and assistance with products and services. 
                                    They handle customer inquiries, complaints, and requests, and work to ensure that customers have a positive experience with the company.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.betterteam.com/customer-support-executive-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 bg-light">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Cyber Security Specialist</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/csa.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A Cyber Security Specialist is a professional who specializes in protecting computer networks, 
                                    systems, and data from cyber threats such as hacking, malware, and phishing attacks.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://resources.workable.com/cyber-security-specialist-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Data Scientist</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/ds.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A Data Scientist is a professional who uses statistical, computational, and machine learning techniques to extract insights and knowledge from data.
                                    They design and implement analytical models and algorithms to analyze large, complex data sets and identify patterns, trends, and correlations that can be used to drive business decisions.
                                    They work with data visualization tools to communicate findings to stakeholders, such as executives or customers, in a clear and concise manner.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.simplilearn.com/data-scientist-job-description-article">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 ">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Database Administrator</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/da.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A Database Administrator (DBA) is a professional responsible for managing the performance, security, and availability of databases used by organizations to store and retrieve data.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.prospects.ac.uk/job-profiles/database-administrator">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Graphics Designer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/gd.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A graphics designer is a professional who creates visual concepts and designs using various software tools. 
                                    They use their creativity and technical skills to design logos, brochures, websites, and other marketing materials. 
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://resources.workable.com/graphic-designer-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 bg-light">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Hardware Engineer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/hd.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A hardware engineer is a professional who designs and develops computer hardware, such as circuit boards, processors, and memory systems. They work with computer 
                                    scientists and software engineers to ensure that hardware and software are compatible and work together seamlessly.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.betterteam.com/computer-hardware-engineer-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Helpdesk Engineer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/he.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A helpdesk engineer is a professional who provides technical support and assistance to users who are experiencing issues with their computer 
                                    hardware, software, or other technology devices. They work in a customer service role, answering phone calls, emails, and chats from users and 
                                    helping them to troubleshoot their issues. They use remote access software to access users' computers and devices to diagnose and resolve problems.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://hiring.monster.com/resources/job-descriptions/computer/technical-support-representative-entry-level/">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 ">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Information Security Specialist</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/ids.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    An information security specialist is a professional who is responsible for protecting an organization's digital assets from unauthorized access, theft, or destruction. They assess 
                                    and analyze the organization's security risks and develop security protocols and procedures to mitigate those risks. They implement firewalls, encryption systems, and other security 
                                    measures to protect against cyberattacks and other security threats.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.mightyrecruiter.com/job-descriptions/information-security-specialist/">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Networking Engineer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/ne.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A networking engineer is a professional who designs, implements, and maintains computer networks for organizations. 
                                    They are responsible for configuring routers, switches, firewalls, and other network hardware to ensure that data 
                                    flows smoothly and securely across the network.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://resources.workable.com/network-engineer-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 ">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Project Manager</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/pm.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A project manager is a professional who is responsible for leading a team to successfully complete a project within the given constraints of time, budget, and 
                                    scope. They work closely with stakeholders to define the project's goals, objectives, and requirements. They create a project plan and develop a 
                                    project schedule, budget, and resource plan. They also allocate tasks and responsibilities to team members, monitor progress, and provide regular 
                                    status updates to stakeholders.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.simplilearn.com/project-manager-job-description-article">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->
                        
                        <!-- card-->
                        <div class="card border-0">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Software Developer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/se.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A software developer is a professional who designs, develops, tests, and maintains software applications. They work with a team of programmers, 
                                    engineers, and designers to create software that meets the needs of clients or end-users. They use programming languages such as Java, Python, C++, 
                                    and others to write code that is efficient, maintainable, and easy to understand. 
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.roberthalf.com.au/employers/it-technology/software-developer-jobs">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 bg-light">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Software Tester</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/st.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A software tester is a professional who is responsible for ensuring that software applications are free from defects and meet the required quality standards. They work with a team of developers, 
                                    designers, and project managers to identify potential issues and ensure that the software functions as expected. 
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.betterteam.com/software-tester-job-description">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <!-- card-->
                        <div class="card border-0 ">
                            <div class="position-relative text-white">
                                <div class="--card-smooth-caption">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="m-auto">
                                            <h3 class="card-title text-dark mt-4">Technical Writer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carrer-img-wrapper">
                                <img class="carrer-img" src="partials/images/illutrations/tw.png" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-text"> 
                                    A technical writer is a professional who creates written materials that communicate complex technical information 
                                    to various audiences. They work with subject matter experts to gather information and then write technical documents 
                                    such as user manuals, training guides, standard operating procedures, and technical reports. They also develop 
                                    instructional materials such as videos, diagrams, and online help systems.
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="media align-items-center">
                                    <div class="media-body"><a class="card-link text-primary read-more" target="_blank" href="https://www.shrm.org/resourcesandtools/tools-and-samples/job-descriptions/pages/technical-writer.aspx">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                    </div>
                </div>
            </div>
            <!-- end carrer options -->

            <!-- end main -->
        </div>
    </div>
    <div class="overlay"></div>
</body>
<!-- body-end-->

</html>