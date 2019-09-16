<!Doctype Html>
<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        <h1>Edit</h1>
        <form method="Post" action="{{route('update',$peoples->Id)}}" enctype="multipart/form-data">
            @csrf
            <input type = "hidden" name = "id" value = "{{$peoples->Id}}">
            <input type="text" name="name" value="{{$peoples->Name}}"></br>
            <input type="text" name="address" value="{{$peoples->Email}}"></br>
            <input type="email" name="email" placeholder="Email"></br>
            <input type="file" name="image" placeholder="Image"></br>
            <input type="file" name="file" placeholder="File"></br>
            <input type="submit" value="Edit">
        </form>
    </body>
</html>    




