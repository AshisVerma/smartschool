<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Discounttype extends Admin_Controller {

    public function __construct() {
        parent::__construct();
          $this->load->model("Discounttype_model");
          $this->load->library("form_validation");
          $this->load->helper("url");
          $this->load->library("session");
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('studyyear', 'can_view')) {
            access_denied();
        }
             
     


        $json_array = array();
        $this->session->set_userdata('top_menu', 'Studyyear');
        $this->session->set_userdata('sub_menu', 'studyyear/index');
        $data['title'] = 'Fee';
        $data['title_list'] = 'Fee_list';
        $data['discount']=$this->Discounttype_model->get();
        
        $data['section_array'] = $json_array;
        
      
        $this->load->view('layout/header', $data);
        $this->load->view('admin/discounttype/add', ['data'=>$data]);
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
            "name"=>$this->input->post("name")
        );
        $checkExist=$this->Discounttype_model->checkExist($data);
        if(!$checkExist){
           $create=$this->Discounttype_model->add($data);
           if($create){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Fee Discount created successfully</div>");
            redirect("admin/discounttype");
           }
           else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/discounttype");
           }
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Fee Discount already exists</div>");
            redirect("admin/discounttype");
        }

    }

//end add study year


    //change status coding start

    public function status($id)
    {
       $check=$this->Discounttype_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Discount Type Status Updated successfully</div>");
            redirect("admin/discounttype");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("admin/discounttype");
       }
    }
    //end change status coding start
    public function update() {
        if (!$this->rbac->hasPrivilege('subject_group', 'can_edit')) {
            access_denied();
        }
        $data=array("id"=>$this->input->post("id"),"name"=>$this->input->post("name"));
        $update=$this->Discounttype_model->update($data);
        if($update['status']){
            $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Discount Type  Updated successfully</div>");
            redirect("admin/discounttype");
        }
        else{
            $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>".$update['message']."</div>");
            redirect("admin/discounttype");
        }
        
    }

  
    public function delete($id){
        $check=$this->Discounttype_model->delete($id);
        if($check){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Discount Type  Deleted successfully</b></div>");
            redirect("admin/discounttype");
        }
        else{
               $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>Whoops! something is wrong try again</b>/div>");
            redirect("admin/discounttype");
        }

    }


    
    // public function semester_details(){
    //     $classname= $_GET['class'];
    //     $year=$_GET['year'];
    //     $data=$this->Semesters_model->semester_details($classname,$year);
    //     $level=$this->Studylevel_model->get_level_by_class($classname);
      

    //     if(!empty($data) && !empty($level)){
    //         echo json_encode(['data'=>$data,"level"=>$level]);
    //     }
    // }

}
