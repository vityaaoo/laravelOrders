<script src="{{ asset('js/script.js') }}"></script>
<input type="text" id="name" name="name" placeholder="Name"><br>
<select id="sex" name="sex">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select><br>
<input type="text" id="age" name="age" placeholder="Age"><br>
<input type="text" id="address" name="address" placeholder="Address"><br>
<input type="date" id="dateOfBirth" name="dateOfBirth" placeholder="DateOfBirth"><br>
<div onClick="addNewUser()">Add User</button>
<div id="usersTable">
    @include('ajax/tableWithUsers')
</div>