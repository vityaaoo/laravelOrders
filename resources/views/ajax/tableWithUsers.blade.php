<div class="usersTable">
<table border="1">
<th>Name</th><th>Sex</th><th>Age</th><th>Address</th><th>DateofBirth</th>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->sex }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->dateOfBirth }}</td>
        </tr>
    @endforeach
</table>
</div>