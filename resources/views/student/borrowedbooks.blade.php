@include('student.includes.header')
@include('student.includes.aside')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1>Barrowed Books</h1>
        </div> 
      </div>
      @include('includes.success')
      @include('includes.error')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">

            <table class="table table-hover table-bordered" id="sampleTable">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Book</th>
                              <th>Borrowed From</th>
                              <th>Librarian</th>
                              <th>Date Borrowed</th>
                              <th>Return Date</th>
                              <th>Remarks</th>
                            </tr>
                          </thead>  
                        @foreach($myborrowbooks as $row)
                        <tbody>
                          <td>{{$row->id}}</td>
                          <td>{{$row->book_name}}</td>
                          <td>{{$row->profile->coll_univ}}</td>
                          <td>{{$row->lib_name}}</td>
                          <td>{{$row->created_at}}</td>
                          <td>@if($row->return_date != "") {{$row->return_date}} @else N/A @endif</td>
                          
                          <td>
                          <a href="return/{{$row->id}}" type="button" class="btn btn-primary">RETURN</a>
                          </td>
                        </tbody>
                        @endforeach 
                        </table>  
          </div>
        </div>
      </div>
      
    </main>

@include ('student.includes.footer')
<script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>