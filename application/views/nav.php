<body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header">
          <div class="container">
            <div class="d-flex">
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        
       <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">  
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-1 ml-auto">
                <form class="input-icon my-3 my-lg-0"> 
                <li class="nav-item dropdown">
                    <a href="javascript:void(1)" class="nav-link" data-toggle="dropdown"><img style="width:50px;height:50px"; src="<?php echo base_url(); ?>assets/images/prof.svg"  style="float-right";/></a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <!-- <a href="<?php echo base_url();?>change_password" class="dropdown-item "> Change Password</a> -->
                      <a href="<?php echo base_url();?>logout" class="dropdown-item ">Logout</a>
                    </div>
                  </li>
               <!--<img style="width:50px;height:50px" src="<?php echo base_url();?>assets/images/prof.svg">-->
                </form>
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>myHobbies"  class="nav-link <?php echo ((isset($master_class) && $master_class == 'Dashboard') ?  'active' : ''); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
                  </li> 

                  <li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>Hobbies"  class="nav-link <?php echo ((isset($master_class) && $master_class == 'hobbies') ?  'active' : ''); ?>"><i class="fe fe-target"></i>Hobbies</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a href="<?php echo base_url();?>subHobbies"  class="nav-link <?php echo ((isset($master_class) && $master_class == 'sub_hobbies') ?  'active' : ''); ?>"><i class="fa fa-street-view"></i>Sub Hobbies</a>
                  </li>   
                     
                  
                  
                  
                  
                  
                </ul>
              </div>
            </div>
          </div>
        </div>