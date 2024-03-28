<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        
        .user-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        
        .user-list h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .user-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .user-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        
        .user-list li:last-child {
            border-bottom: none;
        }
        
        .user-list .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-list .user-info .name {
            font-weight: bold;
            margin-right: 10px;
        }
        
        .user-list .user-info .role {
            color: #555;
        }

        /* Added styles for the button */
        .return-button {
            margin-top: 20px;
            text-align: center;
        }

        .return-button button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .return-button button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="bg-white shadow-md rounded px-4 py-4 mb-4 user-list">
    <h2 class="text-xl font-semibold mb-4">User List</h2>
    <ul>
        @foreach($users as $user)
        <li>
            <div class="user-info">
                <span class="name">{{ $user->name }}</span>
                <span class="role">{{ $user->role }}</span>
            </div>
        </li>
        @endforeach
    </ul>
    <!-- Added button to return to main page -->
    <div class="return-button">
        <button onclick="window.location.href = '/';">Return to Main Page</button>
    </div>
</div>

</body>
</html>