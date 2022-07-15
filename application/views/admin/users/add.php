
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url()?>admin/users/list" style="float:right;margin-bottom: 15px;" class="btn btn-primary"><i class="fa fa-list"></i> User List</a>
            </div>
            <div class="col-md-12">
                <div class="box box-primary" >
                    <div class="box-header ">
                        <h3 class="box-title"><!-- <?php echo $this->lang->line('role'); ?> --> Add New User</h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('admin/users/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                                <input autofocus="" id="name" name="name" placeholder="Name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('dob'); ?></label><small class="req"> *</small>
                                <input autofocus=""  name="dob"  type="text" class="form-control date"  value="<?php echo set_value('dob'); ?>" />
                                <span class="text-danger"><?php echo form_error('dob'); ?></span>
                            </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('gender'); ?></label><small class="req"> *</small>
                               <select class="form-control" name="gender">
                                   <option>Select Gender</option>
                                   <option>Male</option>
                                   <option>Female</option>
                               </select>
                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                            </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('religion'); ?></label><small class="req"> *</small>
                                <input autofocus=""  name="religion" placeholder="Religion" type="text" class="form-control"  value="<?php echo set_value('religion'); ?>" />
                                <span class="text-danger"><?php echo form_error('religion'); ?></span>
                            </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('email'); ?></label>
                                        <input type="email" name="email" class="form-control" placeholder="<?php echo $this->lang->line('email'); ?>" value="<?php echo set_value('email'); ?>">
                                         <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('phone'); ?></label>
                                        <input type="text" name="phone" class="form-control" placeholder="<?php echo $this->lang->line('phone'); ?>" value="<?php echo set_value('phone'); ?>">
                                         <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('join_date'); ?></label>
                                        <input type="text" name="join_date" class="form-control date" value="<?php echo set_value('join_date'); ?>">
                                         <span class="text-danger"><?php echo form_error('join_date'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label><?php echo $this->lang->line('photo'); ?></label>
                                    <input type="file" name="image" class="filestyle form-control">
                                     <span class="text-danger"><?php echo form_error('image'); ?></span>
                                </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line("role") ?></label>
                                        <select class="form-control" name="role">
                                            <option>Select Role</option>
                                            <?php foreach($usergroup as $role){?>

                                                <option value="<?php echo $role['id']?>" ><?php echo $role['name'] ?></option>

                                        <?php }?>
                                        </select>
                                    </div>
                                     <span class="text-danger"><?php echo form_error('role'); ?></span>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line("username")?></label>
                                        <input type="text" name="username" class="form-control" placeholder="<?php echo $this->lang->line("username")?>" value="<?php echo set_value('usern'); ?>">
                                         <span class="text-danger"><?php echo form_error('username'); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line("password")?></label>
                                        <input type="text" name="password" placeholder="<?php echo $this->lang->line("password")?>" class="form-control" value="<?php echo set_value('password'); ?>">
                                         <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group">
                                    <label><?php echo $this->lang->line("address")?></label>
                                    <textarea class="form-control" name="address">
                                        <?php echo set_value('address'); ?>"
                                    </textarea>
                                </div>
                                 <span class="text-danger"><?php echo form_error('address'); ?></span>
                               </div>
                            </div>


                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>         
           <!--  <div class="col-md-12">
                <div class="box box-primary" id="route">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('role'); ?> <?php echo $this->lang->line('list'); ?></h3>

                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">                         
                            <div class="pull-right">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> -->          
        </div>
        <div class="row">           
            <div class="col-md-12">
            </div>
        </div> 
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
      
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');


        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }
</script>