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
                 
                 


                  <!-- For Edit -->

                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#extraLargeModal" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Add Users</button><br><br><br>

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
                              <form action="/editBookList" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control" name="edit_bookname" placeholder="Book Name" required="required" value="">
                                </div>

                                <div class="form-group">
                                  <label for="description">Book Description</label>
                                  <textarea class="form-control" name="edit_description" rows="3" required="required"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="genre">Category/Genre</label>
                                  <select class="form-control" name="edit_genre" value="">
                                 
                                  </select>
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" name="edit_author" placeholder="Book Author" required="required" value="">
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" name="edit_publisher" placeholder="Book Publisher" required="required" value="">
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" id="editCalendar" name="edit_datepublished" placeholder="Date Published" required="required" value="">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputFile">Book Image</label>
                                  <input class="form-control-file" type="file" name="edit_image" aria-describedby="fileHelp" value="">
                                  <small class="form-text text-muted" id="fileHelp">Make sure that book image converted to 100 x 300 inches for better arrangement.
                                  </small>
                                </div>

                                <input type="hidden" class="form-control" name="book_id" value="">
                              
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">OK</button>
                              </div>
                              </form>
                          </div>
                      </div>
                  </div>
                   <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                   
                    <td>
                      <a href="view/user/{{$user->id}}"> <span class="badge badge-succesr"><i class="fa fa-address-card fa-2x"></i></span> </a>
                
                       <a href="deleteuser/{{ $user->id }}"> <span class="badge badge-danger"><i class="fa fa-trash-o fa-2x"></i></span> </a>
                    </td>
                  </tr>
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