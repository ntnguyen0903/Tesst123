<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/demoanh7" method="post" enctype="multipart/form-data">
        @csrf 
        <input type="text" name="ten"> <br>
        <input type="file" name="f" accept="image/*"> <br>
        <input type="submit">
    </form>
</body>
</html>