
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
    <button style="float: right;" class="btn btn-primary mb-3" onclick="window.location.href='<?php echo base_url()?>admin/guardian'"><i class="fa fa-plus" style="margin-right: 5px;"></i>Add Guardian</button>
    <br>
  <div class="row">

    <div class="col-sm-12"> <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?></div>
    <div class="col-sm-12 col-md-12 col-lg-12">

  <br>

          <div class="box box-primary add-classroom-box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Guardian List</h3>
                    </div>
                    <table class="table text-center">
                      <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>

                      <?php foreach($guardian as $key=>$list_data){?>
                       <tr>
                         <td><?php echo $key+1;?></td>
                         <td><?php echo $list_data['name'];?></td>
                         <td><?php echo $list_data['email'];?></td>
                         <td><?php echo $list_data['phone'];?></td>
                         <td>
                         <?php if($list_data['status']==1){?>
                         <a class="badge badge-success p-2 p-font" style="padding: 6px 10px;background: green;color: white;font-size: 12px;border-radius: 3rem;" data-toggle="tooltip" title="Status Active" onclick="window.location.href='<?php echo base_url()?>admin/guardian/status/<?php echo $list_data['id']?>'">Active</a>

                      
                     <?php
                   }
                      else{
                        ?>
                       <a class="badge badge-success p-2 p-font" style="padding: 6px 10px;background: red;color: white;font-size: 12px;border-radius: 3rem;" data-toggle="tooltip" title="Status Deactive" onclick="window.location.href='<?php echo base_url()?>admin/guardian/status/<?php echo $list_data['id']?>'">Deactive</a>

                     <?php }?>
                     <td><img src="<?php echo base_url()?>uploads/guardian/images/<?php echo $list_data['image']?>" width="30"></td>
                   </td>
                     <td><button class="btn btn-success" onclick="window.location.href='<?php echo base_url()?>admin/guardian/edit/<?php echo $list_data['id']?>'"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-danger" onclick="window.location.href='<?php echo base_url()?>admin/guardian/delete/<?php echo $list_data['id']?>'"><i class="fa fa-trash"></i></button></td>
                       </tr>
                        <?php
                      }
                      ?>
                    </table>
                    
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
  //ajax calling for  get semester 
  $("select[name='year']").change(function(){

    //------------------------------------------------//
      //remove all option despite of first option
      var option=$("select[name='level']").find("option");
      $(option).each(function(i){
        $(option[i+1]).remove();
      });
   
      //end option

       var option=$("select[name='semester']").find("option");
      $(option).each(function(i){
        $(option[i+1]).remove();
      });
      //---------------------------------------------//
        
  });
  $("select[name='class']").change(function(){
   var class_name=$(this).val();
   var year=$("select[name='year']").val();
   

  
   $.ajax({
    type:"GET",
    url:"<?php echo base_url()?>admin/fee/semester_details/?year="+year+"&class="+class_name,
    success:function(response){
 
    var semester_data=(response.data);
    var level_data=response.level;
  
  console.log(response);
     if(1){
      var option=$("select[name='semester']").find("option");
      $(option).each(function(i){
        $(option[i+1]).remove();
      });
     
        $(semester_data).each(function(index,data){
        var option=document.createElement("OPTION");
        option.value=data.name;
        option.innerHTML=data.name;
        $("select[name='semester']").append(option);

      });

        //add level and on behalf of class
     if(1){

      //remove all option despite of first option
      var option=$("select[name='level']").find("option");
      $(option).each(function(i){
        $(option[i+1]).remove();
      });

      //end option

     }
     else{
      //remove all option despite of first option
      var option=$("select[name='level']").find("option");
      $(option).each(function(i){
        $(option[i+1]).remove();
      });
       alert("Not any Classlevel  of this class");
      //end option
     }
     }
     else{
       var option=$("select[name='semester']").find("option");
      $(option).each(function(i){
        $(option[i+1]).remove();
      });

        alert("Not any semester created");
     }

     
     
    }
   });
  });

  //end ajax calling for get semester
  
  });


  
</script>
