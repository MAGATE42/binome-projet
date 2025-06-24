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

function getEmployesParDepartement($conn, $dept_no, $limit, $offset, $search = "") {
    $dept = mysqli_real_escape_string($conn, $dept_no);
    $search = mysqli_real_escape_string($conn, $search);
    $sql = "SELECT e.emp_no, e.first_name, e.last_name, e.gender, e.hire_date, e.birth_date
            FROM dept_emp d
            JOIN employees e ON d.emp_no = e.emp_no
            WHERE d.dept_no = '$dept'
              AND (e.first_name LIKE '%$search%' OR e.last_name LIKE '%$search%')
            ORDER BY e.last_name
            LIMIT $offset, $limit";
    return mysqli_query($conn, $sql);
}

function countEmployes($conn, $dept_no, $search = "") {
    $dept = mysqli_real_escape_string($conn, $dept_no);
    $search = mysqli_real_escape_string($conn, $search);
    $sql = "SELECT COUNT(*) AS total
            FROM dept_emp d
            JOIN employees e ON d.emp_no = e.emp_no
            WHERE d.dept_no = '$dept'
              AND (e.first_name LIKE '%$search%' OR e.last_name LIKE '%$search%')";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res)['total'];
}

function getSalaires($conn, $emp_no) {
    return mysqli_query($conn, "SELECT * FROM salaries WHERE emp_no = '$emp_no' ORDER BY from_date DESC");
}

function getTitres($conn, $emp_no) {
    return mysqli_query($conn, "SELECT * FROM titles WHERE emp_no = '$emp_no' ORDER BY from_date DESC");
}
?>