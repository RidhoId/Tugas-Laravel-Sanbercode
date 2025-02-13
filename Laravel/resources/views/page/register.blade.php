<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up form</h2>

    <form action="/home" method="post">
    @csrf 
    <label for="First Name">First Name:</label><br>
    <input type="text" name="firstname" id="First Name" required><br><br>

    <label for="Last Name">Last Name:</label><br>
    <input type="text" name="Last Name" id="Last Name" ><br><br>

    <label for="Gender">Gender:</label><br><br>
    <input type="radio" name="Gender" value="Male">Male<br>
    <input type="radio" name="Gender" value="Female">Female<br>
    <input type="radio" name="Gender" value="Other">Other<br><br>
    
    <label for="Nationality">Nationality:</label> <br><br>
    <select name="Indonesian">
        <option value="Indonesian">Indonesian</option>
        <option value="USA">USA</option>
        <option value="Other">Other</option>
    </select><br><br>

    <label>Language Spoken:</label><br><br>
    <input type="checkbox" name="Language Spoken" value="Bahasa Indonesia">Bahasa Indonesia<br>
    <input type="checkbox" name="Language Spoken" value="English">English<br>
    <input type="checkbox" name="Language Spoken" value="Other">Other <br><br>

    <label>Bio:</label><br>
    <textarea name="Bio" column="20" rows="10"></textarea><br>

    <button type="submit">Sign up</button>
    </form>
</body>
</html>