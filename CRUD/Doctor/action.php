<?php
require_once("../../db_connection.php");

if (isset($_POST['query'])) {
    $search = $_POST['query'];
    $stmt = $conn->prepare("SELECT * FROM patients WHERE fname LIKE CONCAT('%', ?, '%') OR lname LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("ss", $search, $search);
} else {
    $stmt = $conn->prepare("SELECT * FROM patients");
}

$stmt->execute();
$result = $stmt->get_result();

$output = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Build the HTML output for each search result row
        $output .= '
        <tr>
            <th scope="row">' . $row['patient_id'] . '</th>
            <td>' . $row['SSN'] . '</td>
            <td>' . $row['fname'] . '</td>
            <td>' . $row['lname'] . '</td>
            <td>' . $row['DateOfBirth'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>
                <button class="btn btn-outline-info">
                    <a href="prescribe.php?prescribepatient_id='.$row['patient_id'].'" class="text-dark">Prescribe</a>
                </button>
            </td>
        </tr>';
    }
} else {
    $output .= '<tr><td colspan="7">No Records Found!</td></tr>';
}

echo '
<tbody>
    ' . $output . '
</tbody>';
?>
