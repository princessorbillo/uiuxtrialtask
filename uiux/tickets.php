<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trial Task | Tickets</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
        :root {
            --background-color: rgba(255, 255, 255, 0.8);
            --text-color: black;
            --card-bg-color: rgba(255, 255, 255, 0.9);
            --card-hover-bg-color: rgba(255, 255, 255, 1);
            --nav-bg-color: rgba(255, 255, 255, 0.9);
            --nav-hover-bg-color: rgba(0, 0, 0, 0.3);
            --icon-color: black; /* Default icon color */
            --icon-color-light: white; /* Icon color for dark mode */
            --transition-speed: 0.4s;
        }

        [data-theme="light"] {
            --background-color: rgba(0, 0, 0, 0.5);
            --text-color: white;
            --card-bg-color: rgba(0, 0, 0, 0.7);
            --card-hover-bg-color: rgba(0, 0, 0, 0.9);
            --nav-bg-color: rgba(0, 0, 0, 0.7);
            --nav-hover-bg-color: rgba(255, 255, 255, 0.3);
            --icon-color: white; /* Icon color in dark mode */
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color var(--transition-speed), color var(--transition-speed);
        }

        .header-container {
            position: relative;
            width: 100%;
            height: 20vh;
            background-image: url('https://images.unsplash.com/photo-1468359601543-843bfaef291a?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 100px;
        }

        .search-container {
            position: relative;
            width: 80%;
            max-width: 400px;
        }

        .search-container input[type="text"] {
            padding: 10px 40px;
            border-radius: 25px;
            border: 1px solid #ddd;
            font-size: 16px;
            width: 100%;
            transition: border-color var(--transition-speed), box-shadow var(--transition-speed);
        }

        .search-container input[type="text"]:focus {
            border-color: #000000;
            outline: none;
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.7);
        }

        .search-container i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #ddd;
            transition: color var(--transition-speed);
        }

        .search-container input[type="text"]:focus + i {
            color: #2196F3;
        }

        .ticket-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            margin-top: -70px;
        }

        .ticket-row {
            display: flex;
            align-items: center;
            background-color: var(--card-bg-color);
            margin: 10px 0;
            padding: 15px;
            border-radius: 12px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color var(--transition-speed), transform var(--transition-speed), border var(--transition-speed);
            border: 2px solid transparent; /* Initial border, invisible */
        }

        .ticket-row:hover {
            background-color: var(--card-hover-bg-color);
            transform: translateY(-5px);
            animation: pulse 1s ease-in-out;
            border: 1px solid black; /* Border color on hover */
        }



        .ticket-row img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin-right: 20px;
            transition: transform var(--transition-speed);
        }

        .ticket-row img:hover {
            transform: scale(1.1);
        }

        .ticket-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .ticket-info h3 {
            margin: 0;
            font-size: 22px;
            color: var(--text-color);
            transition: color var(--transition-speed);
        }

        .ticket-info p {
            margin: 5px 0;
            font-size: 16px;
            color: var(--text-color);
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
            color: var(--icon-color);
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

        .nav-bar a:hover::before,
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

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
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
<div class="content slide-fade-in">

    <div class="header-container">
        <div class="search-container">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input type="text" id="searchInput" placeholder="Search events..." aria-label="Search events">
        </div>
    </div>

    <div class="content fade-in">
        <div class="ticket-container">
            <div id="no-results-message" style="display: none; color: var(--text-color); font-size: 18px; margin: 20px;">
                No events to show.
            </div>

            <!-- Row 1 -->
            <div class="ticket-row" data-title="SMT Concert">
                <img src="https://cloudfront-us-east-1.images.arcpublishing.com/deseretnews/BKO6CJTHPZEGNA72PGPDGDJ7P4.JPG" alt="SMT Concert">
                <div class="ticket-info">
                    <h3>SMT Concert</h3>
                    <p>SM Mall of Asia Arena | July 31, 2024 - 11:56 PM</p>
                    <p>test</p>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="ticket-row" data-title="Red Velvet FANCON TOUR">
                <img src="https://res.klook.com/image/upload/v1721016857/sdjmzwntf3xaphh0mfm0.jpg" alt="Red Velvet FANCON TOUR">
                <div class="ticket-info">
                    <h3>Red Velvet FANCON TOUR</h3>
                    <p>SM Mall of Asia Arena | Sept 14, 2024 - 6:00 PM</p>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="ticket-row" data-title="ITZY 2ND WORLD TOUR BORN TO BE">
                <img src="https://res.klook.com/image/upload/v1711524113/ix1lxctzmkm2bmrrv0ml.jpg" alt="ITZY 2ND WORLD TOUR BORN TO BE">
                <div class="ticket-info">
                    <h3>ITZY 2ND WORLD TOUR BORN TO BE</h3>
                    <p>Ur Mom's House | July 31, 2024 - 11:56 PM</p>
                </div>
            </div>
        </div>

        <div class="nav-container">
            <div class="nav-bar">
                <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" title="Home" aria-label="Home"><i class="fas fa-home"></i></a>
                <a href="tickets.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'tickets.php' ? 'active' : ''; ?>" title="Tickets" aria-label="Tickets"><i class="fas fa-ticket-alt"></i></a>
                <a href="activity.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'activity.php' ? 'active' : ''; ?>" title="Activity Page" aria-label="Activity Page"><i class="fas fa-chart-line"></i></a>
                <a href="profile.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>" title="Profile Page" aria-label="Profile Page"><i class="fas fa-user"></i></a>
            </div>
        </div>
    </div>

    <script>
        const toggleSwitch = document.getElementById('theme-toggle');
        const rootElement = document.documentElement;

        toggleSwitch.addEventListener('change', function() {
            if (toggleSwitch.checked) {
                rootElement.setAttribute('data-theme', 'light');
            } else {
                rootElement.removeAttribute('data-theme');
            }
        });

        document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const tickets = document.querySelectorAll('.ticket-row');
            const noResultsMessage = document.getElementById('no-results-message');
            let hasResults = false;

            tickets.forEach(ticket => {
                const title = ticket.getAttribute('data-title').toLowerCase();
                if (title.includes(query)) {
                    ticket.style.display = '';
                    hasResults = true;
                } else {
                    ticket.style.display = 'none';
                }
            });

            noResultsMessage.style.display = hasResults ? 'none' : 'block';
        });

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
