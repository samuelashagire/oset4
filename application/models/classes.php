<?php
	
class Classes extends CI_Model
{
	public function getRecords($college_code)
	{
		$sql = $this->db->query("SELECT * FROM class WHERE college_code = '$college_code'");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['oset_class_id'][] = $row->oset_class_id;
			$results['class_id'][] = $row->class_id;
			$results['subject'][] = $row->subject;
			$results['instructor'][] = $row->instructor;
			$results['section'][] = $row->section;
			$results['activated'][] = $row->activated;
		}
		return $results;
	}
	
	//get Info per individual oset_class id_____________________
	public function getInformation($oset_class_id)
	{
		$sql = $this->db->query("SELECT faculty.name,
		subject, section, set_instrument_id FROM 
		class, faculty WHERE oset_class_id = '$oset_class_id' 
		AND instructor = instructor_code ORDER BY instructor ASC");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['oset_class_id'] = $oset_class_id;
			$results['subject'] = $row->subject;
			$results['section'] = $row->section;
			$results['set_instrument_id'] = $row->set_instrument_id;
			$results['instructor'] = $row->name;
		}
		return $results;
	}
	
	//get Info per individual class id_____________________
	public function getInfo($class_id)
	{
		$sql = $this->db->query("SELECT instructor, subject, section, set_instrument_id FROM class WHERE class_id = '$class_id' ORDER BY instructor ASC");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$instructor = $row->instructor;	
			$results['instructors'][] = $row->instructor;	
			$sql2 = $this->db->query("SELECT name, faculty_id FROM faculty WHERE instructor_code = '$instructor'");
			if($sql2->num_rows()){
				$results['names'][] = $sql2->row()->name;
				$results['faculty_id'][] = $sql2->row()->faculty_id;
			}
		}

		$results['class_id'] = $class_id;
		$results['subject'] = $row->subject;
		$results['section'] = $row->section;
		$results['set_instrument_id'] = $row->set_instrument_id;
						
		return $results;
	}
	
	//set instrument______________________
	public function getActivatedClasses($college_code, $subject, $department)
	{
		$sql = $this->db->query("SELECT oset_class_id, faculty.name as instructor, subject, section, set_instrument.name FROM class, 
		set_instrument, faculty WHERE college_code = '$college_code' AND activated = '1' AND open = '0' 
		AND class.set_instrument_id = set_instrument.set_instrument_id 
		AND instructor = instructor_code
		AND subject LIKE '%$subject%' AND department_code LIKE '%$department%'");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['oset_class_id'][] = $row->oset_class_id;
			$results['subject'][] = $row->subject;
			$results['section'][] = $row->section;
			$results['instructor'][] = $row->instructor;
			$results['set_instrument'][] = $row->name;
		}
		return $results;
	}
	
	//evaluation mode____________________
	public function getClassesByStatus($status, $college_code, $subject, $department)
	{
		if($status == 2)
		{
			$sql = $this->db->query("SELECT oset_class_id, open, no_of_students, no_of_respondents, name, instructor, subject, section FROM class, faculty 
			WHERE college_code = '$college_code' AND activated = '1' AND open > '0' 
			AND subject LIKE '%$subject%' AND department_code LIKE '%$department%' AND instructor=instructor_code");
			
			if ($sql->num_rows() == 0){
				return null;
			}
			
			foreach ($sql->result() as $row){
				$results['oset_class_id'][] = $row->oset_class_id;
				$results['subject'][] = $row->subject;
				$results['section'][] = $row->section;
				$results['instructor'][] = $row->name;
				$results['no_of_students'][] = $row->no_of_students;
				$results['no_of_respondents'][] = $row->no_of_respondents;
				$results['status'][] = $row->open;
			}
		}
		else
		{ 
			$sql = $this->db->query("SELECT oset_class_id, no_of_students, no_of_respondents, name, instructor, subject, section FROM class, faculty 
			WHERE college_code = '$college_code' AND activated = '1' AND open = '$status' 
			AND subject LIKE '%$subject%' AND department_code LIKE '%$department%' AND instructor=instructor_code");
		
			if ($sql->num_rows() == 0){
				return null;
			}
			
			foreach ($sql->result() as $row){
				$results['oset_class_id'][] = $row->oset_class_id;
				$results['subject'][] = $row->subject;
				$results['section'][] = $row->section;
				$results['instructor'][] = $row->name;
				$results['no_of_students'][] = $row->no_of_students;
				$results['no_of_respondents'][] = $row->no_of_respondents;
			}
		}
		return $results;
	}

	//score
	public function getScore($oset_class_id)
	{
		$sql = $this->db->query("SELECT score FROM score_per_respondent WHERE oset_class_id = '$oset_class_id'");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		$score = 0;
		foreach ($sql->result() as $row){
			$score += $row->score;	
		}
		$score /= $sql->num_rows();
		return $score;
	}
	
	//instructors_____________________________
	public function getInstructors($class_id)
	{
		$sql = $this->db->query("SELECT instructor, faculty_id, activated FROM class, faculty WHERE class_id = '$class_id' AND instructor_code = instructor ORDER BY instructor  ASC");
		
		if ($sql->num_rows() == 0){
			
			$sql = $this->db->query("SELECT instructor, activated FROM class WHERE class_id = '$class_id' ORDER BY instructor  ASC");
		
			foreach ($sql->result() as $row){
				$result['instructors'][] = $row->instructor;
				$result['faculty_id'][] = "";
				$result['activated'][] = $row->activated;
			}
			return $result;
		}
		
		foreach ($sql->result() as $row){
			$result['instructors'][] = $row->instructor;
			$result['faculty_id'][] = $row->faculty_id;
			$result['activated'][] = $row->activated;
		}
		return $result;
	}
	
	public function getDistinctClass($college_code, $subject, $department)
	{
		$sql = $this->db->query("SELECT DISTINCT class_id, subject, section FROM class WHERE college_code = '$college_code' 
								 AND subject LIKE '%$subject%' AND department_code LIKE '%$department%' ORDER BY subject ASC");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['class_id'][] = $row->class_id;
			$results['subject'][] = $row->subject;
			$results['section'][] = $row->section;
			$res = $this->getInstructors($row->class_id);
			$results['activated'][$row->class_id] = $res['activated'];
			$results['instructors'][$row->class_id] = $res['instructors'];	
			$results['faculty_id'][$row->class_id] = $res['faculty_id'];	
		}
		return $results;
	}
	
	//instructors_______________________
	public function deleteInstructor($class_id, $instructor) 
	{
		$sql = $this->db->query("SELECT * FROM class WHERE class_id = '$class_id'");
		if($sql->num_rows() > 1)
		{
			$sql = $this->db->query("SELECT instructor_code FROM faculty WHERE faculty_id = '$instructor'");
			$instructor = $sql->row()->instructor_code;
			$sql = $this->db->query("DELETE FROM class WHERE class_id = '$class_id' AND instructor = '$instructor'");
		}
		else
		{
			$data['instructor'] = "";
			$this->db->where('class_id', $class_id);
			$this->db->update('class', $data); 
		}
	}	
	
	public function addInstructor($class_id, $instructor) 
	{
		$sql = $this->db->query("SELECT * FROM class WHERE class_id = '$class_id'");
		if($sql->num_rows() == 1)
			if(!$sql->row()->instructor)
			{
				$data['instructor'] = $instructor;
				$this->db->where('class_id', $class_id);
				$this->db->update('class', $data); 
				return;
			}
				
		$data['class_id'] = $class_id;
		$data['subject'] = $sql->row()->subject;
		$data['section'] = $sql->row()->section;
		$data['no_of_students'] = $sql->row()->no_of_students;
		$data['activated'] = '0';
		$data['department_code'] = $sql->row()->department_code;
		$data['college_code'] = $sql->row()->college_code;
		$data['instructor'] = $instructor;
		$this->db->insert('class', $data); 
	}	

	public function checkInstructorCode($class_id, $instructor)
	{
		$sql = $this->db->query("SELECT * FROM class WHERE class_id = '$class_id' AND instructor = '$instructor'");
		if($sql->num_rows() == 0)
			return true;
		else
			return false;
	}
	
	//delete___________________________
	public function deleteAll()
	{
		$sql = $this->db->query("TRUNCATE class");
		$sql = $this->db->query("TRUNCATE classlist");
	}
	
	public function deleteByCollegeCode($college_code)
	{
		$sql = $this->db->query("DELETE FROM class WHERE college_code = '$college_code'");
	}

	//updates__________________________
	public function update($oset_class_id, $data)
	{
		$this->db->where('oset_class_id', $oset_class_id);
		$this->db->update('class', $data); 
	}
	
	public function updateActivationStatus($class_id, $instructor, $data)
	{
		$this->db->where('instructor', $instructor);
		$this->db->where('class_id', $class_id);
		$this->db->update('class', $data); 
	}
	
	//download
	public function downloadClasses($college_code)
	{
		$sql = $this->db->query("SELECT * FROM flags");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results[$row->flag_name] = $row->value;
			if($row->flag_name == "semester")
				$sem = $row->extended_value;
		}
		
		$sql = $this->db->query("SELECT * FROM department WHERE college_code = '$college_code'");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$departments[] = $row->department_code;
		}			
		
		$sem = (int)$sem;
		$sem1 = $sem + 1;
		$sem = (int)$sem * 100000;
		$sem1 = (int)$sem1 * 100000;
		
		$query = "SELECT classid, extracode, section, subject, instructors, unit, enlisted from osetuser_classes_view 
		            WHERE classid>'$sem' AND classid<'$sem1' 
		            AND subject NOT LIKE '%RESIDEN%' AND class NOT LIKE '%cancelled%' AND enlisted > '0' AND (";
		
		$dcounter=0;
		
		while($dcounter < count($departments))
		{
			$query .= " unit = '" . $departments[$dcounter]. "'";
			$dcounter++;
			if($dcounter < count($departments)){
				$query .= ' OR ';
			}
		}
		$query .= ")";
		
		$this->db_crs = $this->load->database('crs', TRUE);
		
		$sql = $this->db_crs->query($query);
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		$instructor = "";
		$subject = "";
		
		foreach ($sql->result() as $row){
			if($row->instructors == "TBA"){
				$instructor = "";
			}else{
				$instructor = $row->instructors;
			}
			$subject = $row->subject;
			
			if($row->extracode!=""){
				if(substr($row->extracode,0,3)=="LAB"){
					$subject = $subject." LAB";
				}else if(substr($row->extracode,0,3)=="LEC"){
					$subject = $subject." LEC";
				}
			}
			
			//split instructors
			if($index = strpos($instructor, ";") > 0)
			{
				$instructors = explode(';', $instructor);
				
				foreach ($instructors as $instructor)
				{
					$data = array(
						'class_id'    => $row->classid,
						'section'     => $row->section,
						'no_of_students' => $row->enlisted,
						'subject'     => $subject,
						'instructor' => trim($instructor),
						'department_code' => $row->unit,
						'college_code' => $college_code
						);
		 
					$this->db->insert('class', $data);
					
					//import instructor
					if($instructor)
					{
						$sql = $this->db->query("SELECT * FROM faculty WHERE instructor_code = '$instructor'");
							
						if ($sql->num_rows() == 0){
									
							$sql2 = $this->db_crs->query("SELECT instructorcode, firstname, lastname from osetuser_employees_view
								WHERE instructorcode = '$instructor'");
							
							if ($sql2->num_rows() != 0){
								$data = array(
										'name' 			   => strtoupper($sql2->row()->firstname). Chr(32) .strtoupper($sql2->row()->lastname),
										'instructor_code'  => $sql2->row()->instructorcode
										);
									
								$this->db->insert('faculty', $data);
							}
						}
					}
				}
				
			}
			else
			{
				if(!$instructor)
					$instructor = "";
				$data = array(
						'class_id'    => $row->classid,
						'section'     => $row->section,
						'subject'     => $subject,
						'no_of_students' => $row->enlisted,
						'instructor' => $instructor,
						'department_code' => $row->unit,
						'college_code' => $college_code
						);
		 
				$this->db->insert('class', $data);
				
				//import instructor
				if($instructor)
				{
					$sql = $this->db->query("SELECT * FROM faculty WHERE instructor_code = '$instructor'");
						
					if ($sql->num_rows() == 0){
								
						$sql2 = $this->db_crs->query("SELECT instructorcode, employeeid, firstname, lastname from osetuser_employees_view
							WHERE instructorcode = '$instructor'");
						
						if ($sql2->num_rows() != 0){
							$data = array(
									'name' 			   => strtoupper($sql2->row()->firstname). Chr(32) .strtoupper($sql2->row()->lastname),
									'instructor_code'  => $sql2->row()->instructorcode
									);
									
							$this->db->insert('faculty', $data);
						}
					}
				}
			}
		}
		
		$this->db->where('college_code', $college_code);
		$value['downloaded'] = 1;
		$this->db->update('college', $value); 		
		
	}
}
?>

