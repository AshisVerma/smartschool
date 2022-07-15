
<style type="text/css">
  .d-none{
    display: none;
  }

.modal-confirm {    
  color: #636363;
  width: 400px;
}
.modal-confirm .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
  text-align: center;
  font-size: 14px;
}
.modal-confirm .modal-header {
  border-bottom: none;   
  position: relative;
}
.modal-confirm h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -10px;
}
.modal-confirm .close {
  position: absolute;
  top: -5px;
  right: -2px;
}
.modal-confirm .modal-body {
  color: #999;
}
.modal-confirm .modal-footer {
  border: none;
  text-align: center;   
  border-radius: 5px;
  font-size: 13px;
  padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
  color: #999;
}   
.modal-confirm .icon-box {
  width: 80px;
  height: 80px;
  margin: 0 auto;
  border-radius: 50%;
  z-index: 9;
  text-align: center;
  border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
  color: #f15e5e;
  font-size: 46px;
  display: inline-block;
  margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
  color: #fff;
  border-radius: 4px;
  background: #60c7c1;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  min-width: 120px;
  border: none;
  min-height: 40px;
  border-radius: 3px;
  margin: 0 5px;
}
.modal-confirm .btn-secondary {
  background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
  background: #a8a8a8;
}
.modal-confirm .btn-danger {
  background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
  background: #ee3535;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}
.mb-4{
  margin-bottom: 10px;
}

</style>
<div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-calendar-check-o"></i> <?php echo $this->lang->line('attendance'); ?> <small> <?php echo $this->lang->line('by_date1'); ?> </small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
   
  <div class="row">
<div class="col-sm-12 mb-4">
  <button class="btn btn-primary mb-4 " style="float: right;" data-target="#add-modal" data-toggle="modal"><i class="fa fa-plus"></i> Add Class</button>

</div>
<br>
    <div class="col-sm-12"> <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?></div>
    <div class="col-sm-12 col-md-12 col-lg-12">

  

          <div class="box box-warning add-transportation-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">GOOGLE METTING LIVE CLASSES</h3>
                    </div>
                   
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?> 
                               

                                
       <div class="mailbox-messages table-responsive">
                                <div class="download_label"><?php echo $this->lang->line('item_list'); ?></div>
                                <table class="table table-hover table-striped table-bordered example">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Class title</th>
                                            <th>Date</th>
                                            <th>Duration</th>
                                            <th>Created By</th>
                                            <th>Created for</th>
                                            <th>Class & Section</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    
                                   </tbody>
                                </table><!-- /.table -->



                            </div><!-- /.mail-box-messages -->
                                 

                                
                             
                             

                             
                            
                             

                        </div>
                       
                    
                </div>

                <div class="box box-primary edit-transportation-box d-none" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Income Group</h3>
                    </div>
                    <form id="edit-form" action="<?php echo site_url('admin/incomegroup/update') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                <input type="hidden" name="id">
                            <?php echo $this->customlib->getCSRF(); ?> 
                                              
                           <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Income Group</label><small class="req"> *</small>
                                  <input type="text" name="name" class="form-control" placeholder="Income Group">
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>
                             

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </form>
                </div>
                
  
 
    </div>

  
   
  </div>
  </section>
</div>

<!---Add Google Meet classss -------------->
<div class="modal fade" id="add-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h3 class="modal-title p-font" id="staticBackdropLabel " style="font-weight: bolder;">Add  Live Classes</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-3 py-3">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Class Title</label>
              <input type="text" name="title" class="form-control" placeholder="Class Title">
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-6">
             <div class="form-group">
              <label>Class Date</label>
              <input type="date" name="title" class="form-control date" placeholder="Class Title" id="date">
            </div>
          </div>
          <div class="col-md-6">
             <div class="form-group">
              <label>Duration(minutes)</label>
              <input type="number" name="time" class="form-control" placeholder="Class Title">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
             <div class="form-group">
              <label>Roll</label>
              <select class="form-control" name="roll">
                <option>Select Role</option>
                <?php foreach($role as $roles){?>

                  <option><?php echo $roles['name'] ?></option>


              <?php }?>
              </select>
            </div>
          </div>
         
        </div>
         <div class="row">
          <div class="col">
             <div class="form-group">
              <label>Staff</label>
              <select class="form-control" name="staff">
                <option>Select Staff</option>
              </select>
            </div>
          </div>
         
        </div>

         <div class="row">
          <div class="col">
             <div class="form-group">
              <label>Class</label>
               <select class="form-control" name="class">
                <option>Select Class</option>
              </select>
            </div>
          </div>
         
        </div>
         <div class="row">
          <div class="col">
             <div class="form-group">
              <label>Section</label>
              <select class="form-control" name="section">
                <option>Select Section</option>
              </select>
            </div>
          </div>
         
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Google Meet URL</label>
              <input type="text" name="url" class="form-control" placeholder="Google Meet URL">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" placeholder="Description" name="description"></textarea>
            </div>
          </div>
        </div>

        <button class="btn btn-primary p-font">Add Live Class</button>
      </div>
      
    </div>
  </div>
</div>
<!--- end Google Meet Classess---------->
<div id="delete-modal" class="modal fade">
  <div class="modal-dialog modal-confirm modal-dialog-centered">
    <div class="modal-content w-100">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>            
        <h4 class="modal-title w-100">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete these Transportation Area ? </p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete-confirm-btn">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".edit-btn").each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var id=$(this).attr("data");
       
        
          $("input[name='id']").val(id);
          var tr=this.parentElement.parentElement;
          var td=tr.getElementsByTagName("TD");
          
          $("#edit-form").find("input[name='name']").val(td[1].innerHTML);
           $

        $(".add-transportation-box").addClass("d-none");
        $(".edit-transportation-box").removeClass("d-none");
      });
    });

    //delete
    $(".delete-btn").each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var id=($(this).attr("data"));
        $("#delete-modal").modal("show");
        $(".delete-confirm-btn").click(function(){
          $("#delete-modal").modal("hide");
          window.location.href="<?php echo base_url()?>/admin/incomegroup/delete/"+id;
        });

      });
    });
  //ajax calling for  get semester 

  

  //end ajax calling for get semester
  
  });


  
</script>
