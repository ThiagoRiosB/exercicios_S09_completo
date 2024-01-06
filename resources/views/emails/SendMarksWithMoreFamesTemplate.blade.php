<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .game-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        .game-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .game-details {
            padding: 20px;
            text-align: center;
        }
        .game-price {
            font-size: 1.2em;
            color: #3498db;
        }
        .game-description {
            margin-top: 10px;
            color: #555;
        }
    </style>
</head>
<body>

    <table border="1">
        <thead>
            <tr>
                <th>Lista de Jogos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <ul>
                        @foreach ($game as $games)
                            <li>
                                <p><strong>Nome:</strong> R$ {{ $games->name }}</p>
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>


</body>
</html>
