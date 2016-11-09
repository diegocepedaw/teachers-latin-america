<!DOCTYPE html>

  <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
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
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" />
  <meta name="description" content="Liquid Slider : The Last Responsive Content Slider You'll Ever Need" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Optionally use Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
  <link rel="stylesheet" href="./css/liquid-slider.css">

  <title>Teachers Latin America</title>
</head>
<body class="no-js">


  <div id="main-slider" class="liquid-slider">
      <?php
      //create slider divs from result of query
       if(isset($_POST['teaching_area_id']) && isset($_POST['grade_level_id'])){
           while ($row = $query->fetch_assoc()){
           $group_arr[] = $row;
           echo '<div> <h2 class="title">'. $row["fname"] . ' ' . $row["lname"] . '</h2>'. implode('</p><p>', $row)  . '</div>';
         }
       }
       ?>


  </div>
  <button id="next">next</button>

  <form name="myForm" action="index.php" method="post">
  <table id="tbTeachingAreas" border="0" width="100%" cellpadding="3" cellspacing="3" class="jl-main-container">		<tbody><tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_1" name="teaching_area_id[]" value="1">
  				<label class="title teachingAreaIDContainer pointer" lang="1">Activities Coordinator</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_38" name="teaching_area_id[]" value="38">
  				<label class="title teachingAreaIDContainer pointer" lang="38">AP</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_2" name="teaching_area_id[]" value="2">
  				<label class="title teachingAreaIDContainer pointer" lang="2">Art</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_3" name="teaching_area_id[]" value="3">
  				<label class="title teachingAreaIDContainer pointer" lang="3">Assistant Principal</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_4" name="teaching_area_id[]" value="4">
  				<label class="title teachingAreaIDContainer pointer" lang="4">Biology</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_5" name="teaching_area_id[]" value="5">
  				<label class="title teachingAreaIDContainer pointer" lang="5">Business</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_6" name="teaching_area_id[]" value="6">
  				<label class="title teachingAreaIDContainer pointer" lang="6">Chemistry</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_7" name="teaching_area_id[]" value="7">
  				<label class="title teachingAreaIDContainer pointer" lang="7">Classroom Teacher</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_8" name="teaching_area_id[]" value="8">
  				<label class="title teachingAreaIDContainer pointer" lang="8">Counselor/Psychologist</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_9" name="teaching_area_id[]" value="9">
  				<label class="title teachingAreaIDContainer pointer" lang="9">Curriculum coordinator</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_10" name="teaching_area_id[]" value="10">
  				<label class="title teachingAreaIDContainer pointer" lang="10">Department Head</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_11" name="teaching_area_id[]" value="11">
  				<label class="title teachingAreaIDContainer pointer" lang="11">Drama</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_12" name="teaching_area_id[]" value="12">
  				<label class="title teachingAreaIDContainer pointer" lang="12">Economics/Business</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_13" name="teaching_area_id[]" value="13">
  				<label class="title teachingAreaIDContainer pointer" lang="13">English language Arts</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_14" name="teaching_area_id[]" value="14">
  				<label class="title teachingAreaIDContainer pointer" lang="14">ESL/EFL</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_15" name="teaching_area_id[]" value="15">
  				<label class="title teachingAreaIDContainer pointer" lang="15">Foreign/Modern Languages</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_16" name="teaching_area_id[]" value="16">
  				<label class="title teachingAreaIDContainer pointer" lang="16">Geography</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_18" name="teaching_area_id[]" value="18">
  				<label class="title teachingAreaIDContainer pointer" lang="18">History</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_41" name="teaching_area_id[]" value="41">
  				<label class="title teachingAreaIDContainer pointer" lang="41">IB DP</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_40" name="teaching_area_id[]" value="40">
  				<label class="title teachingAreaIDContainer pointer" lang="40">IB MYP</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_39" name="teaching_area_id[]" value="39">
  				<label class="title teachingAreaIDContainer pointer" lang="39">IB PYP</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_42" name="teaching_area_id[]" value="42">
  				<label class="title teachingAreaIDContainer pointer" lang="42">IGCSE</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_19" name="teaching_area_id[]" value="19">
  				<label class="title teachingAreaIDContainer pointer" lang="19">Info Tech/Computers</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_20" name="teaching_area_id[]" value="20">
  				<label class="title teachingAreaIDContainer pointer" lang="20">Interns</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_21" name="teaching_area_id[]" value="21">
  				<label class="title teachingAreaIDContainer pointer" lang="21">Library</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_22" name="teaching_area_id[]" value="22">
  				<label class="title teachingAreaIDContainer pointer" lang="22">Maths</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_23" name="teaching_area_id[]" value="23">
  				<label class="title teachingAreaIDContainer pointer" lang="23">Music</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_24" name="teaching_area_id[]" value="24">
  				<label class="title teachingAreaIDContainer pointer" lang="24">Nurse</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_26" name="teaching_area_id[]" value="26">
  				<label class="title teachingAreaIDContainer pointer" lang="26">Physical Education</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_27" name="teaching_area_id[]" value="27">
  				<label class="title teachingAreaIDContainer pointer" lang="27">Physics</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_28" name="teaching_area_id[]" value="28">
  				<label class="title teachingAreaIDContainer pointer" lang="28">Principal</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_29" name="teaching_area_id[]" value="29">
  				<label class="title teachingAreaIDContainer pointer" lang="29">Psychology</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_30" name="teaching_area_id[]" value="30">
  				<label class="title teachingAreaIDContainer pointer" lang="30">Science</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_31" name="teaching_area_id[]" value="31">
  				<label class="title teachingAreaIDContainer pointer" lang="31">Social Studies</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_32" name="teaching_area_id[]" value="32">
  				<label class="title teachingAreaIDContainer pointer" lang="32">Sociology/Psychology</label>
  			</td>
  													<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_33" name="teaching_area_id[]" value="33">
  				<label class="title teachingAreaIDContainer pointer" lang="33">Special Education/Resources</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer selectorCheckboxTeachingArea" type="checkbox" id="teaching_area_id_34" name="teaching_area_id[]" value="34">
  				<label class="title teachingAreaIDContainer pointer" lang="34">Theory of Knowledge</label>
  			</td>
  			<td>&nbsp;</td>		</tr>		</tbody></table>


  		<br/><br/><br/>
  			<tbody><tr>					<td>
  				<input class="pointer" type="checkbox" id="grade_level_id_1" name="grade_level_id[]" value="1">
  				<label class="title gradeLevelIDContainer pointer" lang="1">Pre-school</label>
  			</td>
  													<td>
  				<input class="pointer" type="checkbox" id="grade_level_id_2" name="grade_level_id[]" value="2">
  				<label class="title gradeLevelIDContainer pointer" lang="2">Primary School</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer" type="checkbox" id="grade_level_id_3" name="grade_level_id[]" value="3">
  				<label class="title gradeLevelIDContainer pointer" lang="3">Middle School</label>
  			</td>
  													<td>
  				<input class="pointer" type="checkbox" id="grade_level_id_4" name="grade_level_id[]" value="4">
  				<label class="title gradeLevelIDContainer pointer" lang="4">Secondary School</label>
  			</td>
  					</tr>			<tr>					<td>
  				<input class="pointer" type="checkbox" id="grade_level_id_5" name="grade_level_id[]" value="5">
  				<label class="title gradeLevelIDContainer pointer" lang="5">Tertiary School</label>
  			</td>
  			<td>&nbsp;</td>		</tr>	</tbody>

  			<input type="submit" value="Submit">
  </form>






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
</footer>
</body>
</html>
