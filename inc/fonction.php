<?php 
function getManager($conn, $dept_no) {
    $sql = "SELECT e.first_name, e.last_name
            FROM dept_manager m
            JOIN employees e ON m.emp_no = e.emp_no
            WHERE m.dept_no = '$dept_no'
            ORDER BY to_date DESC
            LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        return $row['first_name'] . " " . $row['last_name'];
    }
    return "Aucun";
}

?>