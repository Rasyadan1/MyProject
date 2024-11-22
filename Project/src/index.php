<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Menu</title>
</head>
<body>
    <h1>Selamat Datang di Coffee Shop</h1>
    <p>Please select a menu category:</p>
    <form action="menu.php" method="post">
        <label for="menu">Choose a menu:</label>
        <select name="menu" id="menu">
            <option value="1">Coffee</option>
            <option value="2">Non Coffee</option>
            <option value="3">Dessert</option>
            <option value="4">Snack</option>
        </select>
        <button type="submit">Show Menu</button>
    </form>
</body>
</html>
