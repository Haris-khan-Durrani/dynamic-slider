<?php

include 'db.php';
// Create
if (isset($_POST['create'])) {
    $sidname = $_POST['sidname'];
    $sidurl = $_POST['sidurl'];
    $sql = "INSERT INTO allslides (sidname, sidurl) VALUES ('$sidname', '$sidurl')";
    $conn->query($sql);
}

// Read
$sql = "SELECT * FROM allslides ORDER BY sid";
$result = $conn->query($sql);

// Update
if (isset($_POST['update'])) {
    $sid = $_POST['sid'];
    $sidname = $_POST['sidname'];
    $sidurl = $_POST['sidurl'];
    $sql = "UPDATE allslides SET sidname='$sidname', sidurl='$sidurl' WHERE sid=$sid";
    $conn->query($sql);
}

// Delete
if (isset($_POST['delete'])) {
    $sid = $_POST['sid'];
    $sql = "DELETE FROM allslides WHERE sid=$sid";
    $conn->query($sql);
}

// Update Sort Order
if (isset($_POST['update_order'])) {
    $order = $_POST['order'];
    foreach ($order as $index => $sid) {
        $sql = "UPDATE allslides SET sort_order=$index WHERE sid=$sid".";";
        $conn->query($sql);
        echo $sql;
    }
}
?>