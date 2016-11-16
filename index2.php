<!DOCTYPE html>

<?php
$host = 'localhost';
$user = 'root';
$password = 'password';
$db ='tla';



  $connection = mysqli_connect($host,$user,$password,$db);// you can select db separately as you did already
    if($connection){
         // do all your stuff that you want
         $chkArr = isset($_POST['teaching_area_id']) ? $_POST['teaching_area_id'] : array();
         $chkArr2 = isset($_POST['grade_level_id']) ? $_POST['grade_level_id'] : array();
         if(isset($_POST['teaching_area_id']) && isset($_POST['grade_level_id'])){
           $chkArrCSV = implode(',',$chkArr);
           $chkArrCSV2 = implode(',',$chkArr2);
           $query = mysqli_query($connection, "SELECT fname, lname, email, linkedin, teaching_area_id, grade_level_id, citizenship, years_of_experience_teaching, university_college_name, field_of_study
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

      <title>Liquid Slider : The Last Responsive Content Slider You'll Ever Need</title>
    </head>
    <body class="no-js green lighten-4">
      <div class="container">



            <div id="main-slider" class="liquid-slider">
                <?php
                 if(isset($_POST['teaching_area_id']) && isset($_POST['grade_level_id'])){
                     while ($row = $query->fetch_assoc()){
                     $group_arr[] = $row;
                     echo '<div> <h2 class="title">'. $row["fname"] . ' ' . $row["lname"] . '</h2>'. implode('</p><p>', $row)  . '</div>';
                   }
                 }
                 ?>
            </div>

            <div class="row">
                         <form name="myForm" action="index2.php" method="post">
    					<div class="input-field col s8 offset-s2">
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

    					<div class="input-field col s8 offset-s2">
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
                          <button class="btn waves-effect waves-light col s4 offset-s4" type="submit" value="Submit" name="action">Search for Candidates</button>
                    </form>

    			</div>

            <div class="row">
      				<div class="col s8 offset-s2">
      					<div class="card-panel">
              </div>


            </div>
          </div>
        </div>






<footer>
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
