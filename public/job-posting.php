<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Management System</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">

        <!-- SIDEBAR SECTION -->
        <div class="sidebar">
            <h1>Recruitment MS</h1>
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.html">Dashboard</a></li>
                <li class="nav-item"><a href="job-position.html">Job Position</a></li>
                <li class="nav-item"><a href="requisition.html">Requisition</a></li>
                <li class="nav-item active"><a href="job-posting.php
                ">Job Posting</a></li>
            </ul>
        </div>

        <!-- MAIN CONTENT SECTION -->
        <div class="main-content">
            <div class="top-bar">
                <h1 class="module-title" style="color:#6E8658">Job Posting</h1>
                <div class="profile-section">
                    <div class="profile">
                        <img src="img/pfp-1.jpg" alt="Profile" class="profile-pic">
                        <span>LEIVY</span>
                        <div class="profile-dropdown">
                            <ul>
                                <li><a href="profile.html">My Profile</a></li>
                                <li><a href="settings.html">Settings</a></li>
                                <li class="logout">Logout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-container">
                <div class="tab-buttons">
                    <button class="tab-button active" onclick="openTab(event, 'dashboard')">
                        <i class='bx bx-dashboard'></i>
                        Dashboard
                    </button>
                </div>
            </div>

            <!-- JOB POSTING -->
            <div class="dashboard-content" id="job-posting">
                <?php
                include '../connections.php';

                // Handle Add Posting
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_posting'])) {
                    $stmt = $connections->prepare("INSERT INTO job_postings (requisition_id, posting_title, description, post_date, close_date, channel, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $_POST['requisition_id'],
                        $_POST['posting_title'],
                        $_POST['description'],
                        $_POST['post_date'],
                        $_POST['close_date'],
                        $_POST['channel'],
                        $_POST['status']
                    ]);
                    // Simple redirect to avoid resubmission
                    header("Location: job-posting.php");
                    exit;
                }
                ?>

                <!-- Add Job Posting Form -->
                <form action="job-posting.php" method="POST" class="job-posting-form" style="margin-bottom:2em;">
                    <input type="number" name="requisition_id" placeholder="Requisition ID" required>
                    <input type="text" name="posting_title" placeholder="Job Title" required>
                    <textarea name="description" placeholder="Description"></textarea>
                    <input type="date" name="post_date" placeholder="Post Date">
                    <input type="date" name="close_date" placeholder="Close Date">
                    <input type="text" name="channel" placeholder="Channel (e.g. LinkedIn)">
                    <select name="status">
                        <option value="Draft">Draft</option>
                        <option value="Published">Published</option>
                        <option value="Closed">Closed</option>
                    </select>
                    <button type="submit" name="add_posting">Add Posting</button>
                </form>

                <!-- Job Postings Table -->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Requisition</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Post Date</th>
                            <th>Close Date</th>
                            <th>Channel</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch all postings
                        $stmt = $connections->query("SELECT * FROM job_postings ORDER BY posting_id DESC");
                        while ($row = $stmt->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['posting_id']}</td>";
                            echo "<td>{$row['requisition_id']}</td>";
                            echo "<td>{$row['posting_title']}</td>";
                            echo "<td>{$row['description']}</td>";
                            echo "<td>{$row['post_date']}</td>";
                            echo "<td>{$row['close_date']}</td>";
                            echo "<td>{$row['channel']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>