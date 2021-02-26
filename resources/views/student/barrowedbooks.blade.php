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
                              <th>Barrowed From</th>
                              <th>Librarian</th>
                              <th>Date Barrowed</th>
                              <th>Return Date</th>
                              <th>Remarks</th>
                            </tr>
                          </thead>  
                        @foreach($myborrowbooks as $row)
                        <tbody>
                          <td>{{$row->id}}</td>
                          <td>{{$row->book_name}}</td>
                          <td>a</td>
                          <td>a</td>
                          <td>{{$row->created_at}}</td>
                          <td>a</td>
                          
                          <td>
                          <a href="" type="button" class="btn btn-primary">Return</a>
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