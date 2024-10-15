<?php require "includes/header.php"; ?>
<html>
<head>
        <title>Contact - BTS Mastery</title>
    </head>
<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->

    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contactez nous</h1>
                    <span>Envoyez nous un message et nous vous répondrons sous 48 heures. Vous
                        pouvez également nous contacter sur WhatsApp et Discord.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-information">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-item" style="background-color: #ddd; border-radius:5px;">
                    <img src="assets/images/discord.png" alt=""width="50px">
                    <br><br>
                        <h4>Discord</h4>
                        <p></p>
                        <a href="#">@</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-item" style="background-color: #ddd; border-radius:5px;">
                    <img src="assets/images/sociale.png" alt="" width="50px">
                    <br><br>
                        <h4>WhatsApp</h4>
                        <p></p>
                        <a href="#">06</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="callback-form contact-us" style="background-color: #ddd;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Formulaire de contact
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input
                                            name="name"
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="Qui envoie ce message"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input
                                            name="email"
                                            type="text"
                                            class="form-control"
                                            id="email"
                                            pattern="[^ @]*@[^ @]*"
                                            placeholder="Ton E-Mail"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input
                                            name="phone"
                                            type="tel"
                                            class="form-control"
                                            id="phone"
                                            placeholder="Ton téléphone (si tu veux être rappelé)"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea
                                            name="message"
                                            rows="6"
                                            class="form-control"
                                            id="message"
                                            placeholder="Ecris ta demande..."
                                            required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="filled-button">Envoyer</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    

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

</body>
</html>