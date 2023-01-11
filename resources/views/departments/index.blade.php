<html>
    @include('main.header')

    <body>
        <div class="container">
            @include('main.menu')

            <h1>Department overview</h1>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Department</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($departments as $index => $department)
                  <form method="post" action="/department/delete">
                    <tr>
                      <td>{{ $department->name }}</td>
                      <td>
                        <button type="submit" class="btn btn-danger">Remove</button>
                      </td>
                    </tr>
                    <input type="hidden" name="department_id" value="{{ $department->id }}" />
                    {{ csrf_field() }}
                  </form>
                @endforeach
              </tbody>
            </table>
        </div>
    </body>
@include('main.footer')
</html>
