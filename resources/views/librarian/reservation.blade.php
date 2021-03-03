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
                    <th>Student ID</th>
                    <th>Appointment Date</th>
                    <th>Student Name</th>
                    <th>College/University</th>
                    <th>Remarks</th
                  </tr>
                </thead>
                @foreach($reservations as $reservation)
                <tbody>
                 <tr>
                    <td>{{ $reservation->id}}</td>
                    <td>{{ $reservation->book_id }}</td>                 
                    <td>{{ $reservation->student_id }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>{{ $reservation->student_name }}</td>
                    <td>{{ $reservation->college }}</td>   
                    <td>
                      @if($reservation->status == 2)
                    <span class="badge  badge-info"><h6>Borrowed</h6></span>
                      @elseif($reservation->status == 3)
                    <span class="badge  badge-danger"><h6>Returned</h6></span>
                    @endif
                    </td>    
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