<html>
    @include('main.header')

    <body>
        <div class="container">
            @include('main.menu')

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form method="post" action="/department/create">
              <div class="form-group">
                <label>Department Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter department name">
              </div>
              <button type="submit" class="btn btn-primary">Create</button>
              {{ csrf_field() }}
            </form>
        </div>
    </body>
@include('main.footer')
</html>
