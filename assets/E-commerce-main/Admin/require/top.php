<?php
    require('../utility/utility.php');
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://kit.fontawesome.com/1615ee01dc.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="floatwrap" id="floatwrap">
        <div class="cataddbox" id="cataddbox"></div>
    </div>
    <div class="floatwrap" id="floatwrap2">
        <div class="cataddbox" id="cataddboxsub"></div>
    </div>
    <div class="floatwrap global" id="globalfloatwrap">
        <div class="updatebalance" id="updatebalance">
            <div class="row">
                <h1>Current Balence:</h1>
                <h3>&#8377;1700</h3>
            </div>
            <div class="row2">
                <input type="number" placeholder="Enter Updated Balence" />
                <button class="add">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    Update

                </button>
            </div>
            <div class="row2">
                <button class="add" onclick="closebalance()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    Close

                </button>
            </div>
        </div>
        <div class="productview" id="productview"></div>
        <div class="productview" id="productviewapprove">
            <div class="row">
                <div class="left">
                    <div class="image">
                        <img src="assets/images/2.jpg" alt="" id="mi" />
                    </div>
                    <div class="imgrow">
                        <div class="imb" onclick="changeview('assets/images/1.jpg')">
                            <img src="assets/images/1.jpg" alt="" />
                        </div>
                        <div class="imb" onclick="changeview('assets/images/2.jpg')">
                            <img src="assets/images/2.jpg" alt="" />
                        </div>
                    </div>
                    <div class="namebox">
                        <h3>Product 1 electric kettle</h3>
                    </div>
                    <div class="namebox">
                        Electric | <span>brush</span>
                    </div>
                    <div class="namebox">
                        <span class="price">
                            Price:

                            <span class="tag">
                                &#8377;1700 |&nbsp;<em class="crs">&#8377;100</em>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="right">
                    <h3>Short Description:</h3>
                    <br />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reprehenderit mollitia possimus autem provident reiciendis
                    </p>
                    <br />
                    <h3>Description:</h3>
                    <br />
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa
                        labore officia explicabo ipsum? Animi ratione, velit in corrupti
                        quibusdam aperiam non rem, magnam optio quam iure, totam soluta
                        maxime placeat! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Culpa labore officia explicabo ipsum? Animi ratione, velit
                        in corrupti quibusdam aperiam non rem, magnam optio quam iure,
                        totam soluta maxime placeat!
                    </p>
                    <div class="stock">
                        <span>In Stock </span>
                    </div>
                    <div class="stock">
                        <span class="qty">Quantity: 80 pc. </span>
                    </div>
                    <div class="stock">
                        <span class="qty">
                            Added By: <span class="n">Admin</span>
                        </span>
                    </div>
                    <div class="stock">
                        <span class="qty">
                            Date: <span class="n">12/12/12</span>
                        </span>
                    </div>
                    <div class="btnrow">
                        <button class="adcatbtn" onclick="closeadctp()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Close

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainbody-wrapper">
        <div class="navigation">
            <div class="photo">
                <img src="assets/images/2.jpeg" alt="admin photo" />
            </div>
            <div class="top">
                <h2> Bienvenue</h2>
                <br />
                <h2>
                    <span>Admin</span>
                </h2>
            </div>
            <div class="menutittle">Menu</div>
            <ul>
                <a href="index.php">
                    <li>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        &nbsp;Tableau de bord
                    </li>
                </a>
                <a href="user.php">
                    <li>
                    <i class="fa fa-user" aria-hidden="true"></i>
                        &nbsp Administrateurs

                    </li>
                </a>
                
                <a href="seller.php">
                    <li>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        &nbsp;Utilisateurs

                    </li>
                    
                </a>
                <a href="adduser.php">
                    <li>
                        ->
                        &nbsp;Ajouter un  administrateur ou un utilisateur

                    </li>
                </a>
                
                <a href="categories.php">
                    <li>
                        <i class="fa fa-list" aria-hidden="true"></i>
                        &nbsp;Les Formations

                    </li>
                </a>
                <a href="ajouter_information.php">
                    <li>
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        &nbsp;Ajouter des informations sur une formation ( sur les épreuves et le stage)

                    </li>
    </a>
        
                <a href="sub-cat.php">
                    <li>
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                        &nbsp;Les Matiéres

                    </li>
                </a>
                <a href="add_section.php">
                    <li>
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                        &nbsp;Les sections

                    </li>
                </a>
                <a href="add_course.php">
                    <li>
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                        &nbsp;Les cours

                    </li>
                </a>
                    </ul>
        </div>
        <div class="workspace">
            <header>
            <button onclick="performLogout()">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="beige" width="15px" height="15px">
        <path d="M0 0h24v24H0z" fill="none" />
        <path
            d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z" />
    </svg>
    Déconnexion
</button>
<script>
    function performLogout() {
        // Effectuer ici les actions de déconnexion

        // Redirection vers la page de déconnexion (par exemple login.php)
        window.location.href = '../../../login.php';
    }
</script>

            </header>
            <?php


?>