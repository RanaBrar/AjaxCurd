<script>
    viewData();

    function viewData(page) {
        var page = page;
        if (page == null) {
            page = 1;
        }

        $.ajax({
            type: "GET",
            url: "action.php?view=1&page_id=" + page,
            success: function(data) {
                $('tbody').html(data);
            }
        });
    }

    //Pagination Code
    $(document).on("click", "#pagination a", function(e) {
        e.preventDefault();
        var page_id = $(this).attr("id");
        // alert(page_id);
        viewData(page_id);
    })



    $(document).on('click', '#add', function() {

        // $(document).ready(function() {
        //     $("#insert").submit(function(e) {
        //         e.preventDefault();
        $.ajax({
            url: "action.php?submit=insert",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(response) {

                if (response == 1) {
                    swal("Inserted", "Click Ok", "success");
                } else if (response == 0) {
                    swal("Not Inserted!", "Click Ok", "error");
                } else {
                    $("#msg").html(response);
                }
                $("#insert")[0].reset();
                viewData();
            }

        });
        // });
    });


    var uid;

    function edit(str) {
        uid = str;
        var name = document.getElementById('name' + uid).innerText;
        var pass = document.getElementById('pass' + uid).innerText;
        document.getElementById("head").innerHTML = "Edit Data";
        // alert(name);
        $('#n').val(name);
        $('#p').val(pass);
        $('#add').hide();
        $('#edit1').show();
    }

    $(document).on('click', '#edit1', function() {

        $.ajax({
            url: "action.php?update=1&uid=" + uid,
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(response) {

                if (response == 1) {
                    swal("Updated", "Click Ok", "success");
                } else {
                    $("#msg").html(response);
                    // debugger;
                }
                document.getElementById("head").innerHTML = "Add Data";
                $('#add').show();
                $('#edit1').hide();
                $("#insert")[0].reset();
                viewData();
            }

        });
    });



    function deleteData(str) {
        debugger;
        var uid = str;
        $.ajax({
            type: "GET",
            url: "action.php?delete=del",
            data: "uid=" + uid,
            success: function(data) {
                if (data == 1) {
                    swal("Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    $("#msg").text(data);
                }
                $('#add').show();
                $('#edit1').hide();
                document.getElementById("head").innerHTML = "Add Data";
                $("#insert")[0].reset();
                viewData();
            }
        });
    }
</script>