@include ('admin.includes.header')
@include ('admin.includes.aside')

    
<main class="app-content">
      <div class="app-title">
        <div>
          <h1>User Management</h1>
        </div> 
      </div>
      @include('admin.includes.success')
      @include('admin.includes.error')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div>
              <h2><i class=""></i> List of Students</h2>
              </div> 
              <br>
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Patient</button> -->
               
               
                  <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Add User</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                              <form action="/adduser" method="post">
                                {{ csrf_field() }}
                                 
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="name" class="form-control" name="name" placeholder="Name" required="required">
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                                </div>


                                <div class="form-group">
                                  <label for="role">User Role</label>
                                 <select class="form-control" name='roles'>
                                      <option value="" selected="selected">Select A Role</option> 
                                      @foreach($roles as $id => $role)
                                          <option value="{!! $role->id !!}">{!! $role->name !!}</option>
                                      @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputFile">Profile picture</label>
                                  <input class="form-control-file" type="file" name="image" aria-describedby="fileHelp">
                                  <small class="form-text text-muted" id="fileHelp">Make sure that book image converted to 100 x 300 inches for better arrangement.
                                  </small>
                                </div>
                              </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">OK</button>
                              </div>
                              </form>
                          </div>
                      </div>
                  </div>
              

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
                 
                   <div id="editBook{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Edit User</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
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
                      <a href="user/{{$user->id}}" type="button" class="btn btn-primary">View</span> </a>
                
                       <a href="#myModal" data-toggle="modal" type="button" class="btn btn-danger">Delete</a>
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