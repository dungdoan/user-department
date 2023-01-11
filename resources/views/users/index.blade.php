<html>
    @include('main.header')

    <body>
        <div class="container">
            @include('main.menu')

            <h1>User overview</h1>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Department</th>
                  <th scope="col">Assign to department</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $index => $user)
                  <tr>
                    <form method="post" action="/user/assign">
                      <th scope="row">{{ $index+1 }}</th>
                      <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                      <th scope="row">{{ $user->department }}</th>
                      <td>
                        <select name="department">
                            @foreach ($departments as $department)
                                @if ($user->department_id != $department->id)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Assign</button>
                      </td>
                      <input type="hidden" name="user_id" value="{{ $user->id }}" />
                      {{ csrf_field() }}
                    </form>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </body>
    @include('main.footer')
</html>
