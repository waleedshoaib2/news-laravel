<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200&display=swap");

        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
            font-size: 14px;
            text-decoration: none;
            list-style: none;
            user-select: none;
        }

        body {
            background: linear-gradient(-30deg, #33ccff, #81d5ff, #ffccff, #81d5ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            left: 8%;
            bottom: 2%;
            width: 80px;
            height: 80px;
            background: linear-gradient(to top right,
                    rgba(255, 255, 255, 0.7),
                    rgba(255, 255, 255, 0.5));
            animation: zigzag2 3s linear infinite;
        }

        @keyframes zigzag2 {

            0%,
            100% {
                transform: translateX(50px);
            }

            50% {
                transform: translateX(100px) scale(0.8);
            }
        }

        body::after {
            content: "";
            position: absolute;
            left: 92%;
            top: 12%;
            z-index: -1;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.5);
            animation: zigzag 3s linear infinite;
        }

        @keyframes zigzag {

            0%,
            100% {
                transform: translateY(50px);
            }

            50% {
                transform: translateY(100px) scale(0.8);
            }
        }

        .container {
            width: 90%;
            height: 85vh;
            background: linear-gradient(to top right,
                    rgba(255, 255, 255, 0.5),
                    rgba(255, 255, 255, 0.3));
            backdrop-filter: blur(5px);
        }

        .container .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 25px;
            margin-top: 1em;
        }

        .container .navbar .logo {
            display: flex;
            align-items: center;
        }

        .container .navbar .logo img {
            animation: rotate 8s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(-360deg);
            }
        }

        .container .navbar .logo .logoname {
            font-size: 18px;
            text-transform: uppercase;
            margin-left: 0.5em;
            color: #000;
            text-shadow: 1px 1px 1px rgba(16, 16, 16, 0.1),
                1px 2px 1px rgba(16, 16, 16, 16, 0.2),
                1px 3px 1px rgba(16, 16, 16, 0.1), 1px 4px 1px rgba(16, 16, 16, 0.2),
                1px 5px 1px rgba(16, 16, 16, 0.1), 1px 6px 1px rgba(16, 16, 16, 0.2);
        }

        .searchbox {
            position: relative;
        }

        .searchbox input {
            padding: 8px 120px 8px 20px;
            border: none;
            outline: none;
            border-radius: 30px;
            transition: 0.3s;
        }

        .searchbox input:focus {
            padding: 8px 250px 8px 20px;
        }

        .searchbox .fa {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .container .navbar .navitem {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navitem .lang select {
            padding: 6px 30px;
            border: none;
            outline: none;
            border-radius: 6px;
            position: relative;
            right: 4em;
        }

        .navitem .icons {
            position: relative;
            right: 1em;
        }

        .navitem .icons ul li {
            position: relative;
            display: inline-block;
            font-size: 16px;
            margin: 0 12px;
        }

        .navitem .icons ul li .fa {
            padding: 5px;
            color: #fff;
            background: #000;
            border-radius: 50%;
            transition: 0.3s;
        }

        .navitem .icons ul li .fa:hover {
            transform: scale(1.2) rotate(360deg);
            color: #33cc33;
            background: transparent;
        }

        .navitem .account {
            position: relative;
            display: flex;
            align-items: center;
        }

        .navitem .account img {
            border-radius: 50%;
        }

        .navitem .account .name {
            text-transform: capitalize;
            margin: 0 8px;
            font-weight: 700;
        }

        .navitem .account .username {
            position: absolute;
            top: 18px;
            left: 32px;
            font-size: 12px;
            color: #000;
        }

        .container-body {
            display: grid;
            grid-template-columns: 18% auto;
        }

        .container-body .sidebar {
            margin: 20px 0 20px 20px;
            background: linear-gradient(to top right,
                    rgba(255, 255, 255, 0.4),
                    rgba(255, 255, 255, 0.3));
            border-radius: 14px;
            padding: 20px;
        }

        .container-body .sidebar ul li {
            padding: 10px 10px;
            margin: 12px 0;
        }

        .container-body .sidebar ul li:hover {
            background: #00004d;
            color: #fff;
            border-radius: 8px;
        }

        .container-body .sidebar ul li a {
            color: #000;
            text-transform: capitalize;
            font-weight: bolder;
            font-size: 18px;
        }

        .container-body .sidebar ul li:hover a {
            color: #fff;
        }

        .container-body .sidebar ul .dashboard {
            background: #00004d;
            color: #fff;
            border-radius: 8px;
            padding: 10px;
        }

        .container-body .sidebar ul .dashboard a {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="searchbox">
                <form action="">
                    <input type="text" placeholder="Search" />
                    <i class="fa fa-search"></i>
                </form>
            </div>

            <div class="navitem">
                <div class="icons">
                    <ul>
                        <li><i class="fa fa-envelope"></i></li>
                        <li><i class="fa fa-bell"></i></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-body">
            <div class="sidebar">
                <ul>
                    <li class="dashboard">
                        <i class="fa fa-dashcube"></i>
                        <a href="{{ route('category.mainpage') }}">Categories</a>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <a href="{{ route('dashboard') }}"> Articles</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="#">invoice</a>
                    </li>
                    <li>
                        <i class="fa fa-credit-card-alt"></i>
                        <a href="#">card</a>
                    </li>
                    <li>
                        <i class="fa fa-history"></i>
                        <a href="#">history</a>
                    </li>
                    <li>
                        <i class="fa fa-info-circle"></i>
                        <a href="#">details</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
