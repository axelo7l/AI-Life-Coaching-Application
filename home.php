<?php
session_start();
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en" style="background-color: #fef7ff;">
<head>
    <link rel="stylesheet" href="/ITS120L%20WEBSITE/home.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <title> Home Page </title>
</head>
<body>
<aside>
    <nav>
        <ul>
            <li>
                <a href="#" data-resize-btn>
                    <i class="bx bx-chevrons-right"></i>
                    <span>Collapse</span>
                </a>
            </li>
            <li>
                <a href="/ITS120L%20WEBSITE/home.php">
                    <i class="bx bx-home-circle"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<main class="homepage">
    <header style="margin-top: 1rem;">
        <ul>
            <li>
                <h1 style="font-size: 3rem;">
                    Welcome back, <?php echo $_SESSION["FirstName"]; ?>!
                </h1>
            </li>
            <li>
                <div class="quotebox">
                    (quote)
                </div>
            </li>
        </ul>
    </header>

    <div class="row">
        <div class="column1">
            <h1>
                Current Goals
            </h1>
            <hr>
            
            <ul>
                <li>
                    <h1>
                        (Goal Title)
                    </h1>
                    <h3>
                        (Goal Description)
                    </h3>
                    <p>
                        (Goal Description)
                    </p>
                </li>
                <li>
                    <h1>
                        (Goal Title)
                    </h1>
                    <h3>
                        (Goal Description)
                    </h3>
                    <p>
                        (Goal Description)
                    </p>
                </li>
                <li>
                    <h1>
                        (Goal Title)
                    </h1>
                    <h3>
                        (Goal Description)
                    </h3>
                    <p>
                        (Goal Description)
                    </p>
                </li>
            </ul>
        </div>
        <div class="column2">
            <div class="advicebox">
                <h1 style="font-size: 3rem;">
                    Would you like <br> some advice?
                </h1>
                <br><br><br><br>
                <a href="#" id="askMe">Ask me!</a>
            </div>
            
            <div id="chatBox" class="chat-box" style="display: none;">
                <div class="chat-header">
                    <span>Chat with us</span>
                    <button id="closeChat">&times;</button>
                </div>
                <div class="chat-body">
                    <p>How can I help you?</p>
                    <input type="text" id="userInput" placeholder="Type your message...">
                    <button id="sendMessage">Send</button>
                </div>
            </div>

            <div class="wineb">
                <img src="/ITS120L%20WEBSITE/imgs/lightbulb.png" style="width: 100px; height: 100px;">
                <div class="winebbox">
                    <h2>
                        Wineb's Advice for Today:
                    </h2>
                    <p>
                        (quote)
                    </p>
                </div>
            </div>
        </div>
        <div class="column3">
            <ul>
                <li>
                    <h1>
                        Target Goals
                    </h1>
                    <h3>
                        Manage your goals
                    </h3>
                    <br>
                    <a href="/ITS120L%20WEBSITE/currentgoals.php">
                        Click Here
                    </a>
                </li>
                <li>
                    <h1>
                        Progress Report
                    </h1>
                    <h3>
                        Track your progress
                    </h3>
                    <br>
                    <a href="">
                        Click Here
                    </a>
                </li>
            </ul>
        </div>
    </div>
</main>
</body>

<style>
    .chat-box {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        background: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        display: none;
    }
    .chat-header {
        background: #007bff;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .chat-body {
        padding: 10px;
    }
    #userInput {
        width: 100%;
        padding: 5px;
    }
    #sendMessage {
        width: 100%;
        background: #007bff;
        color: white;
        border: none;
        padding: 5px;
        margin-top: 5px;
        cursor: pointer;
    }
</style>

<script>
    document.getElementById("askMe").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById("chatBox").style.display = "block";
    });
    document.getElementById("closeChat").addEventListener("click", function() {
        document.getElementById("chatBox").style.display = "none";
    });
</script>
</html>