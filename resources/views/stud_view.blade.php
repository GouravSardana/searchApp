<!DOCTPE html>
<html>
<head>
<title>View Student Records</title>
</head>
<body>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table border = "1" id="myUL">
<tr>
<td>First Name</td>
<td>Last Name</td>
<td>Email</td> 
<td>Parent Name</td> 

</tr>
@foreach ($UserDetail as $user)
<tr>
<td>{{ $user->first_name }}</td>
<td>{{ $user->last_name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->parent_name }}</td>

</tr>
@endforeach
</table>

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("tr");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("td")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>
