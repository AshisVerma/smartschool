<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>

<style type="text/css">
   .modal-body div{
     
      padding: 10px 10px !important;
   }

   .modal-header{
      padding: 10px 10px !important;
      text-align: center !important;
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <section class="content-header">
      <h1>
         <i class="fa fa-credit-card"></i> <?php echo $this->lang->line('transport'); ?>
      </h1>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
              <?php if ($this->session->flashdata('msg')) { ?>
                     <?php echo $this->session->flashdata('msg') ?>
                     <?php } ?>
         </div>
         <?php if ($this->rbac->hasPrivilege('assign_vehicle', 'can_add')) { ?>
         <div class="col-md-3">
            <!-- Horizontal Form -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $this->lang->line('assign_vehicle_on_route'); ?></h3>
               </div>
               <!-- /.box-header -->
               <form id="form1" action="<?php echo base_url() ?>admin/vehroute/add"  method="post" accept-charset="utf-8">
                  <div class="box-body">
                   
                     <?php
                        if (isset($error_message)) {
                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                        }
                        ?>
                     <?php echo $this->customlib->getCSRF(); ?>
                     <div class="form-group">
                        <label><?php echo $this->lang->line("select")." ".$this->lang->line("transportationarea")?> </label>
                        <select class="form-control" name="transportationarea" id="transportationarea">
                           <option><?php echo $this->lang->line("select")." ".$this->lang->line("transportationarea")?></option>
                           <?php foreach($transportationarea as $transportationarea_list){?>
                              <option value="<?php echo $transportationarea_list['id']?>"><?php echo $transportationarea_list['name']?></option>



                        <?php }?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label><?php echo $this->lang->line("select")." ".$this->lang->line("transportationline")?> </label>
                        <select class="form-control" name="transportationline" id="transportationline">
                           <option><?php echo $this->lang->line("select")." ".$this->lang->line("transportationline")?></option>
                        </select>
                     </div>
                     
                     <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line('vehicle'); ?></label> <small class="req"> *</small>
                        <select class="form-control" name="vehicle">
                           <option>Select Vehicle</option>
                            <?php
                           foreach ($vehiclelist as $vehicle) {
                               ?>
                               <option><?php echo $vehicle['vehicle_no']?></option>
                           
                        <?php
                           }
                           ?>
                           
                        </select>
                       
                        <span class="text-danger"><?php echo form_error('vehicle[]'); ?></span>
                     </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                  </div>
               </form>
            </div>
         </div>
         <!--/.col (right) -->
         <!-- left column -->
         <?php } ?>
         <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('assign_vehicle', 'can_add')) {
                echo "9";
            } else {
                echo "12";
            }
            ?>">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header ptbnull">
                  <h3 class="box-title titlefix"><?php echo $this->lang->line('vehicle_route_list'); ?></h3>
                  <div class="box-tools pull-right">
                  </div>
                  <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="mailbox-messages">
                     <div class="download_label"><?php echo $this->lang->line('vehicle_route_list'); ?></div>
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover example">
                           <thead>
                              <tr>
                                 <th>Sr.No</th>
                                 <th>
                                    Transport Area
                                 </th>
                                 <th>Transport Line
                                 </th>
                                 <th>
                                    Vehicle No
                                 </th>
                                 <th>Vehicle Model</th>
                                 <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($data['vehroutelist'] as $key=> $vehicle_list){?>
                                 <tr>
                                    <td><?php echo $key+1?></td>
                                    <td><?php echo $vehicle_list['transportation_area']?></td>
                                    <td><?php echo $vehicle_list['transportationline']?></td>
                                    <td><?php echo $vehicle_list['vehicle_no']?></td>
                                    <td><?php echo $vehicle_list['vehicle_model']?></td>
                                    <td><a href="<?php echo base_url()?>admin/vehroute/edit/<?php echo $vehicle_list['id'] ?>" class="btn btn-success">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger delete-btn" data="<?php echo $vehicle_list['id']?>">
                                       <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="" class="btn btn-info details-btn" title="Vehicle Details" data-toggle="tooltip" data='<?php echo json_encode($vehicle_list); ?>'><i class="fa fa-window-restore"></i></a>
                                 </td>
                                    
                                 </tr>

                           <?php }?>
                            
                              
                           </tbody>
                        </table>
                        <!-- /.table -->
                     </div>
                  </div>
                  <!-- /.mail-box-messages -->
               </div>
               <!-- /.box-body -->
            </div>
         </div>
         <!--/.col (left) -->
         <!-- right column -->
      </div>
      <div class="row">
         <!-- left column -->
         <!-- right column -->
         <div class="col-md-12">
         </div>
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!---- vehicle details ------->
<div class="modal" tabindex="-1" role="dialog" id="vehicle-details-modal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title">Vehicle Details Show</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div >
         <table class="table text-center" id="vehicle-details-table" >
         <tr class="bg-dark" style="border-bottom: 2px solid black;">
            <th colspan="3">VEHICLES DETAILS</th>
         </tr>
         <tr>
            <th>Vehicle No</th>
            <th>Vehicle Model</th>
            <th>Vehicle Manufacture Date</th>
         </tr>
      </table>
      </div>
      <div >
          <table class="table text-center" id="driver-details-table">
         <tr class="bg-dark" style="border-bottom: 2px solid black;">
            <th colspan="3">DRIVER DETAILS</th>
         </tr>
         <tr>
            <th>DRIVER NAME</th>
            <th>DRIVER CONTACT NO</th>
            <th>DRIVER LICENCE NO</th>
         </tr>
      </table>
      </div>
       <div >
          <table class="table text-center" id="transport-details-table" >
         <tr class="bg-dark" style="border-bottom: 2px solid black;">
            <th colspan="6">ROUTE DETAILS</th>
         </tr>
         <tr>
            <th>TRANSPORT AREA</th>
            <th>TRANSPORTLINE</th>
            <th>STOP TIME</th>
            <th>DROP POINT</th>
            <th>AMOUNT</th>
            <th>FEE TYPE</th>
         </tr>
      </table>
       </div>
      </div>
      
    </div>
  </div>
