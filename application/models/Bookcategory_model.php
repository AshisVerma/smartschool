<?php

class Bookcategory_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
     $query=$this->db->insert("book_category",$data);
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExist($data){
        $this->db->where("name",$data['book_category']);
        
        $query=$this->db->get("book_category");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		$result=$this->db->get("book_category");
		return $result->result_array();
	}

function all(){
	$this->db->where("status",1);
		$result=$this->db->get("book_category");
		return $result->result_array();
	}

	function edit($id){
	$this->db->where("id",$id);
		$result=$this->db->get("book_category");
		return $result->row();
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("book_category")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("book_category",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("book_category",['status'=>1]);
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
		$result=$this->db->get("book_category");
		$result=$result->num_rows();
		if($result>1){
			return array("message"=>"Book category successfully updated","status"=>false);
		}
		else{
			$this->db->where("id",$data['id']);
			$result=$this->db->update("Book_category",$data);
			if($result){
				return array("message"=>"Book category is already exist","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong try again","status"=>false);
			}

		}
	}


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("book_category");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}


	
}


?>