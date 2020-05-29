<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div><input required type="text"  placeholder="name" name="field_name[]" value=""/><input required type="text"  placeholder="email" name="field_email[]" value=""/><a href="javascript:void(0);" class="remove_button"><button>-</button></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html

                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
</head>

<body>
    <div>
        <form class="form" method="post" action="add_feild.php">

            <div class="field_wrapper">
                <div>
                    <input required type="text" name="field_name[]" placeholder="name" value="" />
                    <input required type="text" name="field_email[]" placeholder="email" value="" />
                    <a href="javascript:void(0);" class="add_button" title="Add field">+</a>
                </div>
            </div>
            <input type="submit" value="submit" name="submit">

        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
    $name = $_POST['field_name'];
    $email = $_POST['field_email'];
    for ($i = 0; $i < count($name); $i++) {

        echo $name[$i];
        echo "<br>";
        echo $email[$i];
        echo "<br>";

        //database insert query goes here
    }
}
?>