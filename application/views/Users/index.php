 <div class="container" style="margin:20px auto">
        <div class="row row-cards row-deck">
              <div class="col-12">
                  <div id="flashdivs">
                    <?php echo $this->session->flashdata('flsh_msg'); ?>
                 </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">My Hobbies</h3>
                     <div class="ml-auto">
                      <!-- <a  class="btn btn-primary" href="<?php echo base_url();?>users_mast_add"> <span>Add User</span> -->
                      </a>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                       <tr>
                        <th><b>Sr. No.</b></th>
                        <th><b>Hobby Name</b></th>
                        <th><b>Sub Hobby</b></th>
                       </tr>
                      </thead>
                      <tbody>
                          <?php $i=1; foreach($user_master as $u){ ?>
                         <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $u->hobby_name; ?></td>
                          <td><?php echo $u->sub_hobby_name; ?></td>    
                        </tr>
                        <?php $i++;} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
 <!-- MODAL -->
 <div class="modal fade show" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content panel-info panel-color">

        <div class="modal-header panel-info panel-color">             
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        </div>

        <div class="modal-body">
        <p>You are about to delete one record, this procedure is irreversible.</p>
        <p>Do you want to proceed?</p>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-ok">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <!--nav div close-->
        </div>   
    </div>
    
<!--flash data time out duration-->
  <script>  setTimeout(function() { $('#flashdivs').hide('fast'); }, 4000); </script>  
<!--delete-->
  <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
</script>
<!--table pagination search script-->
<script>
  require(['datatables', 'jquery'], function(datatable, $) {
  	    $('.datatable').DataTable();
  	  });
</script>
</body>
</html>