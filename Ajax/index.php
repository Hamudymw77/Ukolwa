<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat room</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            function loadMessages() {
                $.ajax({
                    url: "load_messages.php",
                    dataType: "text",
                    success: function (data) {
                        $("#messages").html(data);
                    }
                });
            }

            loadMessages();

            setInterval(loadMessages, 1000);

            $("#messageForm").submit(function (event) {
                event.preventDefault(); // Zabráníme výchozímu odeslání formuláře

                const message = $("#messageInput").val();

                $.ajax({
                    type: "POST",
                    url: "send message.php", // PHP skript pro zpracování zprávy
                    data: { message: message },
                    success: function () {
                        $("#messageInput").val("");
                        loadMessages();
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Chat room</h1>
    <div id="messages"></div>
    
    <!-- Formulář pro odeslání zprávy pomocí AJAX -->
    <form id="messageForm">
        <input type="text" id="messageInput" name="message" placeholder="Napište zprávu">
        <button type="submit">Odeslat</button>
    </form>
</body>
</html>