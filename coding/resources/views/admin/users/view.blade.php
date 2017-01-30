{{ Session::get('message') }}
<html>
<head>
<title> View Page </title>
<style>
h1 {
    text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
}
.button {
    background-color: #0FBB1C;
    border: none;
    color: white;
    padding: 2px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.buttonDelete {
    background-color: #F90316;
    border: none;
    color: white;
    padding: 2px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
a:link {
    color: red;
}

/* visited link */
a:visited {
    color: purple;
}

/* mouse over link */
a:hover {
    color: blue;
}

/* selected link */
a:active {
    color:green;
}
</style>
</head>
<body bgcolor = #EAD4CF>
<table border = 20px align = "center">
<h1 align = "center" style="font-size:300%;" color = "blue"> <u>Users Details </h1></u>
<p align = "center"><strong><a href ="index">Click here to create a record..! </a></strong></p>
<strong>  <a href = "/login"> Log Out</a></strong>
<tr>
<th>Name </th>
<th>Email</th>
<th>Password</th>
<th>Mobile</th>
<th>Gender</th>
<th>Interests</th>
<th>City</th>
<th>Location Priority</th>
<br/>
</tr>
@foreach($data as $value)
<tr>
<td> {{   $value->name      }}</td>
<td> {{   $value->email     }}</td>
<td> {{   $value->password  }}</td>
<td> {{   $value->mobile    }}</td>
<td> {{   $value->gender    }}</td>
<td> {{   $value->interests }}</td>
<td> {{   $value->city      }}</td>
<td> {{   $value->location_priority  }}</td>
<td>
<a href ="/edit/{{ $value->id }}"><button class = "button">Edit</button></a>&nbsp;<a href="/delete/{{ $value->id }}"><button class = "buttonDelete">Delete</button></a>
</td>
<br/>
</tr>
@endforeach
</body>
</html>
</table>

