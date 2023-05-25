<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #212529;
            color: #fff;
            padding: 20px;
        }

        h1 {
            font-size: 34px;
            margin-bottom: 12px;
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

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="center">
            <h1 class="mb-lg-2">Update Article</h1>
        </div>
        <br>
        <br>
        <form action="{{ route('article.update', ['article' => $article->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" value="{{ $article->title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Link</label>
                <input type="text" id="image" name="image" value="{{ $article->image }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control tinymce-editor" id="content" name="content">{{ $article->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" id="user_id" name="user_id" value="{{ $article->user_id }}"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="number" id="category_id" name="category_id" value="{{ $article->category_id }}"
                    class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 300,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount', 'image'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
</body>

</html>
