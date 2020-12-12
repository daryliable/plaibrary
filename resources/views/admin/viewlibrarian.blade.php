@include ('admin.includes.header')
@include ('admin.includes.aside')

<main class="app-content"> 

      <div class="app-title">
        <div>
          <h1>User Profile</h1>
        </div> 
      </div>
      @include('admin.includes.success')
      @include('admin.includes.error')
      <div class="row">
      <div class="col-md-12">
      <div class="tile">
      <div class="container">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile Information</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="false">Uploaded Book</a>
                  </li>
                </ul>

      <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <form  action="/" method="post">
            <div class="row">

              <div class="col-6">
                 <h4> Basic Info</h4>


                 <div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Full Name</span>
                    </div>
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{$user->name}}" disabled>
                  </div>
                  </div>

                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Sex</span>
                    </div>
                    <input name="gender" class="form-control" style="margin-right: 10px" value="{{$user->profile->gender ?? ''}}" disabled>

                    <div class="input-group-prepend">
                          <span class="input-group-text">Civil Status</span>
                    </div>
                    <input name="civil" class="form-control" value="{{$user->profile->civil ?? ' '}}" disabled>
                    

                  </div>
                  </div>
                  
                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Birthdate</span>
                    </div>
                    <input type="text" class="form-control" id="datepickerprofile" name="birthdate" value="{{$user->profile->birthdate ?? ''}}" disabled> 
                  </div>
                  </div>

                  
                  <br><div class="form-row">
                  <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Address" name="address" value="{{$user->profile->address ?? ''}}" disabled> 
                  </div>
                  </div>

                    <br><div class="form-row">
                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Mobile Number</span>
                      </div>
                      <input type="text" class="form-control" value="{{$user->profile->contact_num ?? ''}}" disabled> 
                    </div>
                    </div>
                  </div>
                  

                  <div class="col-6">
                     <h4></h4>
                  </div>
                </div>
                <div class="modal-footer">
                    <a href="/viewprof/{{  $user->id }}/edit" class="btn btn-primary">Edit Profile</a>
                </div>
                 </form>
              </div>

<!-- Tunga -->
                  <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
                     <table class="table table-hover table-bordered" id="sampleTable">
                <thead>

                  <tr>
                     <th>No.</th>
                     <th>Book Title</th>
                     <th>Date Uploaded</th>
                     
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($myuploadbooks as $row)
                  <tr>
                     <td>{{ $row->id}}</td>
                     <td>{{ $row->book_name}}</td>
                     <td>{{ $row->created_at }}</td>
                    
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