<?php

class Semesters_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("semester",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistYear($data){
        $this->db->where("year",$data['year']);
        $this->db->where("name",$data['name']);
        $query=$this->db->get("semester");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("semester");
		return $result->result_array();
	}

function all(){
	$this->db->where("status",1);
		$result=$this->db->get("semester");
		return $result->result_array();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("semester")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("semester",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("semester",['status'=>1]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		

	}


	function update($data){
		$this->db->where("year",$data['year']);
		$this->db->where("name",$data['name']);
		$result=$this->db->get("semester");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"Studyyear successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("semester",['year'=>$data['year']]);
			if($result){
				return array("message"=>"Semester is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("semester");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}


	function semester_details($classname,$year){
		
	
		$this->db->where("year",$year);
		
		$result=$this->db->get("semester");
		return $result->result_array();
	}
	function semester($year){
		
		
		$this->db->where("year",$year);
		$result=$this->db->get("semester");
		return $result->result_array();
	}


	function edit($id){
		$data=$this->db->get_where("semester",['id'=>$id])->row();
		return $data;
	}
}


?>