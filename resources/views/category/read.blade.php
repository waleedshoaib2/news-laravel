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
            background-color: #212529;
            color: #fff;
        }

        .dashboard {
            margin: 50px auto;
            max-width: 800px;
            padding: 20px;
            background-color: #303030;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            color: #fff;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #212529;
        }

        tbody tr:nth-child(even) {
            background-color: #454545;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <h1>Article</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>

                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.updatepage', ['id' => $category->id]) }}"
                                class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="btn-container">
            <a href="{{ route('category.createpage') }}" class="btn btn-primary">Add Category</a>
        </div>
    </div>
</body>

</html>
