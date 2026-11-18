<?php
if(@$_GET['submit']){
    $name = $_POST['firstname'];
    echo $name;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>jQuery Event-Driven Programming - Activity 2</title>

    </head>

    <body>
        <form action="Activity_2.php" method="post">
            <label for="firtname">Firstname: </label>
            <input type="text" id="firstname" name="firstname">
            <br>
            <input type="submit" value="Submit" name="submit">
        </form>
        
    <br/><input type="text" id="lastname" placeholder="Enter Lastname" required>
    <p>Data are higly protected and are used for this project. Just check the Yes, I agree button to complete this registration.</p>
    <input type="checkbox" id="agree"><label for="agree">Yes, I agree</label>
    <br>
    <button id="register" disabled>Register</button>
    <button id="clear">Clear</button>
    <!-- jQuery CDN -->
    <script src="jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            
            $("#agree").on("change", function () {
                
                if ($(this).prop("checked")) {
                    $("#register").prop("disabled", false);
                } else {
                    $("#register").prop("disabled", true);
                }
            });

            $('#clear').on("click", function(){
                $('#firstname').val("");
                $('#lastname').val("");
                $('#agree').prop("checked",false);
                $("#register").prop("disabled", true);
            });

            $('#register').on("click", function(){
                var fn = $('#firstname').val();
                var ln = $('#lastname').val();
                alert("Thank you "+fn+" "+ln+"!");
            });
        });
    </script>

    </body>
</html>