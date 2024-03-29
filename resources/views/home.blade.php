<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
        Congrats, You are logged in
        <form action="/logout" method="post">
            @csrf
            <button>Log out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="blog title">
                <textarea name="body" placeholder="blog content.."></textarea>
                <button>Create new Post</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @if(count($posts) > 0)
            @foreach($posts as $post)
            <div style="background-color: grey; padding: 10px; margin: 10px">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                <p>{{$post['body']}}</p>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
            @else
            <h3>No Post Available</h3>
            @endif
        </div>

    @else

    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input type="text" name="loginname" placeholder="name">
            <input type="password" name="loginpassword" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth


    
</body>
</html>