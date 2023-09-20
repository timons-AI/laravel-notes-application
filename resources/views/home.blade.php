<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <style>
       <style>
        body {
            background-color: #121212;
            color: #EAEAEA;
            font-family: Arial, sans-serif;
        }

        /* Base styles */
        .container {
            background-color: #1f1f1f;
            padding: 1.5rem;
            border-radius: 5px;
            margin: 1rem;
            width: 90%;
            max-width: 500px;
            border: 1px solid #444;
            box-shadow: 0px 0px 15px rgba(255,255,255,0.1);
        }

        .text {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        input, textarea, button {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #444;
            background: #2a2a2a;
            color: #EAEAEA;
            box-sizing: border-box;
        }

        input::placeholder, textarea::placeholder {
            color: #777;
        }

        input:focus, textarea:focus {
            border-color: #66ffc2;
            outline: none;
            box-shadow: 0 0 5px rgba(102, 255, 194, 0.5);
        }

        button {
            width: auto;
            margin-top: 0.5rem;
            padding: 0.5rem 1.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-logout {
            background-color: #e63956;
            color: white;
        }

        .btn-logout:hover {
            background-color: #c52745;
        }

        .btn-save {
            background-color: #66ffc2;
            color: #121212;
        }

        .btn-save:hover {
            background-color: #4ae7b5;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 1.5rem;
            border-radius: 5px;
            margin: 1rem auto;
            border: 1px solid #444;
            box-shadow: 0px 0px 15px rgba(255,255,255,0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 1rem;
        }

        .btn-register, .btn-login {
            width: 100%;
            padding: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: #EAEAEA;
        }

        .btn-register {
            background-color: #4CAF50;
        }

        .btn-register:hover {
            background-color: #388E3C;
        }

        .btn-login {
            background-color: #007BFF;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .post-item {
            border-top: 1px solid #444;
            padding: 1rem 0;
        }

        .post-title {
            margin-top: 0;
            font-size: 1.4rem;
        }

        .post-body {
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        /* This is to remove the top border from the first post for aesthetics */
        .post-item:first-child {
            border-top: none;
        }


        /* New styles specific to this page */
        body {
            background-color: #121212;
            color: #EAEAEA;
            font-family: Arial, sans-serif;
        }

        .edit-container {
            background-color: #1f1f1f;
            padding: 1.5rem;
            border-radius: 5px;
            margin: 1rem auto;
            width: 90%;
            max-width: 500px;
            border: 1px solid #444;
            box-shadow: 0px 0px 15px rgba(255,255,255,0.1);
        }

        .edit-title {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .edit-button {
            width: 100%;
            padding: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #007BFF;
            color: #EAEAEA;
            border: none;
            border-radius: 5px;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .delete-post {
            width: 100%;
            padding: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #e63956;
            color: #EAEAEA;
            border: none;
            border-radius: 5px;
        }
        a {
            text-decoration: none;
            color: #EAEAEA;
        }
        .edit-delete-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;

        }
    </style>
    </style>
</head>
<body>

    @auth
    <div class="container">
        <p class="text">Congrats, you're logged in.</p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

    <div class="container">
        <p class="text">Create a new post</p>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name='title' placeholder="Enter post title">
            <textarea name="body" placeholder="Enter body content" rows="5"></textarea>
            <button type="submit" class="btn-save">Save post</button>
        </form>
    </div>

    <div class="container">
        <p class="text">Your posts</p>
        @foreach ($posts as $post)
        <div class="post-item">
            <h3 class="post-title">{{$post['title']}}</h3>
            <span>by {{$post->user->name}}</span>
            <p class="post-body">{{$post['body']}}</p>
        </div>
       <div class="edit-delete-container">
        
            <a href="/edit-post/{{$post->id}}">
                <button class="edit-button">Edit </button>
            </a>
       
        <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-post">Delete</button>
        </form>
        </div>
        @endforeach
    </div>

    @else
    
    <div class="container form-container">
        <h2 class="form-title">Register</h2>
        <form action="/register" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name">
            
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">
            
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
            
            <button type="submit" class="btn-register">Register</button>
        </form>
    </div>
    
    <div class="container form-container">
        <h2 class="form-title">Login</h2>
        <form action="/login" method="POST">
            @csrf
            <label for="login_email">Email</label>
            <input type="text" name="login_email" placeholder="Email">
            
            <label for="login_password">Password</label>
            <input type="password" name="login_password" placeholder="Password">
            
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
    @endauth

</body>

</html>