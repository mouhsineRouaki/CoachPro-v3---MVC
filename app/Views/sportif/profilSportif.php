<?php 
require "../../php/Sportif/functionSportif.php"; 
require "../../php/authentification/checkConnecter.php"; 
$user = getUtilisateur();
$sportif = getSportif();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
   <aside class="hidden sm:flex sm:flex-col w-20">
    <a href="#"
        class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
        <svg fill="none" viewBox="0 0 64 64" class="h-12 w-12">
            <title>Sport Platform</title>
            <path
                d="M32 14.2c-8 0-12.9 4-14.9 11.9 3-4 6.4-5.6 10.4-4.5 2.3.6 4 2.3 5.7 4 2.9 3 6.3 6.4 13.7 6.4 7.9 0 12.9-4 14.8-11.9-3 4-6.4 5.5-10.3 4.4-2.3-.5-4-2.2-5.7-4-3-3-6.3-6.3-13.7-6.3zM17.1 32C9.2 32 4.2 36 2.3 43.9c3-4 6.4-5.5 10.3-4.4 2.3.5 4 2.2 5.7 4 3 3 6.3 6.3 13.7 6.3 8 0 12.9-4 14.9-11.9-3 4-6.4 5.6-10.4 4.5-2.3-.6-4-2.3-5.7-4-2.9-3-6.3-6.4-13.7-6.4z"
                fill="#fff" />
        </svg>
    </a>
    <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
        <nav class="flex flex-col mx-4 my-6 space-y-4">
            <a href="./dashbordSportif.php" 
                class="inline-flex items-center justify-center py-3 rounded-lg">
                <span class="sr-only">Accueil</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
            <a href="./decouvrirCoach.php"
                class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 bg-white text-purple-600  rounded-lg">
                <span class="sr-only">Coachs</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </a>
            <a href="reservationSportif.php"
                class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                <span class="sr-only">Mes Réservations</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
            <a href="profilSportif.php"
                class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                <span class="sr-only">Mon Profil</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        </nav>
        <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
            <button
                class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
                <span class="sr-only">Paramètres</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31 2.37 2.37a1.724 1.724 0 002.572 1.065.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
        </div>
    </div>
  </aside>

  <div class="flex-1 flex flex-col">
    <header class="bg-purple-600 text-white h-20">
      <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold">Mon Profil</h1>
        <p class="text-sm opacity-90">Gérez vos informations personnelles et sportives</p>
      </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-10 w-full">
      <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex items-center space-x-6">
          <div class="relative">
            <img id="profileImage" src="<?= $sportif["sportif_img"] ?>" 
                 alt="Photo de profil" 
                 class="w-32 h-32 rounded-full object-cover border-4 border-purple-100">
            <button id="changePhotoBtn" class="absolute bottom-0 right-0 bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 transition">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
          <div>
            <h2 id="displayName" class="text-2xl font-bold text-gray-800"><?= $user['nom']; $user['prenom'] ?></h2>
            <p class="text-purple-600 font-semibold"><?= $user['role'];?>  Amateur</p>
            <p class="text-sm text-gray-500 mt-1">Membre depuis <?= $user['dateU'];?> </p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-gray-800">Informations Personnelles</h3>
          <button id="editPersonalBtn" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
            Modifier
          </button>
        </div>

        <form id="personalForm" class="space-y-4" method="POST" action="../../php/Sportif/modifierSportifInfo.php">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
              <input type="text" id="nom" name="nom" value="<?= $user["nom"] ?>" disabled
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
              <input type="text" id="prenom" name="prenom" value="<?= $user["prenom"] ?>" disabled
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" value="<?= $user["email"] ?>" disabled
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" value="<?= $user["telephone"] ?>" disabled
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
            <input type="text" id="role" name="url_image" value="<?= $sportif["sportif_img"] ?>" disabled
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100">
          </div>

          <div id="personalActions" class="hidden flex space-x-3">
            <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
              Enregistrer
            </button>
            <button type="button" id="cancelPersonalBtn" class="flex-1 px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition">
              Annuler
            </button>
          </div>
        </form>
      </div>

      <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-gray-800">Informations Sportives</h3>
          <button id="editSportBtn" class="px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
            Modifier
          </button>
        </div>

        <form id="sportForm" class="space-y-4" method="POST" action="../../php/Sportif/modificationSportifinfo2.php">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Niveau</label>
            <select id="niveau" disabled name="niveau" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100">
              <option value="Débutant">Débutant</option>
              <option value="Intermédiaire" selected>Intermédiaire</option>
              <option value="Avancé">Avancé</option>
              <option value="Expert">Expert</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Objectif</label>
            <textarea id="objectif" rows="4" disabled name="objectif" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 disabled:bg-gray-100"><?= $sportif["objectif"] ?></textarea>
          </div>

          <div id="sportActions" class="hidden flex space-x-3">
            <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
              Enregistrer
            </button>
            <button type="button" id="cancelSportBtn" class="flex-1 px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition">
              Annuler
            </button>
          </div>
        </form>
      </div>
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Sécurité</h3>
        
        <button id="changePasswordBtn" class="w-full md:w-auto px-6 py-2 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
          Changer le mot de passe
        </button>
      </div>
    </main>

    <footer class="bg-gray-900 text-white py-6 mt-10">
      <div class="max-w-6xl mx-auto px-4 text-center text-sm">
        © 2025 Plateforme Coach & Sportif — Tous droits réservés
      </div>
    </footer>
  </div>
