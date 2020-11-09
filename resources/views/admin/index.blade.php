@include('admin.includes.header')
@include('admin.includes.aside')
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Members</h4>
              <p><b>{{ $noOfStudents }}</b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Librarians</h4>
              <p><b>{{ $noOfLibrarians }}</b></p>
            </div>
          </div>
        </div>
          <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Pending Users</h4>
              <p><b>{{ $noOfRequest}}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Uploads</h4>
              <p><b>{{ $noOfUploads}}</b></p>
            </div>
          </div>
        </div>
      
      </div>
      
        <div class="">
          <div class="tile">
            <h3 class="tile-title">USER STATISTICS</h3>
             <div id="container"></div>
             <script src="https://code.highcharts.com/highcharts.js"></script>
                <script type="text/javascript">
                    var datas =  <?php echo json_encode($datas) ?>;
                   
                    Highcharts.chart('container', {
                        title: {
                            text: 'New User Growth, 2020'
                        },
                        subtitle: {
                            text: ''
                        },
                         xAxis: {
                            categories: ['January', 'Febraury', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
                        },
                        yAxis: {
                            title: {
                                text: 'Number of New User'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },
                        plotOptions: {
                            series: {
                                allowPointSelect: true
                            }
                        },
                        series: [{
                            name: 'New Users',
                            data:datas
                        }],
                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]
                        }
                });
                </script>
          </div>
        </div>

        <div class="">
          <div class="tile">
            <h3 class="tile-title">MOST VISIT SCHOOL/UNIVERSITY</h3>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
              <div style="height: 400px,width:900px,margin:auto;">
                <canvas id="barChart"></canvas>
              </div>

              <script>
                  var appointment =  <?php echo json_encode($appointment); ?>;
                  var appointmentName =  <?php echo json_encode($appointmentName); ?>;
                  var barCanvas = $("#barChart");
                  var barChart = new Chart(barCanvas,{
                      type:'bar',
                      data:{
                          labels: appointmentName,
                          datasets:[
                            {
                                  label:'School/University Appointment, 2020',
                                  data:appointment,
                                  backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown'],
                            }
                        ]
                      },
                      options:{
                        scales:{
                          yAxes:[{
                            ticks:{
                              beginAtZero:true
                            }
                          }]
                        }
                      }
                  });
              </script>

            </div>
          </div>
        </div>
      
      
    </main>
@include ('admin.includes.footer')

    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

