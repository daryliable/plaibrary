

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<header>

  <nav class="navbar navbar-expand-lg " style="background-color: #fff44f;">
     <div class="container"> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">PLAIBRARY</a>
    <ul class="nav  justify-content-end">
      <li class="nav-item active">
       <a class="nav-link" style="color: black" href="{{ route('student.dashboard')}}">
                  Home
                </a
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: black" href="{{ route('student.profile.show')}}">
                 Profile
                </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" style="color: black" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); 
                 document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
               </form>
      </li>
    </ul>

  </div>
  </div>
  
</nav>
</header>
@include('admin.includes.success')
@include('admin.includes.error')
<hr>
<div class="container bootstrap snippet">
    <div class="row">
    
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        @if(!is_null(Auth::user()->profile->image_url))
        <img src="{{ URL::asset('images/user_images/' . Auth::user()->profile->image_url) }}" style="height:200px ; width:200px" class="avatar img-circle img-thumbnail" alt="avatar">
        @else
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        @endif
      </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">plaibrary-app.herokuapp.com</a></div>
          </div>
          
          
          <!--<ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
              <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          -->
        </div><!--/col-3-->
      <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Boook Borrowed</a></li>
                <li><a data-toggle="tab" href="#settings">Account Settings</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                   <form class="form"  action="{{ route('student.profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                          <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Profile Picture</h4></label>
                                   <input class="form-control" type="file" name="profile" aria-describedby="fileHelp">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Full name</h4></label>
                              <input type="name" class="form-control" name="name" id="first_name" placeholder="first name" title="enter your first name if any." value="{{$student->name}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Gender</h4></label>
                              <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" title="enter your last name if any." value="{{$student->profile->gender ?? ''}}" >
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Civil Status</h4></label>
                              <input type="text" class="form-control" name="civil" id="civil" placeholder="Civil Status"  value="{{$student->profile->civil ?? ' '}}" >
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="contact_num" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="{{$student->profile->contact_num ?? ''}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Birthdate</h4></label>
                              <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="enter your Birthdate" title="enter your Birthdate." value="{{$student->profile->birthdate ?? ''}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Address</h4></label>
                              <input type="text" class="form-control" name="address" id="address" placeholder="enter a location" title="enter a location" value="{{$student->profile->address ?? ''}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>College/University</h4></label>
                              <input type="text" class="form-control" name="coll_univ" id="coll_univ" placeholder="College/University" title="enter your College." value="{{ $student->profile->coll_univ ?? ''}}">
                          </div>
                      </div>
                     
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                </form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">      
               <h2></h2>      
               <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                       <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                       <th>No.</th>
                       <th>Book</th>
                       <th>Date Barrowed</th>
                       <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($myborrowbooks as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->book_name}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>
                        <a href="" type="button" class="btn btn-primary">Return</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>   
                      </div>
                </form>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
                
                
                  <hr>
                 <form  action="{{ route('student.profile.updatepassword')}}" enctype="" method="post">
              @csrf
                 @method('PATCH')
                
                <div class="form-row">
                <div class="input-group col-6">
                  <div class="input-group-prepend">
                          <label for="email"><h4>Email</h4></label>
                  </div>
                    <input name="email" type="text" class="form-control" value="{{ old('email') ?? $student->email  ?? ''}}" required> 
                  </div>
                </div>
                <div class="form-row">
                <div class="input-group col-6">
                  <div class="input-group-prepend">
                          <label for="password"><h4>Password</h4></label>
                  </div>
                    <input type="password" required autocomplete="new-password" placeholder="Password" id="password" name="password" class="form-control"  value="" required> 
                </div>
                </div>
                <div class="form-row">
                <div class="input-group col-6">
                  <div class="input-group-prepend">
                           <label for="password2"><h4>Verify</h4></label>
                  </div>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password" value="" required>  </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                </div>
                </div>
             </form>   
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('../grandcss/js/main.js')}}"></script>
<script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>                                                     