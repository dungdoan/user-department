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

            <form method="post" action="/user/create">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
              </div>
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label>Department</label>
                <select class="form-control" name="department_id">
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">
                        {{ $department->name }}
                      </option>
                    @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Create</button>
              {{ csrf_field() }}
            </form>
        </div>
    </body>
@include('main.footer')
</html>
