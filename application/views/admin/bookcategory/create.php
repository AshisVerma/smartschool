<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
             <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('add_book_category'); ?></h3>
                        <div class="box-tools pull-right">
                            <?php if ($this->rbac->hasPrivilege('import_book', 'can_view')) {
                                ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>admin/book/import" autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('import') . " " . $this->lang->line('book_category'); ?></a> 
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>admin/bookcategory/list" autocomplete="off"><i class="fa fa-list"></i> <?php echo $this->lang->line('book_list')  ?></a>
                            <?php }
                            ?>


                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url('admin/bookcategory/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body row">
                           
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('book_category'); ?></label><small class="req"> *</small>
                                <input autofocus=""  id="book_category" name="book_category" placeholder="" type="text" class="form-control"  value="<?php echo set_value('book_category'); ?>" />
                                <span class="text-danger"><?php echo form_error('book_category'); ?></span>
                            </div>
                           
                            
                           

                            
                            
                            
                          
                         
                           
                           
                            
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save')." ".$this->lang->line("book_category"); ?></button>
                        </div>
                    </form>
                </div>

            </div><!--/.col (right) -->

        </div>
        <div class="row">

            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">


    $(document).ready(function () {



        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });


</script>
<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });

    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>