<a href="#" class="nav__trigger"><span class="nav__icon"></span></a>
<nav class="navbar">

    <div class="navbarLogo">
        <a href="../index.php"><img src="../img/logoW.png" alt="Alternative texte de l'image" /></a>
    </div>
    <div class="navbarElements" id="navbarElements">
        <ul class="navbarListe">
            <!--            <li><a href="default.asp" class="navbarLinks">Accueil</a></li>-->
            <li><a href="../travaux.php" class="navbarLinks"><?php echo $lang['work']; ?></a></li>
            <li><a href="../contact.php" class="navbarLinks"><?php echo $lang['contact']; ?></a></li>
            <li><a href="../Book-Thomas-Werkmeister-2016.pdf" target="_blank" class="navbarLinks">Book</a></li>
        </ul>
                <ul class="navbarFlags">
            <li class="flag" id="fr">
                <a href="?lang=fr" value="fr">FR</a></li>
<!--
            <li class="flag" id="en">
                <a href="?lang=en" value="en">en</a></li>
-->
            <li class="flag" id="de">
                <a href="?lang=de" value="de">DE</a></li>
        </ul>
        <ul class="resume">
            <li class="resume-fr"><a href="../CV-Thomas-Werkmeister.pdf" target="_blank">mon CV</a></li>
            <li class="resume-de"><a href="../lebensaulfthomaswerkmeister.pdf" target="_blank">Lebenslauf</a></li>
        </ul>
    </div>
</nav>
<section class="container">
    <span class="icon-menu"></span>
</section>


<?php include_once("../include/analyticstracking.php") ?>