<script src="{{ asset('js/script.js') }}"></script>
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<div class="searchContainer">
<h1>Search user</h1>
    <input type="text" id="searchInput" name="searchInput" placeholder="search...">
    <button onClick="searchUser()">Search user</button>
</div><br>
<div class="inputUserContainer">
<h1>Add user</h1>
<input type="text" id="name" name="name" placeholder="Name"><br>
<select id="sex" name="sex">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select><br>
<input type="number" id="age" name="age" placeholder="Age" min=1><br>
<input type="text" id="address" name="address" placeholder="Address"><br>
<input type="date" id="dateOfBirth" name="dateOfBirth" placeholder="DateOfBirth"><br>
<button onClick="addNewUser()">Add User</button>
</div>
<div id="usersTable">
    @include('ajax/tableWithUsers')
</div>