</div>

<div id="passwordModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 p-6">
    <div class="flex items-center justify-between mb-6">
      <h3 class="text-xl font-bold text-gray-800">Changer le mot de passe</h3>
      <button id="closePasswordModal" class="text-gray-500 hover:text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <form id="passwordForm" class="space-y-4" method="POST" action="../../php/Sportif/modifierMotPassSportif.php">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe actuel</label>
        <input type="password" id="currentPassword" name="currentPassword" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot de passe</label>
        <input type="password" id="newPassword" name="newPassword" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmer le nouveau mot de passe</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
      </div>

      <div class="flex space-x-3 pt-4">
        <button type="submit" class="flex-1 px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
          Enregistrer
        </button>
        <button type="button" id="cancelPasswordBtn" class="flex-1 px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition">
          Annuler
        </button>
      </div>
    </form>
  </div>
</div>

<div id="toast" class="hidden fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center space-x-3">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
  </svg>
  <span id="toastMessage">Modifications enregistrées avec succès!</span>
</div>

<script>
/* =======================
   TOAST
======================= */
function showToast(message) {
  const toast = document.getElementById('toast');
  const toastMessage = document.getElementById('toastMessage');
  toastMessage.textContent = message;
  toast.classList.remove('hidden');

  setTimeout(() => {
    toast.classList.add('hidden');
  }, 3000);
}

/* =======================
   INFORMATIONS PERSONNELLES
======================= */
const editPersonalBtn = document.getElementById('editPersonalBtn');
const cancelPersonalBtn = document.getElementById('cancelPersonalBtn');
const personalActions = document.getElementById('personalActions');

const personalInputs = document.querySelectorAll(
  '#personalForm input'
);

editPersonalBtn.addEventListener('click', () => {
  personalInputs.forEach(input => input.disabled = false);
  editPersonalBtn.classList.add('hidden');
  personalActions.classList.remove('hidden');
});

cancelPersonalBtn.addEventListener('click', () => {
  personalInputs.forEach(input => input.disabled = true);
  editPersonalBtn.classList.remove('hidden');
  personalActions.classList.add('hidden');
});

/* =======================
   INFORMATIONS SPORTIVES
======================= */
const editSportBtn = document.getElementById('editSportBtn');
const cancelSportBtn = document.getElementById('cancelSportBtn');
const sportActions = document.getElementById('sportActions');

const sportInputs = document.querySelectorAll(
  '#sportForm select, #sportForm textarea'
);

editSportBtn.addEventListener('click', () => {
  sportInputs.forEach(input => input.disabled = false);
  editSportBtn.classList.add('hidden');
  sportActions.classList.remove('hidden');
});

cancelSportBtn.addEventListener('click', () => {
  sportInputs.forEach(input => input.disabled = true);
  editSportBtn.classList.remove('hidden');
  sportActions.classList.add('hidden');
});

/* =======================
   MODAL MOT DE PASSE
======================= */
const passwordModal = document.getElementById('passwordModal');
const changePasswordBtn = document.getElementById('changePasswordBtn');
const closePasswordModal = document.getElementById('closePasswordModal');
const cancelPasswordBtn = document.getElementById('cancelPasswordBtn');

changePasswordBtn.addEventListener('click', () => {
  passwordModal.classList.remove('hidden');
});

closePasswordModal.addEventListener('click', () => {
  passwordModal.classList.add('hidden');
});

cancelPasswordBtn.addEventListener('click', () => {
  passwordModal.classList.add('hidden');
});
</script>


</body>
</html>
