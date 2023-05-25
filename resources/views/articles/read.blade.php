    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Article</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #212529;
                color: #fff;
                font-family: Arial, sans-serif;
                padding: 20px;
            }

            h1 {
                font-size: 32px;
                margin-bottom: 10px;
                color: #fff;
                text-align: center;
                font-family: "Your Desired Font", Arial, sans-serif;
            }

            img {
                display: block;
                margin: 0 auto 20px;
                max-width: 100%;
                height: auto;
            }

            p {
                line-height: 1.5;
                margin-bottom: 20px;
            }

            .comment-section {
                background-color: #303030;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .comment {
                margin-bottom: 20px;
                color: #fff;
            }

            .comment p {
                margin-bottom: 10px;
            }

            .comment form {
                display: inline;
            }

            .comment button[type="submit"] {
                background-color: #ff4136;
                color: #fff;
                border: none;
                padding: 6px 10px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            .update-btn {
                background-color: #0074d9;
                color: #fff;
                border: none;
                padding: 6px 10px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            .update-form {
                margin-top: 10px;
            }

            .update-form input[type="text"],
            .comment-form input[type="text"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px;
            }

            .comment-form button[type="submit"] {
                background-color: #2ecc40;
                color: #fff;
                border: none;
                padding: 6px 10px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            #toggle-comments-btn {
                background-color: #ff851b;
                color: #fff;
                border: none;
                padding: 6px 10px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <h1>{{ $article->title }}</h1>
        <h1>{{ $article->category->name }}</h1>
        <h1></h1>
        <img src="{{ $article->image }}" alt="Article Image">

        <p>{!! $article->content !!}</p>

        <button id="toggle-comments-btn" type="button">Toggle Comments</button>

        <div class="comment-section" style="display: none;">
            <h2>Comments</h2> --}}
            @foreach ($comments as $comment)
                <div class="comment">
                    <p>{{ $comment->content }}</p>
                    <!-- Delete Button -->
                    <form action="{{ route('comment.delete', ['comment' => $comment->id]) }}" method="post"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <!-- Update Button -->
                    <button type="button" class="update-btn" data-id="{{ $comment->id }}">Update</button>
                    <!-- Update Form -->
                    <div class="update-form" id="update-form-{{ $comment->id }}" style="display: none;">
                        <form action="{{ route('comment.update', ['comment' => $comment->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="text" name="updated_content" value="{{ $comment->content }}">
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>
                @if ($comment->childComments)
                    @foreach ($comment->childComments as $childComment)
                        <div class="comment comment-reply">
                            <p>{{ $childComment->content }}</p>
                            <!-- Delete Button -->
                            <form action="{{ route('comment.delete', ['comment' => $childComment->id]) }}"
                                method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <!-- Update Button -->
                            <button type="button" class="update-btn" data-id="{{ $childComment->id }}">Update</button>
                            <!-- Update Form -->
                            <div class="update-form" id="update-form-{{ $childComment->id }}" style="display: none;">
                                <form action="{{ route('comment.update', ['comment' => $childComment->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="updated_content" value="{{ $childComment->content }}">
                                    <button type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>

        <div class="comment-form" style="display: none;">
            <h2>Post a Comment</h2>
            <form action="{{ route('comment.post', ['article' => $article->id]) }}" method="post">
                @csrf
                <input type="text" name="content">
                <button type="submit">Post Comment</button>
            </form>
        </div>

        <script>
            document.getElementById('toggle-comments-btn').addEventListener('click', function() {
                var commentSection = document.querySelector('.comment-section');
                var commentForm = document.querySelector('.comment-form');

                if (commentSection.style.display === 'none') {
                    commentSection.style.display = 'block';
                    commentForm.style.display = 'block';
                } else {
                    commentSection.style.display = 'none';
                    commentForm.style.display = 'none';
                }
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const updateButtons = document.querySelectorAll('.update-btn');
                updateButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const commentId = this.dataset.id;
                        const updateForm = document.getElementById(`update-form-${commentId}`);
                        updateForm.style.display = updateForm.style.display === 'none' ? 'block' :
                            'none';
                    });
                });
            });
        </script>
    </body>

    </html>
