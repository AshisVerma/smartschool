
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

    <div class="col-sm-12"> <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?></div>
    <div class="col-sm-4 col-md-4 col-lg-4">

  

          <div class="box box-primary add-classroom-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Driver</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/driver/add') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                
                            <?php echo $this->customlib->getCSRF(); ?> 
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Vechile No</label><small class="req"> *</small>
                                <select>
                                  <option>Select Vechile No</option>
                                  <?php foreach($vechile as $vechile_list)?>
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Capacity</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="capacity" placeholder="Room No" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>

                <div class="box box-primary edit-classroom-box d-none" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Update ClassRoom</h3>
                    </div>
                    <form id="edit-form" action="<?php echo site_url('admin/classroom/update') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                <input type="hidden" name="id">
                            <?php echo $this->customlib->getCSRF(); ?> 
                                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Room No</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="room_no" placeholder="Room No" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Capacity</label><small class="req"> *</small>
                                <input autofocus="" id="name" name="capacity" placeholder="Room No" type="text" class="form-control"  value="<?php echo set_value('year'); ?>" />
                                <span class="text-danger"><?php echo form_error('year'); ?></span>
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
<div id="delete-modal" class="modal fade">
  <div class="modal-dialog modal-confirm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>            
        <h4 class="modal-title w-100">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete these Classroom ? </p>
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
          
          $("#edit-form").find("input[name='room_no']").val(td[1].innerHTML);
           $("#edit-form").find("input[name='capacity']").val(td[2].innerHTML);

        $(".add-classroom-box").addClass("d-none");
        $(".edit-classroom-box").removeClass("d-none");
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
          window.location.href="<?php echo base_url()?>/admin/classroom/delete/"+id;
        });

      });
    });
  
  
  });


  
</script>
