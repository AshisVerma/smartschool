<?php

class Vehicles_model extends MY_Model{
	function __construct(){
		parent::__construct();
		 $this->current_session = $this->setting_model->getCurrentSession();
		 $this->load->database();
	}

	function add($data){
		
		foreach($data as $list){
			$query=$this->db->insert("vehicles_tbl",$list);
			
		}
		
     
     if($query){
     	return true;
     }
     else{
     	return false;
     }
	}


	function checkExistvehicles_tbl($data){
        $this->db->where("room_no",$data['room_no']);
        
        $query=$this->db->get("vehicles_tbl");
        if($query->num_rows()>0){
        	return true;
        }
        else{
        	return false;
        }
	}

	function get(){
		 $this->db->select("v.id,v.transportation_line,v.transportation_area,v.vehicle_id,
		 	t.transportation_area,
		 	t.transportationline,
		 	t.drop_point,
		 	t.stop_time,
		 	t.amount,
		 	t.fee_type,
		 	vc.vehicle_no,
            vc.vehicle_model,
            vc.manufacture_year,
            vc.driver_name,
            vc.driver_licence,
            vc.driver_contact,
            vc.note")->from("vehicles_tbl v");
         $this->db->join("transportationline t","t.id=v.transportation_line","left");
         $this->db->join("vehicles vc","vc.id=v.vehicle_id","left");
	     
	    $query= $this->db->get();
	     return ($query->result_array());
	   
	}

function all(){

         $this->db->select("*")->from("vehicles_tbl vehicle");
         $this->db->join("transportationline t","t.id=vehicle.transportation_line","left");
	     $this->db->where("status","1");
	    $query= $this->db->get();
	     print_r($query->result_array());
	     die;


		
		
	}


	function status($id){
		$this->db->where("id",$id);
		$result=$this->db->get("vehicles_tbl")->row();

		
		if($result->status==1){
        $this->db->where("id",$id);
        $result=$this->db->update("vehicles_tbl",['status'=>0]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		else{
            $this->db->where("id",$id);
        $result=$this->db->update("vehicles_tbl",['status'=>1]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
		}
		

	}


	


	public function delete($id){
		$result=$this->db->where("id",$id)->delete("vehicles_tbl");
		if($result){
			return true;
		}
		else{
			return false;
		}

	}


	function vehicles_tbl($year){
		
		$this->db->where("year",$year);
		$result=$this->db->get("vehicles_tbl");
		return $result->result_array();
	}


	function edit($id){
		  $this->db->where("id",$id);
		  $vehicle_data=$this->db->get("vehicles_tbl")->row();

		  $transportationarea=$this->db->get("transportationarea")->result_array();
		  $this->db->where("id",$vehicle_data->transportation_area);
		  $specific_transportation_data=$this->db->get("transportationarea")->row();
		  $this->db->where("transportation_area",$specific_transportation_data->name);
		  $transportationline_data=$this->db->get("transportationline")->result_array();
		  
		  $all_vehicle=$this->db->get("vehicles")->result_array();
		  return json_encode(array("vehicle_data"=>$vehicle_data,"transportationarea"=>$transportationarea,"transportationline"=>$transportationline_data,"all_vehicle"=>$all_vehicle));
		  
		  
	}


	function update($data){
		$this->db->where("transportation_area",$data['transportation_area']);
		$this->db->where("transportation_line",$data['transportation_line']);
		$this->db->where("vehicle_id",$data['id']);
		$result=$this->db->get("vehicles_tbl");
		if($result->num_rows()>1){
			
		}
		else{
			$this->db->where("id",$data['id']);
			$update=$this->db->update("vehicles_tbl",$data);
			if($update){
				return array("message"=>"Vehicle Updated successfully","status"=>true);
			}
			else{
				return array("message"=>"Whoops! something is wrong","status"=>true);
			}
		}

	}
}


?>