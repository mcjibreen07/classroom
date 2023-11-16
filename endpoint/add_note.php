<?php
include('../config/config.php');

$noteSaved = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noteTitle = mysqli_real_escape_string($con, $_POST['note_title']);
    $noteContent = mysqli_real_escape_string($con, $_POST['note_content']);
    $dateTime = date("Y-m-d H:i:s");
    $classCode = mysqli_real_escape_string($con, $_POST['classCode']);

    // Insert data into the database
    $query = "INSERT INTO tbl_notes (note_title,note, date_time) VALUES ('$noteTitle', '$noteContent','$dateTime' )";

    // Perform the query and check for success
    $result = mysqli_query($con, $query);
    if ($result) {
        // Redirect back to the original page with a success parameter
        $noteSaved = true;
        header("Location: /classroom/classRoom.php?classCode=$classCode");
        exit();
    } else {
        // Redirect back to the original page with an error parameter
        $noteSaved = false;
        header("Location: /classroom/classRoom.php?classCode=$classCode&submission=error");
        exit();
    }
}
?>


<?php if ($noteSaved): ?>
    <script>
        // Use JavaScript to show an alert
        alert("Note saved successfully!");
    </script>
<?php endif; ?>