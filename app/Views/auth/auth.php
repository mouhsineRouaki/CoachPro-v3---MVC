<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup & Signin</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="container" id="container">

        <div class="forms-container">
            <div class="form-control signup-form">
                <form method="POST" action="../php/auth/authentificationSignUp.php">
                    <h2>Inscription</h2>

                    <input type="text" placeholder="Nom" name="nom">
                    <input type="text" placeholder="Prénom" name="prenom">
                    <input type="email" placeholder="Email" name="email">
                    <input type="text" placeholder="Téléphone" name="telephone">
                    <input type="url" placeholder="url image " name="urlImage">

                    <select name="role" required>
                        <option value="">-- Choisir rôle --</option>
                        <option value="coach">Coach</option>
                        <option value="sportif">Sportif</option>
                    </select>

                    <input type="password" placeholder="Mot de passe" name="password">
                    <input type="password" placeholder="Confirmer mot de passe">

                    <button name="sinscrire">S'inscrire</button>
                </form>
            </div>

            <div class="form-control signin-form">
                <form method="POST" action="../php/auth/authentificationSignIn.php">
                    <h2>Connexion</h2>

                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Mot de passe" name="password">

                    <button name="se_connecter">Se connecter</button>
                </form>
            </div>

        </div>

        <div class="intros-container">

            <div class="intro-control signin-intro">
                <div class="intro-control__inner">
                    <h2>Bienvenue</h2>
                    <p>Connectez-vous pour continuer.</p>
                    <button id="signup-btn">Créer un compte</button>
                </div>
            </div>

            <div class="intro-control signup-intro">
                <div class="intro-control__inner">
                    <h2>Rejoignez-nous</h2>
                    <p>Inscrivez-vous en tant que coach ou sportif.</p>
                    <button id="signin-btn">J'ai déjà un compte</button>
                </div>
            </div>

        </div>
    </div>

    <div id="toast" class="hidden fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        <p id="toastMessage"></p>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>