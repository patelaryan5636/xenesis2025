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

$sql = "SELECT * FROM event_master WHERE event_id = $id";
$result1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result1);

// Split the team_member_count "2-3" into min and max
list($minMembers, $maxMembers) = explode("-", $row['team_member_count']);
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
            height: auto;
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

        .suggestion-box{
            background-color: #222831;
            border-radius: 15px;
            padding: 2px 11px;
        }
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

        <div id="team-members-container"></div>

        <button type="submit">Submit</button>
    </form>
</div>

<script>
// PHP Variables
let minMembers, maxMembers;
if ("<?php echo $row['team_member_count']; ?>".includes("-")) {
    [minMembers, maxMembers] = "<?php echo $row['team_member_count']; ?>".split("-").map(Number);
} else {
    minMembers = maxMembers = Number("<?php echo $row['team_member_count']; ?>");
}
const teamMembersContainer = document.getElementById("team-members-container");
const leaderName = "<?php echo $userdata['user_name']; ?>";

// Enrollment List from Database
const enrollmentList = [
    <?php
    $user_id = $userdata['user_id'];
    $sql = "SELECT user_name FROM user_master WHERE user_id != $user_id and user_role=3";
    $result = mysqli_query($conn, $sql);
    $names = [];
    while($row = mysqli_fetch_assoc($result)){
        $names[] = '"' . $row['user_name'] . '"';
    }
    echo implode(',', $names);
    ?>
];

// Create team member fields dynamically
function createMemberFields(min, max) {
    teamMembersContainer.innerHTML = "";

    // Fixed Leader Field
    const leaderField = document.createElement("div");
    leaderField.classList.add("form-group");
    leaderField.innerHTML = `
        <label>Team Member 1 (Leader):</label>
        <input type="text" value="${leaderName}" readonly>
    `;
    teamMembersContainer.appendChild(leaderField);

    for (let i = 2; i <= max; i++) {
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

        // Required for only min members
        if (i <= min) {
            input.setAttribute("required", "true");
        }

        memberField.appendChild(label);
        memberField.appendChild(input);
        teamMembersContainer.appendChild(memberField);
    }
}

// Generate the fields based on min and max members
createMemberFields(minMembers, maxMembers);

function suggestEnrollment(memberId) {
    document.addEventListener("click", function (e) {
        const suggestionBox = document.querySelector(".suggestion-box");
        if (
          suggestionBox &&
          !e.target.closest(".form-group") &&
          !e.target.closest(".suggestion-box")
        ) {
          suggestionBox.remove();
        }
      });
    const inputField = document.getElementById(`team-member-${memberId}`);
    const value = inputField.value.trim().toLowerCase();

    // Case-insensitive filtering
    const suggestions = enrollmentList.filter((enroll) =>
        enroll.toLowerCase().includes(value)
    );

    // Remove existing suggestion box
    const existingSuggestionBox = inputField.nextElementSibling;
    if (existingSuggestionBox) {
        existingSuggestionBox.remove();
    }

    if (suggestions.length === 0 && value !== "") {
        inputField.style.border = "2px solid red";

        const suggestionBox = document.createElement("div");
        suggestionBox.classList.add("suggestion-box", "not-registered");
        suggestionBox.innerText = "Enrollment not registered. Please register first.";
        inputField.parentElement.appendChild(suggestionBox);
    } else if (suggestions.length > 0) {
        inputField.style.border = "2px solid #76abae";

        const suggestionBox = document.createElement("div");
        suggestionBox.classList.add("suggestion-box");
        inputField.parentElement.appendChild(suggestionBox);

        suggestions.forEach((suggestion) => {
            const suggestionItem = document.createElement("div");
            suggestionItem.classList.add("suggestion-item");
            suggestionItem.innerText = suggestion;
            suggestionItem.addEventListener("click", () => {
                inputField.value = suggestion;
                inputField.style.border = "2px solid #76abae";
                suggestionBox.remove();
            });
            suggestionBox.appendChild(suggestionItem);
        });
    }
}

//Submit Validation
document.getElementById("team-form").addEventListener("submit", function (event) {
    let valid = true;
    let enrollments = new Set(); // Store unique enrollments
    let filledMembers = 0; // Count how many members are filled

    for (let i = 2; i <= maxMembers; i++) {
        const memberInput = document.getElementById(`team-member-${i}`);
        if (!memberInput) continue;

        let value = memberInput.value.trim().toLowerCase();

        // If the input is not empty, count it as a filled member
        if (value) filledMembers++;

        // Case-insensitive validation for valid enrollment and uniqueness
        if (
            (value && !enrollmentList.map(e => e.toLowerCase()).includes(value)) || 
            (value && enrollments.has(value))
        ) {
            valid = false;
            memberInput.style.border = "2px solid red";
        } else if (value) {
            memberInput.style.border = "2px solid #76abae";
            enrollments.add(value);
        }
    }

    // Ensure at least `minMembers` members are filled
    if (filledMembers < minMembers-1) {
        valid = false;
        alert(`You must add at least ${minMembers} members.`);
    }

    if (!valid) {
        event.preventDefault();
        alert("Ensure all enrollments are valid, registered, and unique.");
    }
});



</script>

</body>
</html>
