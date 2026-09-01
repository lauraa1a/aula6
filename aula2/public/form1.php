
<?php
    require "layout.php";
   
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
   
        echo "Número 1: " . $numero1 . "<br>";
        echo "Número 2: " . $numero2;
    }

?>

<form method="POST">
<label for="num1">Número 1</label>
<input type="number" name="numero1" id="numero1" required >
<br><br>
<label for="num2">Número 2</label>
<input type="number" name="numero2" id="numero2" required>
<br><br>
<input type="submit" class="btn btn-primary" value="Post Mesmo Form">
</form>

<hr>

<form method="POST" action="recebe.php">
<label for="num1">Número 1</label>
<input type="number" name="numero1" id="numero1" required >
<br><br>
<label for="num2">Número 2</label>
<input type="number" name="numero2" id="numero2" required>
<br><br>
<input type="submit"  class="btn btn-success" value="Post outra página">
</form>

<hr>

<form method="GET" action="recebe.php">
<label for="num1">Número 1</label>
<input type="number" name="numero1" id="numero1" required >
<br><br>
<label for="num2">Número 2</label>
<input type="number" name="numero2" id="numero2" required>
<br><br>
<input type="submit" class="btn btn-danger" value="Post outra página">
</form>