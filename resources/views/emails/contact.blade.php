<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Nouveau message</title>
</head>
<body>

    <h1>Nouveau message de {{ $details['name'] }}</h1>
    <p>Email : {{ $details['email'] }} </p>
    <p>Message :</p>
    <p>{{ $details['message'] }}</p>
    
</body>
</html>