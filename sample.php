<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>jQuery Event-Driven Programming</title>
    </head>

    <body>
        <!-- <form action="" method="post">
            <input type="text">
            <input type="submit" value="Pas">
        </form> -->
        <!-- <button id="saveBtn">Saved Button</button> -->
        <input type="text" id="name">
        <p></p>
            <button></button>
        <label for=""></label>
        <div></div>
        <span></span>
        <table border="1">
            <tr>
                <td>1</td>
                <td>A</td>
            </tr>
            <tr>
                <td>2</td>
            </tr>
        </table>
        <label for="">Gender</label>
        <select name="" id="">
            <option value="">Male</option>
            <option value="">Female</option>
            <option value="">LGBTQ+</option>
        </select>
        <input type="checkbox"> <label for="">Basuga</label>
        <!-- <input type="submit" class="submit" value="pass"> -->

        <button id="submit" > Submit</button>
        <p id="message"></p>

        <h3>List of 4s Beneficiaries:</h3>
        <div id="list"></div>
        <!-- jQuery CDN -->
        <script src="jquery.min.js"></script>

        <script>
            $(document).ready(function () {

                $('#submit').on("click", function(e){
                    var name = $("#name").val().trim();
                    
                    $("#message").text("Congratulation "+name+"! You are one of the beneficiary of SHOMOY101!!!");
                    $("#list").append("<span>"+name+"</span><br/>");
                    $("#name").val("").focus();
                    $("#submit").css("font","yellow");
                });

                $("#name").keypress(function (e) {
                    if (e.which == 13) {
                        $("#submit").click();
                    }
                });
            });
        </script>

    </body>
</html>