<!--
PROGRAMMEURS :
    TOURARI Jérémy - LLEDO Elise - LIM Felix - CHARAFI Elias - NDOUDI Nimrod

Projet Scientifique et Technique 2A :
    GLOBALITY ESIEA

Suiveur :
    Mr BENALI
-->

<?php session_start(); ?>

<?php
    include '../src/database/database.php';
    include '../src/php/composantPage/header.php';
    include '../src/php/composantPage/includeCSS/indexCSS.php';
?>

<div class="connexionMenu">
    <div class="inputMenu">
        <h2 class="subtitle">Connexion</h2>
        <form method="post">
            <div class="inputBox">
                <input type="text" name="Lusername" id="Lusername"required>
                <label><i class="far fa-user"></i>Nom d'utilisateur</label>
            </div>
            <div class="inputBox">
                <input type="password" name="Lpassword" id="Lpassword" required>
                <label><i class="fas fa-key"></i>Mot de Passe</label>
            </div>
            <input class="btn" type="submit" name="formLogIn" id="formLogIn" value="CONNEXION">
        </form>
    </div>
</div>

<?php include '../src/php/include/LogIn/login.php' ?>

<script src="../src/js/dropdown.js" charset="utf-8"></script>
<div class="second-container">
    <button onclick="myFunction()" class="btn-registration">Inscription</button>
    <div id="newRegistration" class="registration-content">
        <form action="" method="post" id="subscribe">
            <div class="inputBox customSelect" style="width: 200px; margin-bottom: 30px; margin-left: -10px;">
                <select class="yearSelect" name="Syear" form="subscribe">
                    <option value="hide" selected>Année d'étude</option>
                    <option value="1">1er Année</option>
                    <option value="2">2e  Année</option>
                    <option value="3">3e  Année</option>
                    <option value="4">4e  Année</option>
                    <option value="5">5e  Année</option>
                    <option value="0">Professeur</option>
                </select>
            </div>

            <div class="inputBox customSelect" style="width: 200px; margin-bottom: 30px; margin-left: -10px;">
                <select class="yearSelect" name="Sclass" form="subscribe">
                    <option value="0" selected>Classe</option>

                    <option value="1">Classe 11</option>
                    <option value="2">Classe 12</option>
                    <option value="3">Classe 13</option>
                    <option value="4">Classe 14</option>
                    <option value="5">Classe 15</option>
                    
                    <option value="21">Classe 21</option>
                    <option value="22">Classe 22</option>
                    <option value="23">Classe 23</option>
                    <option value="24">Classe 24</option>
                    <option value="25">Classe 25</option>

                    <option value="31">Classe 31</option>
                    <option value="32">Classe 32</option>
                    <option value="33">Classe 33</option>
                    <option value="34">Classe 34</option>
                    <option value="35">Classe 35</option>

                    <option value="41">Classe 41</option>
                    <option value="42">Classe 42</option>
                    <option value="43">Classe 43</option>
                    <option value="44">Classe 44</option>
                    <option value="45">Classe 45</option>

                    <option value="51">Classe 51</option>
                    <option value="52">Classe 52</option>
                    <option value="53">Classe 53</option>
                    <option value="54">Classe 54</option>
                    <option value="55">Classe 55</option>

                    <option value="61">Classe 61</option>
                    <option value="62">Classe 62</option>
                    <option value="63">Classe 63</option>
                   

                </select>
            </div>

            

            <div class="inputBox">
                <input type="text" name="Susername" id="Susername" required>
                <label>Nom d'Utilisateur</label>
            </div>
           
            <div class="inputBox">
                <input type="text" name="Semail" id="Semail" required>
                <label>Mail</label>
            </div>
            <div class="inputBox">
                <input type="password" name="Spassword" id="Spassword" required>
                <label>Mot de passe</label>
            </div>
            <div class="inputBox">
                <input type="password" name="SCpassword" id="SCpassword" required>
                <label>Confirmer le MDP</label>
            </div>
            <input class="btn" name="formSignIn" id="formSignIn" type="submit" value="INSCRIPTION">
        </form>
    </div>
</div>

<?php include '../src/php/include/SignIn/signin.php' ?>

<h1 class="titleProject">GLOBALITY <blue>ESIEA</blue></h1>

<a href="#" class="linkPATH"><img src="../src/img/logo_GLOBALITY_ESIEA.png" alt="logo GLOBALITY" class="logo"></a>

<?php
    include '../src/php/composantPage/footer.php';
 ?>
