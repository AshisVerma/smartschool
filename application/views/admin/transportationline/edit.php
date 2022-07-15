
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
    <div class="col-sm-6 col-md-6 col-lg-6">

  

          <div class="box box-primary add-transportation-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Transportation Line</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/transportationline/update') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                           
                                <input type="hidden" name="id" value="<?php  echo $data->id;?>">
                            <?php echo $this->customlib->getCSRF(); ?> 
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Transportation Area/Block</label><small class="req"> *</small>
                                  <select class="form-control" name="transportationarea">
                                    <option>Select Transportation Area</option>

                                    <?php foreach($transportationarea as $list){?>
                                      <option <?php if($list['name']==$data->transportation_area) echo "selected";?>><?php echo $list['name'];?></option>
                                  <?php }?>
                                  </select>
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Transportation Line</label><small class="req"> *</small>
                                  <input type="text" name="transportationline" class="form-control" placeholder="Transportation line" value="<?php echo $data->transportationline;?>">
                                <span class="text-danger"><?php echo form_error('transportationline'); ?></span>
                            </div>  
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Pick up & Drop </label><small class="req"> *</small>
                                  <input type="text" name="drop_point" class="form-control" placeholder="Pick up & Drop" value="<?php echo $data->drop_point;?>">
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>

<div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Stop Time </label><small class="req"> *</small>
                                  <input type="text" name="stop_time" class="form-control" placeholder="Stop Time" value="<?php echo $data->stop_time;?>">
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Amount </label><small class="req"> *</small>
                                  <input type="number" name="amount" class="form-control" placeholder="Amount" value="<?php echo $data->amount;?>">
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Fee Type </label><small class="req"> *</small>
                                 <select class="form-control" name="fee">
                                   <option>Select Fee Type</option>
                                   <option <?php if($data->fee_type=="Annual") echo "selected";?>>Annual</option>
                                   <option <?php if($data->fee_type=="Bi-annual") echo "selected";?>>Bi-annual</option>
                                   <option <?php if($data->fee_type=="Tri-annual") echo "selected";?>> Tri-annual</option>
                                   <option <?php if($data->fee_type=="Quaterly") echo "selected";?>>Quaterly</option>
                                   <option <?php if($data->fee_type=="Monthly") echo "selected";?>>Monthly</option>
                                 </select>
                                <span class="text-danger"><?php echo form_error('studyclass'); ?></span>
                            </div>  
                                  </div>


                                  
                                 
                                </div>   

                                

                                 

                                
                             
                             

                             
                            
                             

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('update'); ?></button>
                        </div>
                    </form>
                </div>

                <div class="box box-primary edit-transportation-box d-none" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Transportation Area/Block</h3>
                    </div>
                    <form id="edit-form" action="<?php echo site_url('admin/transportationarea/update') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                           
                                <input type="hidden" name="id">
                            <?php echo $this->customlib->getCSRF(); ?> 
                                              
                           <div class="col-md-12">
                                    <div class="form-group">
                                <label for="exampleInputEmail1">Transportation Area/Block</label><small class="req"> *</small>
                                  <input type="text" name="name" class="form-control" placeholder="Transportation Area/Block">
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
          window.location.href="<?php echo base_url()?>/admin/transportationarea/delete/"+id;
        });

      });
    });
  //ajax calling for  get semester 

  

  //end ajax calling for get semester
  
  });


  
</script>
