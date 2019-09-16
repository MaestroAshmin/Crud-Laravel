<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        table{
        border: 1px solid black;
        border-collapse: collapse;
        width:100%;  
        }
        td,tr,th{
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
            text-align:center;  
        }
        tr:hover{
            background: grey;
        }
    </style>
</head>
<body>
Click this to create new Person
<button type="submit" onclick="window.location.href='{{ route('create') }}' ">ADD</button>
    <table>
        <tr> 
        <th>S.N</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Image</th>
        <th>File</th>
        <th>Action</th>
        </tr>
        @foreach($peoples as $people)
        <tr>
            <td>{{$people['Id']}}</td>
            <td>{{$people['Name']}}</td>
            <td>{{$people['Address']}}</td>
            <td>{{$people['Email']}}</td>
            <td>{{$people['image']}}</td>
            <td>{{$people['File']}}</td>
            <td><a href="{{ route('edit',$people['Id'])}}">Edit</a></td>
            <td><a href="{{ route('delete',$people['Id'])}}">Delete</a></td>

        </tr>
        @endforeach
    </table>
</body>
</html>    