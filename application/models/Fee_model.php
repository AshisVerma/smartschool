<?php

class Fee_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){

		
     $query=$this->db->insert("fee",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistFee($data){

        $this->db->where("year",$data['year']);
         $this->db->where("level",$data['level']);
          $this->db->where("class",$data['class']);
        $query=$this->db->get("fee");

        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("fee");
		return $result->result_array();
	}
	function all(){
	$this->db->where("status",1);
		$result=$this->db->get("fee");
		return $result->result_array();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("fee")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("fee",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("fee",['status'=>1]);
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
		$result=$this->db->get("fee");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"fee successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("fee",['year'=>$data['year']]);
			if($result){
				return array("message"=>"fee is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("fee");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}

	function getfeeDetails($data){
		$this->db->where("year",$data['year']);
		$this->db->where("class",$data['class']);
		$this->db->where("semester",$data['semester']);
		$this->db->where("level",$data['level']);
		$result=$this->db->get("fee")->result_array();
		return $result;
	}



	function getFee($year,$class,$level){

		$this->db->select(["fee_type","amount"]);
		$this->db->where("year",$year);
		$this->db->where("class",$class);
		$this->db->where("level",$level);
		$query=$this->db->get("fee");
		if($query->num_rows()>0){
			return $query->result_array();
		}
		
	}
}


?>