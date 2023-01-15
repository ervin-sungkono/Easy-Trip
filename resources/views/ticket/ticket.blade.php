<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
</head>
<body>

    <div class="container">
        <div class="d-flex flex-column">
            <h1>{{$ticket->ticket_id}}</h1>
            <h3>{{$user->name}}</h3>
        </div>
    </div>
    <div>
        Item: {{$item->id}}
        <br>
        Item Name: {{$item->name}}
        <br>
        Quantity: {{$ticket->quantity}}

    </div>
    <div>
        {{$ticket->ticket_date}}
    </div>
</body>
</html>
