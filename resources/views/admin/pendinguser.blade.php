;@include ('admin.includes.header')
@include ('admin.includes.aside')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1>Pending Users</h1>
        </div> 
      </div>
      @include('admin.includes.success')
      @include('admin.includes.error')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Patient</button> -->
                  <!-- For Edit -->

              <table class="table table-hover table-bordered " id="sampleTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
              @foreach($users as $key => $user)
              <tbody>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->roles->implode('name') }}</td>
               <td>
                  <a href="approved/{{ $user->id }}" type="button" class="btn btn-success">Accepts</a>
                  <a href="removereq/{{ $user->id }}" type="button" class="btn btn-danger">Reject</a>
              </td>
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