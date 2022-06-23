<?php

class Usergroup_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("usergroup",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistUserGroup($data){
        $this->db->where("name",$data['name']);
        $query=$this->db->get("usergroup");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("usergroup");
		return $result->result_array();
	}
	function all(){
	$this->db->where("status",1);
		$result=$this->db->get("usergroup");
		return $result->result_array();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("usergroup")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("usergroup",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("usergroup",['status'=>1]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		

	}


	function update($data){
		$this->db->where("name",$data['name']);
		$result=$this->db->get("usergroup");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"usergroup is already exist","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("usergroup",['name'=>$data['name']]);
			if($result){
				return array("message"=>"usergroup successfully updated","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("usergroup");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}
}


?>