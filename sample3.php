<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .text_big{
            font-size: 50pt;
            font-weight: bolder;
            color: blue;
        }
        .text_big : hover{
            font-size: 25pt;
            font-weight: bolder;
            color: yellow;
        }

        .is-invalid{
            border-color: red;
        }

        .is-valid{
            border-color: green;
        }
    </style>
</head>
<body>
    <select name="" id="">
        <option>Male</option>
    </select>
    <label for="m">Male</label>
    <input type="checkbox" id="m" class="item" value="MALE">
    <br>
    <label for="fm">Female</label>
    <input type="radio" id="fm" class="item" value="FemalE">
    <br>

    <form action="" id="reg_form">
        <label for="s">Input Text: </label>
        <input type="email" id="sample_text">
    </form>
    <br>
    <br>
    <form action="" id="form">
        <input type="text" id="fname" placeholder="Enter Firstname">
        <input type="text" id="lname" placeholder="Enter Lastname">
    </form>
    <button id="submitBTN">Submit</button>
    <button class="btn btn-primary">Button</button>
</body>
<script src="jquery.min.js"></script>
<script>
    $("label").on("mouseenter", function () {
        $(this).addClass("text_big");
    }).on("mouseleave", function () {
        $(this).removeClass("text_big");
    });

    $(".item").on("dblclick", function () {
        console.log($(this).val());
    });

    $("#sample_text").on("input", function(e){
        var l = $(this).val().length;

        console.log(l);
    })

    $('#submitBTN').on("click", function(){
        $('#form').submit();
    });


















    $("#form").on("submit", function (e) {

        let valid = true;

        $(this).find("input, select").each(function () {
            if ($(this).val() === "" || $(this).val() === null) {
                valid = false;
                $(this).addClass("is-invalid");
            } else {
                $(this).addClass("is-valid");
            }
        });

        if (!valid) {
            e.preventDefault();
            alert("Please complete all required fields.");
        }

    });
</script>
</html>