<?php
$conn = new PDO(
    "mysql:host=localhost;dbname=ajax_crud;charset=utf8mb4",
    "root",
    ""
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// AJAX REQUEST HANDLER
if (isset($_POST['action'])) {

    $action = $_POST['action'];

    if ($action == "insert") {

        $stmt = $conn->prepare("
            INSERT INTO students
            (student_no, fullname, email, course)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $_POST['student_no'],
            $_POST['fullname'],
            $_POST['email'],
            $_POST['course']
        ]);

        echo "success";
        exit;
    }

    // READ ALL
    if ($action == "fetch") {

        $stmt = $conn->query("
            SELECT * FROM students ORDER BY id DESC
        ")

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
        exit;
    }

    // READ SINGLE
    if ($action == "get") {

        $stmt = $conn->prepare("
            SELECT * FROM students WHERE id = ?
        ");

        $stmt->execute([$_POST['id']]);

        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        exit;
    }

    // UPDATE
    if ($action == "update") {

        $stmt = $conn->prepare("
            UPDATE students SET
                student_no = ?,
                fullname = ?,
                email = ?,
                course = ?
            WHERE id = ?
        ");

        $stmt->execute([
            $_POST['student_no'],
            $_POST['fullname'],
            $_POST['email'],
            $_POST['course'],
            $_POST['id']
        ]);

        echo "success"; 
        exit;
    }

    // DELETE
    if ($action == "delete") {

        $stmt = $conn->prepare("
            DELETE FROM students WHERE id = ?
        ");

        $stmt->execute([$_POST['id']]);

        echo "success";
        exit;
    }
}
?>