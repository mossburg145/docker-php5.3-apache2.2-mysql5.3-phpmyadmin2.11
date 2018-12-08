<?php
include("es_functions.php");
$user = auth_user();

print_header("Register Patients");

?>

<h3 align = "center">PATIENT REGISTRATION</h3></br>

<form id="patient_form" name="patient_form" method="POST" action="register_patients-exec.php">
	
				<p class = "labell">
					<label>First Name</label>
					<input type = "text" id = "fname" name = "fname" />
				</p>

				<p class = "labell">
					<label>Last Name</label>
					<input type = "text" id = "lname" name = "lname" />
				</p>
				

				<p class = "labell">
				   <label>E-mail Address</label>
				   <input type = "email" id = "email" name = "email" />
				</p>

				<p class = "labell">
					<label for = 'Phone Number'>Phone Number</label>
					<input type = "text" id = "phone" name = "phone"/>
				</p>
				
				<p class = "labell">
					<label for = 'Male'>Male</label>
					<input type = "radio" 
							 name = "sex"
							 value = "Male"
							 />
				</p>
				<p class = "labell">			 
				   <label for = 'Female'>Female</label>
				   <input type = "radio" 
							 name = "sex"
							 value = "Female" 
							 />
				
				</p>
					
					<!-- This is used to determine the date when the patient was registered. gmdate("Y-M-D") is a PHP function for returning the current date in GMT -->
					<input type = "hidden" name = "register_date" id = "regdate" value = "<?php echo gmdate("Y-M-j");?>" />
					
					<!-- This is used to determine the time when the patient was registered. gmdate("H-i-s") is a PHP function for returning the current time in GMT -->
					<input type = "hidden" name = "register_time" id = "regtime" value = "<?php echo gmdate("H-i-s");?>" />
					
				<p class = "labell">
					<label for 'month'>Date Of Birth</label>
					<?php
					
					//File is a PHP function for reading a file, line by line. It then returns the read data as an array which is stored in "$months"
					$months = file("MONTH.txt") ;
						echo("<select id = 'selMonth' name = 'month'>");
						
						//Loop through the array returned from reading the file and then use its elements as options for the drop down list
					foreach ($months as $month) 
					{
						echo ("<option class = 'optionn' value = '$month'>$month</option>") ;
					}
						echo ("</select>") ;
					?>
						
					
					<?php
					//File is a PHP function for reading a file, line by line. It then returns the read data as an array which is stored in "$days"
					$days = file("DAY.txt");
						echo ("<select id = 'selDay' name = 'day'>");
						
						//Loop through the array returned from reading the file and then use its elements as options for the drop down list

					foreach ($days as $day)
					{
						echo ("<option class = 'optionn' value = '$day'>$day</option>") ;
					} 
						echo ("</select>") ;
					?>
					
					<select id = "year" name = "year">
					<option class = "optionn" value = "YEAR">YEAR</option>
					<?php
						//date("Y") is a PHP function for returning the current year. Assign the value returned by the function to "$i" and then use it as a loop controller for the loop creating those years as options for the years drop down list
						for ($i = date("Y"); $i > 1900; $i--){
							echo "<option class = 'optionn' value = '$i'>$i</option>";
						}
					?>
					
					</select>
					
				 </p>
				 

				 <p class = "labell">
				 	<label for = 'address'>Address</label>
				 	<input type = "text" name = "address" />
				 </p>

				 <p class = "labell">
				 	<label for = 'symptoms'>Symptoms</label>
				 	<textarea name = "symptoms" rows = "5" columns = "50" maxlength = "10000"></textarea>
				 </p>

				 <p class = "labell">
				 	<label for = 'lab_results'>Lab Results</label>
				 	<textarea name = "lab_results" rows = "5" columns = "50" maxlength = "10000"></textarea>
				 </p>

				 <p class = "labell">
				 	<label for = 'diagnosis'>Diagnosis</label>
				 	<textarea name = "diagnosis" rows = "5" columns = "50" maxlength = "10000"></textarea>
				 </p>


				 <p class = "labell">
				 	<label for = 'doctor'>Doctor</label>
				 	<input type = "text" name = "doctor" />
				 </p>

				 <p class = "labell">
				 	<label for = 'nurse'>Nurse</label>
				 	<input type = "text" name = "nurse" />
				 </p>

				 <p class = "labell">
				 	<label for = 'allergies'>Allergies</label>
				 	<textarea name = "allergies" rows = "5" columns = "50" maxlength = "100000"></textarea>
				 </p>

				 <p class = "labell">
				 	<label for = 'Notes'>Notes</label>
				 	<textarea name = "notes" rows = "5" columns = "50" maxlength = "10000"></textarea>
				 </p>


				 
				<p class = "labell">
				   <label for = 'Reset'>Reset</label>
				   <input type = "reset" id = "reset" name = "reset" />
				 </p>	   
		</fieldset>
		
		<!-- This is JavaScript that enables the submit button image to actually submit data -->
		<script>
			$(document).ready(function () {
			$("#submit").click(function () {
				$("loginForm")[0].reset();
				});
			});
			</script>
	
			<p class="submit">
			<input type="image" value="" src = "images/submit.png" class = "reg_button">
			</p>
			
		</form>






<?php 
print_footer();

global $user;
		if ($user) {
			print '<td width="20%" height="100%" valign="top">';
			if (preg_match("/(Supervisor)|(Admin)/i", $user["user_type"])>0) {
				print_supervisor_menu();
			}
			else {
				print_employee_menu();
			}
		}else {
	}
	print "<td valign=\"top\" class=\"text\">";

?>