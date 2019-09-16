<!Doctype Html>
<html>
    <head>
        <title>Create Person</title>
    </head>
    <body>
        <h1>Create Person Below</h1>
        <form method="Post" action="{{ route('store')}}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Name"></br>
            <input type="text" name="address" placeholder="Address"></br>
            <input type="email" name="email" placeholder="Email"></br>
            <input type="file" name="image" placeholder="Image"></br>
            <input type="file" name="file" placeholder="File"></br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>    




