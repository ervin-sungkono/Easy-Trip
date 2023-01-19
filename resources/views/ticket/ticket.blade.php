<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        body{
            font-family: sans-serif;
        }

        .container{
            padding: 16px;

        }

        .top{
            display: flex;
            flex-direction: column;
        }

        .tiket-id{
            font-family: serif;
        }

        .nama{
            color: grey;
        }

        .mid{
            border-style: solid;
            border-radius: 6px;
            padding: 8px;
            border-width: 1.5px;
        }

        .tanggal{
            padding-top: 24px;
        }

        .ending{
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
            padding-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top">
            <h1 class="tiket-id">ID Tiket: {{$ticket->ticket_id}}</h1>
            <h3 class="nama">Nama: {{$user->name}}</h3>
        </div>
        <div class="mid">
            <div class="konten" style="display: flex; flex-direction: column; gap: 8px;">
                <div><b>Nama Item: </b> {{$item->name}}</div>
                <div><b>Jumlah: </b> {{$ticket->quantity}}</div>
                <div><b>Status: </b> {{$ticket->status? "Aktif":"Sudah Digunakan"}}</div>
            </div>
            <div class="tanggal">
               <b>Tanggal: </b><i>{{$ticket->ticket_date->format('j F Y')}}</i>
            </div>
        </div>
        <h2 class="ending">
            <i>Have a nice trip :)</i>
        </h2>
    </div>
</body>
</html>
