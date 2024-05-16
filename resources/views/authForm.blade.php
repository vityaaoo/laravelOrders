<head>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<h1>Login</h1>
<form action="/login" method="POST">
    @csrf
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="password" placeholder="Password"><br>
    <input type="submit" value="Login" class="pageButton">
</form>
<a href="{{ url('/regPage') }}">Зарегистрироваться</a>