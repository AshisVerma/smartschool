<?php

class Driver_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("classroom",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistClassRoom($data){
        $this->db->where("room_no",$data['room_no']);
        
        $query=$this->db->get("classroom");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("classroom");
		return $result->result_array();
	}

function all(){
	$this->db->where("status",1);
		$result=$this->db->get("classroom");
		return $result->result_array();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("classroom")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("classroom",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("classroom",['status'=>1]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		

	}


	function update($data){
		$this->db->where("room_no",$data['room_no']);
		$result=$this->db->get("classroom");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"Classroom successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("classroom",$data);
			if($result){
				return array("message"=>"Classroom is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("classroom");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}


	function classroom($year){
		
		$this->db->where("year",$year);
		$result=$this->db->get("classroom");
		return $result->result_array();
	}
}


?>