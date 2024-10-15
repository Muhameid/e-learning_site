<?php require "includes/header.php"; ?>
<html>
    <style>

        .down-content {

            transition: transform 0.3s ease-in-out;
            /* Animation de transformation */
            padding: 20px;
        }

        /* .down-content img {
width: 35%;
height: 75px;
} */
        .down-content:hover {
            transform: translateY(-10px);
            /* Remonte vers le haut */

        }

        .down-content h4 {
            color: white;
            /* Couleur du texte par défaut */
        }

        .down-content:hover h4 {
            color: #ff7f00;
            /* Couleur du texte lors du survol */
        }

        .service-item .filled-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            border: 2px solid #fff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        /* Media queries pour une meilleure responsivité */
        @media (max-width: 768px) {
            .fun-facts .container {
                flex-direction: column;
                text-align: center;
            }

            .fun-facts .count-area-content,
            .fun-facts .left-content {
                width: 100%;
                margin-bottom: 20px;
            }

            .more-info-content {
                flex-direction: column;
                text-align: center;
            }

            .more-info .left-image img {
                width: 80%;
            }

            .more-info .right-content {
                width: 100%;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var menuItems = document.querySelectorAll('.hfe-has-submenu');

            menuItems.forEach(function (menuItem) {
                menuItem.addEventListener('mouseenter', function (event) {
                    this
                        .classList
                        .add('open');
                });
                menuItem.addEventListener('mouseleave', function (event) {
                    this
                        .classList
                        .remove('open');
                });
            });
        });
    </script>
    <head>
        <title>Accueil - BTS Mastery</title>
    </head>
    <body>
        <!-- Page Content -->
        <!-- Banner Starts Here -->
        <div class="main-banner header-text" id="top">
            <div class="Modern-Slider">
                <!-- Item -->
                <div class="item item-1">
                    <div class="img-fill">
                        <div class="text-content">
                            <h4>Bienvenue chez BTS Mastery</h4>
                            <p>Vous vous préparez pour votre BTS ? Un examen approche ? Vous avez besoin
                                d'exercices ou de solutions ? Ne cherchez pas plus loin, BTS Mastery est là pour
                                vous ! Nous proposons des cours complets, des supports d'étude, des examens
                                pratiques, et même une communauté dédiée sur Discord pour vous accompagner dans
                                votre parcours.</p>
                            <a href="register.php" class="filled-button">Je suis déterminé(e) à réussir mon BTS !</a>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-2">
                    <div class="img-fill">
                        <div class="text-content">
                            <h4>Rejoignez BTS Mastery dès aujourd'hui !</h4>
                            <p>Vous vous préparez pour votre BTS ? À la recherche d'exercices pratiques, de
                                tests ou de retours ? BTS Mastery vous offre tout ce qu'il vous faut : des
                                leçons approfondies, des guides d'étude, des exercices corrigés, des examens
                                blancs... De plus, vous aurez accès à une communauté exclusive sur Discord !</p>
                            <a href="register.php" class="filled-button">Inscrivez-vous maintenant</a>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-3">
                    <div class="img-fill">
                        <div class="text-content">


                            <h4>Rejoignez notre Discord - BTS Mastery</h4>
                            <p>Besoin de soutien supplémentaire pour votre préparation au BTS ? Rejoignez
                                notre communauté Discord pour vous connecter avec d'autres étudiants, poser des
                                questions, obtenir de l'aide avec vos exercices et rester motivé tout au long de
                                votre parcours. Notre Discord est l'endroit idéal pour partager des ressources,
                                discuter des dernières nouvelles du BTS et recevoir des conseils précieux de nos
                                mentors expérimentés.</p>
                            <a href="about.php" class="filled-button">Contactez-nous !</a>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
            </div>
        </div>
        <!-- Banner Ends Here -->

        <div class="request-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <h4>Vous avez une demande en ce moment ?</h4> <span>N'hésitez pas à nous contacter !</span>
                    </div>
                    <div class="col-md-4">
                        <a href="contact.php" class="border-button">Contactez nous !</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Ends Here -->
        <div style="background-color:#f9f9f9;">
            <div style="padding: 5%; margin-top: 1px;">
                <div class="services">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-heading">
                                <h2 style="font-weight: bold; font-size: 40px; color:#333333;"> Les forces de BTS </h2> <span style="color: #666666;">Maîtrise de BTS : Les forces</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service-item">
                                    <div
                                        class="down-content"
                                        style="border-radius: 5px; background-color:#ff7f00; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <img
                                            src="assets/images/bloc-student.png"
                                            alt=""
                                            style="width:35%; height:75px;">
                                        <br>
                                        <h4 style="color:white;">Forte demande sur le marché de l'emploi</h4> <a href="presentation-diplome.php#section1" class="filled-button">En savoir plus</a>






                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service-item">
                                    <div
                                        class="down-content"
                                        style="border-radius: 5px; background-color:#ff7f00; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <img
                                            src="assets/images/bloc1-student.png"
                                            alt=""
                                            style="width:35%; height:75px;">
                                        <br>
                                        <h4 style="color:white;">Formation professionnelle complète</h4> <a href="presentation-diplome.php#section2" class="filled-button">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service-item">
                                    <div
                                        class="down-content"
                                        style="border-radius: 5px; background-color:#ff7f00; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <img
                                            src="assets/images/bloc2-student.png"
                                            alt=""
                                            style="width:35%; height:75px;">
                                        <br>
                                        <h4 style="color:white;">De nombreuses opportunités professionnelles</h4> <a href="presentation-diplome.php#section3" class="filled-button">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="service-item">
                                    <div
                                        class="down-content"
                                        style="border-radius: 5px; background-color:#ff7f00; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <img
                                            src="assets/images/bloc3-student.png"
                                            alt=""
                                            style="width:35%; height:75px;">
                                        <br>
                                        <h4 style="color:white;">Opportunités d'avancement de carrière</h4> <a href="presentation-diplome.php#section4" class="filled-button">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fun-facts">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left-content">
                        <h2 style="font-weight: bold; font-size: 40px;">De nombreuses opportunités de carrière</h2>
                         <p>Le BTS (Brevet de Technicien Supérieur) est un diplôme Bac+2 qui ouvre la porte à une large gamme 
                            'opportunités professionnelles. Les diplômés peuvent rapidement trouver un emploi dans
                             des secteurs variés tels que l'industrie, le commerce et les technologies de l'information. 
                             De plus, nombreux sont ceux qui choisissent de poursuivre leurs études avec des licences professionnelles 
                             ou des écoles de commerce. De nombreux programmes BTS offrent une structure en alternance,
                              combinant études et expérience professionnelle rémunérée. Cette combinaison de formation pratique 
                              et théorique rend les diplômés très recherchés par les employeurs.
                               Choisissez votre BTS avec BTS Mastery et tracez votre chemin vers le succès !
                            </p> <a href="" class="filled-button">Lancez votre parcours BTS</a>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="count-area-content"> <div class="count-digit">8235</div> <div class="count-title">Étudiants accompagnés</div> </div>
                            </div>
                            <div class="col-md-6">
                            <div class="count-area-content"> <div class="count-digit">423</div> <div class="count-title">Écoles partenaires</div> </div>
                            </div>
                            <div class="col-md-6">
                            <div class="count-area-content"> <div class="count-digit">6</div> <div class="count-title">Matières à valider</div> </div>
                            </div>
                            <div class="col-md-6">
                                
