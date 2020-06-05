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
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php $this->load->view('_partials/messages');?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                     <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
if (!empty($sent_data)) {
	foreach ($sent_data as $value) {
		?>
                                            <tr class="odd gradeX">
                                                <td> <?php echo $i++; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><a href="mailto:<?php echo $value->email; ?>"><?php echo $value->email; ?></a></td>
                                                <td><?php echo $value->message; ?></td>
                                                <td><?php echo $value->modification_datetime; ?></td>
                                                <td>
                                                        <a onclick="deleteContact('<?php echo $value->id ?>')" href="javascript:;" data-backdrop="static" data-keyboard="false" class="btn btn-circle btn-sm red"><i class="fa fa-trash-o fa-2x"></i></a>
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
        function deleteContact(id) {
            confirm_box(id, '<?=base_url("admin/home/delete_contact");?>', 'Contacts');
        }
</script>