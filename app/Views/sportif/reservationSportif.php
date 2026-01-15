<?php
session_start();
require "../../php/authentification/checkConnecter.php"; 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Réservations</title>
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
          <a href="./dashbordSportif.php" class="inline-flex items-center justify-center py-3 rounded-lg">
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
          <button class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
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


    <!-- Contenu principal -->
    <div class="flex-1 flex flex-col">
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
              <span class="font-semibold">Karim Sportif</span>
              <span class="text-sm text-gray-600">Membre depuis 2024</span>
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
              <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full animate-ping"></span>
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
      <!-- Filtres de statut -->
      <section class="bg-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-6">
          <div class="flex gap-4 overflow-x-auto">
            <button
              class="filter-btn active px-6 py-2 rounded-full bg-purple-600 text-white font-medium whitespace-nowrap"
              data-status="all">
              Toutes
            </button>
            <button
              class="filter-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium whitespace-nowrap"
              data-status="confirmee">
              Confirmées
            </button>
            <button
              class="filter-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium whitespace-nowrap"
              data-status="en_attente">
              En attente
            </button>
            <button
              class="filter-btn px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium whitespace-nowrap"
              data-status="annulee">
              Annulées
            </button>
          </div>
        </div>
      </section>

      <!-- Liste des réservations -->
      <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="mb-6">
          <p class="text-gray-700"><span id="resultCount" class="font-semibold">8 réservations</span></p>
        </div>

        <div id="reservationsList" class="container mx-auto grid grid-cols-3 gap-4">
          <!-- Les cartes seront générées par JavaScript -->
        </div>

        <!-- Message si aucune réservation -->
        <div id="noReservations" class="hidden text-center py-12">
          <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <p class="text-xl text-gray-600">Aucune réservation trouvée</p>
          <p class="text-sm text-gray-500 mt-2">Réservez une séance avec un coach pour commencer</p>
        </div>
      </main>

      <footer class="relative bottom-0 bg-gray-900 text-white py-6 mt-10">
        <div class="max-w-6xl mx-auto px-4 text-center text-sm">
          © 2025 Plateforme Coach & Sportif — Tous droits réservés
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal pour modifier une réservation -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
      <h3 class="text-xl font-bold text-gray-800 mb-4">Modifier la réservation</h3>
      <form id="editForm">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
          <input type="date" id="editDate"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Heure de début</label>
          <input type="time" id="editTimeStart"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Heure de fin</label>
          <input type="time" id="editTimeEnd"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" required>
        </div>
        <div class="flex gap-3">
          <button type="submit"
            class="flex-1 px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
            Enregistrer
          </button>
          <button type="button" id="cancelEdit"
            class="flex-1 px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition">
            Annuler
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    let reservations = [];

    fetch("../../php/Coach/getReservationsCoach.php")
      .then(res => res.json())
      .then(data => {
        reservations = data.map(r => ({
          id_reservation: r.id_reservation,
          coach_name: r.coach_nom + " " + r.coach_prenom,
          coach_image: r.coach_img || "https://via.placeholder.com/150",
          sport: r.nom_sport,
          date_seance: r.date_seance,
          heure_debut: r.heure_debut,
          heure_fin: r.heure_fin,
          status: r.status
        }));
        displayReservations(reservations);
      });

    let currentFilter = 'all';
    let editingReservationId = null;

    function getStatusColor(status) {
      switch (status) {
        case 'confirmée':
          return 'bg-green-100 text-green-800';
        case 'en attente':
          return 'bg-yellow-100 text-yellow-800';
        case 'annulée':
          return 'bg-red-100 text-red-800';
        default:
          return 'bg-gray-100 text-gray-800';
      }
    }

    function formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString('fr-FR', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    }

    function createReservationCard(reservation) {
      const canModify = reservation.status !== 'annulee';

      return `
      <div class="bg-white rounded-lg shadow hover:shadow-md transition-all p-6">
        <div class="flex flex-col md:flex-row gap-4">
          <!-- Image du coach -->
          <div class="flex-shrink-0">
            <img src="${reservation.coach_image}" alt="${reservation.coach_name}" class="w-24 h-24 rounded-lg object-cover">
          </div>
          
          <!-- Informations -->
          <div class="flex-grow">
            <div class="flex justify-between items-start mb-2">
              <div>
                <h3 class="text-lg font-bold text-gray-800">${reservation.coach_name}</h3>
                <p class="text-purple-600 font-medium">${reservation.sport}</p>
              </div>
              <span class="px-3 py-1 rounded-full text-xs font-semibold ${getStatusColor(reservation.status)}">
                ${reservation.status.charAt(0).toUpperCase() + reservation.status.slice(1)}
              </span>
            </div>
            
            <div class="space-y-1 text-sm text-gray-600 mb-4">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>${formatDate(reservation.date_seance)}</span>
              </div>
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>${reservation.heure_debut} - ${reservation.heure_fin}</span>
              </div>
            </div>
            
            <!-- Boutons d'action -->
            <div class="flex gap-2">
              ${canModify ? `
                <button onclick="openEditModal(${reservation.id_reservation})" class="px-4 py-2 bg-purple-600 text-white text-sm font-semibold rounded-lg hover:bg-purple-700 transition">
                  Modifier
                </button>
                <button onclick="cancelReservation(${reservation.id_reservation})" class="px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition">
                  Annuler
                </button>
              ` : `
                <button disabled class="px-4 py-2 bg-gray-300 text-gray-500 text-sm font-semibold rounded-lg cursor-not-allowed">
                  Réservation annulée
                </button>
              `}
            </div>
          </div>
        </div>
      </div>
    `;
    }

    function displayReservations(reservationList) {
      const container = document.getElementById('reservationsList');
      const noResults = document.getElementById('noReservations');
      const resultCount = document.getElementById('resultCount');

      if (reservationList.length === 0) {
        container.classList.add('hidden');
        noResults.classList.remove('hidden');
        resultCount.textContent = '0 réservation';
      } else {
        container.classList.remove('hidden');
        noResults.classList.add('hidden');
        container.innerHTML = reservationList.map(r => createReservationCard(r)).join('');
        resultCount.textContent = `${reservationList.length} réservation${reservationList.length > 1 ? 's' : ''}`;
      }
    }

    function filterReservations() {
      let filtered = reservations;

      if (currentFilter !== 'all') {
        filtered = reservations.filter(r => r.status === currentFilter);
      }

      displayReservations(filtered);
    }

    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        document.querySelectorAll('.filter-btn').forEach(b => {
          b.classList.remove('active', 'bg-purple-600', 'text-white');
          b.classList.add('bg-gray-200', 'text-gray-700');
        });
        this.classList.add('active', 'bg-purple-600', 'text-white');
        this.classList.remove('bg-gray-200', 'text-gray-700');

        // Filtrer
        currentFilter = this.dataset.status;
        filterReservations();
      });
    });

    // Ouvrir le modal de modification
    function openEditModal(id) {
      const reservation = reservations.find(r => r.id_reservation === id);
      if (!reservation) return;

      editingReservationId = id;
      document.getElementById('editDate').value = reservation.date_seance;
      document.getElementById('editTimeStart').value = reservation.heure_debut;
      document.getElementById('editTimeEnd').value = reservation.heure_fin;
      document.getElementById('editModal').classList.remove('hidden');
    }

    // Fermer le modal
    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
      editingReservationId = null;
    }
    function cancelReservation(id) {
      if (!confirm("Annuler cette réservation ?")) return;

      fetch("../../php/Sportif/annulerReservation.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ id_reservation: id })
      })
        .then(() => {
          const r = reservations.find(x => x.id_reservation === id);
          if (r) r.status = "annulée";
          filterReservations();
        });
    }


    // Enregistrer les modifications
    document.getElementById('editForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const reservation = reservations.find(r => r.id_reservation === editingReservationId);
      if (reservation) {
        reservation.date_seance = document.getElementById('editDate').value;
        reservation.heure_debut = document.getElementById('editTimeStart').value;
        reservation.heure_fin = document.getElementById('editTimeEnd').value;

        filterReservations();
        closeEditModal();
        fetch("../../php/Sportif/updateReservation.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: new URLSearchParams({
            id_reservation: editingReservationId,
            date_seance: editDate.value,
            heure_debut: editTimeStart.value,
            heure_fin: editTimeEnd.value
          })
        })
          .then(() => {
            filterReservations();
            closeEditModal();
          });


        alert('Réservation modifiée avec succès!');
      }
    });

    document.getElementById('cancelEdit').addEventListener('click', closeEditModal);


    document.getElementById('editModal').addEventListener('click', function (e) {
      if (e.target === this) {
        closeEditModal();
      }
    });

    displayReservations(reservations);
  </script>

</body>

</html>