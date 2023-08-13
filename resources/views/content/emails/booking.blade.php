<!DOCTYPE html>
<html>

<head>
    <title>Your reservation sent</title>
</head>

<body>
    <h1>Your reservation was made</h1>
    <p>Start booking time: {{$data->start_time}}</p>
    <p>Return vehicle at: {{$data->end_time}}</p>
    <p>Total payment: {{$data->total_amount}}</p>
    <p>Wait for the station owner approve it. We will notify you when the reservation approved</p>
</body>

</html>