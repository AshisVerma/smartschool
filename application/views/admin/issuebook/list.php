<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
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
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?></h1>
    </section>


    <section class="content">
        <div class="row">

            <!-- left column -->
             <?php echo $this->session->flashdata("msg");?>
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary" id="bklist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('book_list'); ?></h3><div class="pull-right">
                            <?php if ($this->rbac->hasPrivilege('books', 'can_add')) {
                                ?>
                                <a href="<?php echo base_url() ?>admin/bookcategory/index">

                                    <button class="btn btn-primary btn-sm" autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add') . " " . $this->lang->line('book_category'); ?></button>
                                </a>
                            <?php }
                            ?>

                        </div><!-- /.pull-right -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                           
                        </div>
                        <div class="mailbox-messages table-responsive">
                            <table class="table table-striped table-bordered table-hover  text-center" data-export-title="<?php echo $this->lang->line('book_list'); ?>">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sr_no'); ?></th>
                                        <th><?php echo $this->lang->line('book_category'); ?></th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        
                                       
                                        <th class="no-print text text-right noExport "><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bookcategory as $key=> $list){?>
                                     <tr>
                                         <td><?php echo $key+1?></td>
                                         <td><?php echo $list['name']?></td>
                                         <td>
                                             <?php if($list['status']==1){?>
                                                <a class="badge badge-success p-2 p-font" style="padding: 6px 10px;background: green;color: white;font-size: 12px;border-radius: 3rem;" data-toggle="tooltip" title="Status Active" href="<?php echo base_url();?>admin/bookcategory/status/<?php echo $list['id']?>">Active</a>
                                             <?php }
                                             else {?>
                                                 <a class="badge badge-success p-2 p-font" style="padding: 6px 10px;background: red;color: white;font-size: 12px;border-radius: 3rem;" data-toggle="tooltip" title="Status Deactive" href="<?php echo base_url();?>admin/bookcategory/status/<?php echo $list['id']?>">Deactive</a>

                                         <?php }?>
                                         </td>
                                         <td>
                                             <a href="<?php echo base_url();?>admin/bookcategory/edit/<?php echo $list['id']?>" class="btn btn-success" title="Edit Book Category" data-toggle="tooltip"><i class="fa fa-pencil" ></i></a>
                                             <a href="" class="btn btn-danger delete-btn" title="Remove Category" data-toggle="tooltip" data="<?php echo $list['id']?>"><i class="fa fa-trash"  ></i></a>
                                         </td>
                                     </tr>
                                     
                                    <?php }?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                            </div><!-- /.pull-right -->
                        </div>
                    </div>
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>
        <div class="row">
            <!-- left column -->
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <!-- general form elements disabled -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

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
    var base_url = '<?php echo base_url() ?>';
    


   
</script>
<script>
$(document).ready(function() {
     emptyDatatable('book-list','data');
       //delete
    $(".delete-btn").each(function(){
      $(this).click(function(e){
        e.preventDefault();
        var id=($(this).attr("data"));
        $("#delete-modal").modal("show");
        $(".delete-confirm-btn").click(function(){
          $("#delete-modal").modal("hide");
          window.location.href="<?php echo base_url()?>/admin/bookcategory/delete/"+id;
        });

      });
    });
});

    ( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('book-list','admin/book/getbooklist',[],[],100);
    });
} ( jQuery ) )
</script>