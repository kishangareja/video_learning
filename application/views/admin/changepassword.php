<style type="text/css" media="screen">
    label.error {
        color: red;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $page_title; ?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 col-md-offset-3">
                <?php $this->load->view('_partials/messages');?>

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $page_title; ?></h3>
                    </div>
                    <!-- /.box-header -->

                        <!-- form start -->
                        <form role="form"  method="post" action="" id="frmchangepassword" name="frmchangepassword" enctype="multipart/form-data">
                            <div class="box-body">
                                 <!-- <div class="form-group">
                                  <label for="exampleInputEmail1">Current Password : </label>
                                  <input name="currentpassword" id="currentpassword" type="password" class="form-control"  placeholder="Enter current password" >
                                </div> -->
                                 <!-- <div class="form-group ">
                                    <label for="exampleInputEmail1">User Name : </label>
                                    <input name="email_id" id="email_id" type="email" class="form-control" placeholder="Enter Email" value="<?php echo $this->session->userdata('admin_data')->email_id; ?>" >
                                </div> -->
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">New Password : </label>
                                    <input name="newpassword" id="newpassword" type="password" class="form-control" placeholder="Enter New Password " >
                                </div>
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Confirm Password : </label>
                                    <input name="confirmpassword" id="confirmpassword" type="password" class="form-control" placeholder="Enter Confirm Password" >
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url('admin/home') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function (e)
    {
        $('#frmchangepassword').validate({
            rules: {
                currentpassword: {
                    required: true
                },
                newpassword: {
                    required: true
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#newpassword"
                },
                email_id: {
                    required: true,
                },
            },
            messages: {
                currentpassword: {
                    required: "Please enter current password."
                },
                newpassword: {
                    required: "Please enter new password."
                },
                confirmpassword: {
                    required: "Please enter confirm password.",
                    equalTo: "Confrim password does not match."
                },
                 email_id: {
                    required: "Please enter email id."
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>