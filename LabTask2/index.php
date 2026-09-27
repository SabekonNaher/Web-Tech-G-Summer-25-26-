<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_management";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add_student'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $registration_no = $_POST['registration_no'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students (name, email, registration_no, department)
            VALUES ('$name', '$email', '$registration_no', '$department')";

    if ($conn->query($sql)) {
        $message = "Student added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}


if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql)) {
        $message = "Student deleted successfully!";
    }
}

if (isset($_POST['update_student'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "UPDATE students 
            SET name='$name',
                email='$email',
                department='$department'
            WHERE id=$id";

    if ($conn->query($sql)) {
        $message = "Student updated successfully!";
    }
}


$edit_student = null;

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $result = $conn->query("SELECT * FROM students WHERE id=$id");

    if ($result->num_rows > 0) {
        $edit_student = $result->fetch_assoc();
    }
}

$students = $conn->query("SELECT * FROM students ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Management System</title>
<style>
input { 
    padding: 5px; 
    border: 1px solid #b8b8b8; 
    box-sizing: border-box; 
} 

input:hover { 
    background-color: #6c63ff;
} 

button { 
    padding: 10px 20px; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    background-color: #0a6fae; 
    color: Black; 
    font-size: 15px; 
} 

button:hover { 
    background: #5146d8; 
} 

th { 
    background: #897be7; 
    color: Black; 
} 

.message { 
    background: #dff5e1; 
    color: #2e7d32; 
    padding: 12px; 
    margin-bottom: 20px; 
    border-radius: 5px; 
} 

</style>
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <?php if (isset($message)) { ?>

        <p>
            <?php echo $message; ?>
        </p>

    <?php } ?>

    <div class="form-container">

        <?php if ($edit_student) { ?>

            <h2>Update Student</h2>

            <form method="POST">

                <input type="hidden"
                       name="id"
                       value="<?php echo $edit_student['id']; ?>">

                <label>Student Name</label>
                <br>

                <input type="text"
                       name="name"
                       value="<?php echo $edit_student['name']; ?>"
                       required>

                <br><br>


                <label>Email</label>
                <br>

                <input type="email"
                       name="email"
                       value="<?php echo $edit_student['email']; ?>"
                       required>

                <br><br>


                <label>Registration Number</label>
                <br>

                <input type="text"
                       value="<?php echo $edit_student['registration_no']; ?>"
                       disabled>

                <br><br>


                <label>Department</label>
                <br>

                <input type="text"
                       name="department"
                       value="<?php echo $edit_student['department']; ?>"
                       required>

                <br><br>


                <button type="submit" name="update_student">
                    Update Student
                </button>

            </form>

        <?php } else { ?>


            <h2>Add New Student</h2>

            <form method="POST">

                <label>Student Name</label>
                <br>

                <input type="text"
                       name="name"
                       required>

                <br><br>


                <label>Email</label>
                <br>

                <input type="email"
                       name="email"
                       required>

                <br><br>


                <label>Registration Number</label>
                <br>

                <input type="text"
                       name="registration_no"
                       required>

                <br><br>


                <label>Department</label>
                <br>

                <input type="text"
                       name="department"
                       required>

                <br><br>


                <button type="submit" name="add_student">
                    Add Student
                </button>

            </form>

        <?php } ?>

    </div>

    <h2>Student Records</h2>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registration Number</th>
            <th>Department</th>
            <th>Action</th>

        </tr>


        <?php while ($row = $students->fetch_assoc()) { ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo $row['name']; ?>
            </td>

            <td>
                <?php echo $row['email']; ?>
            </td>

            <td>
                <?php echo $row['registration_no']; ?>
            </td>

            <td>
                <?php echo $row['department']; ?>
            </td>

            <td>

                <a href="index.php?edit=<?php echo $row['id']; ?>">
                    Edit
                </a>

                &nbsp;&nbsp;&nbsp;

                <a href="index.php?delete=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this student?')">
                    Delete
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>

<?php

$conn->close();

?>