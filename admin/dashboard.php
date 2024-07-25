<?php
session_start();
include 'db.php';
// Debugging: Print session data
// echo "Session authenticated: " . $_SESSION['authenticated'] . "<br>";
// echo "Session OTP: " . $_SESSION['otp'] . "<br>";

// Check if the user is authenticated (OTP verified)
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect to the login page or handle unauthorized access
    header('Location: index.php');
    exit();
}

// If OTP is still in the session, you can access it here ($_SESSION['otp'])

// Your dashboard content goes here



// Create
if (isset($_POST['create'])) {
    $sidname = $_POST['sidname'];
    $sidurl = $_POST['sidurl'];
    $sql = "INSERT INTO allslides (sidname, sidurl) VALUES ('$sidname', '$sidurl')";
    $conn->query($sql);
}

// Read
$sql = "SELECT * FROM allslides ORDER BY sort_order";
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
        $sql = "UPDATE allslides SET sort_order=$index WHERE sid=$sid";
        $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Slides</title>
    <style>
        .sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .sortable li {
            margin: 0 0 3px 0;
            padding: 8px;
            background-color: #f9f9f9;
            cursor: move;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        $(function() {
            $(".sortable").sortable({
                update: function(event, ui) {
                    var order = $(this).sortable("toArray");
                    $.post("allslides.php", {update_order: true, order: order});
                }
            });
            $(".sortable").disableSelection();
        });
    </script>
</head>
<body>
<div class="container">
<h2>All Slides</h2>

<!-- Create Form -->
<form method="post" action="">
    <input type="text" name="sidname" placeholder="Slide Name" required>
    <input type="text" name="sidurl" placeholder="Slide URL" required>
    <button type="submit" name="create" class="btn btn-primary">Create</button>
</form>

<!-- Display Slides -->
<ul class="sortable">
    <?php while ($row = $result->fetch_assoc()): ?>
        <li id="<?php echo $row['sid']; ?>">
            <form method="post" action="" style="display:inline;">
                <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                <input type="text" name="sidname" value="<?php echo $row['sidname']; ?>" required>
                <input type="text" name="sidurl" value="<?php echo $row['sidurl']; ?>" required>
                <button type="submit" name="update" class="btn btn-dark">Update</button>
                <button type="submit" name="delete"  class="btn btn-danger">Delete</button>
            </form>
        </li>
    <?php endwhile; ?>
</ul>
</div>
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>

<?php
$conn->close();
?>
