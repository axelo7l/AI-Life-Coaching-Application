<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" style="background-color: #fef7ff;">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/AI-Life-Coaching-Application/home.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title> Current Goals </title>
</head>
<script>
async function generateContent(inputprompt, button) {
    const prompt = "generate advice about " + inputprompt + ", avoid using any text styling and make sure it fits in one paragraph";
    
    // Get the closest <li> element
    const listItem = button.closest("li");
    const responseElement = listItem.querySelector(".response");

    try {
        const response = await fetch("http://localhost:5000/generate", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ prompt })
        });

        const data = await response.json();
        responseElement.innerText = data.result || "No response from AI";
    } catch (error) {
        responseElement.innerText = "Error: " + error.message;
    }
}
</script>
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
                <a href="/AI-Life-Coaching-Application/home.php">
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
            <li>
                <a href="/AI-Life-Coaching-Application/login.php">
                    <i class='bx bx-log-out'></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<main style="background-color: #fef7ff;">
    <div class="row">
        <div class="currentgoals">
            <div class="row" style="margin-right: 2rem;">
                <div class="title">
                    <h1 style="font-size: 3rem;">Current Goals</h1>
                </div>
                <button class="open-button">
                    <h2>view previous goals</h2>
                </button>
                <button id="goalformbutton" class="open-button">
                    <h2>add a new goal</h2>
                </button>
            </div>
            <ul id="goal-list">
                <!-- Goals will be loaded dynamically -->
            </ul>
        </div>
    </div>

    <div id="goalform" class="goalform">
        <div class="goalform-content">
            <span class="close">&times;</span>
            <form id="goalForm">
                <h1>Add a Goal</h1><br>
                <label for="goalName">Title</label><br>
                <input type="text" id="goalName" name="goalName" required><br>

                <label for="goalType">Type</label><br>
                <input type="text" id="goalType" name="goalType" required><br>

                <label for="startDate">Start Date</label><br>
                <input type="date" id="startDate" name="startDate" required><br>

                <label for="endDate">End Date</label><br>
                <input type="date" id="endDate" name="endDate"><br>

                <label for="status">Status</label><br>
                <select id="status" name="status" required>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Pending">Pending</option>
                </select><br><br>

                <input type="submit" value="Add Goal">
            </form>
        </div>
    </div>
</main>

<script>
    const resizeBtn = document.querySelector("[data-resize-btn]");
    resizeBtn.addEventListener("click", function (e) {
        e.preventDefault();
        document.body.classList.toggle("sb-expanded");
    });

    document.getElementById("goalformbutton").onclick = function() {
        document.getElementById("goalform").style.display = "block";
    };

    document.querySelector(".close").onclick = function() {
        document.getElementById("goalform").style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == document.getElementById("goalform")) {
            document.getElementById("goalform").style.display = "none";
        }
    };

    document.getElementById("goalForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("add_goal.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);  // Show success or error message
            loadGoals();  // Refresh goal list
            document.getElementById("goalform").style.display = "none";
        });
    });

    function loadGoals() {
        fetch("fetch_goal.php")
        .then(response => response.json())
        .then(data => {
            let goalList = document.getElementById("goal-list");
            goalList.innerHTML = "";

            data.forEach(goal => {
                goalList.innerHTML += `
                    <li>
                        <div class="row">
                            <div class="goal">
                                <h1>${goal.GoalName}</h1>
                                <h2>${goal.GoalType}</h2>
                                <p>Start: ${goal.StartDate} | End: ${goal.EndDate}</p>
                                <p>Status: ${goal.Status}</p>
                                <br>
                                <button onclick="generateContent('${goal.GoalName}', this)">
                                    Generate Advice
                                </button>
                            </div>
                            <div class="goal">
                                <p class="response"></p> <!-- Added class to target response area -->
                                </div>
                            </div>
                        </li>`;
            });
        });
    }

    window.onload = loadGoals;
</script>

</body>
</html>
