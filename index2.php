<!DOCTYPE html>

<?php
$host = 'localhost';
$user = 'id171775_root';
$password = 'teach';
$db ='id171775_tla';

    $connection = mysqli_connect($host,$user,$password,$db);// you can select db separately as you did already
      if($connection){
           // do all your stuff that you want
           $chkArr = isset($_POST['teaching_area_id']) ? $_POST['teaching_area_id'] : array();
           $chkArr2 = isset($_POST['grade_level_id']) ? $_POST['grade_level_id'] : array();
           if(isset($_POST['teaching_area_id']) && isset($_POST['grade_level_id'])){
             $chkArrCSV = implode(',',$chkArr);
             $chkArrCSV2 = implode(',',$chkArr2);
             $query = mysqli_query($connection, "SELECT joblisting_employees.id eid, fname, lname, email, linkedin, teaching_area_id, grade_level_id, citizenship, years_of_experience_teaching, university_college_name, field_of_study, teaching_certification
                 FROM joblisting_employees
                 INNER JOIN joblisting_candidate_teaching_areas ON joblisting_employees.id = joblisting_candidate_teaching_areas.candidate_id
                 INNER JOIN joblisting_candidate_grade_level ON joblisting_employees.id = joblisting_candidate_grade_level.candidate_id
                 INNER JOIN joblisting_candidate_attended_universities ON joblisting_employees.id = joblisting_candidate_attended_universities.candidate_id
                 WHERE joblisting_candidate_teaching_areas.teaching_area_id in (".$chkArrCSV .") and joblisting_candidate_grade_level.grade_level_id in (".$chkArrCSV2 .")
                 GROUP BY email
                 ");

       }


      }else{
         echo "db connection error because of".mysqli_connect_error();
      }

    ?>

      <html lang="en-us">
      <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>

        <!--Let browser know website is optimized for mobile-->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" />
        <meta name="description" content="Liquid Slider : The Last Responsive Content Slider You'll Ever Need" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- Optionally use Animate.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
        <link rel="stylesheet" href="./css/liquid-slider.css">

        <title>Candidate Match</title>
      </head>
      <body class="no-js green lighten-5">
        <div class="navbar-fixed">
          <nav class="green darken-3">
            <div class="container">
              <div class="nav-wrapper">
                <a href="#" class="brand-logo center"><img src="./images/tla-logo.png"></a>
              </div>
            </div>
          </nav>
        </div>

        <main>
        <div class="container">
            <div class="row">
              <div class="section">
                <div class="col 8 offset-s2">
                    <div id="main-slider" class="liquid-slider " >
                        <?php
                         if(isset($_POST['teaching_area_id']) && isset($_POST['grade_level_id'])){
                            while ($row = $query->fetch_assoc()){
                            $group_arr[] = $row;
                            $ibMet = 0;
                            $experienceMet = 0;
                            $certifiedMet = 0;
                            $matchVal = "0%";

                            if(preg_match("/[23456789]|1[0123456789]/",$row["years_of_experience_teaching"])){
                                 $experienceMet = 1;
                            }

                            if(!(preg_match("/^[Nn][oO]/",$row["teaching_certification"]))){
                                 $certifiedMet = 1;
                            }


                            if(isset($_POST['ib'])&& isset($_POST['certified'])&& isset($_POST['experience'])){
                                 if($certifiedMet == 1 && $experienceMet ==1){
                                     $matchVal = rand(88, 99) . "%";
                                    }
                                    elseif($certifiedMet == 1 || $experienceMet ==1) {
                                          $matchVal = rand(70, 82) . "%";
                                    }
                                    else{
                                         $matchVal = rand(38, 48) . "%";
                                    }
                            }
                            elseif(isset($_POST['ib'])&& isset($_POST['certified'])){
                                 if($certifiedMet == 1){
                                     $matchVal = rand(85, 98) . "%";
                                    }
                                    else {
                                          $matchVal = rand(50, 73) . "%";
                                    }
                            }
                            elseif(isset($_POST['ib'])&& isset($_POST['experience'])){
                                 if($experienceMet == 1){
                                    $matchVal = rand(85, 98) . "%";
                                    }
                                    else {
                                         $matchVal = rand(50, 73) . "%";
                                    }

                            }
                            elseif(isset($_POST['certified'])&& isset($_POST['experience'])){
                                 if($certifiedMet == 1 && $experienceMet ==1){
                                    $matchVal = rand(88, 99) . "%";
                                   }
                                   elseif($certifiedMet == 1 || $experienceMet ==1) {
                                         $matchVal = rand(60, 72) . "%";
                                   }
                                   else{
                                       $matchVal = rand(38, 48) . "%";
                                   }

                            }
                            elseif(isset($_POST['ib'])){
                                 $matchVal = rand(82, 98) . "%";
                            }
                            elseif(isset($_POST['certified'])){
                                 if($certifiedMet == 1){
                                      $matchVal = rand(85, 98) . "%";
                                 }
                                 else {
                                      $matchVal = rand(40, 63) . "%";
                                 }

                            }
                            elseif(isset($_POST['experience'])){
                                 if($experienceMet == 1){
                                     $matchVal = rand(85, 98) . "%";
                                 }
                                 else {
                                     $matchVal = rand(40, 63) . "%";
                                 }

                            }


                            $query2 = mysqli_query($connection, "SELECT teaching_area_id
                               FROM joblisting_candidate_teaching_areas
                               WHERE candidate_id =" . $row["eid"]."");

                               while( $row2 = $query2->fetch_assoc()){
                                   $new_array[] = $row2; // Inside while loop
                               }


                            //this is where div is created
                            //fname, lname, email, linkedin, teaching_area_id, grade_level_id, citizenship, years_of_experience_teaching, university_college_name, field_of_study, teaching_certification
                            $row["match"] = $matchVal;
                            echo '<div> <h2 class="title">'. $row["fname"] . ' ' . $row["lname"] . '</h2>';

                            foreach($new_array as $array)
                            {
                                 echo "<p>Teaching area: " . $array['teaching_area_id']. "</p>";
                            }
                            echo' <p>Email: '. $row["email"]. '</p>'.  '<p>Citizenship: '. $row["citizenship"]. '</p>'.  '<p>Years of experience teaching: '. $row["years_of_experience_teaching"]. '</p><p>Higher educaion : '. $row["field_of_study"] . ' at '. $row["university_college_name"]. '</p>Teaching certifications: '.$row["teaching_certification"]  .'</p><p>Match percentage: '.$row["match"]. '</p></div>';

                            unset($new_array);
                            $new_array = array();

                          }
                         }
                         ?>
                    </div>
                </div>
              </div>


                <div class="section">
                  <div class="col s8 offset-s2">
                  <form name="myForm" action="index2.php" method="post" class="card-panel">
                      <div class="row">
              					<div class="input-field col s12">
              						<select name="teaching_area_id[]"  multiple="multiple">
              							<option value="" disabled selected>Choose subjects</option>
              							<option value="1" >Activities Coordinator</option>
              							<option value="2" >AP</option>
              							<option value="3">Art</option>
              							<option value="4">Assistant Principal</option>
              							<option value="5">Biology</option>
              							<option value="6">Business</option>
              							<option value="7">Chemistry</option>
              							<option value="8">Classroom Teacher</option>
              							<option value="9">Counselor/Psychologist</option>
              							<option value="10">Curriculum Coordinator</option>
              							<option value="11">Department Head</option>
              							<option value="12">Drama</option>
              							<option value="13">Economics/Business</option>
              							<option value="14">English Language Arts</option>
              							<option value="15">ESL/EFL</option>
              							<option value="16">Foreign/Modern Languages</option>
              							<option value="17">Geography</option>
              							<option value="18">History</option>
              							<option value="19">IB DP</option>
              							<option value="20">IB MYP</option>
              							<option value="21">IB PYP</option>
              							<option value="22">IGCSE</option>
              							<option value="23">Info Tech/Computers</option>
              							<option value="24">Interns</option>
              							<option value="25">Library</option>
              							<option value="26">Library</option>
              							<option value="27">Maths</option>
              							<option value="28">Music</option>
              							<option value="29">Nurse</option>
              							<option value="30">Physical Education</option>
              							<option value="31">Physics</option>
              							<option value="32">Principal</option>
              							<option value="33">Psychology</option>
              							<option value="34">Science</option>
              							<option value="35">Social Science</option>
              							<option value="36">Sociology/Psychology</option>
              							<option value="37">Special Education/Resources</option>
              							<option value="38">Theory of Knowledge</option>
              						</select>
              						<label>Please select the positions you are trying to fill.</label>
              					</div>
                      </div>

                      <div class="row">
              					<div class="input-field col s12">
              						<select  name="grade_level_id[]"  multiple="multiple">
              							<option value="" disabled selected>Choose grade levels</option>
              							<option value="1">Pre-School</option>
              							<option value="2">Primary School</option>
              							<option value="3">Middle School</option>
              							<option value="4">Secondary School</option>
              							<option value="5">Tertiary School</option>
              						</select>
              						<label>Please select the grade levels you would like your candidate to teach.</label>
              					</div>
                      </div>


                      <div class="row">
                        <div class="col s12">
                          <p>
                            <input name="ib[]" type="checkbox" id="ib" />
                            <label for="ib">IB Teacher</label>
                          </p>
              					</div>
                      </div>

                      <div class="row">
                          <div class="col s12">
                            <p>
                              <input name="experience[]" type="checkbox" id="exp" />
                              <label for="exp">More than two years of experience</label>
                            </p>
                					</div>
              				</div>


                      <div class="row">
                        <div class="col s12">
                          <p>
                            <input name="certified[]" type="checkbox" id="cert" />
                            <label for="cert">Certified</label>
                          </p>
                        </div>
                      </div>


                  </form>
                  <button class="btn waves-effect waves-light col s6 offset-s3" type="submit" value="Submit" name="action">Search for Candidates</button>
                </div>
              </div>
      		</div>
      </div>
    </main>



    <footer class="page-footer green darken-2">
        <div class="container">



            <div class="row">
            © 2016 Teacher Latin America
            <a class="grey-text text-lighten-4 right" href="#!">Made by MITR Group 7</a>
            </div>
        </div>
      </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
    <script src="./src/js/jquery.liquid-slider.js"></script>
    <script>
      /**
       * If you need to access the internal property or methods, use this:
       * var api = $.data( $('#main-slider')[0], 'liquidSlider');
       * console.log(api);
       */

      $('#main-slider').liquidSlider({
        dynamicTabs: false
      });



      $("#next").click(function() {
       $("#main-slider").focus();
      var e = jQuery.Event("keydown");
      e.which = 39; // # Some key code value
      $("#main-slider").trigger(e);
  });
  </script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>

  </footer>
  </body>
  </html>
