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
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $page_title; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"  method="post" action="<?php echo base_url('admin/classes/add/'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group <?php echo ((form_error('name') != "") ? "has-error" : ""); ?>">
                                <label for="exampleInputEmail1">Name : </label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="<?php echo isset($tags_data->name) ? $tags_data->name : set_value('name'); ?>">
                                <?php echo ((form_error('name') != "") ? '<span class="help-inline" style="color:red">' . form_error('name') . '</span>' : ''); ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1" <?php if (isset($tags_data) && $tags_data->status == 1) {echo "selected";}?>>Active</option>
                                    <option value="0" <?php if (isset($tags_data) && $tags_data->status == 0) {echo "selected";}?>>In active</option>
                                </select>
                                <?php echo form_error('status'); ?>
                            </div>
                            <input type="hidden" name="tag_id" data-required="1"  class="form-control" value="<?php echo isset($tags_data->id) ? $tags_data->id : '' ?>" />
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo base_url('admin/classes') ?>" class="btn btn-default">Cancel</a>
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
function imagePreview(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
$('#blah').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
</script>