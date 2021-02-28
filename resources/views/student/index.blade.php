@include('student.includes.header')
@include('student.includes.aside')
  <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/main.css')}}">
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Books</h1>
        </div> 
      </div>

      <div class="row">
       <div class="col-md-12">
        <div class="tile">
         <div class="tile-body">
           @include('admin.includes.success')
          @include('admin.includes.error')
          <div class="tile">
          <div class="row">
          @foreach($books as $book)
           <form action="reserve_book/{{ $book->id }}" method="POST">
            @csrf
             <div class="col-md-4">
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
                      <input type="" name="book_id" value="{{ $book->id }}" hidden="">
                      <input type="" name="book_name" value="{{ $book->book_name }}" hidden="">
                    </p>      
                  </div>
                  @if(!is_null($book) && $book->book_quantity != 0)
                  <button class="btn btn-common col-md-12" style="color:#6D6666" type="submit" >Reserve</button>
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