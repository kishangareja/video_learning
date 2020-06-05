<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?=($this->uri->segment('2') == 'home' && $this->uri->segment('3') == '' ? 'active' : '');?>">
                <a href="<?php echo base_url('admin/home') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
             <li class="<?=($this->uri->segment('2') == 'classes' ? 'active' : '');?>">
                <a href="<?php echo base_url('admin/classes') ?>">
                    <i class="fa fa-dashboard"></i> <span>Class</span>
                </a>
            </li>
            <li class="<?=(($this->uri->segment('2') == 'users' && $this->uri->segment('3') == '') ? 'active' : '');?>">
                <a href="<?php echo base_url('admin/users') ?>">
                    <i class="fa fa-dashboard"></i> <span>Students</span>
                </a>
            </li>
             <li class="<?=($this->uri->segment('2') == 'videos' ? 'active' : '');?>">
                <a href="<?php echo base_url('admin/videos') ?>">
                    <i class="fa fa-dashboard"></i> <span>Videos</span>
                </a>
            </li>



         <!--    <li class="<?=($this->uri->segment('3') == 'project' ? 'active' : '');?>">
                <a href="<?php echo base_url('admin/project') ?>">
                    <i class="fa fa-address-card-o"></i> <span>Project</span>
                </a>
            </li> -->

            <li class="<?=($this->uri->segment('3') == 'change_password' ? 'active' : '');?>">
                <a href="<?php echo base_url("admin/login/change_password") ?>">
                    <i class="fa fa-dashboard"></i> <span>Change Password</span>
                </a>
            </li>

             <li class="<?=($this->uri->segment('3') == 'logout' ? 'active' : '');?>">
                <a href="<?php echo base_url("admin/login/logout") ?>">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>