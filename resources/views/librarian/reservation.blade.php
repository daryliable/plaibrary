@include ('librarian.includes.header')
@include ('librarian.includes.aside')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1>Appointment</h1>
        </div> 
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Patient</button> -->
               

                  


                  <!-- For Edit -->
             
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>

                  <tr>
                    <th>Reservation ID</th>
                    <th>Book ID</th>
                    <th>Student Name</th>
                    <th>Appointment Date</th>
                    <th>University/Institution</th>
                  </tr>
                </thead>
                @foreach($reservations as $reservation)
                <tbody>
                 <tr>
                    <th>{{ $reservation->id }}</th>
                    <th>{{ $reservation->book_id }}</th>
                    <th>{{ $reservation->student_name }}</th>
                    <th>{{ $reservation->updated_at }}</th>
                    <th>sd</th>
                  </tr>  
                </tbody>
                @endforeach
              </table>
              </div>

          </div>
        </div>
      </div>

    </main>
@include ('librarian.includes.footer')

<!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>