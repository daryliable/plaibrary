@include ('librarian.includes.header')
@include ('librarian.includes.aside')

    
<main class="app-content">
      <div class="app-title">
        <div>
          <h1>Book Management</h1>
        </div> 
      </div>
      @if(is_null(Auth::user()->profile->coll_univ))
     <div class="alert alert-warning shadow">
        <div class="card-body">
         <b>Please!</b> Update first your Institution before you proceed on adding books.    
         <a class="" href="{{ route('librarian.profile.show') }}">Click here!</a>     
        </div>
    </div>
    @endif
      @include('librarian.includes.success')
      @include('librarian.includes.error')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Patient</button> -->
               

                  <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Add Books</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                              <form action="/lib_addbook" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control" name="bookname" placeholder="Book Name" required="required">
                                </div>
                                 <div class="form-group">
                                  <input type="number" class="form-control" name="book_quantity" placeholder="Number of Copies" required="required">
                                </div>
                                 <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                     <span class="input-group-text">+63</span>
                                </div>
                               <input type="phone" pattern="[9]{1}[0-9]{9}" class="form-control" name="call_num" placeholder="Call Number" required="required">
                                </div>
                                </div>
                                <div class="form-group">
                                  <label for="description">Book Description</label>
                                  <textarea class="form-control" name="description" id="description" rows="3" required="required"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="genre">Category/Genre</label>
                                  <select class="form-control" name="genre">
                                    @foreach($genre as $categ)
                                    <option value="{{ $categ->id }}">{{ $categ->genre_name }}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" name="author" placeholder="Book Author" required="required">
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" name="publisher" placeholder="Book Publisher" required="required">
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" id="addCalendar" name="datepublished" placeholder="Date Published" required="required">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputFile">Book Image</label>
                                  <input class="form-control-file" type="file" name="book_image" aria-describedby="fileHelp">
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
                <div>
                
                </div> 
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#extraLargeModal" style="margin: 2px"><span class="badge"><i class="fa fa-plus"></i></span> Add Books</button><br><br><br>

              <table class="table table-hover table-bordered  table-responsive" id="sampleTable">
                <thead>

                  <tr>
                    <th>No.</th>
                    <th>Book Title</th>
                    <th>Call Number</th>
                    <th>Book Description</th>
                    <th>Category/Genre</th>
                    <th>Book Author</th>
                    <th>Publisher</th>
                    <th>Date Published</th>
                    <th>Number of Copies</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($books as $row)
                     <div id="editBook{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Edit Book</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                              <form action="/lib_editBookList" method="post" enctype="multipart/form-data">
                               @csrf
                               <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control" name="edit_bookname" placeholder="Book Name" required="required" value="{{ $row->book_name }}">
                                </div>
                                <div class="form-group">
                                  <input type="number" class="form-control" name="edit_book_quantity" placeholder="Number of Copies" required="required"  value="{{ $row->book_quantity }}">
                                </div>
                                <div class="form-group">
                                  <input type="phone" class="form-control" name="edit_call_num" placeholder="Call Number" required="required" value="{{ $row->call_num }}">
                                </div>
                                <div class="form-group">
                                  <label for="description">Book Description</label>
                                  <textarea class="form-control" name="edit_description" rows="3" required="required">{{ $row->book_description }}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="genre">Category/Genre</label>
                                  <select class="form-control" name="edit_genre" value="{{ $row->genre_name }}">
                                    @foreach($genre as $categ)
                                    <option value="{{ $categ->id }}">{{ $categ->genre_name }}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" name="edit_author" placeholder="Book Author" required="required" value="{{ $row->book_author }}">
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" name="edit_publisher" placeholder="Book Publisher" required="required" value="{{ $row->book_publisher }}">
                                </div>

                                <div class="form-group">
                                  <input type="text" class="form-control" id="editCalendar" name="edit_datepublished" placeholder="Date Published" required="required" value="{{ $row->date_published }}">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputFile">Book Image</label>
                                  <input class="form-control-file" type="file" name="book_image" aria-describedby="fileHelp" value="{{ $row->image_url }}">
                                  <small class="form-text text-muted" id="fileHelp">
                                  </small>
                                </div>

                                <input type="hidden" class="form-control" name="book_id" value="{{ $row->id }}">
                              
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary">OK</button>
                              </div>>
                              </form>
                          </div>
                      </div>
                  </div>
                  <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->book_name }}</td>
                    <td>{{ $row->call_num}}</td>
                    <td>{{ $row->book_description }}</td>
                    <td>{{ $row->genre->genre_name }}</td>
                    <td>{{ $row->book_author }}</td>
                    <td>{{ $row->book_publisher }}</td>
                    <td>{{ $row->date_published }}</td>
                    <td>{{ $row->book_quantity }}</td>
                    <td>
                       <a data-toggle="modal" href="#editBook{{ $row->id }}"> <span class="badge badge-success" ><i class="fa fa-edit fa-2x"></i></span> </a>
                       <a href="lib_deleteBook/{{ $row->id }}"> <span class="badge badge-danger"><i class="fa fa-trash-o fa-2x"></i></span> </a>
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
@include ('librarian.includes.footer')

<!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>