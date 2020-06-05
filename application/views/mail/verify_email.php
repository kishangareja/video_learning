<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <?php header("Cache-Control: no cache"); ?>
        <!-- fontawesome -->
        <script src="<?= base_url('assets/client/Scripts/8d9f9452a9.js'); ?>"></script>
        <!-- bootstrap -->
        <link rel="stylesheet" href="<?= base_url('assets/client/Styles/bootstrap.min.css'); ?>" crossorigin="anonymous">

        <!-- stylesheet -->
        <link href="<?= base_url('assets/client/Styles/Style.min.css'); ?>" rel="stylesheet" />
        <script src="<?= base_url('assets/client/Scripts/jQuery.js'); ?>" type="text/javascript"></script>

        <script src="<?= base_url('assets/client/Scripts/bootstrap.min.js'); ?>" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/client/Scripts/jquery.validate.js'); ?>" crossorigin="anonymous"></script>
        <link href="<?= base_url('assets/client/Styles/customstyle.css'); ?>" rel="stylesheet" />        
    </head>
    <body>  
        <div class = "container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box mt-30">
                            <?php if ($expire) { ?>
                                <label>Your token is expired!</label>
                            <?php } elseif ($success) {
                                ?>    <label>Your Password changed successfully</label><?php } else {
                                ?>
                                <form name="frmverifyemail" id="frmverifyemail" action="" method="post">
                                    <label><h4>Forgot Password</h4></label>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3">New Password:</label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="password" name="new_pass" id="new_pass" value="">
                                                <span style="color: red;"><?= isset($error_msg) ? $error_msg : form_error('new_pass'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3">Confirm Password:</label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="password" name="confirm_pass" id="confirm_pass" value="">
                                                <span style="color: red;"><?= isset($error_msg) ? $error_msg : form_error('confirm_pass'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="verify" value="Submit" class="btn btn-primary btn-wide mt-10">
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>