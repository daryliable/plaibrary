@if ($errors->any())
    <div class="alert alert-warning shadow">
        <div class="card-body">
                @foreach (array_unique($errors->all()) as $error)
                    <li class="font-weight-bold">{{ $error }}</li>
                @endforeach
        </div>
    </div>
@endif




