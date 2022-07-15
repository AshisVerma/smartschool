<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Bookcategory extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encoding_lib');
        $this->load->model("Bookcategory_model");
    }

    public function index()
    {   


        if (!$this->rbac->hasPrivilege('books', 'can_view')) {
            access_denied();
        }
       
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'bookcategory/index');

        $data['title']      = 'Add Book category';
        $data['title_list'] = 'Bookcategory Details';
        $listbook           = $this->book_model->listbook();
        $data['listbook']   = $listbook;
        $this->load->view('layout/header');
        $this->load->view('admin/bookcategory/create', $data);
        $this->load->view('layout/footer');
    }

    public function list()
    {

        if (!$this->rbac->hasPrivilege('books', 'can_view')) {
            access_denied();
        }
         $data=$this->Bookcategory_model->get();

        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'bookcategory/list');
        $this->load->view('layout/header');
        $this->load->view('admin/bookcategory/list',['bookcategory'=>$data]);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        if (!$this->rbac->hasPrivilege('books', 'can_add')) {
            access_denied();
        }


        $data['title']      = 'Add Book category';
        $data['title_list'] = 'Book Details';
        $this->form_validation->set_rules('book_category', $this->lang->line('book_category'), 'trim|required|xss_clean',array('book_category.required'=>"Book category can`t be empty"));
        if ($this->form_validation->run() == false) {
           
            $this->load->view('layout/header');
            $this->load->view('admin/bookcategory/create', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'name'  => $this->input->post('book_category'),
                );

            
             $checkExist=$this->Bookcategory_model->checkExist($data);
             if($checkExist){
                 $this->load->view('layout/header');
            $this->load->view('admin/bookcategory/create', $data);
            $this->load->view('layout/footer');
            $this->session->set_flashdata("msg","<div class='alert alert-warning'>Book Category Already exist<i class='fa fa-close close' data-dismiss='alert'></i></div>");
             }
             else{
                $create=$this->Bookcategory_model->add($data);
                if($create){
                   $this->session->set_flashdata("msg","<div class='alert alert-success'>Book Category created successfully<i class='fa fa-close close' data-dismiss='alert'></i></div>");
                   redirect("/admin/bookcategory/index");
                }
                else{
                    $this->session->set_flashdata("msg","<div class='alert alert-warning'>Whoops! something is wrong try again<i class='fa fa-close close' data-dismiss='alert'></i></div>");
                   redirect("/admin/bookcategory/index");

                }
             }
            
        }
    }

    public function edit($id)
    {
        if (!$this->rbac->hasPrivilege('books', 'can_edit')) {
            access_denied();
        }
        if($this->input->server('REQUEST_METHOD')=="GET"){
            $bookcategorydata=$this->Bookcategory_model->edit($id);
             $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'bookcategory/edit');

        $data['title']      = 'Edit Book category';
        $data['title_list'] = 'Bookcategory Details';
        $listbook           = $this->book_model->listbook();
        $data['listbook']   = $listbook;
        $this->load->view('layout/header');
        $this->load->view('admin/bookcategory/edit', ["bookcategorydata"=>$bookcategorydata]);
        $this->load->view('layout/footer');
        }
        
         
    }

    public function editdata(){
        $data=array("id"=>$this->input->post("id"),"name"=>$this->input->post("book_category"));

            $update=$this->Bookcategory_model->update($data);
            if($update['status']){
                 $this->session->set_flashdata("msg","<div class='alert alert-success'>Book Category updated successfully<i class='fa fa-close close' data-dismiss='alert'></i></div>");
                   redirect("/admin/bookcategory/list");
            }
            else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning'>Whoops! something is wrong try again<i class='fa fa-close close' data-dismiss='alert'></i></div>");
                   redirect("/admin/bookcategory/list");
            }
    }

      public function status($id)
    {
    
           
       $check=$this->Bookcategory_model->status($id);
       if($check){
         $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Book Category Status Updated successfully</div>");
            redirect("/admin/bookcategory/list");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("/admin/bookcategory/list");
       }
    }

    public function delete($id)
    {
        if (!$this->rbac->hasPrivilege('books', 'can_delete')) {
            access_denied();
        }
        $delete=$this->Bookcategory_model->delete($id);
        if($delete){
             $this->session->set_flashdata("msg","<div class='alert alert-success'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Book Category Deleted successfully</div>");
            redirect("/admin/bookcategory/list");
       }
       else{
        $this->session->set_flashdata("msg","<div class='alert alert-warning'><i class='fa fa-times-circle close' data-dismiss='alert'></i>Whoops! something is wrong try again</div>");
            redirect("/admin/bookcategory/list");
       }

       
        
    }

    public function getAvailQuantity()
    {

        $book_id   = $this->input->post('book_id');
        $available = 0;
        if ($book_id != "") {
            $result    = $this->bookissue_model->getAvailQuantity($book_id);
            $available = $result->qty - $result->total_issue;
        }
        $result_final = array('status' => '1', 'qty' => $available);
        echo json_encode($result_final);
    }

    public function import()
    {
        $data['fields'] = array('book_title', 'book_no', 'isbn_no', 'subject', 'rack_no', 'publish', 'author', 'qty', 'perunitcost', 'postdate', 'description', 'available');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_csv_upload');
        if ($this->form_validation->run() == false) {

            $this->load->view('layout/header');
            $this->load->view('admin/book/import', $data);
            $this->load->view('layout/footer');
        } else {
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if ($ext == 'csv') {
                    $file = $_FILES['file']['tmp_name'];
                    $this->load->library('CSVReader');
                    $result = $this->csvreader->parse_file($file);

                    $rowcount = 0;
                    if (!empty($result)) {
                        foreach ($result as $r_key => $r_value) {
                            $result[$r_key]['book_title']  = $this->encoding_lib->toUTF8($result[$r_key]['book_title']);
                            $result[$r_key]['book_no']     = $this->encoding_lib->toUTF8($result[$r_key]['book_no']);
                            $result[$r_key]['isbn_no']     = $this->encoding_lib->toUTF8($result[$r_key]['isbn_no']);
                            $result[$r_key]['subject']     = $this->encoding_lib->toUTF8($result[$r_key]['subject']);
                            $result[$r_key]['rack_no']     = $this->encoding_lib->toUTF8($result[$r_key]['rack_no']);
                            $result[$r_key]['publish']     = $this->encoding_lib->toUTF8($result[$r_key]['publish']);
                            $result[$r_key]['author']      = $this->encoding_lib->toUTF8($result[$r_key]['author']);
                            $result[$r_key]['qty']         = $this->encoding_lib->toUTF8($result[$r_key]['qty']);
                            $result[$r_key]['perunitcost'] = $this->encoding_lib->toUTF8($result[$r_key]['perunitcost']);
                            $result[$r_key]['postdate']    = $this->encoding_lib->toUTF8($result[$r_key]['postdate']);
                            $result[$r_key]['description'] = $this->encoding_lib->toUTF8($result[$r_key]['description']);
                            $rowcount++;
                        }

                        $this->db->insert_batch('books', $result);
                    }
                    $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('records_found_in_CSV_file_total') . ' ' . $rowcount . ' ' . $this->lang->line('records_imported_successfully'));
                }
            } else {
                $msg = array(
                    'e' => 'The File field is required.',
                );
                $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">' . $this->lang->line('total') . ' ' . count($result) . "  " . $this->lang->line('records_found_in_CSV_file_total') . " " . $rowcount . ' ' . $this->lang->line('records_imported_successfully') . '</div>');
            redirect('admin/book/import');
        }
    }

    public function import_new()
    {

        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if ($ext == 'csv') {
                $file = $_FILES['file']['tmp_name'];
                $this->load->library('CSVReader');
                $result = $this->csvreader->parse_file($file);

                $rowcount = 0;
                if (!empty($result)) {
                    foreach ($result as $r_key => $r_value) {
                        $result[$r_key]['book_title']  = $this->encoding_lib->toUTF8($result[$r_key]['book_title']);
                        $result[$r_key]['book_no']     = $this->encoding_lib->toUTF8($result[$r_key]['book_no']);
                        $result[$r_key]['isbn_no']     = $this->encoding_lib->toUTF8($result[$r_key]['isbn_no']);
                        $result[$r_key]['subject']     = $this->encoding_lib->toUTF8($result[$r_key]['subject']);
                        $result[$r_key]['rack_no']     = $this->encoding_lib->toUTF8($result[$r_key]['rack_no']);
                        $result[$r_key]['publish']     = $this->encoding_lib->toUTF8($result[$r_key]['publish']);
                        $result[$r_key]['author']      = $this->encoding_lib->toUTF8($result[$r_key]['author']);
                        $result[$r_key]['qty']         = $this->encoding_lib->toUTF8($result[$r_key]['qty']);
                        $result[$r_key]['perunitcost'] = $this->encoding_lib->toUTF8($result[$r_key]['perunitcost']);
                        $result[$r_key]['postdate']    = $this->encoding_lib->toUTF8($result[$r_key]['postdate']);
                        $result[$r_key]['description'] = $this->encoding_lib->toUTF8($result[$r_key]['description']);
                        $rowcount++;
                    }

                    $this->db->insert_batch('books', $result);
                }
                $array = array('status' => 'success', 'error' => '', 'message' => 'records found in CSV file. Total ' . $rowcount . 'records imported successfully.');
            }
        } else {
            $msg = array(
                'e' => 'The File field is required.',
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        }

        echo json_encode($array);
    }

    public function handle_csv_upload()
    {
        $error = "";
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('csv');
            $mimes       = array('text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt');
            $temp      = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if (!in_array($_FILES['file']['type'], $mimes)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }
            if (!in_array($extension, $allowedExts)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($error == "") {
                return true;
            }
        } else {
            $this->form_validation->set_message('handle_csv_upload', $this->lang->line('please_select_file'));
            return false;
        }
    }

    public function exportformat()
    {
        $this->load->helper('download');
        $filepath = "./backend/import/import_book_sample_file.csv";
        $data     = file_get_contents($filepath);
        $name     = 'import_book_sample_file.csv';

        force_download($name, $data);
    }

    public function issue_report()
    {

        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'Library/book/issue_report');
        $data['title']       = 'Add Teacher';
        $teacher_result      = $this->teacher_model->getLibraryTeacher();
        $data['teacherlist'] = $teacher_result;

        $genderList         = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $issued_books       = $this->bookissue_model->getissueMemberBooks();

        $data['issued_books'] = $issued_books;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/book/issuereport', $data);

        $this->load->view('layout/footer', $data);
    }

    public function issue_returnreport()
    {
        $this->session->set_userdata('top_menu', 'Reports');
        $this->session->set_userdata('sub_menu', 'Reports/library');
        $this->session->set_userdata('subsub_menu', 'Reports/library/issue_returnreport');
        $data['title']  = 'Add Teacher';
        $teacher_result = $this->teacher_model->getLibraryTeacher();

        $issued_books         = $this->bookissue_model->getissuereturnMemberBooks();
        $data['issued_books'] = $issued_books;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/book/issue_returnreport', $data);
        $this->load->view('layout/footer', $data);
    }

    public function getbooklist()
    {

        $listbook        = $this->book_model->getbooklist();
        $m               = json_decode($listbook);
        $currency_symbol = $this->customlib->getSchoolCurrencyFormat();
        $dt_data         = array();
        if (!empty($m->data)) {
            foreach ($m->data as $key => $value) {
                $editbtn   = '';
                $deletebtn = '';

                if ($this->rbac->hasPrivilege('books', 'can_edit')) {
                    $editbtn = "<a href='" . base_url() . "admin/book/edit/" . $value->id . "'   class='btn btn-default btn-xs'  data-toggle='tooltip' data-placement='left' title='" . $this->lang->line('edit') . "'><i class='fa fa-pencil'></i></a>";
                }
                if ($this->rbac->hasPrivilege('books', 'can_delete')) {
                    $deletebtn = "<a onclick='return confirm(" . '"' . $this->lang->line('delete_confirm') . '"' . "  )' href='" . base_url() . "admin/book/delete/" . $value->id . "' class='btn btn-default btn-xs' data-placement='left' title='" . $this->lang->line('delete') . "' data-toggle='tooltip'><i class='fa fa-trash'></i></a>";
                }

                $row   = array();
                $row[] = $value->book_title;
                if ($value->description == "") {
                    $row[] = $this->lang->line('no_description');
                } else {
                    $row[] = $value->description;
                }
                $row[]     = $value->book_no;
                $row[]     = $value->isbn_no;
                $row[]     = $value->publish;
                $row[]     = $value->author;
                $row[]     = $value->subject;
                $row[]     = $value->rack_no;
                $row[]     = $value->qty;
                $row[]     = $value->qty - $value->total_issue;
                $row[]     = $currency_symbol . $value->perunitcost;
                $row[]     = $this->customlib->dateformat($value->postdate);
                $row[]     = $editbtn . ' ' . $deletebtn;
                $dt_data[] = $row;
            }
        }

        $json_data = array(
            "draw"            => intval($m->draw),
            "recordsTotal"    => intval($m->recordsTotal),
            "recordsFiltered" => intval($m->recordsFiltered),
            "data"            => $dt_data,
        );
        echo json_encode($json_data);
    }

    /* function to get book inventory report by using datatable */
    public function dtbookissuereturnreportlist()
    {
        $teacher_result = $this->teacher_model->getLibraryTeacher();
        $issued_books   = $this->bookissue_model->getissuereturnMemberBooks();
        $resultlist     = json_decode($issued_books);
        $dt_data        = array();

        if (!empty($resultlist->data)) {

            $editbtn   = "";
            $deletebtn = "";
            foreach ($resultlist->data as $resultlist_key => $value) {

                $row   = array();
                $row[] = $value->book_title;
                $row[] = $value->book_no;
                $row[] = date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value->issue_date));
                $row[] = date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value->return_date));
                $row[] = $value->members_id;
                $row[] = $value->library_card_no;

                if ($value->admission != 0) {

                    $row[] = $value->admission;

                } else {
                    $row[] = "";
                }
                $row[] = ucwords($value->fname) . " " . ucwords($value->lname);
                $row[] = $value->member_type;

                $dt_data[] = $row;
            }

        }
        $json_data = array(
            "draw"            => intval($resultlist->draw),
            "recordsTotal"    => intval($resultlist->recordsTotal),
            "recordsFiltered" => intval($resultlist->recordsFiltered),
            "data"            => $dt_data,
        );
        echo json_encode($json_data);
    }

}