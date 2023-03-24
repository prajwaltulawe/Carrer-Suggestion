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
         <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
            
         <?php     
            session_start();
            if(isset($_SESSION['useremail']) && $_SESSION['loggedin'] = true ) {
               echo '
               <form class="col-xl-6 col-lg-6 col-md-10 col-sm-10 col-10" method="post" action="" runat="server">
                  <div class="section-collaborate" id="form-section-1">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Database Fundamentals</span>
                        <div class="options">
                           <input type="radio" id="sec-1-1" name="df" required="" value="1"><label for="sec-1-1">Not Intrested</label><br>
                           <input type="radio" id="sec-1-2" name="df" required="" value="2"><label for="sec-1-2">Poor</label><br>
                           <input type="radio" id="sec-1-3" name="df" required="" value="3"><label for="sec-1-3">Beginner</label><br>
                           <input type="radio" id="sec-1-4" name="df" required="" value="4"><label for="sec-1-4">Average</label><br>
                           <input type="radio" id="sec-1-5" name="df" required="" value="5"><label for="sec-1-5">Intermediate</label><br>
                           <input type="radio" id="sec-1-6" name="df" required="" value="6"><label for="sec-1-6">Excellent</label><br>
                           <input type="radio" id="sec-1-7" name="df" required="" value="7"><label for="sec-1-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-primary right" id="1" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-2">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Computer Architecture</span>
                        <div class="options">
                           <input type="radio" id="sec-2-1" name="ca" required="" value="1"><label for="sec-2-1">Not Intrested</label><br>
                           <input type="radio" id="sec-2-2" name="ca" required="" value="2"><label for="sec-2-2">Poor</label><br>
                           <input type="radio" id="sec-2-3" name="ca" required="" value="3"><label for="sec-2-3">Beginner</label><br>
                           <input type="radio" id="sec-2-4" name="ca" required="" value="4"><label for="sec-2-4">Average</label><br>
                           <input type="radio" id="sec-2-5" name="ca" required="" value="5"><label for="sec-2-5">Intermediate</label><br>
                           <input type="radio" id="sec-2-6" name="ca" required="" value="6"><label for="sec-2-6">Excellent</label><br>
                           <input type="radio" id="sec-2-7" name="ca" required="" value="7"><label for="sec-2-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="2" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="2" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-3">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Distributed Computing Systems</span>
                        <div class="options">
                           <input type="radio" id="sec-3-1" name="cs" required="" value="1"><label for="sec-3-1">Not Intrested</label><br>
                           <input type="radio" id="sec-3-2" name="cs" required="" value="2"><label for="sec-3-2">Poor</label><br>
                           <input type="radio" id="sec-3-3" name="cs" required="" value="3"><label for="sec-3-3">Beginner</label><br>
                           <input type="radio" id="sec-3-4" name="cs" required="" value="4"><label for="sec-3-4">Average</label><br>
                           <input type="radio" id="sec-3-5" name="cs" required="" value="5"><label for="sec-3-5">Intermediate</label><br>
                           <input type="radio" id="sec-3-6" name="cs" required="" value="6"><label for="sec-3-6">Excellent</label><br>
                           <input type="radio" id="sec-3-7" name="cs" required="" value="7"><label for="sec-3-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="3" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="3" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-4">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Cyber Security</span>
                        <div class="options">
                           <input type="radio" id="sec-4-1" name="cybrsec" required="" value="1"><label for="sec-4-1">Not Intrested</label><br>
                           <input type="radio" id="sec-4-2" name="cybrsec" required="" value="2"><label for="sec-4-2">Poor</label><br>
                           <input type="radio" id="sec-4-3" name="cybrsec" required="" value="3"><label for="sec-4-3">Beginner</label><br>
                           <input type="radio" id="sec-4-4" name="cybrsec" required="" value="4"><label for="sec-4-4">Average</label><br>
                           <input type="radio" id="sec-4-5" name="cybrsec" required="" value="5"><label for="sec-4-5">Intermediate</label><br>
                           <input type="radio" id="sec-4-6" name="cybrsec" required="" value="6"><label for="sec-4-6">Excellent</label><br>
                           <input type="radio" id="sec-4-7" name="cybrsec" required="" value="7"><label for="sec-4-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="4" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="4" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-5">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Networking</span>
                        <div class="options">
                           <input type="radio" id="sec-5-1" name="net" required="" value="1"><label for="sec-5-1">Not Intrested</label><br>
                           <input type="radio" id="sec-5-2" name="net" required="" value="2"><label for="sec-5-2">Poor</label><br>
                           <input type="radio" id="sec-5-3" name="net" required="" value="3"><label for="sec-5-3">Beginner</label><br>
                           <input type="radio" id="sec-5-4" name="net" required="" value="4"><label for="sec-5-4">Average</label><br>
                           <input type="radio" id="sec-5-5" name="net" required="" value="5"><label for="sec-5-5">Intermediate</label><br>
                           <input type="radio" id="sec-5-6" name="net" required="" value="6"><label for="sec-5-6">Excellent</label><br>
                           <input type="radio" id="sec-5-7" name="net" required="" value="7"><label for="sec-5-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="5" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="5" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-6">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Software Development</span>
                        <div class="options">
                           <input type="radio" id="sec-6-1" name="sd" required="" value="1"><label for="sec-6-1">Not Intrested</label><br>
                           <input type="radio" id="sec-6-2" name="sd" required="" value="2"><label for="sec-6-2">Poor</label><br>
                           <input type="radio" id="sec-6-3" name="sd" required="" value="3"><label for="sec-6-3">Beginner</label><br>
                           <input type="radio" id="sec-6-4" name="sd" required="" value="4"><label for="sec-6-4">Average</label><br>
                           <input type="radio" id="sec-6-5" name="sd" required="" value="5"><label for="sec-6-5">Intermediate</label><br>
                           <input type="radio" id="sec-6-6" name="sd" required="" value="6"><label for="sec-6-6">Excellent</label><br>
                           <input type="radio" id="sec-6-7" name="sd" required="" value="7"><label for="sec-6-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="6" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="6" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-7">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Programming Skills</span>
                        <div class="options">
                           <input type="radio" id="sec-7-1" name="ps" required="" value="1"><label for="sec-7-1">Not Intrested</label><br>
                           <input type="radio" id="sec-7-2" name="ps" required="" value="2"><label for="sec-7-2">Poor</label><br>
                           <input type="radio" id="sec-7-3" name="ps" required="" value="3"><label for="sec-7-3">Beginner</label><br>
                           <input type="radio" id="sec-7-4" name="ps" required="" value="4"><label for="sec-7-4">Average</label><br>
                           <input type="radio" id="sec-7-5" name="ps" required="" value="5"><label for="sec-7-5">Intermediate</label><br>
                           <input type="radio" id="sec-7-6" name="ps" required="" value="6"><label for="sec-7-6">Excellent</label><br>
                           <input type="radio" id="sec-7-7" name="ps" required="" value="7"><label for="sec-7-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="7" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="7" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-8">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Project Management</span>
                        <div class="options">
                           <input type="radio" id="sec-8-1" name="pm" required="" value="1"><label for="sec-8-1">Not Intrested</label><br>
                           <input type="radio" id="sec-8-2" name="pm" required="" value="2"><label for="sec-8-2">Poor</label><br>
                           <input type="radio" id="sec-8-3" name="pm" required="" value="3"><label for="sec-8-3">Beginner</label><br>
                           <input type="radio" id="sec-8-4" name="pm" required="" value="4"><label for="sec-8-4">Average</label><br>
                           <input type="radio" id="sec-8-5" name="pm" required="" value="5"><label for="sec-8-5">Intermediate</label><br>
                           <input type="radio" id="sec-8-6" name="pm" required="" value="6"><label for="sec-8-6">Excellent</label><br>
                           <input type="radio" id="sec-8-7" name="pm" required="" value="7"><label for="sec-8-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="8" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="8" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-9">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Computer Forensics Fundamentals</span>
                        <div class="options">
                           <input type="radio" id="sec-9-1" name="cff" required="" value="1"><label for="sec-9-1">Not Intrested</label><br>
                           <input type="radio" id="sec-9-2" name="cff" required="" value="2"><label for="sec-9-2">Poor</label><br>
                           <input type="radio" id="sec-9-3" name="cff" required="" value="3"><label for="sec-9-3">Beginner</label><br>
                           <input type="radio" id="sec-9-4" name="cff" required="" value="4"><label for="sec-9-4">Average</label><br>
                           <input type="radio" id="sec-9-5" name="cff" required="" value="5"><label for="sec-9-5">Intermediate</label><br>
                           <input type="radio" id="sec-9-6" name="cff" required="" value="6"><label for="sec-9-6">Excellent</label><br>
                           <input type="radio" id="sec-9-7" name="cff" required="" value="7"><label for="sec-9-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="9" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="9" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-10">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Technical Communication</span>
                        <div class="options">
                           <input type="radio" id="sec-10-1" name="tc" required="" value="1"><label for="sec-10-1">Not Intrested</label><br>
                           <input type="radio" id="sec-10-2" name="tc" required="" value="2"><label for="sec-10-2">Poor</label><br>
                           <input type="radio" id="sec-10-3" name="tc" required="" value="3"><label for="sec-10-3">Beginner</label><br>
                           <input type="radio" id="sec-10-4" name="tc" required="" value="4"><label for="sec-10-4">Average</label><br>
                           <input type="radio" id="sec-10-5" name="tc" required="" value="5"><label for="sec-10-5">Intermediate</label><br>
                           <input type="radio" id="sec-10-6" name="tc" required="" value="6"><label for="sec-10-6">Excellent</label><br>
                           <input type="radio" id="sec-10-7" name="tc" required="" value="7"><label for="sec-10-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="10" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="10" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-11">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in AI ML</span>
                        <div class="options">
                           <input type="radio" id="sec-11-1" name="aiml" required="" value="1"><label for="sec-11-1">Not Intrested</label><br>
                           <input type="radio" id="sec-11-2" name="aiml" required="" value="2"><label for="sec-11-2">Poor</label><br>
                           <input type="radio" id="sec-11-3" name="aiml" required="" value="3"><label for="sec-11-3">Beginner</label><br>
                           <input type="radio" id="sec-11-4" name="aiml" required="" value="4"><label for="sec-11-4">Average</label><br>
                           <input type="radio" id="sec-11-5" name="aiml" required="" value="5"><label for="sec-11-5">Intermediate</label><br>
                           <input type="radio" id="sec-11-6" name="aiml" required="" value="6"><label for="sec-11-6">Excellent</label><br>
                           <input type="radio" id="sec-11-7" name="aiml" required="" value="7"><label for="sec-11-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="11" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="11" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-12">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Software Engineering</span>
                        <div class="options">
                           <input type="radio" id="sec-12-1" name="se" required="" value="1"><label for="sec-12-1">Not Intrested</label><br>
                           <input type="radio" id="sec-12-2" name="se" required="" value="2"><label for="sec-12-2">Poor</label><br>
                           <input type="radio" id="sec-12-3" name="se" required="" value="3"><label for="sec-12-3">Beginner</label><br>
                           <input type="radio" id="sec-12-4" name="se" required="" value="4"><label for="sec-12-4">Average</label><br>
                           <input type="radio" id="sec-12-5" name="se" required="" value="5"><label for="sec-12-5">Intermediate</label><br>
                           <input type="radio" id="sec-12-6" name="se" required="" value="6"><label for="sec-12-6">Excellent</label><br>
                           <input type="radio" id="sec-12-7" name="se" required="" value="7"><label for="sec-12-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="12" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="12" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-13">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Business Analysis</span>
                        <div class="options">
                           <input type="radio" id="sec-13-1" name="ba" required="" value="1"><label for="sec-13-1">Not Intrested</label><br>
                           <input type="radio" id="sec-13-2" name="ba" required="" value="2"><label for="sec-13-2">Poor</label><br>
                           <input type="radio" id="sec-13-3" name="ba" required="" value="3"><label for="sec-13-3">Beginner</label><br>
                           <input type="radio" id="sec-13-4" name="ba" required="" value="4"><label for="sec-13-4">Average</label><br>
                           <input type="radio" id="sec-13-5" name="ba" required="" value="5"><label for="sec-13-5">Intermediate</label><br>
                           <input type="radio" id="sec-13-6" name="ba" required="" value="6"><label for="sec-13-6">Excellent</label><br>
                           <input type="radio" id="sec-13-7" name="ba" required="" value="7"><label for="sec-13-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="13" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="13" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-14">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Communication skills</span>
                        <div class="options">
                           <input type="radio" id="sec-14-1" name="comski" required="" value="1"><label for="sec-14-1">Not Intrested</label><br>
                           <input type="radio" id="sec-14-2" name="comski" required="" value="2"><label for="sec-14-2">Poor</label><br>
                           <input type="radio" id="sec-14-3" name="comski" required="" value="3"><label for="sec-14-3">Beginner</label><br>
                           <input type="radio" id="sec-14-4" name="comski" required="" value="4"><label for="sec-14-4">Average</label><br>
                           <input type="radio" id="sec-14-5" name="comski" required="" value="5"><label for="sec-14-5">Intermediate</label><br>
                           <input type="radio" id="sec-14-6" name="comski" required="" value="6"><label for="sec-14-6">Excellent</label><br>
                           <input type="radio" id="sec-14-7" name="comski" required="" value="7"><label for="sec-14-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="14" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="14" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-15">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Data Science</span>
                        <div class="options">
                           <input type="radio" id="sec-15-1" name="ds" required="" value="1"><label for="sec-15-1">Not Intrested</label><br>
                           <input type="radio" id="sec-15-2" name="ds" required="" value="2"><label for="sec-15-2">Poor</label><br>
                           <input type="radio" id="sec-15-3" name="ds" required="" value="3"><label for="sec-15-3">Beginner</label><br>
                           <input type="radio" id="sec-15-4" name="ds" required="" value="4"><label for="sec-15-4">Average</label><br>
                           <input type="radio" id="sec-15-5" name="ds" required="" value="5"><label for="sec-15-5">Intermediate</label><br>
                           <input type="radio" id="sec-15-6" name="ds" required="" value="6"><label for="sec-15-6">Excellent</label><br>
                           <input type="radio" id="sec-15-7" name="ds" required="" value="7"><label for="sec-15-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="15" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="15" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-16">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Troubleshooting skills</span>
                        <div class="options">
                           <input type="radio" id="sec-16-1" name="ts" required="" value="1"><label for="sec-16-1">Not Intrested</label><br>
                           <input type="radio" id="sec-16-2" name="ts" required="" value="2"><label for="sec-16-2">Poor</label><br>
                           <input type="radio" id="sec-16-3" name="ts" required="" value="3"><label for="sec-16-3">Beginner</label><br>
                           <input type="radio" id="sec-16-4" name="ts" required="" value="4"><label for="sec-16-4">Average</label><br>
                           <input type="radio" id="sec-16-5" name="ts" required="" value="5"><label for="sec-16-5">Intermediate</label><br>
                           <input type="radio" id="sec-16-6" name="ts" required="" value="6"><label for="sec-16-6">Excellent</label><br>
                           <input type="radio" id="sec-16-7" name="ts" required="" value="7"><label for="sec-16-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="16" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="16" type="button" onclick="return nextSection(this.id)">Next</button>
                     </div>
                  </div>

                  <div class="section-collaborate" id="form-section-17">
                     <div class="mb-3">
                        <h2 for="ideas-1" class="form-label mt-4">Assess Yourself </h2>
                        <span class="ques">Intrest in Graphics Designing</span>
                        <div class="options">
                           <input type="radio" id="sec-17-1" name="gd" required="" value="1"><label for="sec-17-1">Not Intrested</label><br>
                           <input type="radio" id="sec-17-2" name="gd" required="" value="2"><label for="sec-17-2">Poor</label><br>
                           <input type="radio" id="sec-17-3" name="gd" required="" value="3"><label for="sec-17-3">Beginner</label><br>
                           <input type="radio" id="sec-17-4" name="gd" required="" value="4"><label for="sec-17-4">Average</label><br>
                           <input type="radio" id="sec-17-5" name="gd" required="" value="5"><label for="sec-17-5">Intermediate</label><br>
                           <input type="radio" id="sec-17-6" name="gd" required="" value="6"><label for="sec-17-6">Excellent</label><br>
                           <input type="radio" id="sec-17-7" name="gd" required="" value="7"><label for="sec-17-7">Professional</label><br>
                        </div>
                     </div>
                     <div class="form-buttons">
                        <button class="btn btn-secondary left" id="17" type="button" onclick="return prevSection(this.id)">Previous</button>
                        <button class="btn btn-primary right" id="17" type="submit">Submit</button>
                     </div>
                  </div>

                  <div class="progress-bar">
                     <div class="pg-sec" id="pg-sec-1"></div>
                     <div class="pg-sec" id="pg-sec-2"></div>
                     <div class="pg-sec" id="pg-sec-3"></div>
                     <div class="pg-sec" id="pg-sec-4"></div>
                     <div class="pg-sec" id="pg-sec-5"></div>
                     <div class="pg-sec" id="pg-sec-6"></div>
                     <div class="pg-sec" id="pg-sec-7"></div>
                     <div class="pg-sec" id="pg-sec-8"></div>
                     <div class="pg-sec" id="pg-sec-9"></div>
                     <div class="pg-sec" id="pg-sec-10"></div>
                     <div class="pg-sec" id="pg-sec-11"></div>
                     <div class="pg-sec" id="pg-sec-12"></div>
                     <div class="pg-sec" id="pg-sec-13"></div>
                     <div class="pg-sec" id="pg-sec-14"></div>
                     <div class="pg-sec" id="pg-sec-15"></div>
                     <div class="pg-sec" id="pg-sec-16"></div>
                     <div class="pg-sec" id="pg-sec-17"></div>
                     <div class="pg-sec" id="pg-sec-18"></div>
                  </div>
               </form>
               <div class="result">
                  <span class="pred">Prediction </span>
                  <h2 id="result"></h2>
                  <div class="btns">
                     <button class="btn btn-primary right" type="button" onclick="exploreField()">Explore Field</button>
                     <button class="btn btn-secondary left" type="button" onclick="return backToForm()">Back to Form</button>
                     <button class="btn btn-success left" type="button" onclick="showColleges()">View Available Collages</button>
                  </div>
               </div>
               <span id="userId" class="hidden">'.$_SESSION["userid"].'</span>';
            }
            else { 
               header("location: index.php");
            }
         ?>
         </div>
         <!-- end main -->
      </div>
   </div>
   <div class="overlay"></div>
</body>
<!-- body-end-->

</html>
