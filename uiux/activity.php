<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trial Task | My Activity</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
        :root {
            --background-color: rgba(255, 255, 255, 0.8); /* Light mode */
            --text-color: black;
            --card-bg-color: rgba(255, 255, 255, 0.9);
            --card-hover-bg-color: rgba(255, 255, 255, 1);
            --nav-bg-color: rgba(255, 255, 255, 0.9);
            --nav-hover-bg-color: rgba(0, 0, 0, 0.3);
            --nav-active-bg-color: rgba(0, 0, 0, 0.1);
            --icon-color: black; /* Default icon color */
            --transition-speed: 0.4s;
        }

        [data-theme="light"] {
            --background-color: rgba(0, 0, 0, 0.5); /* Dark mode */
            --text-color: white;
            --card-bg-color: rgba(0, 0, 0, 0.7);
            --card-hover-bg-color: rgba(0, 0, 0, 0.9);
            --nav-bg-color: rgba(0, 0, 0, 0.7);
            --nav-hover-bg-color: rgba(255, 255, 255, 0.3);
            --nav-active-bg-color: rgba(255, 255, 255, 0.5);
            --icon-color: white; /* Icon color for dark mode */
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color); /* Use CSS variable */
            color: var(--text-color);
            transition: background-color var(--transition-speed), color var(--transition-speed);
            scroll-behavior: smooth;
        }

        .header-container {
            background-color: var(--card-bg-color);
            padding: 20px;
            text-align: center;
            color: var(--text-color);
            font-size: 24px;
            font-weight: bold;
            position: relative;
            animation: fadeIn 1s ease-out;
        }

        .header-container .back-arrow {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: var(--text-color);
            text-decoration: none;
            transition: transform var(--transition-speed);
        }

        .header-container .back-arrow:hover {
            transform: translateY(-50%) scale(1.2); /* Zoom effect */
        }

        .help-to-buy-text {
            text-align: left;
            margin-left: 20px;
            font-size: 16px;
            color: var(--text-color);
            margin-top: -10px;
            animation: fadeIn 1s ease-out 0.5s;
        }

        .activity-container {
            padding: 20px;
        }

        .activity-card {
            background-color: var(--card-bg-color);
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color var(--transition-speed), transform var(--transition-speed);
            position: relative;
            justify-content: space-between;
            animation: slideIn 0.8s ease-out;
        }

        .activity-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
            opacity: 0;
            transition: opacity var(--transition-speed);
        }

        .activity-card:hover {
            background-color: var(--card-hover-bg-color);
            transform: scale(1.02);
        }

        .activity-card:hover::after {
            opacity: 1;
        }

        .profile-icon {
            width: 50px;
            height: 50px;
            background-color: #444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            transition: box-shadow var(--transition-speed);
        }

        .profile-icon:hover {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        .activity-info {
            flex: 1;
        }

        .activity-info h3 {
            margin: 0;
            font-size: 18px;
            color: var(--text-color);
            position: relative;
        }

        .activity-info h3::after {
            content: "Click to view details";
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--card-bg-color);
            color: var(--text-color);
            padding: 5px;
            border-radius: 5px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity var(--transition-speed), transform var(--transition-speed);
        }

        .activity-info h3:hover::after {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .activity-info p {
            margin: 5px 0;
            color: var(--text-color);
        }

        .price-info {
            font-size: 18px;
            color: var(--text-color);
            text-align: right;
            margin-left: 15px;
        }

        .nav-container {
            position: fixed;
            bottom: 2%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            z-index: 10;
        }

        .nav-bar {
            background-color: var(--nav-bg-color);
            padding: 10px;
            border-radius: 12px;
            display: flex;
            gap: 15px;
            width: fit-content;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color var(--transition-speed);
        }

        .nav-bar a {
            position: relative;
            color: var(--text-color);
            text-decoration: none;
            font-size: 30px;
            padding: 9px;
            border-radius: 5px;
            transition: background-color var(--transition-speed), color var(--transition-speed);
        }

        .nav-bar a i {
            color: var(--icon-color);
        }

        .nav-bar a::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--nav-hover-bg-color);
            transition: width var(--transition-speed), left var(--transition-speed);
        }

        .nav-bar a:hover::before {
            width: 100%;
            left: 0;
        }


        .nav-bar a.active::before {
            width: 100%;
            left: 0;
        }

        .nav-bar a.active {
            background-color: var(--nav-hover-bg-color);
            color: #000;
        }

        .theme-switch {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            z-index: 20;
        }

        .theme-switch input {
            display: none;
        }

        .slider {
            width: 50px;
            height: 25px;
            background-color: #ccc;
            border-radius: 25px;
            position: relative;
            transition: background-color var(--transition-speed), transform var(--transition-speed);
        }

        .slider::before {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            top: 50%;
            left: 5%;
            transform: translateY(-50%);
            transition: left var(--transition-speed);
        }

        input:checked + .slider {
            background-color: #2196F3;
            transform: scale(1.2);
        }

        input:checked + .slider::before {
            left: 55%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>
    <div class="theme-switch">
        <input type="checkbox" id="theme-toggle">
        <label for="theme-toggle" class="slider"></label>
    </div>

    <div class="header-container">
        <a id="back-button" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
        Activity
    </div>
    <div class="help-to-buy-text">
        <br>
        <p>Help-to-Buy</p>
    </div>

    <div class="activity-container">
        <!-- Activity Card 1 -->
        <div class="activity-card">
            <div class="profile-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="activity-info">
                <h3>SMT Concert</h3>
                <p>1x Advanced</p>
                <p>Jul 30, 2024 - 8:49 PM</p>
            </div>
            <div class="price-info">
                ₱2,000.00
            </div>
        </div>

        <!-- Activity Card 2 -->
        <div class="activity-card">
            <div class="profile-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="activity-info">
                <h3>ITZY 2ND WORLD TOUR BORN TO BE</h3>
                <p>1x Basic</p>
                <p>Jul 31, 2024 - 7:06 PM</p>
            </div>
            <div class="price-info">
                ₱1,000.00
            </div>
        </div>

        <!-- Activity Card 3 -->
        <div class="activity-card">
            <div class="profile-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="activity-info">
                <h3>Red Velvet FANCON TOUR</h3>
                <p>1x Master</p>
                <p>Aug 10, 2024 - 4:35 AM</p>
            </div>
            <div class="price-info">
                ₱3,000.00
            </div>
        </div>
    </div>

    <div class="nav-container">
        <div class="nav-bar">
            <a href="index.php" title="Home"><i class="fas fa-home"></i></a>
            <a href="tickets.php" title="Tickets"><i class="fas fa-ticket-alt"></i></a>
            <a href="activity.php" title="Activity Page" class="active"><i class="fas fa-chart-line"></i></a>
            <a href="profile.php" title="Profile Page"><i class="fas fa-user"></i></a>
        </div>
    </div>

    <script>
        const navLinks = document.querySelectorAll('.nav-bar a');

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(link => link.classList.remove('active'));
                this.classList.add('active');
            });
        });

        const toggleSwitch = document.getElementById('theme-toggle');
        const rootElement = document.documentElement;

        toggleSwitch.addEventListener('change', function() {
            if (toggleSwitch.checked) {
                rootElement.setAttribute('data-theme', 'light');
            } else {
                rootElement.removeAttribute('data-theme');
            }
        });

        document.getElementById('back-button').addEventListener('click', function(event) {
            event.preventDefault(); 
            window.history.back(); 
        });
                // Function to set the theme
                function setTheme(theme) {
            const rootElement = document.documentElement;
            if (theme === 'light') {
                rootElement.setAttribute('data-theme', 'light');
                document.getElementById('theme-toggle').checked = true;
            } else {
                rootElement.removeAttribute('data-theme');
                document.getElementById('theme-toggle').checked = false;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                setTheme(savedTheme);
            } else {
                setTheme('dark');
            }
        });

        document.getElementById('theme-toggle').addEventListener('change', function() {
            if (this.checked) {
                setTheme('light');
                localStorage.setItem('theme', 'light');
            } else {
                setTheme('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>
</html>
