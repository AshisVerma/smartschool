<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<style type="text/css">
   .modal-body div{
     
      padding: 10px 10px !important;
   }

   .modal-header{
      padding: 10px 10px !important;
      text-align: center !important;
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
         <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $this->lang->line('assign_vehicle_on_route'); ?></h3>
               </div>
               <!-- /.box-header -->
               <form id="form1" action="<?php echo base_url() ?>admin/vehroute/update"  method="post" accept-charset="utf-8">
                  <div class="box-body">
                     
                   
                     <?php
                        if (isset($error_message)) {
                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                        }
                        ?>
                     <?php echo $this->customlib->getCSRF(); ?>
                     <input type="hidden" name="id" value="<?php echo $vehicle_data['id']?>">
                     <div class="form-group">
                        <label><?php echo $this->lang->line("select")." ".$this->lang->line("transportationarea")?> </label>
                        <select class="form-control" name="transportationarea" id="transportationarea">
                           <option><?php echo $this->lang->line("select")." ".$this->lang->line("transportationarea")?></option>
                           <?php foreach($transportationarea as $transportationarea_list){?>
                              <option value="<?php echo $transportationarea_list['id']?>" <?php if($transportationarea_list['id']==$vehicle_data['transportation_area']) echo "selected"?>><?php echo $transportationarea_list['name']?></option>



                        <?php }?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label><?php echo $this->lang->line("select")." ".$this->lang->line("transportationline")?> </label>
                        <select class="form-control" name="transportationline" id="transportationline">
                           <option><?php echo $this->lang->line("select")." ".$this->lang->line("transportationline")?></option>
                           <?php foreach($transportationline as $transport_list){?>
                              <option value="<?php echo $transport_list['id'] ?>" <?php if($transport_list['id']==$vehicle_data['transportation_line']) echo "selected" ?>><?php echo $transport_list['transportationline'] ?></option>

                        <?php }?>
                        </select>
                     </div>
                     
                     <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line('vehicle'); ?></label> <small class="req"> *</small>
                        <select class="form-control" name="vehicle">
                           <option>Select Vehicle</option>
                            <?php
                           foreach ($all_vehicle as $vehicle) {
                               ?>
                               <option value="<?php echo $vehicle['id']?>"  <?php if($vehicle['id']==$vehicle_data['vehicle_id']) echo "selected"?>><?php echo $vehicle['vehicle_no']?></option>
                           
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
         
         <!--/.col (left) -->
         <!-- right column -->
      </div>
     
   
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


<!-------- script --------------------->
<script type="text/javascript">
   $(document).ready(function(){
     $("#transportationarea").change(function(){
    var transportationarea=$(this).find("option:selected").text();

  

   $.ajax({
      type:"GET",
      url:"<?php echo base_url()?>admin/vehroute/transportationline",
      data:{
          transportationarea:transportationarea,
      },

      success:function(response){
         
        if(response.length>0){
          response=JSON.parse(response);
     
      
          var all_option=$("#transportationline option");
      $(all_option).each(function(i){
       $(all_option[i+1]).remove();
      });
       $(response).each(function(index,data){
          var option=document.createElement("OPTION");
          option.innerHTML=data.transportationline;
          option.value=data.id;
          $("#transportationline").append(option);
       });
    
      
        }
        else{
         alert("No Any Transportataion line created yet");
        }
     
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