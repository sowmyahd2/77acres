<script src="<?php echo base_url()?>assets/chart_js/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/chart_js/modules/exporting.js"></script>
<script src="<?php echo base_url()?>assets/chart_js/modules/export-data.js"></script> <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  Dashboard
                  <small>Control panel</small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="<?php echo site_url().admin; ?>"><i class="fa  fa-home"></i> Home</a></li>
                  <li class="active">Dashboard</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <!-- Small boxes (Stat box) -->
               <div class="row">
                  <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-yellow">
                        <div class="inner">
                           <h5>
                              Know more about
                           </h5>
                           <p>
                              Category
                           </p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo site_url(admin."categories"); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-aqua">
                        <div class="inner">
                           <h5>
                              More About Company
                           </h5>
                           <p>
                              About Us
                           </p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-spinner"></i>
                        </div>
                        <a href="<?php echo site_url(admin."homecontent/index/about_us"); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-green">
                        <div class="inner">
                           <h5>
                              Know About Terms
                           </h5>
                           <p>
                              Terms and Condition
                           </p>
                        </div>
                        <div class="icon">
                           <i class="fa  fa-rupee "></i>
                        </div>
                        <a href="<?php echo site_url(admin."homecontent/index/terms"); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-red">
                        <div class="inner">
                           <h5>
                              Know more About
                           </h5>
                           <p>
                              Enquery
                           </p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-location-arrow"></i>
                        </div>
                        <a href="<?php echo site_url(admin."enquery"); ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                     </div>
                  </div>
                  <!-- ./col -->
               </div>
               <!-- /.row -->
               <!-- top row -->
               <div class="row">
                  <div class="col-xs-12 connectedSortable">
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
               <!-- Main row -->
               <div class="row">
                  
                  <!-- right col (We are only adding the ID to make the widgets sortable)-->
                  <section class="col-lg-12 connectedSortable">
                     <!-- Map box -->
                     <div class="box box-primary">
                        <div class="box-footer">
                           &nbsp;
                        </div>
                     </div>
                     <!-- /.box -->
                  </section>
                  <!-- right col -->
               </div>
               <!-- /.row (main row) -->
               <!-- End Small Stats Blocks -->
            
            </section>
            <section class="content">
               <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <div id="barchartcontainer"></div>
                <!-- <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Users</h6>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row border-bottom py-2 bg-light">
                      <div class="col-12 col-sm-6">
                        <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                          <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                          <span class="input-group-append">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                        <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View Full Report &rarr;</button>
                      </div>
                    </div>
                    <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                  </div>
                </div> -->
              </div>
              <!-- End Users Stats -->
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                <div id="piechartcontainer"></div>
                <!-- <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Users by device</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                      <div class="col">
                        <select class="custom-select custom-select-sm" style="max-width: 130px;">
                          <option selected>Last Week</option>
                          <option value="1">Today</option>
                          <option value="2">Last Month</option>
                          <option value="3">Last Year</option>
                        </select>
                      </div>
                      <div class="col text-right view-report">
                        <a href="#">Full report &rarr;</a>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- End Users By Device Stats -->
             
             
              
            </div>
            </section>
            <!-- /.content -->
         </aside>
         <!-- /.right-side -->
      </div>
      
      <script type="text/javascript">
         $('#dashboardtab').addClass('active');
      </script>
      <script type="text/javascript">
Highcharts.chart('piechartcontainer', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Booking Enquery Details'
    },
    subtitle: {
        text: 'Highcharts'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Delivered amount',
        data: <?php echo isset($bookingglist)?$bookingglist:''; ?>
    }]
}); 
//--------------------------------------------------------------
Highcharts.chart('barchartcontainer', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Registered User Details'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['India'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Enquiry',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' '
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: <?php echo isset($regusersgraphlist)?$regusersgraphlist:''; ?> 

});
</script>