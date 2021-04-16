<html>
<body>
    <form action="submit" method="POST">
    @csrf
    <input type="text" name="first_name" placeholder="first name" required>
    <br><br>
    <input type="text" name="last_name" placeholder="last name" required>
    <br><br>
    <input type="text" name="email" placeholder="email" required>
    <br><br>
    <input type="text" name="phone" placeholder="phone" required>
    <br><br>
    <input type="text" name="parent_name" placeholder="parent_name" required>
    <br><br>
    <input type="text" name="parent_email" placeholder="parent_email" required>
    <br><br>
    <input type="text" name="parent_phone" placeholder="parent_phone" required>
    <br><br>

    <input type="text" name="city" placeholder="city [optional]" >
    <br><br>
    <input type="text" name="state" placeholder="state [optional]" >
    <br><br>
    <input type="text" name="country" placeholder="country [optional]" >
    <br><br>

    <input type="text" name="school_name" placeholder="school_name" required>
    <br><br>
    <input type="text" name="school_equired" placeholder="school_equired" required>
    <br><br>
    <button type="submit">Submit Data</button>
    </form>
</body>
</html>