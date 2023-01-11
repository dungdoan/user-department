<ul>
    <li>
        <a href="/user">User</a>
    </li>
    <li>
        <a href="/department">Department</a>
    </li>
</ul>

<table>
    <tr>
        <td>Name</td>
        <td>Department id </td>
        <td>Assign to department</td>
        <td>Assign?</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <form method="post" action="/user/assign">
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->department_id }}</td>
                <td>
                    <select name="department">
                        @foreach ($departments as $department)
                        @php
                            $selected = $user->department_id == $department->id ? 'selected' : '';
                        @endphp
                            <option value="{{ $department->id }}" {{ $selected }}>{{ $department->name }}</option>
                        @endforeach 
                    </select>
                </td>
                <td><button type="submit">Assign</button></td>
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                {{ csrf_field() }}
            </form>
        </tr>
    @endforeach 
</table>
