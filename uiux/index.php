<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trial Task | Home</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
:root {
    --background-color: rgba(255, 255, 255, 0.8);
    --text-color: black;
    --icon-color: black; /* Default icon color */
    --nav-bg-color: rgba(255, 255, 255, 0.9);
    --nav-hover-bg-color: rgba(0, 0, 0, 0.3);
    --nav-active-bg-color: rgba(0, 0, 0, 0.1);
    --transition-speed: 0.4s;
}

[data-theme="light"] {
    --background-color: rgba(0, 0, 0, 0.5);
    --text-color: white;
    --icon-color: white; /* Icon color for dark mode */
    --nav-bg-color: rgba(0, 0, 0, 0.7);
    --nav-hover-bg-color: rgba(255, 255, 255, 0.3);
    --nav-active-bg-color: rgba(255, 255, 255, 0.5);
}

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color var(--transition-speed), color var(--transition-speed);
        }

        .nav-container {
            background-image: url('https://images.unsplash.com/photo-1614332287897-cdc485fa562d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
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
            margin-bottom: 15px;
        }

        .nav-bar a {
    position: relative;
    color: var(--icon-color); /* Use icon color variable */
    text-decoration: none;
    font-size: 30px;
    padding: 9px;
    border-radius: 5px;
    transition: background-color var(--transition-speed), color var(--transition-speed);
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
            color: var(--icon-color); /* Ensure icon color remains consistent when active */
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

        .blur-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            backdrop-filter: blur(10px);
            z-index: 1000;
            animation: clearBlur 1s forwards;
        }

        @keyframes clearBlur {
            from {
                backdrop-filter: blur(10px);
            }
            to {
                backdrop-filter: blur(0);
                visibility: hidden; /* Hide after animation */
            }
        }
    </style>
</head>

<body>
    <div class="theme-switch">
        <input type="checkbox" id="theme-toggle">
        <label for="theme-toggle" class="slider"></label>
    </div>

    <div class="nav-container">
        <div class="nav-bar">
            <a href="index.php" title="Home" class="active"><i class="fas fa-home"></i></a>
            <a href="tickets.php" title="Tickets"><i class="fas fa-ticket-alt"></i></a>
            <a href="activity.php" title="Activity Page"><i class="fas fa-chart-line"></i></a>
            <a href="profile.php" title="Profile Page"><i class="fas fa-user"></i></a>
        </div>
    </div>

    <div class="blur-effect"></div>

    <script>
        // JavaScript for navigation and theme switch
        document.querySelectorAll('.nav-bar a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault(); 
                const href = this.getAttribute('href');
                document.body.classList.add('fade-out');
                setTimeout(() => {
                    window.location.href = href; 
                }, 300);
            });
        });

        const toggleSwitch = document.getElementById('theme-toggle');
        const rootElement = document.documentElement;

        // Function to set the theme
        function setTheme(theme) {
            if (theme === 'light') {
                rootElement.setAttribute('data-theme', 'light');
                toggleSwitch.checked = true;
            } else {
                rootElement.removeAttribute('data-theme');
                toggleSwitch.checked = false;
            }
        }

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            setTheme(savedTheme);
        }

        toggleSwitch.addEventListener('change', function() {
            if (toggleSwitch.checked) {
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
