<head>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<div class=a></div>
<h1>Confirmed orders for user {{  $userName  }} in the last week</h1>
<table border=1>
    <th>OrderID</th><th>UserID</th><th>ServiceID</th><th>TotalTime</th><th>Earnings</th><th>Status</th><th>CreatedAt</th>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->provider_id }}</td>
            <td>{{ $order->service_id }}</td>
            <td>{{ $order->total_time }}</td>
            <td>{{ $order->earnings }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach
</table>

<h1>Total time and earnings per days for the last week</h1>
<table border=1>
    <th>TotalTimePerDay</th><th>TotalEarningsPerDay</th><th>Date</th>
    @foreach($totalHours as $day => $totalTime)
        <tr>
            <td>{{ $totalTime }}</td>
            <td>{{ $totalEarnings[$day] }}</td>
            <td>{{ $day }}</td>
        </tr>
    @endforeach
</table>
</body>