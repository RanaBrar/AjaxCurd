<?php
require_once("conn.php");
class DataOperation extends Database
{
    function getData($table, $page)
    {
        $record = array();
        $limit = 2;

        $offset = ($page - 1) * $limit;
        // page limit code end
        $tabled = "";
        $sql = "SELECT * FROM $table LIMIT $offset,$limit";

        $result = $this->conn->prepare($sql);
        $result->execute();
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $tabled .=  "<tr>";
                $tabled .=  "<td id=\"name" . $row["uid"] . "\">" . $row['name'] . "</td>";
                $tabled .=  "<td id=\"pass" . $row["uid"] . "\">" . $row['pass'] . "</td>";
                $tabled .=  "<td><a onclick=\"edit(" . $row["uid"] . ");\"  class=\"btn btn-success\">Edit</a></td>";

                $tabled .=  "<td><a onclick='confirm" . $row["uid"] . "()' class=\"btn btn-danger\">Delete</a></td>";
                $tabled .=  "</tr>";
                $tabled .=  "
                <script>
                function confirm" . $row["uid"] . "() {
                    debugger;
                swal({
                    title: \"Are you sure?\",
                    text: \"Once deleted, you will not be able to recover this imaginary file!\",
                    icon: \"warning\",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        deleteData(" . $row['uid'] . ");
                    } else {
                      swal(\"Your imaginary file is safe!\");
                    }
                  });
                }
                </script>
                ";
            }

            echo $tabled;
            $output = "";
            $sql1 = "select * from $table";
            $result1 = $this->conn->prepare($sql1);
            $result1->execute();


            $total_record = $result1->rowCount();
            $total_pages = ceil($total_record / $limit);

            $output .= '<div id="pagination">';

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $class_name = "active";
                } else {
                    $class_name = "";
                }
                $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
            }
            $output .= '</div>';
            echo "  <tr>
            <td>
            $output
            </td>
            </tr>";
        } else {
            echo "Record not found";
        }
    }
    function insertData($table, $fields)
    {

        $status = array();
        $sql = "insert into $table (" . implode(",", array_keys($fields)) . ") values (?,?)";
        $result = $this->conn->prepare($sql);
        $result->execute(array_values($fields));
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
    function selectData($table, $where)
    {
        $sql = "";
        $record = array();
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "= ? and ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "select * from $table where $condition";
        $result = $this->conn->prepare($sql);
        $result->execute(array_values($where));
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $record[] = $row;
            }
            return $record;
        }
    }
    function updateData($table, $where, $fields)
    {
        $sql = "";
        $condition = "";
        $val = "";
        foreach ($where as $key => $value) {
            $condition .= "$key = ?";
        }
        foreach ($fields as $key => $value) {
            $val .= "$key = ? , ";
        }
        $val = substr($val, 0, -2);
        $sql .= "update $table set $val where $condition";
        $result = $this->conn->prepare($sql);
        $temp = array_merge(array_values($fields), array_values($where));
        if ($result->execute($temp)) {
            echo 1;
        }
    }
    function deleteData($table, $where)
    {
        $sql = "";
        $condition = "";
        foreach ($where as $key => $val) {
            $condition .= "$key = ?";
        }
        $sql .= "delete from $table where $condition";
        $result = $this->conn->prepare($sql);
        if ($result->execute(array_values($where))) {
            echo 1;
        }
    }
}
$obj = new DataOperation();
try {
    // ========insert =========================================================
    if (isset($_GET["submit"])) {


        if (!empty($_POST["name"]) & !empty($_POST["pass"])) {
            $field = array(
                "name" => $_POST["name"],
                "pass" => $_POST["pass"]
            );


            $obj->insertData("reg", $_POST);
        } else {
            echo '<div class="alert alert-danger">
            Fill all Feilds!!!
            </div>';
        }
    }
    // ====update=============================================
    if (isset($_GET["update"])) {
        if (!empty($_POST["name"]) & !empty($_POST["pass"])) {
            $where = array(
                "uid" => $_GET["uid"]
            );
            $field = array(
                "name" => $_POST["name"],
                "pass" => $_POST["pass"]
            );
            $obj->updateData("reg", $where, $field);
        } else {
            echo '<div class="alert alert-danger">
        Fill all Feilds!!!
        </div>';
        }
    }
    // ==============================delete==============================
    if (isset($_GET["delete"])) {

        $where = array(
            "uid" => $_GET["uid"]
        );
        $obj->deleteData("reg", $where);
    }
    // ===========================================fetch=====================
    if (isset($_GET['view'])) {
        $obj->getData("reg", $_GET["page_id"]);
    }
} catch (PDOException $e) {
    echo 'error!!!' . $e->getMessage();
}
