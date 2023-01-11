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
        <td>Number</td>
        <td>Department</td>
    </tr>
    @foreach ($departments as $index => $department)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $department->name }}</td>
        </tr>
    @endforeach 
</table>