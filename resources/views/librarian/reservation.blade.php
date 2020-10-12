@include ('librarian.includes.header')
@include ('librarian.includes.aside')
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
                    <th>Rervation Date</th>
                    <th>Reservation Expiration</th>
                    <th>Notes</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @forelse($reservations as $reservation)
                <tbody>
                 <tr>
                    <th>{{ $reservation->resvation_id }}</th>
                    <th>{{ $reservation->book_id }}</th>
                    <th>{{ $reservation->start_date }}</th>
                    <th>{{ $reservation->expiry_date }}</th>
                    <th>{{ $reservation->notes }}</th>
                    <th></th>
                    
                  </tr>
               
                </tbody>
                @empty
                <td class='text-capitalize text-danger text-center' colspan='6'>no available reservation</td>
                @endforelse
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