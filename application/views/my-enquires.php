
<div class="dashboard">
	<div class="container-fluid">
		<div class="content-area">
			<div class="dashboard-content">
			
				<div class="row">
                    <div class="col-md-1"></div>
					<div class="column col-md-10">
						<div class="properties-box">
						
							<div class="inner-container">
								<div class="row">
                                    <div class="col-md-12">
                                        
                                    <div class="row">
                                        <div class="col-md-6"> <h2 class="bluecolor  text-uppercase"><b>My Enquiries</b></h2><br></div>
                                        <div class="col-md-6">
                                            <p class="text-right dwnload_top_sush"><a href="<?php echo base_url('Export/proenquery/'.$rguser_details->id); ?>" target="_blank"><b><i class="la la-download"></i> Download All Details</b></a></p>
                                        </div>
                                    </div>
                                   </div>
                                    <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr >
        <th>Sl No.</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Phone Number</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if(is_array($proenquiry) && count($proenquiry)){
      $pro=1; foreach ($proenquiry as $key => $proenquiry) { 
      ?>
      <tr>
        <td><?php echo $pro; ?></td>
        <td><?php echo $proenquiry->name; ?></td>
        <td><?php echo $proenquiry->emailid; ?></td>
        <td><?php echo $proenquiry->phonenumber; ?></td>
        <td><?php echo $proenquiry->message; ?></td>
      </tr>
    <?php $pro++; } } else { ?>
      <tr>
        <td colspan="4" align="center">No Record Found</td>
      </tr>
    <?php } ?>
      
    </tbody>
  </table>
 <!--  <div class="styled-pagination">
                 <ul class="clearfix">
                    <li class="prev"><a href="#"><span>Prev</span></a></li>
                    <li  class="active"><a href="#"><span>1</span></a></li>
                    <li><a href="#"><span>2</span></a></li>
                    <li><a href="#"><span>3</span></a></li>
                    <li><a href="#"><span>4</span></a></li>
                    <li class="next"><a href="#"><span>Next</span></a></li>
                 </ul>
              </div> -->
  </div>
                                </div>


							
							</div>
						</div>
                    </div>
                    <div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</div>
</div>
