<?php
require_once "../../config/connexion.php";
require_once "../../php/Sportif/functionSportif.php";
require "../../php/authentification/checkConnecter.php"; 
$sportif = getSportif();
$id_sportif = $sportif["id_sportif"];

if (!isset($_GET['id_coach']) || !is_numeric($_GET['id_coach'])) {
    die("Coach invalide");
}
$id_coach = (int) $_GET['id_coach'];

$sqlCoach = "
    SELECT c.id_coach,u.nom,u.prenom,u.email,u.telephone,c.biographie,c.coach_img,c.niveau FROM coach c
    JOIN utilisateur u ON u.id_utilisateur = c.id_utilisateur
    WHERE c.id_coach = ?
";
$stmt = $conn->prepare($sqlCoach);
$stmt->bind_param("i", $id_coach);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 0) {
    die("Coach introuvable");
}
$coach = $res->fetch_assoc();

$sqlSports = "
    SELECT s.id_sport, s.nom_sport FROM coach_sport cs
    JOIN sport s ON s.id_sport = cs.id_sport
    WHERE cs.id_coach = ?
";
$stmt = $conn->prepare($sqlSports);
$stmt->bind_param("i", $id_coach);
$stmt->execute();
$sports = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$sqlExp = "
    SELECT domaine, date_debut, date_fin, duree
    FROM experiences
    WHERE id_coach = ?
    ORDER BY date_debut DESC
";
$stmt = $conn->prepare($sqlExp);
$stmt->bind_param("i", $id_coach);
$stmt->execute();
$experiences = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$sqlDispo = "
    SELECT DATE(date) AS date, TIME(heure_debut) AS heure_debut, TIME(heure_fin) AS heure_fin, isReserved
    FROM disponibilite
    WHERE id_coach = ?
    ORDER BY date, heure_debut
