<!DOCTYPE html>

<?php
<<<<<<< HEAD
$host = 'localhost';
$user = 'root';
$password = 'password';
$db ='tla';
=======
  $host = 'localhost';
  $user = 'id171775_root';
  $password = 'teach';
  $db ='id171775_tla';
>>>>>>> 861b25b0b7cade60accadfae5cb1f8a420b8a3a7



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
<<<<<<< HEAD
                         <form name="myForm" action="index2.php" method="post">
    					<div class="input-field col s8 offset-s2">
    						<select name="teaching_area_id[]"  multiple="multiple">
    							<option value="" disabled selected>Choose subjects</option>
    							<option value="1" >Activities Coordinator</option>
    							<option value="2" >AP</option>
=======

    					<div class="input-field col s8 offset-s2">
    						<select multiple>
    							<option value="" disabled selected>Choose subjects</option>
    							<option value="1">Activities Coordinator</option>
    							<option value="2">AP</option>
>>>>>>> 861b25b0b7cade60accadfae5cb1f8a420b8a3a7
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
<<<<<<< HEAD
    						<select  name="grade_level_id[]"  multiple="multiple">
=======
    						<select multiple>
>>>>>>> 861b25b0b7cade60accadfae5cb1f8a420b8a3a7
    							<option value="" disabled selected>Choose grade levels</option>
    							<option value="1">Pre-School</option>
    							<option value="2">Primary School</option>
    							<option value="3">Middle School</option>
    							<option value="4">Secondary School</option>
    							<option value="5">Tertiary School</option>
    						</select>
    						<label>Please select the grade levels you would like your candidate to teach.</label>
    					</div>
<<<<<<< HEAD
                          <button class="btn waves-effect waves-light col s4 offset-s4" type="submit" value="Submit" name="action">Search for Candidates</button>
                    </form>
=======
>>>>>>> 861b25b0b7cade60accadfae5cb1f8a420b8a3a7

    			</div>

            <div class="row">
      				<div class="col s8 offset-s2">
      					<div class="card-panel">
<<<<<<< HEAD
              </div>


