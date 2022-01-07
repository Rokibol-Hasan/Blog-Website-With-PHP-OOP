<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>My Blog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        a {
            text-decoration: none;
            color: lightseagreen;
        }

        .post-body {
            margin-top: 20px;
        }

        nav ul {
            /* overflow: hidden; */
            list-style: none;
            display: flex;
            margin-left: auto;
            ;
        }

        .header .px-2 {
            color: white;
        }


        .blog-post ul {
            list-style: none;
            display: flex;
            padding: 0px !important;
        }

        .header {
            background-color: lightseagreen;
        }

        .blog-footer {
            background-color: lightseagreen;
            color: white;
        }

        .blog-footer a {
            color: white;
        }

        .header img {
            width: 100%;
            height: 90px;
        }

        .position-sticky.card.p-2 {
            margin: 0px !important;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/blog.css" rel="stylesheet">
</head>

<body>
    <section class="header">
        <div class="container-fluid">
            <div class="blog-header">
                <div class="container">
                    <div class="nav-scroller">
                        <nav class="nav navbar">
                            <a class="navbar-brand" href="#">
                                <img src="admin/upload/logo.png" alt="..." height="36">
                            </a>
                            <ul class="">
                                <li><a class="px-2" href="index.php">Home</a></li>
                                <li><a class="px-2" href="index.php">About Us</a></li>
                                <li><a class="px-2" href="index.php">Contact</a></li>
                                <li><a class="px-2" href="register.php">Register</a></li>
                                <li><a class="px-2" href="login.php">login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>