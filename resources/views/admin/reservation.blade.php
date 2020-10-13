@include ('admin.includes.header')
@include ('admin.includes.aside')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Book Management</h1>
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
                    <th>User ID</th>
                    <th>Rervation Date</th>
                    <th>Reservation Expiration</th>
                    <th>Notes</th>

                  </tr>
                </thead>
                @foreach($reservations as $reservation)
                <tbody>
                 <tr>
                    <th>{{ $reservation->id}}</th>
                    <th>{{ $reservation->book_id }}</th>
                    <th>{{ $reservation->user_id }}</th>
                    <th>{{ $reservation->created_at }}</th>
                    <th>{{ $reservation->expiry_date }}</th>
                    <th>{{ $reservation->notes }}</th>
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