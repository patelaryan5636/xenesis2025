<?php
require 'includes/scripts/connection.php';  
session_start();
if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
    $user_id = $_SESSION['xenesis_logedin_user_id'];
    $query = "SELECT * FROM user_master WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
    $user_role = $userdata["user_role"];
    if($user_role != 3){
        header("Location: 404.php");
    }
} else {
    header("Location: sign-in.php");
}

function decryptId($encryptedId) {
    $key = "xenesis2025"; 
    $iv = "1234567891011121"; 
    return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
}

$encryptedId = $_GET['id'];
$id = decryptId($encryptedId);

$sql = "SELECT * FROM `event_master` WHERE `event_id` = $id";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result1);
$team_member_count = $row['team_member_count']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Registration Form</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #222831;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        .container {
            background-color: #76abae;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            overflow-y: auto;
        }
        h1 { text-align: center; color: #222831; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: bold; margin-bottom: 8px; }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 2px solid #76abae;
        }
        button {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover { background-color: #3c57589e; }
        .suggestion-box {
            position: absolute;
            background: #31363f;
            border: 1px solid #76abae;
            border-radius: 4px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1000;
        }
        .suggestion-item { padding: 10px; cursor: pointer; }
        .not-registered { background-color: rgba(255, 0, 0, 0.428); }
    </style>
</head>
<body>

<div class="container">
    <h1>Registration Form</h1>
    <form id="team-form" action="group_insert.php" method="post">

    <input type="hidden" name="event_id" value="<?php echo $id; ?>">
    <input type="hidden" name="leader_id" value="<?php echo $userdata['user_id']; ?>">
        <div class="form-group">
            <label for="team-name">Team Name:</label>
            <input type="text" id="team-name" name="team_name" required placeholder="Enter Team Name">
        </div>

        <div class="form-group">
            <label for="team-leader-enrollment">Team Leader Enrollment:</label>
            <input type="text" id="team-leader-name" name="team_leader_enrollment" value="<?php echo $userdata['user_name'];?>" readonly>
        </div>

        <div class="form-group">
            <label for="team-leader-name">Team Leader Name:</label>
            <input type="text" id="team-leader-name" name="team_leader_name" value="<?php echo $userdata['full_name'];?>" readonly>
        </div>

        <div class="form-group">
            <label for="num-members">Number of Team Members:</label>
            <select id="num-members" required disabled>
                <option value="<?php echo $team_member_count; ?>"><?php echo $team_member_count; ?></option>
            </select>
        </div>

        <div id="team-members-container"></div>

        <button type="submit">Submit</button>
    </form>
</div>

<script>
// Get the number of members from PHP
const numMembers = <?php echo $team_member_count; ?>;
const teamMembersContainer = document.getElementById("team-members-container");
const leaderName = "<?php echo $userdata['user_name']; ?>"; // Predefined leader

// Enrollment List (fetch from PHP)
const enrollmentList = [
    <?php
    $user_id = $userdata['user_id'];
    $sql = "SELECT user_name FROM `user_master` WHERE user_id != $user_id and user_role=3";
    $result = mysqli_query($conn, $sql);
    $names = [];
    while($row = mysqli_fetch_assoc($result)){
        $names[] = '"' . $row['user_name'] . '"';
    }
    echo implode(',', $names);
    ?>
];

// Function to create fields dynamically
function createMemberFields(num) {
    teamMembersContainer.innerHTML = ""; 

    // Leader (Member 1) is fixed
    const leaderField = document.createElement("div");
    leaderField.classList.add("form-group");
    leaderField.innerHTML = `
        <label>Team Member 1 (Leader):</label>
        <input type="text" value="${leaderName}" readonly>
    `;
    teamMembersContainer.appendChild(leaderField);

    // Remaining members
    for (let i = 2; i <= num; i++) {
        const memberField = document.createElement("div");
        memberField.classList.add("form-group");

        const label = document.createElement("label");
        label.setAttribute("for", `team-member-${i}`);
        label.innerText = `Team Member ${i} Enrollment No:`;

        const input = document.createElement("input");
        input.type = "text";
        input.id = `team-member-${i}`;
        input.name = `member-${i}`;
        input.placeholder = `Enrollment No of Member ${i}`;
        input.setAttribute("oninput", `suggestEnrollment(${i})`);
        input.setAttribute("required", "true");

        memberField.appendChild(label);
        memberField.appendChild(input);
        teamMembersContainer.appendChild(memberField);
    }
}

// Generate fields when page loads
createMemberFields(numMembers);

// Suggest Enrollment
function suggestEnrollment(memberId) {
    const inputField = document.getElementById(`team-member-${memberId}`);
    const suggestions = enrollmentList.filter((enroll) =>
        enroll.toLowerCase().includes(inputField.value.toLowerCase())
    );

    const existingSuggestionBox = inputField.nextElementSibling;
    if (existingSuggestionBox) {
        existingSuggestionBox.remove();
    }

    if (suggestions.length === 0 && inputField.value.trim() !== "") {
        const suggestionBox = document.createElement("div");
        suggestionBox.classList.add("suggestion-box", "not-registered");
        suggestionBox.innerText = "Enrollment not registered. Please register first.";
        inputField.parentElement.appendChild(suggestionBox);
    } else if (suggestions.length > 0) {
        const suggestionBox = document.createElement("div");
        suggestionBox.classList.add("suggestion-box");
        inputField.parentElement.appendChild(suggestionBox);

        suggestions.forEach((suggestion) => {
            const suggestionItem = document.createElement("div");
            suggestionItem.classList.add("suggestion-item");
            suggestionItem.innerText = suggestion;
            suggestionItem.addEventListener("click", () => {
                inputField.value = suggestion;
                suggestionBox.remove();
            });
            suggestionBox.appendChild(suggestionItem);
        });
    }
}

// Validate on submit
document.getElementById("team-form").addEventListener("submit", function (event) {
    let valid = true;
    let enrollments = [];

    for (let i = 2; i <= numMembers; i++) {
        const memberInput = document.getElementById(`team-member-${i}`);
        let value = memberInput.value.trim();

        if (!value || !enrollmentList.includes(value) || enrollments.includes(value)) {
            valid = false;
            memberInput.style.border = "2px solid red";
        } else {
            memberInput.style.border = "2px solid #76abae";
        }
        enrollments.push(value);
    }

    if (!valid) {
        event.preventDefault();
        alert("Ensure all enrollments are valid, registered, and unique.");
    }
});
</script>

</body>
</html>
