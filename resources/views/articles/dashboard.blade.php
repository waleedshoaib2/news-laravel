<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f2f2f2;
        }

        .dashboard {
            margin: 50px auto;
            max-width: 1200px;
            padding: 20px;
            background-color: #181818;
        }

        h1 {
            color: #f2f2f2;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            color: #f2f2f2;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #121212;
        }

        tbody tr:nth-child(even) {
            background-color: #242424;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #bb86fc;
            border-color: #bb86fc;
        }

        .btn-primary:hover {
            background-color: #a855f7;
            border-color: #a855f7;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .center {
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="dashboard">
        <div class="center">
            <h1>Article</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Read</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <a href="{{ route('articles.find', ['article' => $article->id]) }}"
                                class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('article.read', ['article' => $article->id]) }}"
                                class="btn btn-primary">Read</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="btn-container">
            <a href="{{ route('loadCreatepage') }}" class="btn btn-primary">Add Article</a>
        </div>
    </div>
</body>

</html>
