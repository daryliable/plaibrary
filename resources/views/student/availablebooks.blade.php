@include('student.includes.header')
<table class="table table-hover table-bordered" id="sampleTable">
                <thead>

                  <tr>
                    <th>No.</th>
                    <th>Book Title</th>
                    <th>Book Description</th>
                    <th>Category/Genre</th>
                    <th>Book Author</th>
                    <th>Publisher</th>
                    <th>Date Published</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($books as $row)
                     <div id="editBook{{ $row->book_id }}" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-md">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Edit Book</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                              <form action="/editBookList" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control" name="edit_bookname" placeholder="Book Name" required="required" value="{{ $row->book_name }}">
                                </div>

                                <div class="form-group">
                                  <label for="description">Book Description</label>
                                  <textarea class="form-control" name="edit_description" rows="3" required="required">{{ $row->book_description }}</textarea>
                                </div>

                                <div class="form-group">
                                  <label for="genre">Category/Genre</label>
                                  <select class="form-control" name="edit_genre" value="{{ $row->genre_name }}">
                                    @foreach($genre as $categ)
                                    <option value="{{ $categ->genre_id }}">{{ $categ->genre_name }}</option>
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
                                  <input class="form-control-file" type="file" name="edit_image" aria-describedby="fileHelp" value="{{ $row->image_url }}">
                                  <small class="form-text text-muted" id="fileHelp">Make sure that book image converted to 100 x 300 inches for better arrangement.
                                  </small>
                                </div>

                                <input type="hidden" class="form-control" name="book_id" value="{{ $row->book_id }}">
                              
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
                    <td>{{ $row->book_id }}</td>
                    <td>{{ $row->book_name }}</td>
                    <td>{{ $row->book_description }}</td>
                    <td>{{ $row->genre_name }}</td>
                    <td>{{ $row->book_author }}</td>
                    <td>{{ $row->book_publisher }}</td>
                    <td>{{ $row->date_published }}</td>
                    <td>{{ $row->image_url }}</td>
                    <td>
                       <a data-toggle="modal" href="#editBook{{ $row->book_id }}"> <span class="badge badge-success" ><i class="fa fa-edit fa-2x"></i></span> </a>
                       <a href="deleteBook/{{ $row->book_id }}"> <span class="badge badge-danger"><i class="fa fa-trash-o fa-2x"></i></span> </a>
                    </td>
                  </tr>
                  @endforeach
@include('student.includes.aside')
@include('student.includes.footer')