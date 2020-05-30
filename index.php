<?php
/**
 * Fichier index.php
 * Ce fichier sert de point d'entrée du site
 *
 * @project Nolark
 * @author  vircl
 */
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Nolark - Open your minds !</title>
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="assets/icons/style.css">
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="assets/js/app.js"></script>
    </head>
    <body>
        <!-- Entete du site -->
        <header>
            <!-- Navigation -->
            <nav class="navbar">
                <div class="logo">Nolark</div>
                <div class="icon icon-bars-solid" id="burger"></div>
                <div id="navbar-container" class="navbar-container">
                    <ul>
                        <li class="menu-item"> <a href="#">Accueil </a></li>
                        <li class="menu-item menu-item-active"> <a href="#">Nos casques</a>
                            <ul class="submenu">
                                <li> <a href="#">Route </a></li>
                                <li> <a href="#">Cross </a></li>
                                <li> <a href="#">Piste </a></li>
                                <li> <a href="#">Enfants </a></li>
                            </ul>
                        </li>
                        <li class="menu-item"> <a href="#">Contact</a> </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Contenu -->
        <main>
            <!-- header -->
            <section id="header-site">
                <div class="block-title">
                    <h1>Nolark</h1>
                    <h2>Open your minds !</h2>
                </div>
            </section>
            <!-- Contenu -->
            <section id="content" class="block-container">
                <div class="block-content container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h2> Pensez à rester en vie !</h2>
                            <p>
                                Au-delà de l'obligation légale, le port d'un casque est le garant de votre sécurité.
                                Le choix de votre casque doit se faire en fonction de vos besoins (route, cross, piste...).
                            </p>
                            <p>
                                Spécialiste reconnu dans l'univers de la sécurité du deux-roues, Nolark vous propose des milliers
                                de modèles de casques disponibles au travers de plus de 50 marques.
                                Vous trouverez ici tous les types de casques moto : jet, intégral, modulable, transformable,
                                piste, cross ou encore un large choix de casques moto enfant (taille et poids spécialement adaptés).
                            </p>
                            <p>
                                Nolark c'est également la disponibilité de toutes les couleurs et matières et ce, pour toutes les bourses.
                            </p>

                            <p>
                                Une question ? Un conseil ? Nos conseillers sont là pour vous aiguiller
                                afin de trouver le modèle qui correspond à vos besoins.
                            </p>

                            <p>
                                Nolark n'est pas seulement un magasin de casques, c'est avant tout une équipe
                                de passionnés qui sélectionnent pour vous les meilleurs casques moto afin de répondre au mieux à vos attentes.
                            </p>

                            <p>
                                <a href="#" class="btn btn-primary">Contactez-nous</a>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 bg-image-right">
                            <img src="../assets/images/moto.jpg" alt="Motard" />
                        </div>
                    </div>
                </div>
            </section>
            <!-- CTA -->
            <section id="cta" class="block-container">
                <div class="block-content container">
                    <h2>Une large gamme de casques pour tous les budgets !</h2>
                    <a href="#" class="btn btn-primary">Voir nos casques</a>
                </div>
            </section>
            <!-- Catégories populaires -->
            <section id="categories-populaires" class="block-container">
                <div class="block-content container">
                    <div class="block-title">
                        <h2> Les catégories les plus populaires </h2>
                        <h3> Des casques pour tous</h3>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4 categorie">
                            <img src="../assets/images/casques/route.jpg" alt="Image d'un casque représentant la catégorie route" />
                            <h4>Route</h4>
                        </div>
                        <div class="col-12 col-lg-4 categorie">
                            <img src="../assets/images/casques/cross.jpg" alt="Image d'un casque représentant la catégorie cross" />
                            <h4>Cross</h4>
                        </div>
                        <div class="col-12 col-lg-4 categorie">
                            <img src="../assets/images/casques/piste.jpg" alt="Image d'un casque représentant la catégorie piste" />
                            <h4>Piste</h4>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer -->
        <footer id="footer-site">
            <div class="container">
                <p>&copy Nolark - 2020</p>
            </div>
        </footer>
    </body>
</html>
