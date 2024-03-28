<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
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
        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
        }
        
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0056b3;
        }
        
        .hidden {
            display: none;
        }
        
        #success-message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div>
    <form id="user-registration-form" method="POST" action="{{ route('users.register') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="super_admin">Super Admin</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <button id="submit-button" type="submit">Submit</button>
        <div id="success-message" class="hidden">Registration Successful!</div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('user-registration-form');
        const submitButton = document.getElementById('submit-button');
        const successMessage = document.getElementById('success-message');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); 
            submitButton.disabled = true; 

           
            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
               
                successMessage.classList.remove('hidden');
              
                form.reset();
            })
            .catch(error => {
                console.error('There was a problem with your fetch operation:', error);
                
                submitButton.disabled = false;
            });
        });
    });
</script>

</body>
</html>