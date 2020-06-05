<div class="header_absolute ds cover-background">
    <!--topline section visible only on small screens|-->
    <section class="page_topline ds c-my-10 s-overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-5 text-left">
                    <span class="social-icons">
                        <a href="<?php echo $general_data->linkedin ? $general_data->linkedin : '' ?>" class="fab fa-linkedin-in" title="linkedin"></a>
                    </span>
                </div>
                <div class="col-12 col-sm-7 text-right">
                    <ul class="small-text">
                        <li>
                            <p class="phone_number"><span>Questions?</span><a href="tel:<?php echo $general_data->phone ?>"><?php echo $general_data->phone ?></a></p>
                        </li>
                        <li>
                            <a class="" href="<?=base_url('contact');?>"><span class="ico icon-icon"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--eof topline-->
    <!-- header with two Bootstrap columns - left for logo and right for navigation and includes (search, social icons, additional links and buttons etc -->
    <header class="page_header ds justify-nav-end">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-11">
                    <a href="<?=base_url();?>" class="logo">
                        <img src="<?=base_url('assets/images/logo1.png');?>" alt="">
                    </a>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-1">
                    <div class="nav-wrap">
                        <!-- main nav start -->
                        <nav class="top-nav">
                            <ul class="nav sf-menu">
                                <li class="<?=($this->uri->segment('1') == 'home' || $this->uri->segment('1') == '') && $this->uri->segment('2') == '' ? 'active' : '';?>"><a href="<?=base_url();?>">Home</a></li>
                                <li class="<?=($this->uri->segment('2') == 'about' ? 'active' : '');?>"><a href="<?=base_url('about');?>">About Us</a></li>
                                <li class="<?=($this->uri->segment('2') == 'services' ? 'active' : '');?>"><a href="<?=base_url('services');?>">Services</a>
                                <li class="<?=($this->uri->segment('2') == 'training' ? 'active' : '');?>"><a href="<?=base_url('training');?>">Training</a>
                                <li class="<?=($this->uri->segment('2') == 'contact' ? 'active' : '');?>"><a href="<?=base_url('contact');?>">Contact Us</a></li>
                            </ul>
                        </nav>
                        <!-- eof main nav -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu"><span></span></span>
    </header>
    <section class="page_title padding-mobile cs s-pt-59 s-pb-94">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="bold"><?=$page_title;?></h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=base_url();?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?=$page_title;?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<section id="section_testimonials" class="container-fluids-mw ls">
    <div class="container-fluid">
        <div class="row c-gutter-50 mobile-padding-normal">
            <div class="divider-70 divider-xl-70"></div>
            <div class="col-md-12">
                <div class="text-center">
                    <h3><span class="color-main"><?=$page_title;?></span></h3>
                    <p class="subtitle width-xl-100 width-100">
                        CMC provides the management consulting "infrastructure" required by small and mid-tier businesses to actively compete in the Federal contracting and Commercial sectors. Our goal is to provide products and services that make a difference in the way our customers pursue and execute Federal and Commercial opportunities. CMC specializes in providing management consulting solutions to equip businesses to grow in revenue and to develop repeatable processes so they can continue on the trajectory of growth. CMC brings a unique blend of expertise, professionalism, and outstanding customer service to the management consulting service sector. We understand that the measure of success attained by CMC is in direct correlation to the measure of success we provide to our customers.</p>
                    <h3><span class="color-main">Our Mission</span></h3>
                        <p class="subtitle width-xl-100 width-100">
                        Our mission is twofold:
                        <br>1) to equip small to mid-tier business with the ability to use AMPD! as their go-to proposal methodology in developing responses to Federal procurement opportunities; and
                        <br>2) to help small to mid-tier business develop repeatable processes for continuous improvement of performance/service delivery.
                    </p>
                </div>
            </div>
            <div class="divider-50 divider-xl-120"></div>
        </div>
    </div>
</section>