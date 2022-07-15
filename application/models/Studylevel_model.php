<?php

class Studylevel_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("studylevel",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistLevel($data){
        $this->db->where("level",$data['level']);
         $this->db->where("class",$data['class']);
        $query=$this->db->get("studylevel");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("studylevel");
		return $result->result_array();
	}
	function all(){
	$this->db->where("status",1);
		$result=$this->db->get("studylevel");
		return $result->result_array();
	}


	function status($id){

		$this->db->where("id",$id);
		$result=$this->db->get("studylevel")->row();


		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("studylevel",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("studylevel",['status'=>1]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		

	}


	function update($data){
		$this->db->where("class",$data['class']);
		$result=$this->db->get("studylevel");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"studylevel successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("studylevel",$data);
			if($result){
				return array("message"=>"studylevel is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	function delete($id){
		$result=$this->db->where("id",$id)->delete("studylevel");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}


	function get_level_by_class($classname){
		$this->db->where("class",$classname);
		$this->db->where("status",1);
		$this->db->select("level");
		$result=$this->db->get("studylevel")->result_array();
		return $result;
	}


}


?>