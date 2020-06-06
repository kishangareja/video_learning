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
          <form role="form"  method="post" action="<?php echo base_url('admin/users/add/' . $user_id); ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group <?php echo ((form_error('fname') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">First Name : </label>
                <input type="text" name="fname" class="form-control" id="exampleInputEmail1" placeholder="Enter first name" value="<?php echo isset($user_data->fname) ? $user_data->fname : set_value('fname'); ?>">
                <?php echo ((form_error('fname') != "") ? '<span class="help-inline" style="color:red">' . form_error('fname') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('lname') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Last Name : </label>
                <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Enter last name" value="<?php echo isset($user_data->lname) ? $user_data->lname : set_value('lname'); ?>">
                <?php echo ((form_error('lname') != "") ? '<span class="help-inline" style="color:red">' . form_error('lname') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('email') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Email : </label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo isset($user_data->email) ? $user_data->email : set_value('email'); ?>">
                <?php echo ((form_error('email') != "") ? '<span class="help-inline" style="color:red">' . form_error('email') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('mobile') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Mobile : </label>
                <input type="text" name="mobile" onkeypress="return isNumberKey(event)" class="form-control"
                placeholder="Enter mobile"
                value="<?php echo isset($user_data->phone) ? $user_data->phone : set_value('mobile'); ?>" >
                <?php echo ((form_error('mobile') != "") ? '<span class="help-inline" style="color:red">' . form_error('mobile') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('address') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Address : </label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter address" value="<?php echo isset($user_data->address) ? $user_data->address : set_value('address'); ?>">
                <?php echo ((form_error('address') != "") ? '<span class="help-inline" style="color:red">' . form_error('address') . '</span>' : ''); ?>
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
                <input type="password" name="password" class="form-control" placeholder="Enter password" >
                <?php echo ((form_error('password') != "") ? '<span class="help-inline" style="color:red">' . form_error('password') . '</span>' : ''); ?>
              </div>
              <div class="form-group <?php echo ((form_error('user_image') != "") ? "has-error" : ""); ?>">
                <label for="exampleInputEmail1">Image : </label>
                <input type="file" name="user_image" class="form-control" onchange="imagePreview(this)" id="exampleInputEmail1" placeholder="Enter name" value="<?php echo isset($user_data->user_image) ? $user_data->user_image : set_value('user_image'); ?>">
                <img id="blah" src="<?php echo isset($user_data->user_image) ? base_url() . PROFILEPIC . $user_data->user_image : ''; ?>" alt="" height="60" width="60">
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
                <div class="form-group">
                <label for="exampleInputPassword1">Video Permission</label>
                <select name="video_permission" class="form-control" id="video_permission">
                  <option value="1" <?php
if (isset($user_data) && $user_data->video_permission == 1) {
	echo "selected";
}
?>>Allowed</option>
                  <option value="0" <?php
if (isset($user_data) && $user_data->video_permission == 0) {
	echo "selected";
}
?>>Disallowed</option>
                </select>
                <?php echo form_error('video_permission'); ?>
              </div>
              <input type="hidden" name="user_id" data-required="1"  class="form-control" value="<?php echo isset($user_data->user_id) ? $user_data->user_id : 0 ?>" />
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url('admin/users') ?>" class="btn btn-default">Cancel</a>
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
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
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