=======
                  <form name="myForm" action="index2.php" method="post">
                    <table id="tbTeachingAreas" border="0" width="100%" cellpadding="3" cellspacing="3" class="jl-main-container">
                      <tbody>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_1" name="teaching_area_id[]" value="1">
                            <label class="title teachingAreaIDContainer pointer" lang="1">Activities Coordinator</label>
                          </td>

                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_38" name="teaching_area_id[]" value="38">
                            <label class="title teachingAreaIDContainer pointer" lang="38">AP</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_2" name="teaching_area_id[]" value="2">
                            <label class="title teachingAreaIDContainer pointer" lang="2">Art</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_3" name="teaching_area_id[]" value="3">
                            <label class="title teachingAreaIDContainer pointer" lang="3">Assistant Principal</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_4" name="teaching_area_id[]" value="4">
                            <label class="title teachingAreaIDContainer pointer" lang="4">Biology</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_5" name="teaching_area_id[]" value="5">
                            <label class="title teachingAreaIDContainer pointer" lang="5">Business</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_6" name="teaching_area_id[]" value="6">
                            <label class="title teachingAreaIDContainer pointer" lang="6">Chemistry</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_7" name="teaching_area_id[]" value="7">
                            <label class="title teachingAreaIDContainer pointer" lang="7">Classroom Teacher</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_8" name="teaching_area_id[]" value="8">
                            <label class="title teachingAreaIDContainer pointer" lang="8">Counselor/Psychologist</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_9" name="teaching_area_id[]" value="9">
                            <label class="title teachingAreaIDContainer pointer" lang="9">Curriculum coordinator</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_10" name="teaching_area_id[]" value="10">
                            <label class="title teachingAreaIDContainer pointer" lang="10">Department Head</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_11" name="teaching_area_id[]" value="11">
                            <label class="title teachingAreaIDContainer pointer" lang="11">Drama</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_12" name="teaching_area_id[]" value="12">
                            <label class="title teachingAreaIDContainer pointer" lang="12">Economics/Business</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_13" name="teaching_area_id[]" value="13">
                            <label class="title teachingAreaIDContainer pointer" lang="13">English language Arts</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_14" name="teaching_area_id[]" value="14">
                            <label class="title teachingAreaIDContainer pointer" lang="14">ESL/EFL</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_15" name="teaching_area_id[]" value="15">
                            <label class="title teachingAreaIDContainer pointer" lang="15">Foreign/Modern Languages</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_16" name="teaching_area_id[]" value="16">
                            <label class="title teachingAreaIDContainer pointer" lang="16">Geography</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_18" name="teaching_area_id[]" value="18">
                            <label class="title teachingAreaIDContainer pointer" lang="18">History</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_41" name="teaching_area_id[]" value="41">
                            <label class="title teachingAreaIDContainer pointer" lang="41">IB DP</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_40" name="teaching_area_id[]" value="40">
                            <label class="title teachingAreaIDContainer pointer" lang="40">IB MYP</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_39" name="teaching_area_id[]" value="39">
                            <label class="title teachingAreaIDContainer pointer" lang="39">IB PYP</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_42" name="teaching_area_id[]" value="42">
                            <label class="title teachingAreaIDContainer pointer" lang="42">IGCSE</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_19" name="teaching_area_id[]" value="19">
                            <label class="title teachingAreaIDContainer pointer" lang="19">Info Tech/Computers</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_20" name="teaching_area_id[]" value="20">
                            <label class="title teachingAreaIDContainer pointer" lang="20">Interns</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_21" name="teaching_area_id[]" value="21">
                            <label class="title teachingAreaIDContainer pointer" lang="21">Library</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_22" name="teaching_area_id[]" value="22">
                            <label class="title teachingAreaIDContainer pointer" lang="22">Maths</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_23" name="teaching_area_id[]" value="23">
                            <label class="title teachingAreaIDContainer pointer" lang="23">Music</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_24" name="teaching_area_id[]" value="24">
                            <label class="title teachingAreaIDContainer pointer" lang="24">Nurse</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_26" name="teaching_area_id[]" value="26">
                            <label class="title teachingAreaIDContainer pointer" lang="26">Physical Education</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_27" name="teaching_area_id[]" value="27">
                            <label class="title teachingAreaIDContainer pointer" lang="27">Physics</label>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_28" name="teaching_area_id[]" value="28">
                            <label class="title teachingAreaIDContainer pointer" lang="28">Principal</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_29" name="teaching_area_id[]" value="29">
                            <label class="title teachingAreaIDContainer pointer" lang="29">Psychology</label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_30" name="teaching_area_id[]" value="30">
                            <label class="title teachingAreaIDContainer pointer" lang="30">Science</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_31" name="teaching_area_id[]" value="31">
                            <label class="title teachingAreaIDContainer pointer" lang="31">Social Studies</label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_32" name="teaching_area_id[]" value="32">
                            <label class="title teachingAreaIDContainer pointer" lang="32">Sociology/Psychology</label>
                          </td>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_33" name="teaching_area_id[]" value="33">
                            <label class="title teachingAreaIDContainer pointer" lang="33">Special Education/Resources</label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_34" name="teaching_area_id[]" value="34">
                            <label class="title teachingAreaIDContainer pointer" lang="34">Theory of Knowledge</label>
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>


                    <br/><br/><br/>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <input class="pointer" type="checkbox" id="grade_level_id_1" name="grade_level_id[]" value="1">
                            <label class="title gradeLevelIDContainer pointer" lang="1">Pre-school</label>
                          </td>
                          <td>
                            <input class="pointer" type="checkbox" id="grade_level_id_2" name="grade_level_id[]" value="2">
                            <label class="title gradeLevelIDContainer pointer" lang="2">Primary School</label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input class="pointer" type="checkbox" id="grade_level_id_3" name="grade_level_id[]" value="3">
                            <label class="title gradeLevelIDContainer pointer" lang="3">Middle School</label>
                          </td>
                          <td>
                            <input class="pointer" type="checkbox" id="grade_level_id_4" name="grade_level_id[]" value="4">
                            <label class="title gradeLevelIDContainer pointer" lang="4">Secondary School</label>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input class="pointer" type="checkbox" id="grade_level_id_5" name="grade_level_id[]" value="5">
                            <label class="title gradeLevelIDContainer pointer" lang="5">Tertiary School</label>
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                      </tbody>
                  </table>
                  <button class="btn waves-effect waves-light col s4 offset-s4" type="submit" value="Submit" name="action">Search for Candidates</button>
                </form>
              </div>
>>>>>>> 861b25b0b7cade60accadfae5cb1f8a420b8a3a7
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
