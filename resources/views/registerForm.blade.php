<head>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<h1>Register</h1>
<form action="/register" method="POST">
@csrf
    <input type="text" placeholder="name" name="name"><br>
    <input type="text" placeholder="email" name="email"><br>
    <input type="text" placeholder="password" name="password"><br>
    <input type="submit" value="Register" class="pageButton">
</form>