</div>
<!--end vehicle details -------->

<!---delete modal show --->
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
        <p>Do you really want to delete these Vehicles ? </p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete-confirm-btn">Delete</button>
      </div>
    </div>
  </div>
</div>
<!--end delete modal ------>


<!-------- script --------------------->
<script type="text/javascript">
   //delete vehicle route
   $(".delete-btn").each(function(){
      $(this).click(function(e){
         e.preventDefault();
         var id=$(this).attr("data");
         
           $("#delete-modal").modal("show");
           $(".delete-confirm-btn").click(function(){
               window.location.href="<?php echo base_url()?>admin/vehroute/delete/"+id;
           });
      });
   });
   //end delete vehicle route
</script>


<script type="text/javascript">
   $(document).ready(function(){
     $("#transportationarea").change(function(){
    var transportationarea=$(this).val();

   $.ajax({
      type:"GET",
      url:"<?php echo base_url()?>admin/vehroute/transportationline",
      data:{
          transportationarea:transportationarea,
      },

      success:function(response){
      response=JSON.parse(response);
       $(response).each(function(index,data){
          var option=document.createElement("OPTION");
          option.innerHTML=data.transportationline;
          option.value=data.id;
          $("#transportationline").append(option);
       });
      }
   });
     });
   });  



   // vehicle modal details show
   $(".details-btn").each(function(){
      $(this).click(function(e){
           e.preventDefault();
           //remove all tr expect 1
           var tr= $("#vehicle-details-table tr");
           $(tr).each(function(i){
            $(tr[i+2]).remove();

           });
            var tr= $("#driver-details-table tr");
           $(tr).each(function(i){
            $(tr[i+2]).remove();

           });

            var tr= $("#transport-details-table tr");
           $(tr).each(function(i){
            $(tr[i+2]).remove();

           });


         $("#vehicle-details-modal").modal("show");
         var data=$(this).attr("data");
         data=JSON.parse(data);
         console.log(data);
        var vehicle_tbl_details=`<tr>
        <td>`+data.vehicle_no+`</td>
        <td>`+data.vehicle_model+`</td>
        <td>`+data.manufacture_year+`</td>

        </tr>`;

        $("#vehicle-details-table").append(vehicle_tbl_details);

        var driver_details=`<tr>
               <td>`+data.driver_name+`</td>
               <td>`+data.driver_contact+`</td>
               <td>`+data.driver_licence+`</td>
                </tr>`;

                 $("#driver-details-table").append(driver_details);

                   var transport_details=`<tr>
               <td>`+data.transportation_area+`</td>
               <td>`+data.transportationline+`</td>
               <td>`+data.stop_time+` Minutes </td>
                <td>`+data.drop_point+`</td>
                 <td><i class="fa fa-inr"></i> `+data.amount+`</td>
                  <td>`+data.fee_type+`</td>
                </tr>`;

                 $("#transport-details-table").append(transport_details);
      });
   });
   //end vehicles dertails show in modal                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
</script>
<!--------end script -------->