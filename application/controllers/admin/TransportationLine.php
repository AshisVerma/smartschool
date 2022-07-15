<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class TransportationLine extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model(['TransportationLine_model','TransportationArea_model']);
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('TransportationLine', 'can_view')) {
            access_denied();
        }
             



        $json_array = array();
        $this->session->set_userdata('top_menu', 'TransportationLine');
        $this->session->set_userdata('sub_menu', 'TransportationLine/index');
        $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        // $transportationarea=$this->TransportationLine_model->get();
        // $data['disc']=$this->Guardian_model->get();
        
        $data['section_array'] = $json_array;
        
        $transportationline=$this->TransportationLine_model->get();
         $transportationarea=$this->TransportationArea_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/transportationline/add', ['data'=>$data,'transportationline'=>$transportationline,'transportationarea'=>$transportationarea]);
        $this->load->view('layout/footer', $data);

        // $this->form_validation->set_rules(
        //         'name', $this->lang->line('name'), array(
        //     'required',
        //     array('class_exists', array($this->subjectgroup_model, 'class_exists')),
        //         )
        // );

        // $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required|xss_clean');

        // $this->form_validation->set_rules('subject[]', $this->lang->line('subject'), 'trim|required|xss_clean');



        // $this->form_validation->set_rules(
        //         'sections[]', $this->lang->line('section'), array(
        //     'required',
        //     array('check_section_exists', array($this->subjectgroup_model, 'check_section_exists'))
        //         )
        // );


        // if ($this->form_validation->run() == false) {
        //     $data['section_array'] = $this->input->post('sections');
        // } else {
        //     $name = $this->input->post('name');
        //     $session = $this->setting_model->getCurrentSession();
        //     $class_array = array(
        //         'name' => $this->input->post('name'),
        //         'session_id' => $session,
        //         'description' => $this->input->post('description'),
        //     );
        //     $subject = $this->input->post('subject');
        //     $sections = $this->input->post('sections');

        //     $this->subjectgroup_model->add($class_array, $subject, $sections);
        //     $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
        //     redirect('admin/subjectgroup');
        // }
        // $subject_list = $this->subject_model->get();
        // $data['subjectlist'] = $subject_list;
        // $subjectgroupList = $this->subjectgroup_model->getByID();
        // $data['subjectgroupList'] = $subjectgroupList;
        
    }
// add study year
    public function add() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_delete')) {
            access_denied();
        }
      

     
         $data=array(
            "transportationline"=>$this->input->post("transportationline"),
            "transportation_area"=>$this->input->post("transportationarea"),
            "drop_point"=>$this->input->post("drop_point"),
            "stop_time"=>$this->input->post("stop_time"),
            "amount"=>$this->input->post("amount"),
            "fee_type"=>$this->input->post("fee"),

        );

        
        $checkExist=$this->TransportationLine_model->checkExist($data);
        if(!$checkExist){
           $create=$this->TransportationLine_model->add($data);
           if($create){
              
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Transportation Line  Registered successfully</div>");
            redirect("admin/transportationline");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/transportationline");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Guardian Email already exists</div>");
            redirect("admin/transportationarea");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {


       $check=$this->TransportationLine_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>TransportationLine Status Updated successfully</div>");
            redirect("admin/transportationline");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/transportationline");
       }
    }
    //end change status coding start
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
           
           $data=array(
            "transportationline"=>$this->input->post("transportationline"),
            "transportation_area"=>$this->input->post("transportationarea"),
            "drop_point"=>$this->input->post("drop_point"),
            "stop_time"=>$this->input->post("stop_time"),
            "amount"=>$this->input->post("amount"),
            "fee_type"=>$this->input->post("fee"),
            "id"=>$this->input->post("id"),

        );

              $update=$this->TransportationLine_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>TransportationLine Details   Updated successfully</div>");
            redirect("admin/transportationline");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/transportationline");
        }

     
        
      
        
    }

  
    public function delete($id){
        $check=$this->TransportationLine_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>TransportationLine  Deleted successfully</b></div>");
            redirect("admin/transportationline");
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/transportationline");
        }

    }


    
    public function list(){

      $data=$this->TransportationArea_model->get();
  
      $this->load->view('layout/header', $data);
        $this->load->view("admin/guardian/list",['guardian'=>$data]);
        $this->load->view('layout/footer', $data);
     
        
    }

    public function edit($id){
        $transportationarea=$this->TransportationArea_model->get();
        $data=$this->TransportationLine_model->edit($id);
         $this->load->view('layout/header', $data);
        $this->load->view('admin/transportationline/edit', ['data'=>$data,'transportationarea'=>$transportationarea]);
        $this->load->view('layout/footer', $data);

    }

}
