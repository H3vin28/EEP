<!DOCTYPE html>
<html>
<head>
    <title>AJAX CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <h3>Student Management System</h3>
    <button class="btn btn-primary mb-3"
        onclick="openModal()">
        Add Student
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student No.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="studentTable"></tbody>

    </table>

</div>

<!-- MODAL -->
<div class="modal fade" id="studentModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5>Student Information</h5>
                <button class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="studentForm">

                    <input type="hidden" id="id" name="id">

                    <input type="text" name="student_no"
                        class="form-control mb-2"
                        placeholder="Student Number" required>

                    <input type="text" name="fullname"
                        class="form-control mb-2"
                        placeholder="Full Name" required>

                    <input type="email" name="email"
                        class="form-control mb-2"
                        placeholder="Email" required>

                    <input type="text" name="course"
                        class="form-control mb-2"
                        placeholder="Course" required>

                    <button type="submit"
                        class="btn btn-success">
                        Save
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script src="jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

// LOAD STUDENTS
function loadStudents() {

    $.ajax({
        url: "CRUD_Code.php",
        type: "POST",
        data: {action: "fetch"},
        dataType: "json",

        success: function(data) {

            let rows = "";

            $.each(data, function(i, student) {

                rows += `
                    <tr>
                        <td>${student.id}</td>
                        <td>${$("<div>").text(student.student_no).html()}</td>
                        <td>${$("<div>").text(student.fullname).html()}</td>
                        <td>${$("<div>").text(student.email).html()}</td>
                        <td>${$("<div>").text(student.course).html()}</td>

                        <td>
                            <button class="btn btn-warning btn-sm"
                                onclick="editStudent(${student.id})">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm"
                                onclick="deleteStudent(${student.id})">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;

            });

            $("#studentTable").html(rows);

        }
    });

}


function openModal() {
    $("#studentForm")[0].reset();
    $("#id").val("");
    $("#studentModal").modal("show");
}


// SAVE STUDENT
$("#studentForm").submit(function(e) {

    e.preventDefault();

    let action = $("#id").val() ? "update" : "insert";

    let formData = $(this).serialize() + "&action=" + action;

    $.ajax({
        url: "CRUD_Code.php",
        type: "POST",
        data: formData,

        success: function(response) {

            if(response.trim() == "success") {

                $("#studentModal").modal("hide");

                $("#studentForm")[0].reset();

                loadStudents();

            } else {
                alert("Unable to save student.");
            }

        }
    });

});

function editStudent(id) {

    $.ajax({
        url: "CRUD_Code.php",
        type: "POST",
        data: {
            action: "get",
            id: id
        },
        dataType: "json",
        success: function(data) {
            $("#id").val(data.id);
            $("[name=student_no]").val(data.student_no);
            $("[name=fullname]").val(data.fullname);
            $("[name=email]").val(data.email);
            $("[name=course]").val(data.course);
            $("#studentModal").modal("show");
        }
    });

}

function deleteStudent(id) {
    if(confirm("Are you sure you want to delete this student?")) {
        $.ajax({
            url: "CRUD_Code.php",
            type: "POST",
            data: {
                action: "delete",
                id: id
            },

            success: function(response) {

                if(response.trim() == "success") {
                    loadStudents();
                } else {
                    alert("Unable to delete student.");
                }

            }
        });

    }

}


$(document).ready(function() {
    loadStudents();
});

</script>

</body>
</html>