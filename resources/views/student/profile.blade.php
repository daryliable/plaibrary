@include('student.includes.header')
@include('student.includes.aside')
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
                    <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Account Settings</a>
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
                    <input type="text" class="form-control" placeholder="Name" value="{{$student->name}}" disabled>
                  </div>
                  </div>

                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Sex</span>
                    </div>
                    <input class="form-control" style="margin-right: 10px" value="{{$student->profile->gender ?? ''}}" disabled>

                    <div class="input-group-prepend">
                          <span class="input-group-text">Civil Status</span>
                    </div>
                    <input class="form-control" value="{{$student->profile->civil ?? ' '}}" disabled>
                    

                  </div>
                  </div>
                  
                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Birthdate</span>
                    </div>
                    <input type="text" class="form-control" id="datepickerprofile" name="birthdate" value="{{$student->profile->birthdate ?? ''}}" disabled> 
                  </div>
                  </div>
                  </div>
                  

                  <div class="col-6">
                    <div style="padding-top: 33px;" class="form-row">
                  <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Address" name="address" value="{{$student->profile->address ?? ''}}" disabled> 
                  </div>
                  </div>

                    <br><div class="form-row">
                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Mobile Number</span>
                      </div>
                      <input type="text" class="form-control" value="{{$student->profile->contact_num ?? ''}}" disabled> 
                    </div>
                    </div>
                                 <br> <div  class="form-row">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">College/University</span>
                                        </div>
                                         <input type="text" class="form-control" placeholder="" name="College_University" value="{{$student->profile->coll_univ ?? ''}}" disabled> 
                                    </div>
                                 </div>                  </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('student.profile.edit')}}" class="btn btn-primary">Edit Profile</a>
                </div>
                 </form>
              </div>

<!-- Tunga -->

          <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">

              <form  action="{{ route('student.profile.updatepassword')}}" enctype="" method="post">
              @csrf
                 @method('PATCH')
                <br>
                <h4>Change or Update Email/Password</h4>
                <div class="form-row">
                <div class="input-group col-6">
                  <div class="input-group-prepend">
                          <span class="input-group-text">Email</span>
                  </div>
                    <input name="email" type="text" class="form-control" value="{{ old('name') ?? $student->email  ?? ''}}" required> 
                  </div>
                </div><br>
                <div class="form-row">
                <div class="input-group col-6">
                  <div class="input-group-prepend">
                          <span class="input-group-text">Password</span>
                  </div>
                    <input type="password" required autocomplete="new-password" placeholder="Password" id="password" name="password" class="form-control"  value="" required> 
                </div>
                </div><br>
                <div class="form-row">
                <div class="input-group col-6">
                  <div class="input-group-prepend">
                          <span class="input-group-text">Confirm Password</span>
                  </div>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password" value="" required>  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Account</button>
                </div>
                </div>
             </form>
        
      </div>
      </div>
      </div>
      </div>
      </div>
      </main>
@include ('student.includes.footer')

    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>