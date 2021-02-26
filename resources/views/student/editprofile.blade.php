@include('student.includes.header')
@include('student.includes.aside')
      <main class="app-content"> 

      <div class="app-title">
        <div>
          <h1>Edit Profile</h1>
        </div> 
      </div>

      <div class="row">
      <div class="col-md-12">
      <div class="tile">
      <div class="container">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile Information</a>
                  </li>            
                </ul>

      <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <form  action="{{ route('student.profile.update')}}" method="post" enctype="multipart/form-data">
            <div class="row">
              @csrf
                @method('PATCH')
              <div class="col-6">
                 <h4> Basic Info</h4>


                 <div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Full Name</span>
                    </div>
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{$student->name}}">
                  </div>
                  </div>

                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Sex</span>
                    </div>
                    <input name="gender" class="form-control" style="margin-right: 10px" value="{{ $student->profile->gender ?? ''}}">

                    <div class="input-group-prepend">
                          <span class="input-group-text">Civil Status</span>
                    </div>
                    <input name="civil" class="form-control" value="{{ $student->profile->civil ?? ' '}}">
                    

                  </div>
                  </div>
                  
                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Birthdate</span>
                    </div>
                    <input type="text" class="form-control" id="datepickerprofile" name="birthdate" value="{{ $student->profile->birthdate ?? ''}}" > 
                  </div>
                  </div>
                  
                  <br><div class="form-row">
                  <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                      </div>
                      <input  type="text" class="form-control" placeholder="Address" name="address" value="{{ $student->profile->address ?? ''}}"> 
                  </div>
                  </div>

                    <br><div class="form-row">
                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Mobile Number</span>
                      </div>
                      <input name="contact_num" type="text" class="form-control" value="{{ $student->profile->contact_num ?? ''}}" > 
                    </div>
                    </div>
                  </div>
                  

                  <div class="col-6">
                    
                     <h4>Profile</h4>
                     <div class="form-row">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Profile picture</span>
                        </div>
                            <input class="form-control" type="file" name="profile" aria-describedby="fileHelp"> 
                      </div>
                    </div>

                    <br><div class="form-row">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">Designation</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{$student->profile->designation ?? ''}}" > 
                          </div>
                        </div>

                     <br><div class="form-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Occupation</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Occupation" name="occupation" value="{{$student->profile->occupation ?? ''}}" > 
                            </div>
                          </div>
                                 
                                  <br><div class="form-row">
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">College/University</span>
                                        </div>
                                         <input type="text" class="form-control" placeholder="College/University" name="coll_univ" value="{{$student->profile->coll_univ ?? ''}}" > 
                                    </div>
                                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
                 </form>
              </div>

<!-- Tunga -->

          <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
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
               