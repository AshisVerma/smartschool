<?php

class Studyyear_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("studyyear",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistYear($data){
        $this->db->where("year",$data['year']);
        $query=$this->db->get("studyyear");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("studyyear");
		return $result->result_array();
	}
	function all(){
	$this->db->where("status",1);
		$result=$this->db->get("studyyear");
		return $result->result_array();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("studyyear")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("studyyear",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("studyyear",['status'=>1]);
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
		$result=$this->db->get("studyyear");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"Studyyear successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("studyyear",['year'=>$data['year']]);
			if($result){
				return array("message"=>"studyyear is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("studyyear");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}
}


?>