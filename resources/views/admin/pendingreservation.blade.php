@include ('admin.includes.header')
@include ('admin.includes.aside')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1>Pending Appointment</h1>
        </div> 
      </div>
      @include('admin.includes.success')
      @include('admin.includes.error')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Patient</button> -->
               <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                <thead>

                  <tr>
                    <th>Reservation ID</th>
                    <th>Book ID</th>
                    <th>Student ID</th>
                    <th>Appointment Date</th>
                    <th>Book Owner</th>
                    <th>Student Name</th>
                    <th>College/Univeristy</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                @foreach($reservations as $reservation)
                <tbody>
                  <tr>
                    <td>{{ $reservation->id}}</td>
                    <td>{{ $reservation->book_id }}</td>                 
                    <td>{{ $reservation->student_id }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>{{ $reservation->lib_name }}</td>
                    <td>{{ $reservation->student_name }}</td>
                    <td>{{ $reservation->college }}</td>
                     <td>
                      <a href="/reserved/{{$reservation->id}}" type="button" class="btn btn-success">Accept</a>
                      <a href="/delete/reservation/{{$reservation->id}}" type="button" class="btn btn-danger">Reject</a>
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
@include ('admin.includes.footer')

<!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>