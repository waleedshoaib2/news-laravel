<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            color: #fff;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form-label {
            color: #fff;
        }

        .form-control {
            background-color: #303030;
            color: #fff;
            border-color: #303030;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .form-control:focus {
            background-color: #303030;
            color: #fff;
            border-color: #fff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Update Categories</h1>
        <form action="{{ route('update.category', ['categoryid' => $category->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Post</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
