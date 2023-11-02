<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    $message = $_POST["message"];
    $file = fopen("messages.txt", "a");
    if ($file) {
        fwrite($file, $message . "\n");
        fclose($file);
        echo "Zpráva byla úspěšně uložena.";
    } else {
        echo "Nepodařilo se uložit zprávu.";
    }
} else {
    echo "Neplatný požadavek.";
}
?>
