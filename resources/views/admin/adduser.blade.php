@include('admin.includes.header')
@include('admin.includes.aside')
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
              <h2><i class=""></i> Add User</h2>
              </div> 
              <br>
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

                                
                              </div>

                              <div class="modal-footer">
                           
                                  <button type="submit" class="btn btn-primary">Create</button>
                              </div>
                              </form>
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

