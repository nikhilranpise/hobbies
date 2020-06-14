 <div class="container" style="margin:20px auto">
        <div class="row row-cards row-deck">
              <div class="col-12">
                  <div id="flashdivs">
                    <?php echo $this->session->flashdata('flsh_msg'); ?>
                 </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Hobbies</h3>
                     <div class="ml-auto">
                      <a href="#"  id=""  class="btn btn-primary"  data-toggle="modal" data-target="#add_task_modal">Add a Hobby</a>
                      </a>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                       <tr>
                        <th><b>Sr. No.</b></th>
                        <th><b>Hobby Name</b></th>
                        <th><b>Action</b></th>
                       </tr>
                      </thead>
                      <tbody>
                          <?php $i=1; foreach($hobbies as $hobby){ ?>
                         <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $hobby->hobby_name; ?></td>  
                          <td> 
                          <a style="color:#00BFFF;font-size:20px;padding-right: 5px;"  title="Edit" onclick="edit('<?php echo $hobby->hobby_id;?>','<?php echo $hobby->hobby_name;?>');"  data-toggle="modal" data-target="#edit_task_modal"><img src="<?php echo base_url();?>assets/images/edit.png" height="20px" width="20px"></a>   
                          <a href="#"  data-href="<?php echo base_url();?>hobby_delete/<?php echo $hobby->hobby_id;?>" style="color:red;font-size:20px;padding-left: 5px;padding-right: 5px;"  title="Delete"  data-toggle="modal" data-target="#confirm-delete"><img src="<?php echo base_url();?>assets/images/x-button.png" height="20px" width="20px"></a>
                          </td> 
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

  <!--add model-->
  <div class="modal fade show" id="add_task_modal" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add a hobby</h4>
            <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <form method="post" action="<?php echo base_url();?>hobby_add">
            <div class="modal-body">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                <label class="form-label">Hobby Name</label>
                <input type="text" class="form-control" name="hobby_name" required="" />
            <span class="text-danger"><?php echo form_error('name');?></span>
                </div>
            </div>
            </div>
            <span id="sms_flash" style="color:red"></span>
            <div class="modal-footer col-md-12">
            <button type="submit" id="send_msg"  class="btn btn-primary" >Submit</button>
            </div>
            </form>
            </div>
            </div>
            </div>
   <!--edit model-->
   <div class="modal fade show" id="edit_task_modal" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Edit hobby</h4>
            <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <form method="post" action="<?php echo base_url();?>hobby_edit">
            <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                <label class="form-label">Hobby Name</label>
                <input type="text" id="name" name="hobby_name" class="form-control" required="" value=""/>
                </div>
            </div>
            </div>
            <span id="sms_flash" style="color:red"></span>
            <div class="modal-footer col-md-12">
            <button type="submit" id="send_msg"  class="btn btn-primary" >Update</button>
            </div>
            </form>
            </div>
            </div>
            </div>
  <!--end model-->
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
  function edit(id,name){
      $('#id').val(id);
      $('#name').val(name);
  }
</script>
<script>
  require(['datatables', 'jquery'], function(datatable, $) {
  	    $('.datatable').DataTable();
  	  });
</script>
</body>
</html>