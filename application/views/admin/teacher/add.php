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
          <?php $teacher_id = isset($user_data->id) ? $user_data->id : 0;?>
          <form role="form"  method="post" action="<?php echo base_url('admin/teacher/add/' . $teacher_id); ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group <?php echo ((form_error('username') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Teacher Name : </label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter teacher name" value="<?php echo isset($user_data->username) ? $user_data->username : set_value('username'); ?>">
                <?php echo ((form_error('username') != "") ? '<span class="help-inline" style="color:red">' . form_error('username') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('email') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Email : </label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo isset($user_data->email) ? $user_data->email : set_value('email'); ?>">
                <?php echo ((form_error('email') != "") ? '<span class="help-inline" style="color:red">' . form_error('email') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('phone') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Phone : </label>
                <input type="text" name="phone" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Enter phone" value="<?php echo isset($user_data->phone) ? $user_data->phone : set_value('phone'); ?>" >
                <?php echo ((form_error('phone') != "") ? '<span class="help-inline" style="color:red">' . form_error('phone') . '</span>' : ''); ?>
              </div>
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
              <div class="form-group <?php echo ((form_error('password') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Password : </label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" value="" >
                <?php echo ((form_error('password') != "") ? '<span class="help-inline" style="color:red">' . form_error('password') . '</span>' : ''); ?>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select name="status" class="form-control" id="status">
                  <option value="1" <?php if (isset($user_data) && $user_data->status == 1) {echo "selected";}?>>Active</option>
                  <option value="0" <?php if (isset($user_data) && $user_data->status == 0) {echo "selected";}?>>In active</option>
                </select>
                <?php echo form_error('status'); ?>
              </div>
              <input type="hidden" name="teacher_id" data-required="1"  class="form-control" value="<?php echo isset($user_data->id) ? $user_data->id : 0 ?>" />
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('admin/teacher') ?>" class="btn btn-default">Cancel</a>
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