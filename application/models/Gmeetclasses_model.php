<?php

class Gmeetclasses_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("gmeet_classes",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExist($data){
        $this->db->where("class_title",$data['class_title']);
        $this->db->where("class",$data['class']);
        $this->db->where("section",$data['section']);
        $this->db->where("class_date",$data['class_date']);
        
        $query=$this->db->get("gmeet_classes");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$this->db->select("gm.*,classes.class,sections.section,roles.name as role_name")->from("gmeet_classes gm");
		$this->db->join("classes","classes.id=gm.class","left");
		$this->db->join("sections","sections.id=gm.section","left");
		$this->db->join("roles","roles.id=gm.id","left");
		
		$result=$this->db->get();
		return $result->result_array();
	}

function all(){
	$this->db->where("status",1);
		$result=$this->db->get("gmeet_classes");
		return $result->result_array();
	}


	function status($status,$id){
		
		

		
		
        $this->db->where("id",$id);
        $result=$this->db->update("gmeet_classes",['status'=>"$status"]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
	
	
        
	
		

	}


	function update($data){
		$this->db->where("room_no",$data['room_no']);
		$result=$this->db->get("gmeet_classes");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"Classroom successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("gmeet_classes",$data);
			if($result){
				return array("message"=>"Classroom is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("gmeet_classes");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}


	function classroom($year){
		
		$this->db->where("year",$year);
		$result=$this->db->get("gmeet_classes");
		return $result->result_array();
	}


	// function getStaff($id){
	// 	// $this->db->select("s.name")->from("staff s");
	// 	// $this->db->join("roles ")
	// }



	function getAllStaffByRole($role_id){
        $this->db->where("sr.role_id",$role_id);
		$this->db->select("sr.role_id,s.name,s.department,s.designation,s.contact_no,user_id,s.id,d.department_name")->from("staff_roles sr");
		$this->db->join("staff s","s.id=sr.staff_id","left");
		$this->db->join("department d","d.id=s.department","left");
		
		$data=$this->db->get();
		return $data->result_array();
}


//get section by class
   function getSectionByClassId($class_id){
   	$this->db->where("class_id",$class_id);
       $this->db->select("cs.class_id,cs.section_id,s.section,s.id");
       $this->db->from("class_sections cs");
       $this->db->join("sections s","s.id=cs.section_id","left");
       $data=$this->db->get();
       return $data->result_array();
   }
//end get section by class
}


?>