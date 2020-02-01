  <?php 

  
  if($this->session->userdata('login') != TRUE){

      $link = base_url();

      redirect($link);

    } 
    foreach ($dashboard as $v1) {

    }



  ?>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">

  <link href="<?php echo base_url('assets/img/'.$v1->img)?>" rel="shortcut icon" type="image/png">

  <title><?php echo $v1->title;?> | <?php echo $judul; ?></title>



  <!-- Custom fonts for this template-->

  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url('assets/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css">



  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" >

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <!-- Page level plugin CSS-->

  <link href="<?php echo base_url('assets/vendor/datatables/bootstrap.css')?>" rel="stylesheet">

  

  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/vendor/datatables/responsive.bootstrap4.css')?>" rel="stylesheet">





  <!-- Custom styles for this template-->

  <link href="<?php echo base_url('assets/css/sb-admin.css')?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">

  <script src="<?php echo base_url('assets/js/a076d05399.js')?>"></script>



</head>



<body id="page-top">



  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">



    <a class="navbar-brand mr-1" href="index.html"><img src="<?php echo base_url('assets/img/'.$v1->img) ?>" style="width:100px;height: 50px"></a>



    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">

      <i class="fas fa-bars"></i>

    </button>



    <!-- Navbar Search -->

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

      <div class="input-group">

 <!--        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->

        <div class="input-group-append">

          <!-- <button class="btn btn-primary" type="button">

            <i class="fas fa-search"></i>

          </button> -->

        </div>

      </div>

    </form>



    <!-- Navbar -->

    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow mx-1">

        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <i class="fas fa-bell fa-fw"></i>

          <span class="badge badge-danger">9+</span>

        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">

          <a class="dropdown-item" href="#">Action</a>

          <a class="dropdown-item" href="#">Another action</a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="#">Something else here</a>

        </div>

      </li>

      <li class="nav-item dropdown no-arrow mx-1">

        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <i class="fas fa-envelope fa-fw"></i>

          <span class="badge badge-danger">7</span>

        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">

          <a class="dropdown-item" href="#">Action</a>

          <a class="dropdown-item" href="#">Another action</a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="#">Something else here</a>

        </div>

      </li>

      <li class="nav-item dropdown no-arrow">

        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <i class="fas fa-user-circle fa-fw">&nbsp<?php echo $this->session->userdata('Username')?></i>

        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

          <?php if($this->session->userdata('access')=='1'){?>

            <a class="dropdown-item" href="<?php echo base_url('dashboard/home/setting') ?>">Settings</a>

            <div class="dropdown-divider">

            </div>

            <a class="dropdown-item" href="<?php echo base_url('dashboard/home/add_user') ?>">Add User</a>

            <div class="dropdown-divider">

            </div>

              <a class="dropdown-item" href="<?php echo site_url('dashboard/home/logout')?>"  >Logout</a>

            </div>

          <?php }else{ ?>

            <a class="dropdown-item" href="<?php echo base_url('dashboard/home/setting') ?>">Settings</a>

            <div class="dropdown-divider"></div>

             <a class="dropdown-item" href="<?php echo site_url('dashboard/home/logout')?>"  >Logout</a>

            </div>

          <?php } ?>

          <!-- <a class="dropdown-item" href="#">Activity Log</a> -->

          

      </li>

    </ul>



  </nav>

  <div id="wrapper">

    <!-- Sidebar -->



            <ul class='sidebar navbar-nav'>

                    <li class='nav-item active'>

                      <?php 

                          if($this->session->userdata('access')==1){

                      ?>

                          <a class='nav-link' href="<?php echo base_url('dashboard/home') ?>">

                            <i class="fas fa-home"></i>

                            <span><?php echo "Home"?></span>

                          </a>

                          <a class='nav-link' href="<?php echo base_url('dashboard/contact') ?>">

                            <i class="far fa-paper-plane"></i>

                            <span><?php echo "Contact"?> </span>

                          </a>

                          <a class='nav-link' href="<?php echo base_url('dashboard/category') ?>">

                            <i class="far fa-folder-open"></i>

                            <span><?php echo "Category"?> </span>

                          </a>

                           <a class='nav-link' href="<?php echo base_url('dashboard/user') ?>">

                            <i class="far fa-id-card"></i>

                            <span><?php echo "List User"?> </span>

                          </a>
                          <a class='nav-link' href="<?php echo base_url('dashboard/kuisioner'); ?>">

                            <i class="far fa-clock"></i>

                            <span><?php echo "Kuisioner"?> </span>

                          </a>

                      <?php } else if($this->session->userdata('access')==2){ ?> 

                           <a class='nav-link' href="<?php echo base_url('dashboard/home') ?>">

                            <i class="fas fa-home"></i>

                            <span><?php echo "Home"?> </span>

                          </a>

                          <a class='nav-link' href="<?php echo base_url('dashboard/category'); ?>">

                            <i class="far fa-folder-open"></i>

                            <span><?php echo "Category"?> </span>

                          </a>

                          <a class='nav-link' href="<?php echo base_url('dashboard/upload'); ?>">

                            <i class="fas fa-upload"></i>

                            <span><?php echo "Upload Training"?> </span>

                          </a>

                      <?php }else{ ?>

                        <a class='nav-link' href="<?php echo base_url('dashboard/category'); ?>">

                            <i class="far fa-folder-open"></i>

                            <span><?php echo "Category"?> </span>

                        </a>
                        <a class='nav-link' href="<?php echo base_url('dashboard/kuisioner'); ?>">

                            <i class="far fa-clock"></i>

                            <span><?php echo "Kuisioner"?> </span>

                        </a>

                      <?php } ?>

                    </li>

            

                  </ul>





    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->

        <ol class="breadcrumb">

          <li class="breadcrumb-item">

            <a href="<?php echo base_url('dashboard/home')?>">Dashboard</a>

          </li>

          <?php

            if($judul!=''){  

          ?>

          <li class='breadcrumb-item active'><?php echo $judul; ?></li>

          <?php }else if($subjudul!='' && $judul!=''){ ?>

          <li class="breadcrumb-item "><?php echo $subjudul ?></li>

          <?php }?>

         

        </ol>



        <!-- Icon Cards-->

        <div id="content-wrapper">

          <div class="container-fluid">



           <?php 

              $this->load->view($modul);

           ?>

           

          </div>

        </div>

      </div>

     </div>

  </div>  



      <!-- /.container-fluid -->



      <!-- Sticky Footer -->

    

    <!-- /.content-wrapper -->



  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>



  <!-- Core plugin JavaScript-->

  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>



  

  <!-- Page level plugin JavaScript-->

  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>

  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <script src="<?php echo base_url('assets/vendor/jquery/dataTables.responsive.min.js')?>"></script>

  <script src="<?php echo base_url('assets/vendor/jquery/responsive.bootstrap4.min.js')?>"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.js"></script>


  <!-- Custom scripts for all pages-->

  <script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>

  <!-- <script type="text/javascript" src="<?php //echo base_url('assets/js/bootstrap.js')?>"></script> -->

  <!-- Demo scripts for this page-->

  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>

  <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js')?>"></script>

</body>

  

</html>