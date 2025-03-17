<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" style="background-color: #fef7ff;">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/ITS120L%20WEBSITE/home.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title> Current Goals </title>
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
        fetch("fetch_goals.php")
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
