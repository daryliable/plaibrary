@include ('admin.includes.header')
@include ('admin.includes.aside')

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
            <form  action="/update_userprof/{{$user->id}}" method="post">
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
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') ?? $user->name  ?? ''}}" required>
                  </div>
                  </div>

                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Sex</span>
                    </div>
                    <select name="gender" class="custom-select col-6" style="margin-right: 10px" value="{{$user->profile->gender ?? ''}}">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>

                    <div class="input-group-prepend">
                          <span class="input-group-text">Civil Status</span>
                    </div>
                    <select name="civil" class="custom-select col-6" value="{{$user->profile->civil ?? ''}}">
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Divorced/Annulled">Divorced/Annulled</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                    </select>

                  </div>
                  </div>
                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Birthdate</span>
                    </div>
                    <input name="birthdate" type="text" class="form-control" id="datepickerprofile" value="{{$user->profile->birthdate ?? ''}}" required> 
                  </div>
                  
                  </div>
                  
                  <br><div class="form-row">
                  <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                      </div>
                      <input name="address" type="text" class="form-control" placeholder="Address" value="{{$user->profile->address ?? ''}}" required> 
                  </div>
                  </div>

                    <br><div class="form-row">
                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Mobile Number</span>
                      </div>
                      <input name="contact_num" type="text" class="form-control" value="{{$user->profile->contact_num ?? ''}}" required> 
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
         
        
      </div>
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