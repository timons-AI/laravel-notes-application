<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
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
        }5

        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h1 class="edit-title">Edit Post</h1>
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" placeholder="Title" value="{{$post->title}}">
            <textarea name="body" cols="30" rows="10" placeholder="Content">{{$post->body}}</textarea>
            <button type="submit" class="edit-button">Save changes</button>
        </form>
    </div>
</body>
</html>
