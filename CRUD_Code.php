<?php
try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=ajax_crud;charset=utf8mb4",
        "root",
        "toor"
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Database connection successful!";

} catch (PDOException $e) {
    // echo "Database connection failed: " . $e->getMessage();
}

// exit;
// AJAX REQUEST HANDLER
if (isset($_POST['action'])) {

    $action = $_POST['action'];
    if ($action == "insert_account") {
        $stmt = $conn->prepare("
            INSERT INTO accounts
            (fname, lname, mname, email, password, usertype)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $_POST['fname'],
            $_POST['lname'],
            $_POST['mname'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            2
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