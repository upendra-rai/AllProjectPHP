<!DOCTYPE html>
<html>
<body>

<h2>Student Details</h2>

<form action="<?php echo base_url(); ?>/all/getstudent">
  <label for="fname">Roll Number:</label><br>
  <input type="text" name="roll_no" ><br>
  <label for="lname">Student Name:</label><br>
  <input type="text" name="student_name" ><br>
  <label for="fname">Student Class:</label><br>
  <input type="text" name="student_class" ><br>
  <label for="fname">Student Address:</label><br>
  <input type="text" name="student_address" ><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>
