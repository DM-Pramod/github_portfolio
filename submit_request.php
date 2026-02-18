<?php // Code for thanku note.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["Name"]);
    $email = htmlspecialchars($_POST["Email"]);
    $subject = htmlspecialchars($_POST["Subject"]);
    $message = htmlspecialchars($_POST["Message"]);
    $date = date("Y-m-d H:i:s");
    $row = [$date, $name, $email, $subject, $message];

    $file = fopen("requests.csv", "a");
    if ($file === false) {
        die("Error: Unable to open or create requests.csv. Check file permissions.");
    }
    fputcsv($file, $row);
    fclose($file);

    header("Location: thankyou.html");
    exit();
}
?>
