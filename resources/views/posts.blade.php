<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Post <a href="/add-post" class="btn btn-success btn-sm" style="float: right">Add Post</a>
                        </div>
                        @if (Session::has('post_created'))
                            <div class="alert alert-success" role='alert'>
                                {{ Session::get('post_created') }}
                            </div>
                        @endif
                        @if (Session::has('post_delete'))
                            <div class="alert alert-danger" role='alert'>
                                {{ Session::get('post_delete') }}
                            </div>
                        @endif
                        @if (Session::has('post_updated'))
                            <div class="alert alert-success" role='alert'>
                                {{ Session::get('post_updated') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <table class="table table-striprd">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post Title</th>
                                        <th>Post Description</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $posts)
                                        <tr>
                                            <td>{{ $posts->id }}</td>
                                            <td>{{ $posts->title }}</td>
                                            <td>{{ $posts->body }}</td>
                                            <td>
                                                <a href="/posts/{{ $posts->id }}" class="btn btn-info btn-sm">Detail</a>
                                                <a href="/edit-post/{{ $posts->id }}" class="btn btn-success">Edit</a>
                                                <a href="/delete-post/{{ $posts->id }}" class="btn btn-danger btn-lg">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
