@include ('admin.includes.header')
@include ('admin.includes.aside')

    
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> User Management</h1>
        </div> 
      </div>
      @include('admin.includes.success')
      @include('admin.includes.error')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div>
              <h2><i class=""></i> List of Librarians</h2>
              </div> 
              <br>
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Patient</button> -->
               
               
               
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>

                  <tr>
                     <th>No.</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Date Created</th>
                   
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                 
                   
                              <div class="modal-body">
                            
                          </div>
                      </div>
                  </div>
                   <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                   
                    <td>
                      <a href="librarian/{{$user->id}}"> <span class="badge badge-succesr"><i class="fa fa-address-card fa-2x"></i></span> </a>
                
                       <a href="#myModal" data-toggle="modal">  <span class="badge badge-danger"><i class="fa fa-trash-o fa-2x"></i></span> </a>
                    </td>
                  </tr>
    
                    <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                          <div class="modal-content">
                            <div class="modal-header flex-column">
                              <div class="icon-box">
                              </div>            
                              <h4 class="modal-title w-100">Are you sure?</h4>  
                            </div>
                            <div class="modal-body">
                              <p>Do you really want to delete these records? This process cannot be undone.</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <a href="deleteuser/{{ $user->id }}" class="btn btn-danger" type="button">Delete</a> 
                            </div>
                          </div>
                        </div>
                      </div>  
                  @endforeach
                     
                </tbody>
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