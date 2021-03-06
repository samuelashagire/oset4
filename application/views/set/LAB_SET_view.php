	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		<style>
			table.SET td, th{	
				border: 1px solid rgba(0, 0, 0, 0.5);	
				border-color: #bbb;
				padding: 8px 5px;
			}
			table.SET .narrow{
				width: 70px;
			}
			table.SET tr:hover{
				background-color: #CCCCFF;
			}
			table.SET #header:hover{
				background-color: #FFF;
			}
			table.SET {
				width:100%; 
			}
			table.SETnoborder td, table.SETnoborder th{
				border: 0;
				width:100%; 
			}
		</style>
		<script>
			function showPart(part){
				document.body.scrollTop = document.documentElement.scrollTop = 0;
				document.getElementById('part1').style.display = "none";
				document.getElementById('part2').style.display = "none";
				document.getElementById('part3').style.display = "none";
				document.getElementById(part).style.display = "block";	
			}
			function show(id){
				document.getElementById(id).style.display = "block";	
			}
			function hide(id){
				document.getElementById(id).style.display = "none";	
			}
			function showOther(value, id){
				document.getElementById(id).style.display = "none";
				if(value == "Others")	
					document.getElementById(id).style.display = "inline";
				else if(value == "others")
					if(document.getElementById("others").checked)
						document.getElementById(id).style.display = "block";
			}
			function validateForm()
			{
				var name, radios;
				var valid = true;
				for(var i = 1; i <= 16; i++)
				{
					name = "part3a_"+i;
					document.getElementById(name).style.backgroundColor = "#FFF";
					radios = document.getElementsByName(name);
					if(!(radios[0].checked || radios[1].checked || radios[2].checked || radios[3].checked || radios[4].checked)) 
					{
						valid = false;
						document.getElementById(name).style.backgroundColor = "#FFCCCC";
					}
				}				
				if(!valid)
				{
					document.getElementById('error_msg').style.display = "block";
					document.body.scrollTop = document.documentElement.scrollTop = 0;
				}
				return valid;
			}
		</script>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
			<?php if($preview) 
						echo '<h2>Preview of SET Instrument (Laboratory SET)</h2>';
				  else 
				  {
				  		echo '<h2>Evaluate '.$class['subject'].' - '.ucwords(strtolower($class['instructor'])).'</h2>';
						echo '<form method="POST" onSubmit="return validateForm();" action="'.base_url('index.php/student/set/lab_set/submit/'.$class['oset_class_id']).'">';
				  }
			?>
			
			<div id="part1">
				<span style ="color:maroon;font-size:15pt;font-family:Times New Roman;font-weight:normal">
				<font color="grey">The Student</font><font color="grey"> | </font>  The Course  <font color="grey"> | </font>  The Teacher <font color="grey"> | </font>
				</span>     
				<hr>
				<br/>
				
				<table class="SET">
					<tr id="header">
						<th colspan="2"></th>
						<th class="narrow">Very much</th>
						<th class="narrow">Much</th>
						<th class="narrow">Moderately</th>
						<th class="narrow">Little</th>
						<th class="narrow">Not at all</th>
					</tr>
					<tr>
						<td>1.</td>
						<td>How actively did you participate in class discussions and activities? </td>
						<td align="center"><input type="radio" name="part1_1" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_1" value="2"></input></td>
						<td align="center"><input type="radio" name="part1_1" value="3"></input></td>
						<td align="center"><input type="radio" name="part1_1" value="4"></input></td>
						<td align="center"><input type="radio" name="part1_1" value="5"></input></td>
					</tr>
					<tr>
						<td>2.</td>
						<td>Did you learn new ideas from your interactions with your teacher and classmates? </td>
						<td align="center"><input type="radio" name="part1_2" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_2" value="2"></input></td>
						<td align="center"><input type="radio" name="part1_2" value="3"></input></td>
						<td align="center"><input type="radio" name="part1_2" value="4"></input></td>
						<td align="center"><input type="radio" name="part1_2" value="5"></input></td>
					</tr>
					<tr>
						<td>3.</td>
						<td>How receptive were you to new ideas presented by your teacher and classmates? </td>
						<td align="center"><input type="radio" name="part1_3" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_3" value="2"></input></td>
						<td align="center"><input type="radio" name="part1_3" value="3"></input></td>
						<td align="center"><input type="radio" name="part1_3" value="4"></input></td>
						<td align="center"><input type="radio" name="part1_3" value="5"></input></td>
					</tr>
					<tr>
						<td>4.</td>
						<td>How much effort did you give to meeting the requirements in this course? (eg. term papers, reports, assigned readings) </td>
						<td align="center"><input type="radio" name="part1_4" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_4" value="2"></input></td>
						<td align="center"><input type="radio" name="part1_4" value="3"></input></td>
						<td align="center"><input type="radio" name="part1_4" value="4"></input></td>
						<td align="center"><input type="radio" name="part1_4" value="5"></input></td>
					</tr>
					<tr>
						<td>5.</td>
						<td>Do you feel that you have performed well in this course? </td>
						<td align="center"><input type="radio" name="part1_5" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_5" value="2"></input></td>
						<td align="center"><input type="radio" name="part1_5" value="3"></input></td>
						<td align="center"><input type="radio" name="part1_5" value="4"></input></td>
						<td align="center"><input type="radio" name="part1_5" value="5"></input></td>
					</tr>
					<tr>
						<td>6.</td>
						<td>Have your expectations of this course been met? </td>
						<td align="center"><input type="radio" name="part1_6" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_6" value="2"></input></td>
						<td align="center"><input type="radio" name="part1_6" value="3"></input></td>
						<td align="center"><input type="radio" name="part1_6" value="4"></input></td>
						<td align="center"><input type="radio" name="part1_6" value="5"></input></td>
					</tr>
					
					<tr id="header">
						<th colspan="2"></th>
						<th>0</th>
						<th>1</th>
						<th>2-3</th>
						<th>4-5</th>
						<th>6</th>
					</tr>
					<tr>
						<td>7.</td>
						<td>How many times have you been late*? </td>
						<td align="center"><input type="radio" name="part1_7" value="0"></input></td>
						<td align="center"><input type="radio" name="part1_7" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_7" value="2-3"></input></td>
						<td align="center"><input type="radio" name="part1_7" value="4-5"></input></td>
						<td align="center"><input type="radio" name="part1_7" value="6"></input></td>
					</tr>
					<tr>
						<td>8.</td>
						<td>How many class meetings have you missed? </td>
						<td align="center"><input type="radio" name="part1_8" value="0"></input></td>
						<td align="center"><input type="radio" name="part1_8" value="1"></input></td>
						<td align="center"><input type="radio" name="part1_8" value="2-3"></input></td>
						<td align="center"><input type="radio" name="part1_8" value="4-5"></input></td>
						<td align="center"><input type="radio" name="part1_8" value="6"></input></td>
					</tr>
					<tr>
						<td>9.</td>
						<td colspan="6">What final grade will you give yourself in this course? 
						<select name="part1_9">
							<option value="NR"></option>
							<option>1.0</option>
							<option>1.25</option>
							<option>1.5</option>
							<option>1.75</option>
							<option>2.0</option>
							<option>2.25</option>
							<option>2.5</option>
							<option>2.75</option>
							<option>3.0</option>
							<option>INC</option>
						</select>
						</td>
					</tr>
				</table>
				
				<br/>
				<span style="font-size:13px">*Per UP regulations, <i>late</i> is defined as arriving more than 10 minutes after the scheduled time.</span>
				
				<br/><br/>
				<input type="button" value="Next Part >" onClick="showPart('part2');"></input>
			</div>
		
			<div id="part2" style="display:none">
				<span style ="color:maroon;font-size:15pt;font-family:Times New Roman;font-weight:normal">
				The Student<font color="grey"> | </font> <font color="grey">The Course</font><font color="grey"> | </font>  The Teacher <font color="grey"> | </font>
				</span>     
				<hr>
				<br/>
				
				<table class="SET">
					<tr id="header">
						<th colspan="2" align="left">Part A.</th>
						<th class="narrow">Strongly Agree</th>
						<th class="narrow">Agree</th>
						<th class="narrow">Disagree</th>
						<th class="narrow">Strongly Disagree</th>
					</tr>
					<tr>
						<td>1.</td>
						<td>This course stimulates me to study beyond the lessons assigned. </td>
						<td align="center"><input type="radio" name="part2a_1" value="1"></input></td>
						<td align="center"><input type="radio" name="part2a_1" value="2"></input></td>
						<td align="center"><input type="radio" name="part2a_1" value="3"></input></td>
						<td align="center"><input type="radio" name="part2a_1" value="4"></input></td>
					</tr>
					<tr>
						<td>2.</td>
						<td>This course has developed in me a greater sense of responsibility 
							(i.e. self-reliance, self discipline, independent study) </td>
						<td align="center"><input type="radio" name="part2a_2" value="1"></input></td>
						<td align="center"><input type="radio" name="part2a_2" value="2"></input></td>
						<td align="center"><input type="radio" name="part2a_2" value="3"></input></td>
						<td align="center"><input type="radio" name="part2a_2" value="4"></input></td>
					</tr>
					<tr>
						<td>3.</td>
						<td>I have worked more conscientiously in this course more than in most other courses. </td>
						<td align="center"><input type="radio" name="part2a_3" value="1"></input></td>
						<td align="center"><input type="radio" name="part2a_3" value="2"></input></td>
						<td align="center"><input type="radio" name="part2a_3" value="3"></input></td>
						<td align="center"><input type="radio" name="part2a_3" value="4"></input></td>
					</tr>
					<tr>
						<td>4.</td>
						<td>Even if this course were not required, it would still be worthwhile taking it. </td>
						<td align="center"><input type="radio" name="part2a_4" value="1"></input></td>
						<td align="center"><input type="radio" name="part2a_4" value="2"></input></td>
						<td align="center"><input type="radio" name="part2a_4" value="3"></input></td>
						<td align="center"><input type="radio" name="part2a_4" value="4"></input></td>
					</tr>
					<tr>
						<td>5.</td>
						<td>I am fully satisfied with the way this course was handled/conducted. </td>
						<td align="center"><input type="radio" name="part2a_5" value="1"></input></td>
						<td align="center"><input type="radio" name="part2a_5" value="2"></input></td>
						<td align="center"><input type="radio" name="part2a_5" value="3"></input></td>
						<td align="center"><input type="radio" name="part2a_5" value="4"></input></td>
					</tr>
				</table>
				
				<br/><br/>
				<table class="SET">
					<tr>
						<th align="left">Part B.</th>
					</tr>
					<tr>
						<td>1. Does the class has a syllabus or expanded outline for the course?
							<input type="radio" name="part2b_1" value="yes" onClick="show('partB1_1')">Yes</input>
							<input type="radio" name="part2b_1" value="no" onClick="hide('partB1_1'); hide('partB1_1_1')">No</input>
						</td>	
					</tr>
				</table>	
				
					<table class="SET" style="display:none" id="partB1_1">
						<tr >
							<td>&nbsp;&nbsp;&nbsp; 1.1 Have there been departures from the syllabus?
								<input type="radio" name="part2b_1_1" value="yes" onClick="show('partB1_1_1')">Yes</input>
								<input type="radio" name="part2b_1_1" value="no" onClick="hide('partB1_1_1')">No</input>
						</tr>
					</table>
					
					<table class="SET" style="display:none" id="partB1_1_1">
						<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1.1 Describe the nature of departure(s) from the syllabus.
							<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea  rows="4" cols="50" name="part2b_1_1_1"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1.2 Do you think the departure(s) from the syllabus were necessary?.
								<input type="radio" name="part2b_1_1_2" value="yes">Yes</input>
								<input type="radio" name="part2b_1_1_2" value="no">No</input>
							</td>
						</tr>
					</table>
					
				<table class="SET">
					<tr>
						<td>2. How would you rate the overall pace of this course?
							<select name="part2b_2" onChange="showOther(this.value, 'part2_Other');">
								<option value="NR"></option>
								<option>Too fast</option>
								<option>Fast</option>
								<option>Just right</option>
								<option>Too slow</option>
								<option>Slow</option>
								<option>Others</option>
							</select>
							<input style="display: none"; "text" name="part2b_2Other" id="part2_Other" placeholder="Specify"></input> 
						</td>	
					</tr>
	
					<tr>
						<td>3. How much have you learned from this course?
							<select name="part2b_3">
								<option value="NR"></option>
								<option>Very much</option>
								<option>Much</option>
								<option>Some</option>
								<option>Very little</option>
								<option>Nothing</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>4. To what extent, would you say, have the objectives of this course been attained?
							<select name="part2b_4">
								<option value="NR"></option>
								<option>Very much</option>
								<option>Much</option>
								<option>Moderately</option>
								<option>Slightly</option>
								<option>Not at all</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>5. What other objectives whould you recommend for inclusion in this course?
						<br/><br/>&nbsp;&nbsp;&nbsp;<textarea rows="4" cols="50" name="part2b_5"></textarea>
						</td>
					</tr>
					
					<tr>
						<td>6. In you opinion, how can this course be further improved?
						<br/><br/>&nbsp;&nbsp;&nbsp;<textarea rows="4" cols="50" name="part2b_6"></textarea>
						</td>
					</tr>
					
				</table>
				
				
				<br/><br/>
				<input type="button" value="< Previous Part" onClick="showPart('part1');"></input>
				<input type="button" value="Next Part >" onClick="showPart('part3');"></input>
			</div>
			
			<div id="part3" style="display:none">
				<span style ="color:maroon;font-size:15pt;font-family:Times New Roman;font-weight:normal">
				The Student<font color="grey"> | </font> The Course <font color="grey"> | </font> <font color="grey"> The Teacher </font> <font color="grey"> | </font>
				</span>     
				<hr>
				<br/>
				<div align="center" id="error_msg" style="display:none; color: red; font-size:13px;">Please fill-up required fields. <br/><br/></div>
				<table class="SET">
					<tr id="header">
						<th align="left" colspan="8">Part A.</th>
					</tr>
					<tr id="header">
						<td colspan="2" align="left">The Teacher of this course</td>
						<th class="narrow">Strongly Agree</th>
						<th class="narrow">Agree</th>
						<th class="narrow">Disagree</th>
						<th class="narrow">Strongly Disagree</th>
						<th class="narrow">Not Applicable</th>
					</tr>
					<tr id="part3a_1">
						<td>1.</td>
						<td>Explains the course objectives, grading system and policies <font color="red">*</font> </td>
						<td align="center"><input type="radio" name="part3a_1" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_1" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_1" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_1" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_1" value="0"></input></td>
					</tr>
					<tr id="part3a_2">
						<td>2.</td>
						<td>Gives preliminary instructions and precautions when necessary <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_2" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_2" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_2" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_2" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_2" value="0"></input></td>
					</tr>
					<tr id="part3a_3">
						<td>3.</td>
						<td>Checks student preparation for the laboratory activity <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_3" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_3" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_3" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_3" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_3" value="0"></input></td>
					</tr>
					<tr id="part3a_4">
						<td>4.</td>
						<td>Explains the proper use of the apparatus to students <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_4" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_4" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_4" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_4" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_4" value="0"></input></td>
					</tr>
					<tr id="part3a_5">
						<td>5.</td>
						<td>Supervises students' activities <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_5" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_5" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_5" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_5" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_5" value="0"></input></td>
					</tr>
					<tr id="part3a_6">
						<td>6.</td>
						<td>Utilizes laboratory time for the maximum <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_6" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_6" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_6" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_6" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_6" value="0"></input></td>
					</tr>
					<tr id="part3a_7">
						<td>7.</td>
						<td>Devotes enough time to each experiment <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_7" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_7" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_7" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_7" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_7" value="0"></input></td>
					</tr>
					<tr id="part3a_8">
						<td>8.</td>
						<td>Sees to it that students leave their areas in good order <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_8" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_8" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_8" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_8" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_8" value="0"></input></td>
					</tr>
					<tr id="part3a_9">
						<td>9.</td>
						<td>Clarifies and reinforces discussions during oral reports <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_9" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_9" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_9" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_9" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_9" value="0"></input></td>
					</tr>
					<tr id="part3a_10">
						<td>10.</td>
						<td>Asks relevant questions during examination <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_10" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_10" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_10" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_10" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_10" value="0"></input></td>
					</tr>
					<tr id="part3a_11">
						<td>11.</td>
						<td>Treats students tactfully, does not embarrass them <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_11" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_11" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_11" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_11" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_11" value="0"></input></td>
					</tr>
					<tr id="part3a_12">
						<td>12.</td>
						<td>Invites respect thought behavior and general appearance <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_12" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_12" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_12" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_12" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_12" value="0"></input></td>
					</tr>
					<tr id="part3a_13">
						<td>13.</td>
						<td>Maintains an orderly atmosphere in the laboratory <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_13" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_13" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_13" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_13" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_13" value="0"></input></td>
					</tr>
					<tr id="part3a_14">
						<td>14.</td>
						<td>Is firm and consistent; strict but reasonable in disciplining students <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_14" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_14" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_14" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_14" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_14" value="0"></input></td>
					</tr>
					<tr id="part3a_15">
						<td>15.</td>
						<td>Motivates the student to think critically <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_15" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_15" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_15" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_15" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_15" value="0"></input></td>
					</tr>
					<tr id="part3a_16">
						<td>16.</td>
						<td>Is able to communicate effectively <font color="red">*</font></td>
						<td align="center"><input type="radio" name="part3a_16" value="1"></input></td>
						<td align="center"><input type="radio" name="part3a_16" value="2"></input></td>
						<td align="center"><input type="radio" name="part3a_16" value="3"></input></td>
						<td align="center"><input type="radio" name="part3a_16" value="4"></input></td>
						<td align="center"><input type="radio" name="part3a_16" value="0"></input></td>
					</tr>
				</table>
				
				<br/><br/>
				<table class="SET">
					<tr id="header">
						<th align="left">Part B.</th>
					</tr>
					<tr>
						<td>1. How many times has the teacher been late?
							<select name="part3b_1">
								<option value="NR"></option>
								<option>0</option>
								<option>1</option>
								<option>2-3</option>
								<option>4-5</option>
								<option>6</option>
							</select>	
						</td>
					</tr>
					<tr>
						<td>2. How many class meetings has the teacher missed?
							<select name="part3b_2">
								<option value="NR"></option>
								<option>0</option>
								<option>1</option>
								<option>2-3</option>
								<option>4-5</option>
								<option>6</option>
							</select>	
						</td>
					</tr>
					<tr>
						<td>3. The teacher generally dismisses the class 
							<select name="part3b_3">
								<option value="NR"></option>
								<option>On time</option>
								<option>Early</option>
								<option>Late</option>
							</select>	
						</td>
					</tr>
					<tr>	
						<td>4. How soon does the teacher post results or return corrected laboratory reports, quizzes, exam papers, etc.? 
							<select name="part3b_4">
								<option value="NR"></option>
								<option>One week</option>
								<option>Two weeks</option>
								<option>One month</option>
								<option>More than one month</option>
								<option>Never</option>
							</select>	
						</td>
					</tr>
					<tr>	
						<td>5. Is the teacher fair in giving grades? 
							<select name="part3b_5_1">
								<option value="NR"></option>
								<option>Always</option>
								<option>Usually</option>
								<option>Sometimes</option>
								<option>Rarely</option>
								<option>Never</option>
							</select>	
							<br/>
							&nbsp;&nbsp;&nbsp; Explain your answer.<br/>
							&nbsp;&nbsp;&nbsp;<textarea cols="50" rows="4" name="part3b_5_2"></textarea>
						</td>
					</tr>
					<tr>	
						<td>6. Among the teachers you have had, how would you rate this teacher?
							<select name="part3b_6">
								<option value="NR"></option>
								<option>The best</option>
								<option>Among the best</option>
								<option>Average</option>
								<option>Among the worst</option>
								<option>The worst</option>
							</select>
						</td>
					</tr>
				</table>
				
				<br/><br/>
				<table class="SET">
					<tr id="header">
						<th align="left">Part C.</th>
					</tr>
					<tr id="header">
						<td>What are the faculty's strong points? Areas for improvement  <br/>
						<textarea cols="50" rows="4" name="part3c"></textarea>
						</td>
					</tr>
				</table>
				
				<br/><br/>
				<input type="button" value="< Previous Part" onClick="showPart('part2');"></input>
				<input type="submit" value="Submit"></input>
				<?php if(!$preview) echo form_close(); ?>
			</div>
		
		</div>
		</div>
	</body>