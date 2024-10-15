<?php require "includes/header.php"; ?>
<html>
<head>
        <title>Cours - BTS Mastery</title>
    </head>
<body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
<!-- Page Content -->
<!-- Banner Starts Here -->
<style>
    /* Style optionnel pour la mise en forme */
    .search-container {
        background-color: #f9f9f9;
        /* Fond gris-beige très clair */
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .search-input {
        padding: 8px;
        width: 400px;
        /* Ajustez la largeur de la barre de recherche selon vos besoins */
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .search-button {
        padding: 8px;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .search-button img {
        width: 24px;
        /* Ajustez la taille de l'icône de recherche selon vos besoins */
    }

    .ens {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        /* Fond gris-beige très clair */
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* 3 colonnes par ligne, ajuster selon besoin */
        gap: 20px;
    }

    .column {
        background-color: white;
        /* Fond blanc pour les colonnes */
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
        /* Animation de transformation */
    }

    .column:hover {
        transform: translateY(-5px);
        /* Déplacement vers le haut au survol */
    }

    .course {
        position: relative;
        overflow: hidden;
    }

    .course::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: -1;
        transition: transform 0.3s ease;
    }

    .course:hover::before {
        transform: scale(1.1);
        /* Zoom de l'image au survol */
    }

    .course h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .details {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 10px;
    }

    button {
        padding: 8px 16px;
        background-color: #ff7f00;
        color: white;
        border: none;
        border-radius: 5%;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    .course button:hover {
        background-color: #b67431;
    }

    .colored-numbers span {
        color: #ff7f00;
    }
</style>
<div class="ens">
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-left:100%;">
                    <h1>Les Cours</h1>
                    <span><a href="index.php">BTS Mastery</a> > BTS NDRC : Cours</span>
                </div>
            </div>
        </div>
    </div>

    <div class="search-container">
        <form action="/search" method="get">
            <input type="text" class="search-input" name="q" placeholder="Rechercher...">
            <button type="submit" class="search-button">
                <img src="assets/images/icon-recherche.png" alt="Rechercher">
            </button>
        </form>
    </div>

    <div class="container">
        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>


        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>


        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>


        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>



        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>


        <div class="column">
            <div class="course"  >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>


        <div class="column">
            <div class="course" >
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="course">
                <div class="colored-numbers">
                    <h2>Nom du cours</h2>
                    <p class="details"> <span>17 </span>Nombre de chapitres</p>
                    <button>En savoir plus</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>


<!-- Footer Starts Here -->



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>


<!-- <div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy;© 2023 BTS Mastery. Tous droits réservés.
                    <br>
                    <a rel="nofollow noopener" href="https://themewagon.com" target="_blank">View on Maps</a>
                </p>
            </div>
        </div>
    </div>
</div> -->
</body>

</html>