<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehroute extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(['TransportationArea_model',"TransportationLine_model","Vehicles_model"]);
    }

    function index() {



        if (!$this->rbac->hasPrivilege('assign_vehicle', 'can_view')) {
            
        }
        $this->session->set_userdata('top_menu', 'Transport');
        $this->session->set_userdata('sub_menu', 'vehroute/index');
        $data['title'] = 'Add Vehicle Route';
        $data['title_list'] = 'Recent Vehicle Routes';

      
        $vehicle_result = $this->vehicle_model->get();
        $data['vehiclelist'] = $vehicle_result;


        $routeList = $this->route_model->get();
        $data['routelist'] = $routeList;
        $vehroute_result = $this->Vehicles_model->get();


        $data['vehroutelist'] = $vehroute_result;

        $transportationarea=$this->TransportationArea_model->all();

        $this->load->view('layout/header', $data);
        $this->load->view('admin/vehroute/vehrouteList', ['data'=>$data,"transportationarea"=>$transportationarea]);
        $this->load->view('layout/footer', $data);
    }

    public function add(){

            
           
          $this->form_validation->set_rules("transportationarea","transportationarea","xss_clean|required|trim",array("required"=>"Select Transportationarea"));
         $this->form_validation->set_rules("transportationline","transportationline","xss_clean|required|trim",array("required"=>"Select Transportationline"));
        
        //i have romove form validation here
        //when we complete then we applied form validation
        if ($this->form_validation->run()==false) {
            
        } else {
            


            $vehicle = $this->input->post('vehicle');
            $transportationarea = $this->input->post('transportationarea');
            $transportationline=$this->input->post("transportationline");
            $vehicle_batch_array = array();
            foreach ($vehicle as $vec_key => $vec_value) {

                $vehicle_array = array(
                    'transportation_area' => $transportationarea,
                    "transportation_line"=>$transportationline,
                    'vehicle_id' => $vec_value,
                );

                $vehicle_batch_array[] = $vehicle_array;
            }
            
            
           $check= $this->Vehicles_model->add($vehicle_batch_array);
           if($check){
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/vehroute/index');
           }
           else{
                        $this->session->set_flashdata('msg', '<div class="alert alert-warning text-left">Whoops! something is wrong</div>');
            redirect('admin/vehroute/index');
           }

        }
    }

    // function delete($id) {

    //     $this->vehroute_model->removeByroute($id);
    //     redirect('admin/vehroute');
    // }

    // function edit($id) {


    //     $data['title'] = 'Edit Fees Master';
    //     $data['id'] = $id;
    //     $vehroute = $this->vehroute_model->get($id);

    //     $data['vehroute'] = $vehroute;
    //     $data['title_list'] = 'Fees Master List';

    //     $this->form_validation->set_rules(
    //             'route_id', $this->lang->line('route'), array(
    //         'required',
    //         array('route_exists', array($this->vehroute_model, 'route_exists'))
    //             )
    //     );
    //     $this->form_validation->set_rules('vehicle[]', $this->lang->line('vehicle'), 'trim|required|xss_clean');


    //     if ($this->form_validation->run() == FALSE) {
    //         $vehicle_result = $this->vehicle_model->get();
    //         $data['vehiclelist'] = $vehicle_result;
    //         $routeList = $this->route_model->get();
    //         $data['routelist'] = $routeList;
    //         $vehroute_result = $this->vehroute_model->get();
    //         $data['vehroutelist'] = $vehroute_result;
    //         $this->load->view('layout/header', $data);
    //         $this->load->view('admin/vehroute/vehrouteEdit', $data);
    //         $this->load->view('layout/footer', $data);
    //     } else {

    //         $vehicle = $this->input->post('vehicle');
    //         $prev_vec_route = $this->input->post('prev_vec_route');
    //         $pre_route_id = $this->input->post('pre_route_id');
    //         $route_id = $this->input->post('route_id');

    //         $add_result = array_diff($vehicle, $prev_vec_route);
    //         $delete_result = array_diff($prev_vec_route, $vehicle);


    //         if ($pre_route_id != $route_id) {
    //             $this->vehroute_model->removeByroute($pre_route_id);
    //             $vehicle_batch_array = array();
    //             foreach ($vehicle as $vec_key => $vec_value) {

    //                 $vehicle_array = array(
    //                     'route_id' => $route_id,
    //                     'vehicle_id' => $vec_value,
    //                 );

    //                 $vehicle_batch_array[] = $vehicle_array;
    //             }


    //             $this->vehroute_model->add($vehicle_batch_array);
    //         } else {

    //             if (!empty($add_result)) {
    //                 $vehicle_batch_array = array();
    //                 foreach ($add_result as $vec_add_key => $vec_add_value) {

    //                     $vehicle_array = array(
    //                         'route_id' => $pre_route_id,
    //                         'vehicle_id' => $vec_add_value,
    //                     );

    //                     $vehicle_batch_array[] = $vehicle_array;
    //                 }
    //                 $this->vehroute_model->add($vehicle_batch_array);
    //             }

    //             if (!empty($delete_result)) {
    //                 $vehicle_delete_array = array();
    //                 foreach ($delete_result as $vec_delete_key => $vec_delete_value) {

    //                     $vehicle_delete_array[] = $vec_delete_value;
    //                 }

    //                 $this->vehroute_model->remove($pre_route_id, $vehicle_delete_array);
    //             }
    //         }



    //         $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
    //         redirect('admin/vehroute/index');
    //     }
    // }



    public function transportationline(){

    $transportationarea=$this->input->get("transportationarea");
    $data=$this->TransportationLine_model->getByTransportaion($transportationarea);
      $all_data=array();
      foreach($data as $key=> $list){
       $all_data[$key]=$list;
      }
    
      if(!empty($data)){
        echo json_encode($data);
      }
    }



     public function edit($id){
       $data=$this->Vehicles_model->edit($id);
       $data=json_decode($data,true);
       $transportationarea=($data['transportationarea']);
       $transportationline=$data['transportationline'];
       $vehicle_data=$data['vehicle_data'];
       $all_vehicle=$data['all_vehicle'];


        $this->session->set_userdata('top_menu', 'Transport');
        $this->session->set_userdata('sub_menu', 'vehroute/index');
        $data['title'] = 'Add Vehicle Route';
        $data['title_list'] = 'Recent Vehicle Routes';
          $this->load->view('layout/header', $data);
        $this->load->view('admin/vehroute/vehrouteEdits', ['vehicle_data'=>$vehicle_data,"transportationarea"=>$transportationarea,"transportationline"=>$transportationline,"all_vehicle"=>$all_vehicle]);
        $this->load->view('layout/footer', $data);


     }


     public function update(){


       $data=array(
          "id"=>$this->input->post("id"),
          "transportation_area"=>$this->input->post("transportationarea"),
          "transportation_line"=>$this->input->post("transportationline"),
          "vehicle_id"=>$this->input->post("vehicle")
      );
       $update=$this->Vehicles_model->update($data);
       if($update['status']){
        $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-close close' data-dismiss='alert'></i>Vehicle Update successful</div>");
        redirect("admin/vehroute");
       }
       else{
         $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-close close' data-dismiss='alert'></i>Whoops! something is wrong</div>");
        redirect("admin/vehroute");

       }
     }



     public function delete($id){
           $check=$this->Vehicles_model->delete($id);
           if($check){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-close close' data-dismiss='alert'></i>Vehicle Deleted successful</div>");
        redirect("admin/vehroute");
           }
           else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-close close' data-dismiss='alert'></i>Whoops! something is wrong</div>");
        redirect("admin/vehroute");
           }
     }


}

?>