";
$stmt = $conn->prepare($sqlDispo);
$stmt->bind_param("i", $id_coach);
$stmt->execute();
$disponibilites = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Coach - <?=var_dump($id_sportif)?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100 min-h-screen">
    
    <!-- Sidebar -->
    <aside class="hidden sm:flex sm:flex-col w-20">
        <a href="#" class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
            <svg fill="none" viewBox="0 0 64 64" class="h-12 w-12">
                <title>Sport Platform</title>
                <path d="M32 14.2c-8 0-12.9 4-14.9 11.9 3-4 6.4-5.6 10.4-4.5 2.3.6 4 2.3 5.7 4 2.9 3 6.3 6.4 13.7 6.4 7.9 0 12.9-4 14.8-11.9-3 4-6.4 5.5-10.3 4.4-2.3-.5-4-2.2-5.7-4-3-3-6.3-6.3-13.7-6.3zM17.1 32C9.2 32 4.2 36 2.3 43.9c3-4 6.4-5.5 10.3-4.4 2.3.5 4 2.2 5.7 4 3 3 6.3 6.3 13.7 6.3 8 0 12.9-4 14.9-11.9-3 4-6.4 5.6-10.4 4.5-2.3-.6-4-2.3-5.7-4-2.9-3-6.3-6.4-13.7-6.4z" fill="#fff" />
            </svg>
        </a>
        <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
            <nav class="flex flex-col mx-4 my-6 space-y-4">
                <a href="index.html" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 rounded-lg">
                    <span class="sr-only">Accueil</span>
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
                <a href="#" class="inline-flex items-center justify-center py-3 bg-white text-purple-600 rounded-lg">
                    <span class="sr-only">Coachs</span>
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </a>
                <a href="reservations.html" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 rounded-lg">
                    <span class="sr-only">Mes Réservations</span>
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </a>
                <a href="profile.html" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 rounded-lg">
                    <span class="sr-only">Mon Profil</span>
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </a>
            </nav>
            <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
                <button class="p-3 hover:text-gray-400 hover:bg-gray-700 rounded-lg">
                    <span class="sr-only">Paramètres</span>
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </aside>

    <!-- Contenu principal -->
    <div class="flex-grow text-gray-800">
        <!-- Header -->
        <header class="flex items-center h-20 px-6 sm:px-10 bg-white shadow">
            <button onclick="history.back()" class="flex items-center text-purple-600 hover:text-purple-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retour aux coachs
            </button>
            <h1 class="ml-6 text-2xl font-bold text-gray-800">Profil du Coach</h1>
        </header>

        <!-- Contenu -->
        <main class="p-6 sm:p-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Colonne gauche - Profil et Info -->
                <div class="lg:col-span-1 space-y-6">
                    
                    <!-- Carte Profil -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="h-32 bg-gradient-to-r from-purple-600 to-purple-400"></div>
                        <div class="relative px-6 pb-6">
                            <div class="flex justify-center -mt-16 mb-4">
                                <img src="<?= htmlspecialchars($coach['coach_img']) ?>" alt="Photo du coach" class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover">
                            </div>
                            <h2 class="text-2xl font-bold text-center text-gray-800"><?= htmlspecialchars($coach['prenom'] . ' ' . $coach['nom']) ?></h2>
                            <p class="text-center text-purple-600 font-semibold mb-4">Niveau: <?= htmlspecialchars($coach['niveau']) ?></p>
                            
                            <!-- Disciplines -->
                            <div class="mb-4">
                                <h3 class="text-sm font-semibold text-gray-600 mb-2">Disciplines</h3>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach($sports as $sport): ?>
                                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">
                                            <?= htmlspecialchars($sport['nom_sport']) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="space-y-2 border-t pt-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <?= htmlspecialchars($coach['email']) ?>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <?= htmlspecialchars($coach['telephone']) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Biographie -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            À propos
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed"><?= htmlspecialchars($coach['biographie']) ?></p>
                    </div>

                </div>

                <!-- Colonne droite - Expériences et Réservation -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Expériences Professionnelles -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Expériences Professionnelles
                        </h3>
                        <div class="space-y-4">
                            <?php foreach($experiences as $exp): ?>
                                <div class="border-l-4 border-purple-600 pl-4 py-2">
                                    <h4 class="font-bold text-gray-800"><?= htmlspecialchars($exp['domaine']) ?></h4>
                                    <p class="text-sm text-purple-600 font-semibold mb-2">
                                        <?= date('M Y', strtotime($exp['date_debut'])) ?> - <?= date('M Y', strtotime($exp['date_fin'])) ?> 
                                        (<?= $exp['duree'] ?> ans)
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Disponibilités -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Disponibilités
                        </h3>
                        <div class="space-y-3">
                            <?php 
                            $dispoByDate = [];
                            foreach($disponibilites as $dispo) {
                                $dispoByDate[$dispo['date']][] = $dispo;
                            }
                            ?>
                            <?php foreach($dispoByDate as $date => $slots): ?>
                                <div class="border rounded-lg p-4">
                                    <h4 class="font-bold text-gray-800 mb-3"><?= date('l d F Y', strtotime($date)) ?></h4>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                        <?php foreach($slots as $slot): ?>
                                            <div class="px-3 py-2 rounded-lg text-center text-sm font-medium <?= $slot['isReserved'] ? 'bg-gray-200 text-gray-500' : 'bg-green-100 text-green-700' ?>">
                                                <?= $slot['heure_debut'] ?> - <?= $slot['heure_fin'] ?>
                                                <?php if($slot['isReserved']): ?>
                                                    <span class="block text-xs">Réservé</span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button onclick="document.getElementById('reservationModal').classList.remove('hidden')" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Réserver une séance
                        </button>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Modal de réservation -->
    <div id="reservationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-2xl p-8 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Réserver une séance</h3>
                <button onclick="document.getElementById('reservationModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="reservationForm" class="space-y-4" method="post" action="../../php/Sportif/insererReservation.php">
              <input type="hidden" value="<?= $id_coach ?>" name="id_coach">
              <input type="hidden" value="<?= $id_sportif ?>" name="id_sportif">
                <!-- Sélection discipline -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Discipline *</label>
                    <select id="discipline" name="sport" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        <option value="">Choisir une discipline</option>
                        <?php foreach($sports as $sport): ?>
                            <option value="<?= htmlspecialchars($sport['nom_sport']) ?>">
                                <?= htmlspecialchars($sport['nom_sport']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Sélection date -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date *</label>
                    <input type="date" name="date_seance" id="dateReservation" required  onchange="afficherCreneaux()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                </div>


                <div id="creneauxSection" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Créneaux disponibles *</label>
                    <div id="creneauxContainer" class="space-y-2 max-h-48 overflow-y-auto">
                        <!-- Les créneaux seront affichés ici -->
                    </div>
                </div>


                <!-- Boutons -->
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="document.getElementById('reservationModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 font-semibold hover:bg-gray-50 transition">
                        Annuler
                    </button>
                    <button type="submit" id="confRE" class="flex-1 px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition">
                        Confirmer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const disponibilites = <?= json_encode($disponibilites) ?>;

        function afficherCreneaux() {
            const dateSelectionnee = document.getElementById('dateReservation').value;
            const creneauxContainer = document.getElementById('creneauxContainer');
            const creneauxSection = document.getElementById('creneauxSection');
            
            if (!dateSelectionnee) {
                creneauxSection.classList.add('hidden');
                return;
            }

            let creneauxHTML = '';
            let creneauxTrouves = false;

            
            disponibilites.forEach(function(dispo) {
                if (dispo.date === dateSelectionnee && !dispo.isReserved) {
                    creneauxTrouves = true;
                    creneauxHTML += `
                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-purple-50 transition">
                            <input type="checkbox"  name="creneaux[]" value="${dispo.id_disponibilite}-${dispo.heure_debut}-${dispo.heure_fin}" class="heureCRe mr-3 w-4 h-4 text-purple-600">
                            <span class="font-medium">${dispo.heure_debut} - ${dispo.heure_fin}</span>
                        </label>
                    `;
                }
            });

            if (!creneauxTrouves) {
                creneauxHTML = '<p class="text-sm text-gray-500 italic p-3">Aucun créneau disponible pour cette date</p>';
            }


            creneauxContainer.innerHTML = creneauxHTML;
            creneauxSection.classList.remove('hidden');
        }
        document.getElementById("dateReservation").addEventListener("input" , ()=>{
          afficherCreneaux()
        })
        document.getElementById("confRE").addEventListener("submit" , (event)=>{
          event.preventDefault()
          let sport = document.getElementById("discipline")
          let date = document.getElementById("dateReservation")
          let heure = document.getElementsByClassName("heureCRe")
          let valid = true
          if(sport.value === "" || date.value === ""){
            valid = false
            return
          }
          Array.from(heure).forEach(element => {
            if(element.value = ""){
              valid = false
            }
            
          });
          if(!valid){
            console.log("erreur redsafhds")
          }
          this.submit();
        })

       

    </script>

</body>
</html>
