<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $page_title ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title page_title"><?php echo $page_title ?> </h3>
                        <a class="pull-right btn btn-block btn-primary btn-flat add_button" href="<?php echo base_url('admin/users/add') ?>"><i class="fa fa-fw fa-plus"></i> Add Student</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php $this->load->view('_partials/messages');?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Image</th>
                                        <th>Class</th>
                                        <th>First name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Video Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$i = 1;
if (!empty($user_data)) {
	foreach ($user_data as $value) {
		?>
                                            <tr class="odd gradeX">

                                                <td> <?php echo $i++; ?></td>
                                                <td><img src="<?php echo base_url() . PROFILEPIC . $value->user_image; ?>" alt="" height="60" width="60"> </td>
                                                <td><?php echo $value->class_name; ?></td>
                                                <td><?php echo $value->fname; ?></td>
                                                <td><?php echo $value->lname; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->phone; ?></td>

                                                <td><?php echo $value->modification_datetime; ?></td>
                                                <td>
                                                    <?php if ($value->status) {?>
                                                        <span class="label block btn-success btn-xs"> Active </span>
                                                    <?php } else {?>
                                                        <span class="label block btn-danger btn-xs"> Inactive </span>
                                                    <?php }?>
                                                </td>
                                                 <td>
                                                    <?php if ($value->video_permission) {?>
                                                        <span class="label block btn-success btn-xs"> Allowed </span>
                                                    <?php } else {?>
                                                        <span class="label block btn-danger btn-xs"> Disallowed </span>
                                                    <?php }?>
                                                </td>
                                                <td>

                                                        <a href="<?php echo base_url('admin/users/add/' . $value->user_id); ?>" class="btn btn-circle btn-sm blue"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a onclick="deleteItem('<?php echo $value->user_id ?>')" href="javascript:;" data-backdrop="static" data-keyboard="false" class="btn btn-circle btn-sm red"><i class="fa fa-trash-o fa-2x"></i></a>
                                                </td>
                                            </tr>
                                            <?php }}?>
                                </tbody>

                            </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
        function deleteItem(id) {
            confirm_box(id, '<?=base_url("admin/users/delete");?>', 'User');
        }
</script>
