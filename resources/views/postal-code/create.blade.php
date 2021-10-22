@php
    $layout = !Route::is('alien.*') ? 'layouts.app1' : 'layouts.admin';
@endphp
@extends($layout)


@section('content')
    <div class="container" >
        <form method="POST" action="{{ route('alien.postal-code.import') }}" class="d-grid gap-2 needs-validation" enctype="multipart/form-data" novalidate >
            @csrf
            <div class="input-group">
                <input type="file" name="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Button</button>
              </div>
        </form>
        
    </div>
@endsection
