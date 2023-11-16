<?php
include('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noteID = $_POST['note_id'];
    $newTitle = $_POST['note_title'];
    $newContent = $_POST['note_content'];

    // Update the note in the database
    $stmt = $conn->prepare("UPDATE `tbl_notes` SET note_title = :title, note = :content WHERE tbl_notes_id = :note_id");
    $stmt->bindParam(':title', $newTitle);
    $stmt->bindParam(':content', $newContent);
    $stmt->bindParam(':note_id', $noteID);

    if ($stmt->execute()) {
        // Redirect to the update.php page with a success message
        header("Location: http://localhost/classroom/note/");
        exit();
    } else {
        // Redirect to the update.php page with an error message
        header("Location: update_note.php?edit=$noteID&error=1");
        exit();
    }
} else {
    // Redirect to the update.php page if accessed directly without submitting the form
    header("Location: http://localhost/classroom/note/");
    exit();
}
?>
