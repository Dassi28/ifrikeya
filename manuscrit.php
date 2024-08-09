<?php require_once('components/header.php'); ?>

<!-- Contact Start -->
<div class="container-fluid bg-light overflow-hidden px-lg-0" style="justify-content: center;">
    <div class="container contact px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-12 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 ps-lg-0">
                    <div class="section-title text-start">
                        <h1 class="display-5 mb-4" style="color:#1d2340;">Envoyez-nous votre manuscrit en un clic</h1>
                    </div>
                    <form method="POST" action="mail.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Prénom " name="lname"
                                        required>
                                    <label for="name">Prénom </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Nom" name="fname"
                                        required>
                                    <label for="email">Nom</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Pays" name="p"
                                        required>
                                    <label for="name">Pays</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Ville" name="v"
                                        required>
                                    <label for="email">Ville</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Téléphone" name="tel"
                                        required>
                                    <label for="name">Téléphone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="mail"
                                        required>
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Genre littéraire"
                                        name="g" required>
                                    <label for="name">Genre littéraire</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Titre de l’ouvrage"
                                        name="t" required>
                                    <label for="email">Titre de l’ouvrage</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="subject"
                                        placeholder="Déposer le manuscrit" name="subject" required>
                                    <label for="subject">Déposer le manuscrit</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Résumé du manuscrit" name="message"
                                        id="message" style="height: 100px" required></textarea>
                                    <label for="message">Résumé du manuscrit</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" name="submit"><b
                                        style="color:#f2e42a;">Soumettre</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php require_once('components/footer.php'); ?>