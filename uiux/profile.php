<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trial Task | Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        :root {
            --background-color: rgba(255, 255, 255, 0.5);
            --text-color: black;
            --card-bg-color: rgba(255, 255, 255, 0.9);
            --card-hover-bg-color: rgba(255, 255, 255, 1);
            --nav-bg-color: rgba(255, 255, 255, 0.9);
            --nav-hover-bg-color: rgba(0, 0, 0, 0.3);
            --transition-speed: 0.4s;
            --content-width: 800px;
            --shadow-color: rgba(0, 0, 0, 0.2);
            --focus-color: rgba(0, 0, 0, 0.5);
        }

        [data-theme="light"] {
            --background-color: rgba(0, 0, 0, 0.7);
            --text-color: white;
            --card-bg-color: rgba(0, 0, 0, 0.5);
            --card-hover-bg-color: rgba(0, 0, 0, 0.9);
            --nav-bg-color: rgba(0, 0, 0, 0.9);
            --nav-hover-bg-color: rgba(255, 255, 255, 0.3);
            --shadow-color: rgba(0, 0, 0, 0.2);
            --focus-color: rgba(255, 255, 255, 0.5);
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color var(--transition-speed), color var(--transition-speed);
            scroll-behavior: smooth;
        }

        .profile-header {
            display: flex;
            align-items: center;
            padding: 15px; 
            border-bottom: 1px solid var(--text-color);
            background-color: var(--card-bg-color);
            margin-bottom: 15px; 
        }

        .profile-icon {
            width: 50px; 
            height: 50px; 
            margin-right: 15px; 
        }

        .profile-header h1 {
            margin: 0;
            font-size: 25px; 
            color: var(--text-color);
        }

        .profile-header p {
            margin: 0;
            font-size: 16px; 
            color: var(--text-color);
        }

        .profile-header .profile-icon {
            width: 60px;
            height: 60px;
            background-color: #444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 30px;
            box-shadow: 0 4px 8px var(--shadow-color);
        }

        .profile-header h2 {
            margin: 0;
            font-size: 24px;
            color: var(--text-color);
        }

        .profile-content {
            max-width: var(--content-width);
            margin: 0 auto;
            padding: 20px;
            background-color: var(--card-bg-color);
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--shadow-color);
            animation: fadeIn var(--transition-speed) ease-out;
        }

        .profile-content button {
            width: 150px;
            padding: 10px 20px;
            border: none;
            background-color: var(--focus-color);
            color: var(--text-color);
            border-radius: 5px;
            cursor: pointer;
            transition: background-color var(--transition-speed), transform var(--transition-speed);
            display: block; 
            margin: 20px auto 0; 
        }


        .profile-content button:hover {
            background-color: var(--text-color);
            color: var(--background-color);
            transform: scale(1.05);
        }

        .profile-section {
            margin-bottom: 20px;
            position: relative;
        }

        .profile-section h2 {
            cursor: pointer;
            margin: 0;
            font-size: 20px;
            padding: 10px;
            background-color: var(--card-bg-color);
            border-radius: 5px;
            box-shadow: 0 4px 8px var(--shadow-color);
            transition: background-color var(--transition-speed), border-bottom var(--transition-speed);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-section h2:hover {
            background-color: var(--card-hover-bg-color);
            border-bottom: 2px solid var(--text-color); /* Underline effect */
        }

        .profile-section-content {
            display: block;
            padding: 10px;
        }

        .profile-section-content a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: var(--text-color);
            transition: background-color var(--transition-speed), text-decoration var(--transition-speed);
        }

        .profile-section-content a:hover {
            background-color: var(--card-hover-bg-color);
            text-decoration: underline; 
        }

        .arrow-down {
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 10px solid var(--text-color);
            display: inline-block;
            margin-left: 10px;
            transition: transform var(--transition-speed);
        }

        .profile-section h2.active .arrow-down {
            transform: rotate(180deg); 
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


        .nav-bar a.active {
            background-color: var(--nav-hover-bg-color);
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

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .logout-button {
            width: 841px;
            padding: 10px 20px;
            border: none;
            background-color: var(--focus-color);
            color: var(--text-color);
            border-radius: 5px;
            cursor: pointer;
            transition: background-color var(--transition-speed), transform var(--transition-speed);
            display: block; 
            margin: 20px auto 0; 
        }

        .logout-button:hover {
            background-color: var(--text-color);
            color: var(--background-color);
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="theme-switch">
        <input type="checkbox" id="theme-toggle">
        <label for="theme-toggle" class="slider"></label>
    </div>

    <div class="profile-header">
        <div class="profile-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="profile-info">
            <h1>Billy Moore</h1>
            <p>jisip_st23@mailinator.com | N/A</p>
        </div>
    </div>

    <div class="profile-content">
        <!-- My Account Section -->
        <div class="profile-section">
            <h2>My Account</h2>
            <div class="profile-section-content">
                <a href="#"><i class="fas fa-ticket-alt"></i> Tickets</a>
                <a href="#"><i class="fas fa-credit-card"></i> Payment Methods</a>
                <a href="#"><i class="fas fa-star"></i> Saved Accounts</a>
                <a href="#"><i class="fas fa-store"></i> Vendor Profile</a>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="profile-section">
            <h2>Settings <span class="arrow-down"></span></h2>
            <div id="settings" class="profile-section-content" style="display: none;">
                <a href="#"><i class="fas fa-globe"></i> Languages</a>
            </div>
        </div>

        <!-- Support Section -->
        <div class="profile-section">
            <h2>Support <span class="arrow-down"></span></h2>
            <div id="support" class="profile-section-content" style="display: none;">
                <a href="#"><i class="fas fa-question-circle"></i> Get Help</a>
                <a href="#"><i class="fas fa-paper-plane"></i> Contact Us</a>
                <a href="#"><i class="fas fa-book"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-book"></i> Terms & Conditions</a>
            </div>
        </div>
    </div>

    <button type="button" class="logout-button">Logout</button>

    <div class="nav-container">
        <div class="nav-bar">
            <a href="index.php" title="Home"><i class="fas fa-home"></i></a>
            <a href="tickets.php" title="Tickets"><i class="fas fa-ticket-alt"></i></a>
            <a href="activity.php" title="Activity Page"><i class="fas fa-chart-line"></i></a>
            <a href="profile.php" title="Profile Page" class="active"><i class="fas fa-user"></i></a>
        </div>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const currentTheme = localStorage.getItem('theme') || 'dark';
        document.body.setAttribute('data-theme', currentTheme);

        themeToggle.addEventListener('change', () => {
            const theme = themeToggle.checked ? 'light' : 'dark';
            document.body.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        });

        if (currentTheme === 'light') {
            themeToggle.checked = true;
        }

        const currentUrl = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-bar a');

        navLinks.forEach(link => {
            if (link.href.includes(currentUrl)) {
                link.classList.add('active');
            }
        });

        function toggleSection(sectionId) {
            const sectionContent = document.getElementById(sectionId);
            sectionContent.style.display = sectionContent.style.display === 'block' ? 'none' : 'block';
        }

        document.querySelectorAll('.profile-section h2').forEach(header => {
            header.addEventListener('click', function() {
                const content = this.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                const arrow = this.querySelector('.arrow-down');
                if (arrow) {
                    arrow.style.transform = content.style.display === 'block' ? 'rotate(-135deg)' : 'rotate(45deg)';
                }
            });
        });
    </script>
</body>
</html>