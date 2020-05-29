<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap js library -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            //group add limit
            var maxGroup = 10;

            //add more fields group
            $(".addMore").click(function() {
                if ($('body').find('.fieldGroup').length < maxGroup) {
                    var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }
            });

            //remove fields group
            $("body").on("click", ".remove", function() {
                $(this).parents(".fieldGroup").remove();
            });
        });
    </script>
</head>

<body>
    <form method="post" action="add_multi_feild.php">

        <div class="form-group fieldGroup">
            <div class="input-group">
                <input type="text" name="name[]" class="form-control" placeholder="Enter name" />
                <input type="text" name="email[]" class="form-control" placeholder="Enter email" />
                <div class="input-group-addon">
                    <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                </div>
            </div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT" />

    </form>

    <!-- copy of input fields group -->
    <div class="form-group fieldGroupCopy" style="display: none;">
        <div class="input-group">
            <input type="text" name="name[]" class="form-control" placeholder="Enter name" />
            <input type="text" name="email[]" class="form-control" placeholder="Enter email" />
            <div class="input-group-addon">
                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $nameArr = $_POST['name'];
    $emailArr = $_POST['email'];
    if (!empty($nameArr)) {
        for ($i = 0; $i < count($nameArr); $i++) {
            if (!empty($nameArr[$i])) {
                $name = $nameArr[$i];
                $email = $emailArr[$i];

                //database insert query goes here
            }
        }
    }
}
?>