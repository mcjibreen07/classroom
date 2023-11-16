<?php
include('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
    $noteID = $_GET['delete'];

    // Delete the note from the database
    $stmt = $conn->prepare("DELETE FROM `tbl_notes` WHERE tbl_notes_id = :note_id");
    $stmt->bindParam(':note_id', $noteID);

    if ($stmt->execute()) {
        // Redirect back to the update.php page with a success message
        header("Location: http://localhost/classroom/classRoom.php?/");
        exit();
    } else {
        // Redirect back to the update.php page with an error message
        header("Location: http://localhost/classroom/classRoom.php?");
        exit();
    }
} else {
    // Redirect to the update.php page if accessed directly or without a valid note ID
    header("Location: http://localhost/classroom/classRoom.php?");
    exit();
}
?>
