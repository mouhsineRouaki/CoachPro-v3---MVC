<?php
require_once "../../php/Sportif/functionSportif.php";
require "../../php/authentification/checkConnecter.php"; 

$user = getUtilisateur();
$confirmeProchineSeance = confirmeProchaineSeance();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Sportif - Plateforme Sportive<?= $_SESSION["role"] ?></title>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.12/tailwind-experimental.min.css'>
    <style>
        .page {
            display: none;
        }

        .page.active {
            display: block;
        }
    </style>
</head>

<body class="flex bg-gray-100 min-h-screen">
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

    <div class="flex-grow text-gray-800">
        <header class="flex items-center h-20 px-6 sm:px-10 bg-white">
            <button
                class="block sm:hidden relative flex-shrink-0 p-2 mr-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 focus:bg-gray-100 focus:text-gray-800 rounded-full">
                <span class="sr-only">Menu</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="relative w-full max-w-md sm:-ml-2">
                <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute h-6 w-6 mt-2.5 ml-2 text-gray-400">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
                <input type="text" role="search" placeholder="Rechercher un coach..."
                    class="py-2 pl-10 pr-4 w-full border-4 border-transparent placeholder-gray-400 focus:bg-gray-50 rounded-lg" />
            </div>
            <div class="flex flex-shrink-0 items-center ml-auto">
                <button class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">
                    <span class="sr-only">Menu Utilisateur</span>
                    <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                        <span class="font-semibold"><?= $user["nom"]; $user["prenom"]    ?></span>
                        <span class="text-sm text-gray-600"><?= $user["date_creation"];    ?></span>
                    </div>
                    <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 bg-gray-100 rounded-full overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                            alt="photo de profil" class="h-full w-full object-cover">
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
                        <span
                            class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full animate-ping"></span>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <button
                        class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                        <a href="../../php/authentification/deconexion.php"><span class="sr-only">Déconnexion</span></a>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- PAGE ACCUEIL -->
        <main id="home" class="page active p-6 sm:p-10 space-y-6">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    <h1 class="text-4xl font-semibold mb-2">Bienvenue <?= $user["prenom"]    ?></h1>
                    <h2 class="text-gray-600 ml-0.5">Trouvez votre coach idéal et réservez vos séances sportives</h2>
                </div>
                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <button onclick="showPage('coachs')"
                        class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md mb-3">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Découvrir les coachs
                    </button>
                </div>
            </div>

            <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold"><?php echo getNombreTotalCoach()?></span>
                        <span class="block text-gray-500">Coachs disponibles</span>
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
                        <span class="block text-2xl font-bold"><?= getNombreReservationsByStatus("confirmee")?></span>
                        <span class="block text-gray-500">Séances confirmées</span>
                    </div>
                </div>

                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-yellow-600 bg-yellow-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold"><?php echo getNombreReservationsByStatus("en_attente")?></span>
                        <span class="block text-gray-500">En attente</span>
                    </div>
                </div>

                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold"><?php echo getNombreReservationsByStatus("terminee")?></span>
                        <span class="block text-gray-500">Séances terminées</span>
                    </div>
                </div>
            </section>

            <section class="grid md:grid-cols-2 gap-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">Prochaine Séance</h3>
                    <?php if($confirmeProchineSeance){?>
                    <div class="flex items-center mb-4">
                        <div class="h-16 w-16 mr-4 bg-gray-100 rounded-full overflow-hidden">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                alt="Coach">
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-lg font-semibold">Mohamed Coach</h4>
                            <p class="text-gray-600">Coach Professionnel</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-700">
                            <svg class="h-5 w-5 mr-3 text-purple-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span>Préparation Physique</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="h-5 w-5 mr-3 text-purple-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Demain, 18 Décembre 2024</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="h-5 w-5 mr-3 text-purple-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>10:00 - 11:30</span>
                        </div>
                    </div>
                    <button class="mt-4 w-full px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">Voir
                        les détails</button>
                        <?php }else{?>
                    <div class=" items-center mb-4">
                        <span>aucun Prochaine seance </span>
                    </div>
                    <?php }?>
                </div>
                

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">Disciplines Populaires</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                    ⚽</div>
                                <span class="font-semibold">Football</span>
                            </div>
                            <span class="text-sm text-gray-600"><?php echo getNombreCoachParSport("Football")?> coachs</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                    🎾</div>
                                <span class="font-semibold">Tennis</span>
                            </div>
                            <span class="text-sm text-gray-600"><?php echo getNombreCoachParSport("Tennis")?> coachs</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                    🏊</div>
                                <span class="font-semibold">Natation</span>
                            </div>
                            <span class="text-sm text-gray-600"><?php echo getNombreCoachParSport("Natation")?> coachs</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold mr-3"></div>
                                <span class="font-semibold">Fitness</span>
                            </div>
                            <span class="text-sm text-gray-600"><?php echo getNombreCoachParSport("Fitness")?> coachs</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <main id="coachs" class="page p-6 sm:p-10 space-y-6">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    <h1 class="text-4xl font-semibold mb-2">Nos Coachs Professionnels</h1>
                    <h2 class="text-gray-600 ml-0.5">Découvrez les meilleurs coachs sportifs et réservez votre séance
                    </h2>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h3 class="font-semibold mb-4">Filtrer par discipline</h3>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-purple-600 text-white rounded-full text-sm">Tous</button>
                    <button
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm hover:bg-gray-300">Football</button>
                    <button
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm hover:bg-gray-300">Tennis</button>
                    <button
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm hover:bg-gray-300">Natation</button>
                    <button
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm hover:bg-gray-300">Athlétisme</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm hover:bg-gray-300">Sports de
                        Combat</button>
                    <button
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm hover:bg-gray-300">Préparation
                        Physique</button>
                </div>
            </div>

            <section class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-20 w-20 mr-4 bg-gray-100 rounded-full overflow-hidden">
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                    alt="Coach">
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-xl font-semibold">Mohamed Alami</h3>
                                <p class="text-gray-600">Coach Professionnel</p>
                                <div class="flex items-center mt-1">
                                    <span class="text-yellow-500">★★★★★</span>
                                    <span class="text-sm text-gray-600 ml-2">(45 avis)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Coach sportif passionné avec 12 ans d'expérience en
                            préparation physique et football.</p>
                        <div class="mb-4">
                            <h4 class="font-semibold text-sm mb-2">Disciplines:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">Football</span>
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">Préparation
                                    Physique</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600"><strong>Expérience:</strong> 12 ans</p>
                            <p class="text-sm text-gray-600"><strong>Niveau:</strong> Professionnel</p>
                        </div>
                        <button onclick="showCoachDetail(1)"
                            class="w-full px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">Voir le
                            profil</button>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-20 w-20 mr-4 bg-gray-100 rounded-full overflow-hidden">
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                    alt="Coach">
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-xl font-semibold">Sara Bennani</h3>
                                <p class="text-gray-600">Coach Expert</p>
                                <div class="flex items-center mt-1">
                                    <span class="text-yellow-500">★★★★☆</span>
                                    <span class="text-sm text-gray-600 ml-2">(32 avis)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Spécialiste en tennis et coaching personnalisé. Ancienne
                            joueuse professionnelle.</p>
                        <div class="mb-4">
                            <h4 class="font-semibold text-sm mb-2">Disciplines:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">Tennis</span>
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">Préparation
                                    Physique</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600"><strong>Expérience:</strong> 8 ans</p>
                            <p class="text-sm text-gray-600"><strong>Niveau:</strong> Expert</p>
                        </div>
                        <button onclick="showCoachDetail(2)"
                            class="w-full px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">Voir le
                            profil</button>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-20 w-20 mr-4 bg-gray-100 rounded-full overflow-hidden">
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                    alt="Coach">
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-xl font-semibold">Youssef Tazi</h3>
                                <p class="text-gray-600">Coach Professionnel</p>
                                <div class="flex items-center mt-1">
                                    <span class="text-yellow-500">★★★★★</span>
                                    <span class="text-sm text-gray-600 ml-2">(58 avis)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Expert en natation et sports aquatiques. Ancien champion
                            national.</p>
                        <div class="mb-4">
                            <h4 class="font-semibold text-sm mb-2">Disciplines:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Natation</span>
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">Athlétisme</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600"><strong>Expérience:</strong> 15 ans</p>
                            <p class="text-sm text-gray-600"><strong>Niveau:</strong> Professionnel</p>
                        </div>
                        <button onclick="showCoachDetail(3)"
                            class="w-full px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">Voir le
                            profil</button>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="h-20 w-20 mr-4 bg-gray-100 rounded-full overflow-hidden">
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                    alt="Coach">
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-xl font-semibold">Imane Zahraoui</h3>
                                <p class="text-gray-600">Coach Expert</p>
                                <div class="flex items-center mt-1">
                                    <span class="text-yellow-500">★★★★☆</span>
                                    <span class="text-sm text-gray-600 ml-2">(28 avis)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Spécialiste en sports de combat et self-défense. Ceinture
                            noire Karaté.</p>
                        <div class="mb-4">
                            <h4 class="font-semibold text-sm mb-2">Disciplines:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Sports de
                                    Combat</span>
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">Préparation
                                    Physique</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600"><strong>Expérience:</strong> 10 ans</p>
                            <p class="text-sm text-gray-600"><strong>Niveau:</strong> Expert</p>
                        </div>
                        <button onclick="showCoachDetail(4)"
                            class="w-full px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">Voir le
                            profil</button>
                    </div>
                </div>
            </section>
        </main>

        <!-- PAGE DETAILS COACH -->
        <main id="coach-detail" class="page p-6 sm:p-10 space-y-6">
            <button onclick="showPage('coachs')"
                class="inline-flex items-center text-purple-600 hover:text-purple-700 mb-4">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour aux coachs
            </button>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row items-start mb-6">
                        <div class="h-32 w-32 mr-6 bg-gray-100 rounded-full overflow-hidden mb-4 md:mb-0">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                alt="Coach">
                        </div>
                        <div class="flex-grow">
                            <h1 class="text-3xl font-semibold mb-2">Mohamed Alami</h1>
                            <p class="text-gray-600 text-lg mb-2">Coach Professionnel</p>
                            <div class="flex items-center mb-4">
                                <span class="text-yellow-500 text-xl">★★★★★</span>
                                <span class="text-gray-600 ml-2">(45 avis)</span>
                            </div>
                            <div class="flex items-center text-gray-600 mb-2">
                                <svg class="h-5 w-5 mr-2 text-purple-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>12 ans d'expérience</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="h-5 w-5 mr-2 text-purple-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Casablanca, Maroc</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-3">À propos</h3>
                            <p class="text-gray-600">Coach sportif passionné avec plus de 12 ans d'expérience dans le
                                coaching professionnel. Spécialisé dans la préparation physique et le football,
                                j'accompagne mes clients vers l'atteinte de leurs objectifs sportifs avec des programmes
                                personnalisés et adaptés à chaque niveau.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold mb-3">Mes Disciplines</h3>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-2 bg-purple-100 text-purple-700 rounded-full">Football</span>
                                <span class="px-3 py-2 bg-orange-100 text-orange-700 rounded-full">Préparation
                                    Physique</span>
                                <span class="px-3 py-2 bg-blue-100 text-blue-700 rounded-full">Athlétisme</span>
                            </div>

                            <h3 class="text-xl font-semibold mb-3 mt-4">Certifications</h3>
                            <ul class="space-y-2">
                                <li class="flex items-center text-gray-600">
                                    <svg class="h-5 w-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    BPJEPS (2018)
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="h-5 w-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    CQP ALS (2020)
                                </li>
                                <li class="flex items-center text-gray-600">
                                    <svg class="h-5 w-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Diplôme d'État DEJEPS (2022)
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-4">Disponibilités</h3>
                        <div class="grid grid-cols-7 gap-4">
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Lun</p>
                                <div class="space-y-2">
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        08:00-10:00</div>
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        14:00-18:00</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Mar</p>
                                <div class="space-y-2">
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        09:00-12:00</div>
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        15:00-19:00</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Mer</p>
                                <div class="space-y-2">
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        08:00-11:00</div>
                                    <div class="p-2 bg-gray-200 text-gray-500 text-xs rounded">14:00-16:00 Complet</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Jeu</p>
                                <div class="space-y-2">
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        10:00-13:00</div>
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        16:00-20:00</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Ven</p>
                                <div class="space-y-2">
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        08:00-12:00</div>
                                    <div class="p-2 bg-gray-200 text-gray-500 text-xs rounded">14:00-18:00 Complet</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Sam</p>
                                <div class="space-y-2">
                                    <div
                                        class="p-2 bg-green-100 text-green-700 text-xs rounded cursor-pointer hover:bg-green-200">
                                        09:00-13:00</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-semibold text-gray-700 mb-2">Dim</p>
                                <div class="p-2 bg-gray-100 text-gray-500 text-xs rounded">Repos</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-4">Avis des Sportifs</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-purple-500 pl-4 py-2">
                                <div class="flex items-center mb-2">
                                    <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                            alt="Sportif">
                                    </div>
                                    <div>
                                        <span class="font-semibold">Ahmed Mansouri</span>
                                        <div class="text-yellow-500 text-sm">★★★★★</div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">Excellent coach ! Très professionnel et à l'écoute.
                                    J'ai progressé rapidement grâce à ses conseils personnalisés.</p>
                                <p class="text-xs text-gray-400 mt-2">Il y a 2 semaines</p>
                            </div>

                            <div class="border-l-4 border-purple-500 pl-4 py-2">
                                <div class="flex items-center mb-2">
                                    <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                            alt="Sportif">
                                    </div>
                                    <div>
                                        <span class="font-semibold">Fatima Zahra</span>
                                        <div class="text-yellow-500 text-sm">★★★★★</div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">Coach compétent et motivant. Les séances sont variées
                                    et adaptées à mon niveau. Je recommande vivement !</p>
                                <p class="text-xs text-gray-400 mt-2">Il y a 1 mois</p>
                            </div>

                            <div class="border-l-4 border-purple-500 pl-4 py-2">
                                <div class="flex items-center mb-2">
                                    <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                            alt="Sportif">
                                    </div>
                                    <div>
                                        <span class="font-semibold">Omar Khalil</span>
                                        <div class="text-yellow-500 text-sm">★★★★☆</div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">Très bon coach, programmes efficaces. Seul bémol :
                                    parfois difficile d'avoir des créneaux disponibles.</p>
                                <p class="text-xs text-gray-400 mt-2">Il y a 2 mois</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Réserver une séance</h3>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold mb-2">Discipline</label>
                                <select class="w-full p-2 border border-gray-300 rounded-md">
                                    <option>Football</option>
                                    <option>Préparation Physique</option>
                                    <option>Athlétisme</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Date</label>
                                <input type="date" class="w-full p-2 border border-gray-300 rounded-md" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Créneau horaire</label>
                                <select class="w-full p-2 border border-gray-300 rounded-md">
                                    <option>08:00 - 10:00</option>
                                    <option>10:00 - 12:00</option>
                                    <option>14:00 - 16:00</option>
                                    <option>16:00 - 18:00</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Commentaire (optionnel)</label>
                                <textarea class="w-full p-2 border border-gray-300 rounded-md" rows="3"
                                    placeholder="Précisez vos objectifs ou besoins particuliers..."></textarea>
                            </div>
                            <button type="submit"
                                class="w-full px-6 py-3 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700">Réserver
                                cette séance</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <!-- PAGE RESERVATIONS -->
        <main id="reservations" class="page p-6 sm:p-10 space-y-6">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    <h1 class="text-4xl font-semibold mb-2">Mes Réservations</h1>
                    <h2 class="text-gray-600 ml-0.5">Gérez vos séances sportives</h2>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex gap-4 mb-6">
                    <button class="px-4 py-2 bg-purple-600 text-white rounded-md">Toutes</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">En attente</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Confirmées</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Terminées</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Annulées</button>
                </div>

                <div class="space-y-4">
                    <div class="border-l-4 border-yellow-500 pl-4 py-4 bg-yellow-50 rounded-r-lg">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="h-12 w-12 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                        alt="Coach">
                                </div>
                                <div>
                                    <h4 class="font-semibold">Mohamed Alami</h4>
                                    <p class="text-sm text-gray-600">Préparation Physique</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-sm rounded-full">En attente</span>
                        </div>
                        <div class="space-y-1 text-sm text-gray-600 mb-3">
                            <p><strong>Date:</strong> 20 Décembre 2024</p>
                            <p><strong>Heure:</strong> 10:00 - 11:30</p>
                            <p><strong>Statut:</strong> En attente de confirmation du coach</p>
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">Annuler</button>
                        </div>
                    </div>

                    <div class="border-l-4 border-green-500 pl-4 py-4 bg-green-50 rounded-r-lg">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="h-12 w-12 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                        alt="Coach">
                                </div>
                                <div>
                                    <h4 class="font-semibold">Sara Bennani</h4>
                                    <p class="text-sm text-gray-600">Tennis</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-sm rounded-full">Confirmée</span>
                        </div>
                        <div class="space-y-1 text-sm text-gray-600 mb-3">
                            <p><strong>Date:</strong> 18 Décembre 2024</p>
                            <p><strong>Heure:</strong> 15:00 - 16:00</p>
                            <p><strong>Statut:</strong> Séance confirmée</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-purple-600 text-white text-sm rounded hover:bg-purple-700">Voir
                                détails</button>
                            <button
                                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm rounded hover:bg-gray-300">Modifier</button>
                            <button
                                class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">Annuler</button>
                        </div>
                    </div>

                    <div class="border-l-4 border-green-500 pl-4 py-4 bg-green-50 rounded-r-lg">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="h-12 w-12 mr-3 bg-gray-100 rounded-full overflow-hidden">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                        alt="Coach">
                                </div>
                                <div>
                                    <h4 class="font-semibold">Youssef Tazi</h4>
                                    <p class="text-sm text-gray-600">Natation</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-sm rounded-full">Confirmée</span>
                        </div>
                        <div class="space-y-1 text-sm text-gray-600 mb-3">
                            <p><strong>Date:</strong> 19 Décembre 2024</p>
                            <p><strong>Heure:</strong> 08:00 - 09:00</p>
                            <p><strong>Statut:</strong> Séance confirmée</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-purple-600 text-white text-sm rounded hover:bg-purple-700">Voir
                                détails</button>
                            <button
                                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm rounded hover:bg-gray-300">Modifier</button>
                            <button
                                class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>