<div class="count-area-content"> <div class="count-digit">10 000</div> <div class="count-title">Objectif d'étudiants diplômés d'ici l'été</div> </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="more-info" style="background-color: #f9f9f9;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="more-info-content" style="background-color: #f9f9f9;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="left-image">
                                        <img src="assets/images/stude.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <div class="right-content">
                                    <h2 style="font-weight: bold; font-size: 40px; color:#333333;">Obtenez votre BTS en moins de deux ans avec
                                         <span style="color: #005f99; font-size: 40px; font-weight: bold;">BTS Mastery !</span></h2> 
                                         <span>BTS Mastery : Vos atouts</span> <p style="color: #343a40;font-size: 15px;">
                                            Le BTS (Brevet de Technicien Supérieur) est un programme de formation professionnelle de niveau Bac+2 
                                            qui prépare les étudiants à entrer efficacement sur le marché du travail. Ce diplôme est reconnu pour
                                             fournir aux étudiants les compétences pratiques et théoriques nécessaires dans divers secteurs.
                                              BTS Mastery vous offre les outils pour exceller dans vos études.</p>
                                               <p style="color: #343a40;font-size: 15px;">Les étudiants en BTS développent des compétences polyvalentes 
                                                en commerce, communication et négociation, essentielles pour réussir dans leurs domaines respectifs. 
                                                Cette approche équilibrée de la formation les prépare à répondre aux diverses exigences des employeurs 
                                                tout en s'adaptant à un paysage professionnel en constante évolution.</p>
                                                <a href="presentation-diplome.php" class="filled-button">Commencer dès maintenant</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="testimonials"> -->
        <div class="testimonials" style="background-color: white; color: #333333;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="section-heading"> <h2 style="font-weight: bold; font-size: 40px; color:#333333;"> 
                        *Ce que nos étudiants disent </h2> <span>BTS Mastery : Avis des étudiants</span> </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-testimonials owl-carousel">
                            <div class="testimonial-item">
                                <div class="inner-content" style="background-color: #f9f9f9;">
                                    <img
                                        src="assets/images/guillemet-student.png"
                                        alt=""
                                        style="width:35%; height:75px;">
                                        <p>"J'ai choisi de suivre un BTS SAM pour acquérir des compétences en vente et en négociation,
                                             ainsi que pour apprendre à utiliser des outils de gestion de la relation client.
                                              Je suis très satisfait de ce programme, qui m'a permis de développer des compétences solides et polyvalentes."</p> 
                                              <h4>Kevin L.</h4> <span>Licence professionnelle en e-commerce</span> <img
                                        src="assets/images/smiling_man_1.png"
                                        alt=""
                                        style="width:35%; height:60px; border-radius:100%;">
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="inner-content" style="background-color: #f9f9f9;">
                                    <img
                                        src="assets/images/guillemet-student.png"
                                        alt=""
                                        style="width:35%; height:75px;">
                                        <p>"J'ai été étudiant dans le programme BTS NDRC et je suis vraiment satisfait de mon expérience. 
                                            Depuis le début de ce cours, j'ai beaucoup appris sur la vente, la négociation et les relations clients.
                                             J'ai également acquis des compétences dans l'utilisation des logiciels CRM et des outils de communication
                                              digitale."</p> <h4>Tenzai D.</h4> <span>MBA en Négociation</span>
                                    <img
                                        src="assets/images/smiling_man_2.png"
                                        alt=""
                                        style="width:35%; height:60px; border-radius:100%;">
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="inner-content" style="background-color: #f9f9f9;">
                                    <img
                                        src="assets/images/guillemet-student.png"
                                        alt=""
                                        style="width:35%; height:75px;">
                                        <p>"J'ai choisi de suivre un BTS SAM parce que je voulais travailler 
                                            dans la vente et les relations clients. 
                                            J'ai été agréablement surprise par la qualité de la formation.
                                             Le programme est complet et aide à développer des compétences solides en vente, 
                                             négociation et communication."</p> <h4>Mollie T.</h4> <span>Comptable en chef</span>
                                    <img
                                        src="assets/images/smiling_man_1.png"
                                        alt=""
                                        style="width:35%; height:60px; border-radius:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="assets/images/fleche.png" alt="" width="3%" style="margin-left:50%;">
    </div>
</div>
</div>

<!-- </body> -->

<!-- Footer Starts Here -->
<?php require "includes/footer.php"; ?>
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
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>