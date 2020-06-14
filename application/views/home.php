    <div class="my-2 my-md-5">
      <div class="col-sm-12 col-lg-12">
         <div class="row" align="center">
            <div class="col-sm-6 col-lg-4">
                <div class="card" style="height:400px;">
                  <div class="card-header">
                    <h4 class="card-title" style="margin-left:100px;"><img src="<?php echo base_url();?>assets/images/gift.png" height="25px" width="25px"> <b>Upcoming Birthdays</b>
                    </h4>
                  </div>
                  <div class='table-responsive'>
                  <table class="table card-table">
                    <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Mobile No.</th>
                    <th><center>SMS</center></th>
                    </tr>
                    <?php if( count($upcoming_birthdays_customers) > 0) {
                          foreach( $upcoming_birthdays_customers as $upcoming_birthdays_customer ){ ?>
                    <tr>
                      <td><?php echo $upcoming_birthdays_customer->f_name." ".$upcoming_birthdays_customer->l_name;?></td>
                      <td><?php $dob = date('d/m/Y',strtotime($upcoming_birthdays_customer->dob)); echo $dob;?></td>
                      <td><?php echo $upcoming_birthdays_customer->mob_no;?></td>
                      <td class="text-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#send_bday_modal">Send</a></td>
                    </tr>
                    <?php } } ?>
                    <?php if( count($upcoming_birthdays_spouses) > 0) {
                          foreach( $upcoming_birthdays_spouses as $upcoming_birthdays_spouse ){ ?>
                    <tr>
                      <td><?php echo $upcoming_birthdays_spouse->spouse_name;?></td>
                      <td><?php $dob = date('d/m/Y',strtotime($upcoming_birthdays_spouse->spouse_dob)); echo $dob;?></td>
                      <td><?php echo $upcoming_birthdays_spouse->spouse_mob_no;?></td>
                      <td class="text-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#send_bday_modal">Send</a></td>
                    </tr>
                    <?php } } ?>
                  </table>
                  </div>
                </div>
             </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card" style="height:400px;">
                  <div class="card-header">
                    <h4 class="card-title" style="margin-left:100px;"><img src="<?php echo base_url();?>assets/images/rings.png" height="25px" width="25px"> <b>Upcoming Anniversaries</b></h4>
                  </div>
                  <div class='table-responsive'>
                  <table class="table card-table">
                   <tr>
                   <th>Name</th>
                   <th>Spouse  Name</th>
                   <th>Anniversary Date</th>
                   <th><center>SMS</center></th>
                  </tr>
                  <?php if( count($upcoming_anniversaries) > 0) {
                          foreach( $upcoming_anniversaries as $upcoming_anniversary ){ ?>
                    <tr>
                      <td><?php echo $upcoming_anniversary->f_name." ".$upcoming_anniversary->l_name;?></td>
                      <td><?php echo $upcoming_anniversary->spouse_name;?></td>
                      <td><?php $anniversary_date = date('d/m/Y',strtotime($upcoming_anniversary->anniversary_date)); echo $anniversary_date;?></td> 
                      <td class="text-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#send_anniversary_modal">Send</a></td>
                    </tr>
                    <?php } } ?>
                  </table>
                  </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-4">
                <div class="card" style="height:400px;">
                  <div class="card-header">
                    <h4 class="card-title" style="margin-left:100px;"><img src="<?php echo base_url();?>assets/images/box.png" height="25px" width="25px"><b>Upcoming Deliveries</b> </h4>
                  </div>
                  <div class='table-responsive'>
                  <table class="table card-table">
                   <tr>
                   <th>Customer Name</th>
                   <th>Karigar Name</th>
                   <th>Delivery Date</th>
                   <th><center>Call</center></th>
                  </tr>
                  <?php if( count($upcoming_deliveries) > 0) {
                          foreach( $upcoming_deliveries as $upcoming_delivery ){ ?>
                    <tr>
                      <td><?php echo $upcoming_delivery->f_name." ".$upcoming_delivery->l_name;?></td>
                      <td><?php echo $upcoming_delivery->first_name." ".$upcoming_delivery->last_name;?></td>
                      <td><?php  $delivery_date = date('d/m/Y',strtotime($upcoming_delivery->delivery_date)); echo $delivery_date; ?></td> 
                      <td class="text-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#kk">Call</a></td>
                    </tr>
                    <?php } }?>
                  </table>
                  </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-4">
                <div class="card" style="height:400px;">
                  <div class="card-header">
                    <h4 class="card-title" ><img src="<?php echo base_url();?>assets/images/clock.png" height="25px" width="25px"> <b>Tasks</b> </h4> &nbsp&nbsp&nbsp<input type="date" id="datepicker" value="<?php echo date("Y-m-d");?>" class="form-control col-sm-8" name="task_date">
                  </div>
                  <div class='table-responsive' id="result">
                  <table class="table card-table">
                   <tr>
                   <th>Name</th>
                   <th>Time</th>
                   <th>Date</th>
                  </tr>
                  <?php if(count($tasks) > 0){
                              foreach($tasks as $task){ ?>
                    <tr>
                        
                      <td><?php echo $task->name;?></td>
                      <td><?php echo $task->task_time;?></td>
                      <td><?php  $task_date = date('d-m-Y',strtotime($task->task_date)); echo $task_date;?></td> 
                      
                    </tr>
                    <?php }}?>
                  </table>
                  </div>
                </div>
             </div>
             <div class="col-sm-6 col-lg-4">
                <div class="card" style="height:400px;">
                  <div class="card-header">
                    <h4 class="card-title" style="margin-left:100px;"><img src="<?php echo base_url();?>assets/images/graph.png" height="25px" width="25px"> <b>Monthly Sale Breakdown</b> </h4>
                  </div>
                  <div class="card-body">
                     <div id="chart-pie" style="height: 12rem;"></div>
                  </div>
                </div>
             </div>
             <!--script for pie chart start-->
            <script>
              require(['c3', 'jquery'], function(c3, $) {
              	$(document).ready(function(){
              		var chart = c3.generate({
              			bindto: '#chart-pie', // id of chart wrapper
              			data: {
              				columns: [
              				    // each columns data
              					['data1', 40],
              					['data2', 33],
              					['data3', 27],
              				],
              				type: 'pie', // default type of chart
              				colors: {
              					'data1': tabler.colors["yellow"],
              					'data2': tabler.colors["grey"],
              					'data3': tabler.colors["pink"],
              				},
              				names: {
              				    // name of each serie
              					'data1': 'Gold',
              					'data2': 'Silver',
              					'data3': 'Diamond',
              				}
              			},
              			axis: {
              			},
              			legend: {
                              show: false, //hide legend
              			},
              			padding: {
              				bottom: 0,
              				top: 0
              			},
              		});
              	});
              });
            </script>
            <!--script for pie chart end-->
            <div class="col-sm-6 col-lg-4">
                <div id="flashdivs">
                        <?php echo $this->session->flashdata('flsh_msg'); ?>
                </div>
                <div class="card" style="height:400px;">
                  <div class="card-header">
                    <h4 class="card-title" style="margin-left:170px;"><b>Rates</b></h4>
                  </div>
                   <form method="post" action="<?php echo base_url();?>update_rate/<?php echo $rate['id'];?>"> 
                    <table class="table card-table">
                        <tr>
                            <td rowspan="3"><center><h4 style="margin-top: 39px;">Gold</h4></center></th>
                        </tr>
                        <tr>
                            <td>Sell</td>
                            <td><input type="text" name="gold_sell" class="form-control" value="<?php echo ($this->input->post('gold_sell') ? $this->input->post('gold_sell') : $rate['gold_sell']); ?>" />
	                        	<span class="text-danger"><?php echo form_error('gold_sell');?></span></td>    
                        </tr>
                        <tr>
                            <td>Purchase</td>
                            <td><input type="text" name="gold_purchase" class="form-control" value="<?php echo ($this->input->post('gold_purchase') ? $this->input->post('gold_purchase') : $rate['gold_purchase']); ?>" />
	                        	<span class="text-danger"><?php echo form_error('gold_purchase');?></span></td> 
                        </tr>
                        <tr>
                            <td rowspan="3"><center><h4 style="margin-top: 39px;">Silver</h4></center></td>
                        </tr>
                        <tr>
                            <td>Sell</td>
                            <td><input type="text" name="silver_sell" class="form-control" value="<?php echo ($this->input->post('silver_sell') ? $this->input->post('silver_sell') : $rate['silver_sell']); ?>" />
	                        	<span class="text-danger"><?php echo form_error('silver_sell');?></span></td>    
                        </tr>
                        <tr>
                           <td>Purchase</td>
                           <td><input type="text" name="silver_purchase" class="form-control" value="<?php echo ($this->input->post('silver_purchase') ? $this->input->post('silver_purchase') : $rate['silver_purchase']); ?>" />
		                      <span class="text-danger"><?php echo form_error('silver_purchase');?></span></td> 
                        </tr>
                        <tr><td colspan="3"><button type="submit" name="s_custname" class="btn btn-primary" style="float:right;">Update</button></td></tr>
                  </table> 
                </form>
               </div>
            </div>
         </div>
      </div>
    </div>
    <!--send bdays model-->
  <div class="modal fade show" id="send_bday_modal" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Send Birthday Message</h4>
            <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
        <form>
             <input type="hidden" id="hidden_mob" name="">
              <input type="hidden" id="hidden_email" name="">
            <div class="col-sm-12 col-md-12">
            <div class="form-group">
            <label class="form-label">Message</label>
            <textarea  type="text" class="form-control" required="" value=""  placeholder="" id="message"></textarea>
            </div>
            </div>
            </form>
            </div>
            <span id="sms_flash" style="color:red"></span>
            <div class="modal-footer col-md-12">
            <button type="button" id="send_msg"  class="btn" style="color:#0572C7" >Send</button>
            <button type="button" id="send_msg"  class="btn" style="color:#0572C7" >Send Default</button>
            </div>
            </div>
            </div>
            </div>
  <!--send anniversary model-->
  <div class="modal fade show" id="send_anniversary_modal" role="dialog">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Send Anniversary Message</h4>
            <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
        <form>
             <input type="hidden" id="hidden_mob" name="">
              <input type="hidden" id="hidden_email" name="">
            <div class="col-sm-12 col-md-12">
            <div class="form-group">
            <label class="form-label">Message</label>
            <textarea  type="text" class="form-control" required="" value=""  placeholder="" id="message"></textarea>
            </div>
            </div>
            </form>
            </div>
            <span id="sms_flash" style="color:red"></span>
            <div class="modal-footer col-md-12">
            <button type="button" id="send_msg"  class="btn" style="color:#0572C7" >Send</button>
            <button type="button" id="send_msg"  class="btn" style="color:#0572C7" >Send Default</button>
            </div>
            </div>
            </div>
            </div>
 <!--nav div close-->
     </div>
    </div>
<!--flash data time out duration-->
<script>  setTimeout(function() { $('#flashdivs').hide('fast'); }, 4000); </script>  
<script>
    $(function() {
    $("#datepicker").on("change",function(){
        var selected = $(this).val();
        //alert(selected);
        $.ajax({
                type:'GET',
                url:'<?php echo base_url();?>getTaskByDate',
                data:'selected='+selected,
                success:function(html){
                    $('#result').html(html);
                //alert(html);
                //console.log(html);
               
                
                   // $('#BLC_BRANCH').html('<option value="">Select bank first</option>');  
                     //alert(slum_no);
                }
            }); 
    });
});
</script>
</body>
</html>