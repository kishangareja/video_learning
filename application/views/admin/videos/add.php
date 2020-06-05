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

          <?php $user_id = isset($user_data->user_id) ? $user_data->user_id : 0;?>
          <form role="form"  method="post" action="<?php echo base_url('admin/videos/add/' . $user_id); ?>" enctype="multipart/form-data">
            <div class="box-body">


              <div class="form-group <?php echo ((form_error('class_id') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputPassword1">Class</label>
                <select name="class_id" class="form-control" id="class_id">
                  <option value="">--Select Class--</option>
                  <?php foreach ($tags_data as $value) {
	?>
                  <option value="<?php echo $value->id ?>" <?php
if (isset($user_data) && $user_data->class_id == $value->id) {
		echo "selected";
	}
	?>><?php echo $value->name ?></option>
                  <?php }?>
                </select>
                <?php echo ((form_error('class_id') != "") ? '<span class="help-inline" style="color:red">' . form_error('class_id') . '</span>' : ''); ?>
              </div>
               <div class="form-group <?php echo ((form_error('title') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Title : </label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter video title" value="<?php echo isset($user_data->title) ? $user_data->title : set_value('title'); ?>">
                <?php echo ((form_error('title') != "") ? '<span class="help-inline" style="color:red">' . form_error('title') . '</span>' : ''); ?>
              </div>

              <div class="form-group <?php echo ((form_error('video_file') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Video File : </label>
                <input type="file" name="video_file" class="form-control"  id="exampleInputEmail1" placeholder="Enter name" value="<?php echo isset($user_data->video_file) ? $user_data->video_file : set_value('video_file'); ?>">
                <?php echo ((form_error('video_file') != "") ? '<span class="help-inline" style="color:red">' . form_error('video_file') . '</span>' : ''); ?>
                <?php if (isset($user_data) && $user_data->video_file != '') {?>
  <video width="260" height="220" controls>
                                                    <source src="<?php echo base_url() . VIDEOS . $user_data->video_file ?>" type="video/mp4"> </video>
<?php }?>


              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select name="status" class="form-control" id="status">
                  <option value="1" <?php
if (isset($user_data) && $user_data->status == 1) {
	echo "selected";
}
?>>Active</option>
                  <option value="0" <?php
if (isset($user_data) && $user_data->status == 0) {
	echo "selected";
}
?>>In active</option>
                </select>
                <?php echo form_error('status'); ?>
              </div>

              <input type="hidden" name="video_id" data-required="1"  class="form-control" value="<?php echo isset($user_data->id) ? $user_data->id : 0 ?>" />
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('admin/videos') ?>" class="btn btn-default">Cancel</a>
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
