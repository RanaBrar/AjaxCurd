<?php
require_once("header.php");
// require_once("action.php");
require_once("ajax.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2 id="head" align="center">Add Data</h2>
            <!-- Message  -->


            <form id="insert" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="n">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="pass" class="form-control" id="p">
                </div>
                <!-- <input id="add" type="submit" name="submit" class="btn btn-primary" value="Submit"> -->
                <button type="button" id="add" class="btn btn-primary">add</button>
                <button type="button" id="edit1" class="btn btn-primary" style="display: none;">UPDATE</button>
            </form>


            <br>
            <div id="msg">
            </div>
        </div>
        <div class="col-md-7">
            <table class="table table-striped table-bordered text-center text-capitalize table-hover">
                <thead class="bg-dark text-light">
                    <th>Name</th>
                    <th>Password</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>

                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>