<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/s-favican.png">
        <meta http-equiv="X-UA-Compatible" content="" />
        <title>Smart School : Staff List</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="theme-color" content="#424242" />       
    </head>
    <style type="text/css">
        .printablea4{width: 100%;}
        /*.printablea4 p{margin-bottom: 0;}*/
        .printablea4>tbody>tr>th,
        .printablea4>tbody>tr>td{padding:5px; line-height: 1.42857143;vertical-align: top; font-size: 14px;}
        table, th, td { border: 1px solid black;  border-collapse: collapse; }
    </style>
    <body>
        <div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <h3 align="center"> Staff list</h3>
                        
                    <div class="table-responsive">

                       <table class="printablea4"  width="100%">
                            <tr>
                                <th><?php echo $this->lang->line('staff_id'); ?></th>

                                <th><?php echo $this->lang->line('name'); ?></th>

                                <th><?php echo $this->lang->line('role'); ?></th>

                                <th><?php echo $this->lang->line('department'); ?></th>

                                <th><?php echo $this->lang->line('designation'); ?></th>

                                <th><?php echo $this->lang->line('mobile_no'); ?></th>
                            </tr>
                            <?php
                            $j = 0;

                            foreach ($staffs as $staff) {
                                //echo "<pre>"; print_r($staff[0]);die;

                                ?>
                            <tr>
                                <td align="center"><?php echo $staff->employee_id; ?></td>
                                <td align="center"><?php echo $staff->name . " " . $staff->surname; ?></td>
                                <td align="center"><?php echo $staff->user_type; ?></td>
                                <td align="center"><?php echo $staff->department; ?></td>
                                <td align="center"><?php echo $staff->designation; ?></td>
                                <td align="center"><?php echo $staff->contact_no; ?></td>
                            </tr>
                            <?php
                                $j++;
                            }
                            ?>

                        </table> 
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>



