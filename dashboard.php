<?php
session_start();

$username = $_SESSION['username'];

if (isset($_GET['logout'])) {
    setcookie($username, "", time() - 3600, "/");
    session_destroy();
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION['username'];

if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    setcookie($username, $mode, time() + (86400 * 365), "/");
    header("Location: dashboard.php");
    exit();
}

if (isset($_COOKIE[$username])) {
    $mode = $_COOKIE[$username];
} else {
    $mode = 'dark';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsher's - Dashboard</title>
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .navbar {
            background: rgba(5, 5, 6, 0.494);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }

        <?php if ($mode === 'light'): ?>.dashboard-body {
            background-color: rgb(87, 0, 0);
            color: #000000;
        }

        main {
            color: white;
        }

        <?php endif; ?>
    </style>
    <style>
        .navbar {
            background: rgba(5, 5, 6, 0.494);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }

        <?php if ($mode === 'light'): ?>.dashboard-body {
            background-color: rgb(87, 0, 0);
            color: #000000;
        }

        main {
            color: white;
        }

        <?php endif; ?>
    </style>
</head>

<body class="dashboard-body">
    <nav class="navbar">
        <div class="nav-brand">
            <img src="styles/assets/image.png" alt="Logo" style="width: 32px; height: 32px;">
            <span>Arsher's</span>
        </div>

        <div class="nav-links">
            <a href="#" class="active"><i class="fas fa-home"></i> Home</a>
            <a href="#projects"><i class="fas fa-project-diagram"></i> Projects</a>
            <a href="#tasks"><i class="fas fa-tasks"></i> Tasks</a>
            <a href="#analytics"><i class="fas fa-chart-bar"></i> Analytics</a>
        </div>

        <div class="nav-profile">
            <div class="profile-menu">
                <img src="styles/assets/image.png" alt="Profile" class="avatar">
                <div class="dropdown-content">
                    <a href="#"><i class="fas fa-user"></i> Profile</a>
                    <a href="#"><i class="fas fa-cog"></i> Settings</a>
                    <a href="./auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <a href="?mode=<?php echo ($mode === 'dark' ? 'light' : 'dark'); ?>">
                        <i class="fas fa-<?php echo ($mode === 'dark' ? 'sun' : 'moon'); ?>"></i>
                        <?php echo ($mode === 'dark' ? 'Light' : 'Dark'); ?> Mode
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="dashboard-content">
        <section class="welcome-section">
            <h1>Welcome back, <?php echo htmlspecialchars($username); ?>! 👋</h1>
            <p>Here's what's happening with your projects today.</p>
        </section>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-code"></i></div>
                <div class="stat-details">
                    <h3>Active Projects</h3>
                    <p class="stat-number">12</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-tasks"></i></div>
                <div class="stat-details">
                    <h3>Pending Tasks</h3>
                    <p class="stat-number">5</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-details">
                    <h3>Team Members</h3>
                    <p class="stat-number">8</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                <div class="stat-details">
                    <h3>Completed</h3>
                    <p class="stat-number">24</p>
                </div>
            </div>
        </div>

        <section id="projects" class="recent-activity">
            <h2>Your Projects</h2>
            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-header">
                        <h3>E-commerce Platform</h3>
                        <span class="project-status status-active">Active</span>
                    </div>
                    <p>Online shopping platform with modern UI/UX</p>
                    <div class="activity-details">
                        <small>Updated 2 days ago</small>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-header">
                        <h3>Mobile App</h3>
                        <span class="project-status status-pending">Pending</span>
                    </div>
                    <p>Cross-platform mobile application</p>
                    <div class="activity-details">
                        <small>Updated 5 days ago</small>
                    </div>
                </div>
            </div>
        </section>

        <section id="tasks" class="recent-activity" style="margin-top: 2rem;">
            <h2>Current Tasks</h2>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon"><i class="fas fa-code"></i></div>
                    <div class="activity-details">
                        <h4>Implement Authentication</h4>
                        <p>Add OAuth integration for social login</p>
                        <small>Due in 2 days</small>
                    </div>
                </div>
            </div>
        </section>

        <section id="analytics" class="recent-activity" style="margin-top: 2rem;">
            <h2>Performance Analytics</h2>
            <div style="height: 300px; background: #161b22; border-radius: 8px; margin-top: 1rem; display: flex; align-items: center; justify-content: center;">
                <p>Analytics Dashboard Coming Soon</p>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileMenu = document.querySelector('.profile-menu');
            const dropdownContent = document.querySelector('.dropdown-content');


            profileMenu.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownContent.classList.toggle('show');
            });

            document.addEventListener('click', function() {
                if (dropdownContent.classList.contains('show')) {
                    dropdownContent.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>