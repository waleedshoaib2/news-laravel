<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #87bffa;
            color: #fff;
        }

        .form-label {
            color: #fff;
        }

        .form-control {
            background-color: #303030;
            color: #fff;
            border-color: #303030;
        }

        .form-control:focus {
            background-color: #8a0e0e;
            color: #fff;
            border-color: #fff;
            box-shadow: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Create News Article</h1>
        <form method="post" action="{{ route('article.create') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea class="form-control tinymce-editor" id="content" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Link</label>
                <input type="text" id="image" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <select id="dropdown" name="user_id">
                    @foreach ($user as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->username }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <select id="dropdown" name="category_id">
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>







                <div id="tags-container">
                    <div class="mb-3">
                        <label for="tags">Tag 1:</label>
                        <input type="text" name="tags[]" placeholder="Enter tags" />
                    </div>
                </div>

                <button id="add-tag-button" type="button">Add Tag</button>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-block">Publish</button>
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

    <script>
        let tagCount = 1;

        document.getElementById('add-tag-button').addEventListener('click', () => {
            tagCount++;
            const newTag = document.createElement('div');
            newTag.classList.add('mb-3');
            newTag.innerHTML = `
            <label for="tags">Tag ${tagCount}:</label>
            <input type="text" name="tags[]" placeholder="Enter tags" />
        `;
            document.getElementById('tags-container').appendChild(newTag);
        });
    </script>


</body>

</html>
