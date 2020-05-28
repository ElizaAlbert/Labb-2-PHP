<?php
$student_id = 10;

include "includes/config.inc.php";


$sql = "select * from students where student_id='$student_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();

  $name = $row["name"];
  $age = $row["age"];
  $gender = $row["gender"];
  $uniform = $row["uniform"];

  echo

    "<html>
<body>

<form action='phpUpdateFormScript.php' method='post'>
Student ID: $student_id<br>
<input type='hidden' name='student_id' value='$student_id'>
Uniform: $uniform<br>
Name: <input type='text' name='name' value='$name'><br>
Age: <input type='text' name='age' value='$age'><br>
Gender: <select name='gender'>
	<option value='$gender' selected>$gender </option>
	<option value='boy'>Boy</option>
	<option value='girl'>Girl</option>
	</select><br>
<input type ='submit'>
</form>

</body>
</html>";
} else {
  echo "Not Found";
}
$conn->close();
