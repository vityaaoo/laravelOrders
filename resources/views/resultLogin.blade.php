<head>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<p>Hello, {{$name}}</p>
<form method="POST">
    @csrf
    <input type="submit" value="Orders" class="pageButton" formaction="/ordersPage">
    <input type="submit" value="Logout" class="pageButton" formaction="/authPage">
</form>
