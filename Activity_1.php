<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>jQuery Event-Driven Programming</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                padding: 30px;
            }

            .container {
                max-width: 600px;
                margin: auto;
                background-color: white;
                padding: 25px;
                border-radius: 10px;
            }

            input {
                width: 70%;
                padding: 10px;
                font-size: 16px;
            }

            button {
                padding: 10px 15px;
                font-size: 16px;
                cursor: pointer;
            }

            #message {
                margin-top: 20px;
                padding: 10px;
                background-color: #e9ecef;
            }

            ul {
                margin-top: 20px;
            }

            li {
                margin-bottom: 8px;
            }
            .deleteButton {
                background-color: red;
                color: white;
                border: none;
                padding: 2px 8px;
                cursor: pointer;
                border-radius: 4px;
            }
        </style>

    </head>

    <body>

    <div class="container">

        <h2>Simple Interactive Page</h2>
        <input type="text" id="itemInput" placeholder="Enter an item">
        <button id="addButton">Add Item</button>

        <div id="message">
            No item submitted yet.
        </div>

        <h3>Submitted Items</h3>

        <ul id="itemList"></ul>

    </div>

    <!-- jQuery CDN -->
    <script src="jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            $("#addButton").click(function () {
                var item = $("#itemInput").val().trim();
                if (item == "") {
                    $("#message").text("Please enter an item.");
                    $("#itemInput").css("border-color","red");
                    return;
                }

                var newItem = $("<li>");
                var itemText = $("<span>").text(item);
                var deleteButton = $("<button>")
                    .addClass("deleteButton")
                    .text("Delete")
                    .css("float", "right");

                newItem.append(itemText);
                newItem.append(deleteButton);
                $("#itemList").append(newItem);

                $("#message").text("Successfully added: " + item);
                $("#itemInput").val("");
                $("#itemInput").focus();

            });

            $("#itemInput").keypress(function (event) {
                if (event.which == 13) {
                    $("#addButton").click();
                }
            });

            $("#itemList").on("click", ".deleteButton", function () {
                var item = $(this)
                    .closest("li")
                    .find("span")
                    .text();

                $(this).closest("li").remove();

                $("#message").text(
                    "Successfully deleted: " + item
                );
            });
        });
    </script>

    </body>
</html>