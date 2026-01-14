<?php 
session_start();
require "../../classeses/coach.php";

$userConnected = Utilisateur::getUserConnected();
$coachConnected = Coach::getConnectedCoach();
$coach = new Coach($userConnected,$coachConnected);
$nextSession = $coach->getNextSportifSeance();
$history = $coach->getHistoriqueReservation();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Coach - Plateforme Sportive</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.12/tailwind-experimental.min.css'>
</head>

<body>
  <div class="flex bg-gray-100 min-h-screen">
    <aside class="hidden sm:flex sm:flex-col">
      <a href="#"
        class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
        <svg fill="none" viewBox="0 0 64 64" class="h-12 w-12">
          <title>Sport Coach Platform</title>
          <path
            d="M32 14.2c-8 0-12.9 4-14.9 11.9 3-4 6.4-5.6 10.4-4.5 2.3.6 4 2.3 5.7 4 2.9 3 6.3 6.4 13.7 6.4 7.9 0 12.9-4 14.8-11.9-3 4-6.4 5.5-10.3 4.4-2.3-.5-4-2.2-5.7-4-3-3-6.3-6.3-13.7-6.3zM17.1 32C9.2 32 4.2 36 2.3 43.9c3-4 6.4-5.5 10.3-4.4 2.3.5 4 2.2 5.7 4 3 3 6.3 6.3 13.7 6.3 8 0 12.9-4 14.9-11.9-3 4-6.4 5.6-10.4 4.5-2.3-.6-4-2.3-5.7-4-2.9-3-6.3-6.4-13.7-6.4z"
            fill="#fff" />
        </svg>
      </a>
      <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
        <nav class="flex flex-col mx-4 my-6 space-y-4">
          <a href="./dashbordCoach.php"
            class="inline-flex items-center justify-center py-3 text-purple-600 bg-white rounded-lg">
            <span class="sr-only">Dashboard</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </a>
          <a href="./reservationCoach.php"
            class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
            <span class="sr-only">Réservations</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </a>
          <a href="./disponibilityCoach.php"
            class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
            <span class="sr-only">Disponibilités</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </a>
          <a href="./profilCoach.php"
            class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
            <span class="sr-only">Mon Profil</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </a>
        </nav>
        <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
          <button class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
            <span class="sr-only">Paramètres</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </button>
        </div>
      </div>
    </aside>

    <div class="flex-grow text-gray-800">
      <header class="flex items-center h-20 px-6 sm:px-10 bg-white">
        <button
          class="block sm:hidden relative flex-shrink-0 p-2 mr-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 focus:bg-gray-100 focus:text-gray-800 rounded-full">
          <span class="sr-only">Menu</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>

        <div class="flex flex-shrink-0 items-center ml-auto">
          <button class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">
            <span class="sr-only">Menu Utilisateur</span>
            <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
              <span class="font-semibold"><?= $userConnected["nom"] ?> <?= $userConnected["prenom"] ?></span>
              <span class="text-sm text-gray-600"><?= $userConnected["role"] ?> Professionnel</span>
            </div>
            <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 bg-gray-100 rounded-full overflow-hidden">
              <img src="<?= $userConnected["img_utilisateur"] ?>" alt="photo de profil" class="h-full w-full object-cover">
            </span>
            <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
              class="hidden sm:block h-6 w-6 text-gray-300">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
          </button>
          <div class="border-l pl-3 ml-3 space-x-1">
            <button
              class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
              <span class="sr-only">Notifications</span>
              <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full"></span>
              <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full animate-ping"></span>
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button>
            <button
              class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
              <a href="../../php/authentification/deconexion.php">
                <span class="sr-only">Déconnexion</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
              </a>
            </button>
          </div>
        </div>
      </header>

      <main class="p-6 sm:p-10 space-y-6">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
          <div class="mr-6">
            <h1 class="text-4xl font-semibold mb-2">Tableau de Bord Coach</h1>
            <h2 class="text-gray-600 ml-0.5">Gérez vos séances, disponibilités et profil professionnel</h2>
          </div>

        </div>

        <!-- Statistiques Principales -->
        <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
          <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
              class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-yellow-600 bg-yellow-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <span class="block text-2xl font-bold"><?= $coach->getNombreReservationByStatus("en_attente") ?></span>
              <span class="block text-gray-500">Demandes en attente</span>
            </div>
          </div>

          <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
              class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <span class="block text-2xl font-bold"><?= $coach->getNombreReservationByStatus("confirmee") ?></span>
              <span class="block text-gray-500">demande confirme </span>
            </div>
          </div>

          <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
              class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <span class="block text-2xl font-bold"><?= $coach->getNombreReservationByStatus("annulee") ?></span>
              <span class="block text-gray-500">dommande refuser </span>
            </div>
          </div>

          <div class="flex items-center p-8 bg-white shadow rounded-lg">
            <div
              class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
              <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div>
              <span class="block text-2xl font-bold"><?= $coach->getNombreReservationByStatus("annulee") ?></span>
              <span class="block text-gray-500">Total seance confirme</span>
            </div>
          </div>
        </section>

        <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
          <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
            <div class="px-6 py-5 font-semibold border-b border-gray-100">Prochaine Séance</div>
            <div class="p-6 flex-grow">
              <?php if ($nextSession): ?>
                <div class="flex items-center mb-4">
                  <div class="h-16 w-16 mr-4 bg-gray-100 rounded-full overflow-hidden">
                    <img src="<?= $nextSession['img_utilisateur'] ?>" alt="Sportif">
                  </div>
                  <div class="flex-grow">
                    <h3><?= $nextSession['prenom'] . ' ' . $nextSession['nom'] ?></h3>
                    <p><?= $nextSession['nom_sport'] ?></p>
                  </div>
                </div>
                <div class="space-y-3">
                  <div class="flex items-center text-gray-700">
                    <svg class="h-5 w-5 mr-3 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span><?= $nextSession['date_seance'] ?></span>
                  </div>
                  <div class="flex items-center text-gray-700">
                    <svg class="h-5 w-5 mr-3 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><?= $nextSession['heure_debut'] ?> - <?= $nextSession['heure_fin'] ?></span>
                  </div>
                  <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                    <p class="m-auto text-sm text-gray-600"><strong>Note:</strong> Premier cours avec ce sportif.
                      Évaluation physique initiale prévue.</p>
                  </div>
                </div>
              <?php else: ?>
                <p class="m-auto">Aucune séance programmée</p>
              <?php endif; ?>

            </div>
          </div>
        </section>


        <section class="bg-white shadow rounded-lg p-6">
          <h3 class="text-xl font-semibold mb-4">Historique des Séances Récentes</h3>
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sportif</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Discipline</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Horaire</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($history as $row){ ?>
                  <tr>
                    <td><?= $row['prenom'] . ' ' . $row['nom'] ?></td>
                    <td><?= $row['nom_sport'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['heure_debut'] . ' - ' . $row['heure_fin'] ?></td>
                    <td><?= ucfirst($row['status']) ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>
  <!-- Modal Overlay -->
  <div id="modal-overlay"
    class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center hidden">
    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 relative">
      <h2 class="text-xl font-semibold mb-4">Modifier Coach</h2>
      <form id="coach-form" class="space-y-4">
        <div>
          <label class="block text-gray-700">Nom:</label>
          <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nom du coach">
        </div>
        <div>
          <label class="block text-gray-700">Discipline:</label>
          <input type="text" class="w-full border rounded px-3 py-2" placeholder="Discipline">
        </div>
        <div>
          <label class="block text-gray-700">Email:</label>
          <input type="email" class="w-full border rounded px-3 py-2" placeholder="Email">
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" id="close-modal"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
          <button type="submit"
            class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Enregistrer</button>
        </div>
      </form>
      <button id="close-x" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">&times;</button>
    </div>
  </div>

  <script>
    const modal = document.getElementById('modal-overlay');
    const openModal = () => modal.classList.remove('hidden');
    const closeModal = () => modal.classList.add('hidden');
    const btnModifierProfil = document.getElementById("btnModifierProfil");


    document.getElementById('close-modal').addEventListener('click', closeModal);
    document.getElementById('close-x').addEventListener('click', closeModal);

  </script>


</body>

</html>