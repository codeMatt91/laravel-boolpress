<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail from Boolpress</title>
    <style>
        body {
            text-align: center;
            background-color: bisque;
        }

        .card {
            display: flex;
            text-align: center;
            justify-content: center;
            border: 1px solid black;
            box-shadow: 0px 0px 10px #888888;
        }

        #post {
            padding: 10px;
            width: 50%;
        }

    </style>
</head>

<body>
    <h2>Il tuo posto è stato pubblicato</h2>
    <div class="card">
        <div id="post">
            <div>{{ $post->title }}</div>
            <div>{{ $post->content }}</div>
            <i>Creato il :{{ $post->updated_at }}</i>
        </div>
    </div>
</body>

</html>
