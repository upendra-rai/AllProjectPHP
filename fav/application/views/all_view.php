<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>

    <title>Operations</title>
</head>
<body>

    

    <h2>Student Table</h2>
    <button type="button"  onclick="alert('Hello world!')">Add  Student</button>
    <table  style="width:50%">
    <tr>
        <th >Roll Number</th>
        <th>Student Name</th>
        <th>Student Class</th>
        <th>Student Address</th>
    </tr>
    <?php foreach($get as $row){ ?>
    <tr>
        <td align="center";>
           <?php echo $row->roll_no;?>
        </td>
        <td align="center";>
           <?php echo $row->student_name;?>
        </td>
        <td align="center";>
           <?php echo $row->student_class;?>
        </td>
        <td align="center";>
           <?php echo $row->student_address;?>
        </td>
    </tr>
    <?php }?>
    </table>
</body>
</html>