<html>
<body>
    <form action="submit" method="POST">
    @csrf
    <input type="text" name="first_name" placeholder="first name">
    <br><br>
    <input type="text" name="last_name" placeholder="last name">
    <br><br>
    <input type="text" name="email" placeholder="email">
    <br><br>
    <input type="text" name="phone" placeholder="phone">
    <br><br>
    <input type="text" name="parent_name" placeholder="parent_name">
    <br><br>
    <input type="text" name="parent_email" placeholder="parent_email">
    <br><br>
    <input type="text" name="parent_phone" placeholder="parent_phone">
    <br><br>

    <input type="text" name="city" placeholder="city">
    <br><br>
    <input type="text" name="state" placeholder="state">
    <br><br>
    <input type="text" name="country" placeholder="country">
    <br><br>

    <input type="text" name="school_name" placeholder="school_name">
    <br><br>
    <input type="text" name="school_equired" placeholder="school_equired">
    <br><br>
    <button type="submit">Submit Data</button>
    </form>
</body>
</html>