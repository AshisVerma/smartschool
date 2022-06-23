<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/s-favican.png">
        <meta http-equiv="X-UA-Compatible" content="" />
        <title>Smart School : Student List</title>
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
                    <h3 align="center"> Student list</h3>
                        
                    <div class="table-responsive">

                       <table class="printablea4"  width="100%">
                            <tr>
                                <th><?php echo $this->lang->line('s_no'); ?></th>
                                <th><?php echo $this->lang->line('admission_no'); ?></th>

                                <th><?php echo $this->lang->line('student_name'); ?></th>

                                 <th><?php echo $this->lang->line('class'); ?></th>

                                <th><?php echo $this->lang->line('father_name'); ?></th>

                                <th><?php echo $this->lang->line('date_of_birth'); ?></th>

                                <th><?php echo $this->lang->line('gender'); ?></th>

                                <th><?php echo $this->lang->line('category'); ?></th>

                                <th><?php echo $this->lang->line('mobile_no'); ?></th>

                            </tr>
                            <?php
                            $j = 1;

                            foreach ($students as $student) {
                                //echo "<pre>"; print_r($staff[0]);die;

                                ?>
                            <tr>
                                <td align="center"><?php echo $j; ?></td>
                                <td align="center"><?php echo $student->admission_no; ?></td>
                                <td align="center"><?php echo $student->firstname. " " . $student->middlename." ".$student->lastname; ?></td>
                                <td align="center"><?php echo $student->class. " (".$student->section.")"; ?></td>
                                <td align="center"><?php echo $student->father_name; ?></td>
                                <td align="center"><?php echo $student->dob; ?></td>
                                <td align="center"><?php echo $student->gender; ?></td>
                                <td align="center"><?php echo $student->category; ?></td>
                                <td align="center"><?php echo $student->mobileno; ?></td>
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



