<div align="center">
  <div class="col-lg-8" style="margin-top:25px;">
      <div class="callout callout-danger">
        <!--<p><b>Note:</b> Create User Group before adding User</p>-->
    </div>
    <center>
       <div id="flashdivs">
        <?php echo $this->session->flashdata('flsh_msg'); ?>
      </div>
      <form method="Post" class="form-horizontal m-t-20 card" action="<?php echo base_url();?>store_new_password" name="myForm" id="myForm" enctype="multipart/form-data">
        <div class="card-body">
         <h3 class="card-title" style="color:green; font-size:25px;"><b>Change Password</b></h3>
          <div class="row" align="center">  
            <?php 
                   $sess = $this->session->userdata('admin_id');
                   $password = $sess->password;
            ?>
            <input type="hidden" id="hiddden_password" value="<?php echo $password; ?>">
            <div class="col-sm-12 col-md-12">
              <div class="form-group">
                <label class="form-label">Old Password <span style="color:red;">*</span></label>
                <input type="password" name="old_password" id="old_password" class="form-control" value="<?php echo $this->input->post('old_password'); ?>" required/>
	        	<!--<span id='old_message'></span>-->
              </div>
            </div>  
            
            <div class="col-sm-12 col-md-12">
              <div class="form-group">
                <label class="form-label">New Password <span style="color:red;">*</span></label>
                <input type="password" name="new_password" id="password" class="form-control" value="<?php echo $this->input->post('new_password'); ?>" required/>
	        	<span class="text-danger"><?php echo form_error('password');?></span>
              </div>
            </div>
            
            <div class="col-sm-12 col-md-12">
              <div class="form-group">
                <label class="form-label">Confirm Password <span style="color:red;">*</span></label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $this->input->post('confirm_password'); ?>" required/>
                <span id='message'></span>
	        	<span class="text-danger"><?php echo form_error('password');?></span>
              </div>
            </div>
            
            <div class="card-footer col-md-12 text-center">
              <button type="submit" name="save" class="btn btn-primary" >Submit</button> 
            </div>                
          </div>
        </div>
      </form>
      
    </center>
  </div>
</div>   
<!--nav div close-->
        </div>   
    </div>
    
<script>
  (function($) {
    $(function() {
      $('.test').fSelect();
    });
  })(jQuery);
</script>
<script> 
  setTimeout(function() {
    $('#flashdivs').hide('fast');
  }, 4000);
</script>
<!--mobile validation-->
<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script type="text/javascript">
  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>

<script type="text/javascript">
  $('#hiddden_password, #old_password').on('keyup', function () {
  if ($('#hiddden_password').val() == $('#old_password').val()) {
    $('#old_message').html('Old Password Matching').css('color', 'green');
  } else 
    $('#old_message').html('Old Password Did Not Match').css('color', 'red');
});
</script>

</body>
</html>
