<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <input type="text" id="fname" style="width:50%" placeholder="Unsay ibutang drea!">
    <input type="text" id="lname" style="width:50%" placeholder="Unsay ibutang drea!">
    <br/><span id="output"></span>
    <br/><button id="saveBTN" disabled>Change</button>
    <br/><input type="checkbox" id="agree"><label for="agree">I Agree</label>
    <br/>
    <select name="gender[]" id="gender">
        <option>Male</option>
        <option>Female</option>
        <option>LGBTQ+</option>
    </select>
</body>
<script src="jquery.min.js"></script>
<script>
    $("#saveBTN").on("click", function(){
        // $('#cagadas').text("<h1>Present Na!!</h1>");
        // $('#marino').html("<h1>Absent Pa!!</h1>");
        var name = $('#ngan').val();
        $('#output').text("Inputted Text: "+name);
        console.log(name);
    })

    $("#agree").on("change", function () {
        if ($(this).prop("checked")) {
            $("#saveBTN").removeAttr("disabled");
            // $("#saveBTN").prop("disabled", false);
        } else {
            // $("#saveBTN").prop("disabled", true);
            $("#saveBTN").attr("disabled","disable");
        }
    });

    $("#saveBTN").on("click", function(){
        
    })

    $('#gender').on("change", function(e){
        // $('select[name="gender"]').val();
        alert($('select[name="gender"]').val());
    });
</script>
</html>