@include('student.includes.header')
@include('student.includes.aside')
  <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/main.css')}}">
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Books</h1>
        </div> 
      </div>
    @if(is_null(Auth::user()->profile->coll_univ))
     <div class="alert alert-warning shadow">
        <div class="card-body">
         <b>Please!</b> update first your profile before you proceed on borrowing books.    
         <a class="" href="{{ route('student.profile.show') }}">Click here!</a>     
        </div>
    </div>
    @endif
      <div class="row">  
       <div class="col-md-12">
        <div class="tile">
         <div class="tile-body">
          @include('admin.includes.success')
          @include('admin.includes.error')
           <div class="col-md-12">
          <div class="tile">
          <div class="row">
          @foreach($books as $book)
          <div class="modal fade" id="book{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Reserve Book</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <form action="/reserve_book/{{$book->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                    </div>
                    <div class="modal-body ">
                      <h6 class=".col-md-4">Title: {{$book->book_name}}</h6>
                      <h6> Institution: {{$book->institution}}</h6>
                      <h6> Librarian: {{$book->book_uploader}}</h6>
                      <h6> Call Number: {{$book->call_num}}</h6>
                      <input type="" name="book_id" value="{{ $book->id }}" hidden="">
                    
                      <div class="form-group">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                     <span class="input-group-text">Date Visit</span>
                                </div>
                                  <input type="text" class="form-control" id="addCalendar" name="visit" placeholder="Set a Date" required="required">
                                </div>
                              </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Reserve</button>
                    </div>
                     </form>
                  </div>
                </div>
              </div>
           <form>
             <div class="col-md-4" style="padding-top: 15px;">
                <div class="bookcard">
                  <div class="bookimgBox">
                    <img src="{{URL::asset('images/book_images/' . $book->image_url) }}" width="200" height="300">
                  </div>
                  <div class="bookdetails">
                    <h6>{{$book->book_name}}</h6>
                    <p>
                      Author: {{$book->book_author}}<br>
                      Publisher: {{$book->book_publisher}}<br>
                      Description: {{$book->book_description}}<br>
                      Genre: {{ $book->genre->genre_name }}
                      
                    </p>      
                  </div>
                  @if(!is_null($book) && $book->book_quantity != 0)
                  <button type="button" class="btn btn-primary col-md-12" data-toggle="modal" data-target="#book{{$book->id}}">Visit
                  </button>
                  @else
                  <button class="btn btn-common col-md-12" style="color:#6D6666" type="submit" disabled="">Not Available</button>
                  @endif
                </div>
              </div>
              </form>
            @endforeach
                  <div class="col-12 text-center pt-5 d-flex justify-content-md-center">
                   {{ $books->links()}}
                  </div>
         </div>
        </div>
       </div>
      </div>
    </div>
  </div>
  </main>
@include ('student.includes.footer')

    <!-- Data table plugin-->
    <script type="text/javascript" src="{{URL::asset('../js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src=" {{URL::asset('../js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>



<!--          <div class="col-md-9">
         {{URL::asset('')}} 
        </div>
         -->