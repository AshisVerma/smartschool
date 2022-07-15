<?php

class Users_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("user",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistuser($data){
        $this->db->where("room_no",$data['room_no']);
        
        $query=$this->db->get("user");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("user");
		return $result->result_array();
	}

function all(){
	$this->db->where("status",1);
		$result=$this->db->get("user");
		return $result->result_array();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("user")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("user",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("user",['status'=>1]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		

	}


	function update($data){
		$this->db->where("email",$data['email']);
		$result=$this->db->get("user");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"user successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("user",$data);
			if($result){
				return array("message"=>"user is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$data=$this->db->get_where("user",['id'=>$id])->row();
		$result=$this->db->where("id",$id)->delete("user");
		if($result){
			unlink(base_url()."admin/user/images/".$data->image);
			return true;
		}
		else{
			return false;
		}

	}


	function user($year){
		
		$this->db->where("year",$year);
		$result=$this->db->get("user");
		return $result->result_array();
	}


	function edit($id){
		$query=$this->db->get_where("user",['id'=>$id]);
		return $query->row();
	}
}


?>