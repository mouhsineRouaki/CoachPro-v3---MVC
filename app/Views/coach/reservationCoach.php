<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Réservations - Coach</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <aside class="hidden sm:flex sm:flex-col">
    <a href="#" class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
      <svg fill="none" viewBox="0 0 64 64" class="h-12 w-12">
        <title>Sport Coach Platform</title>
        <path d="M32 14.2c-8 0-12.9 4-14.9 11.9 3-4 6.4-5.6 10.4-4.5 2.3.6 4 2.3 5.7 4 2.9 3 6.3 6.4 13.7 6.4 7.9 0 12.9-4 14.8-11.9-3 4-6.4 5.5-10.3 4.4-2.3-.5-4-2.2-5.7-4-3-3-6.3-6.3-13.7-6.3zM17.1 32C9.2 32 4.2 36 2.3 43.9c3-4 6.4-5.5 10.3-4.4 2.3.5 4 2.2 5.7 4 3 3 6.3 6.3 13.7 6.3 8 0 12.9-4 14.9-11.9-3 4-6.4 5.6-10.4 4.5-2.3-.6-4-2.3-5.7-4-2.9-3-6.3-6.4-13.7-6.4z" fill="#fff"/>
      </svg>
    </a>
    <div class="flex-grow flex flex-col justify-between text-gray-500 bg-gray-800">
      <nav class="flex flex-col mx-4 my-6 space-y-4">
        <a href="./dashbordCoach.php" class="inline-flex items-center justify-center py-3  rounded-lg">
          <span class="sr-only">Dashboard</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
          </svg>
        </a>
        <a href="./reservationCoach.php" class="inline-flex items-center text-purple-600 bg-white justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
          <span class="sr-only">Réservations</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </a>
        <a href="./disponibilityCoach.php" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
          <span class="sr-only">Disponibilités</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </a>
        <a href="./profilCoach.php" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
          <span class="sr-only">Mon Profil</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </a>
      </nav>
      <div class="inline-flex items-center justify-center h-20 w-20 border-t border-gray-700">
        <button class="p-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
          <span class="sr-only">Paramètres</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </button>
      </div>
    </div>
  </aside>

  <div class="flex-1 flex flex-col">
    <header class="bg-purple-600 text-white pt-1  h-20 flex align-centre justify-center">
      <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-3xl font-bold">Gestion des Réservations</h1>
        <p class="text-sm opacity-90">Gérez vos réservations reçues et votre planning</p>
      </div>
    </header>

    <section class="bg-white shadow-md">
      <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
          <div class="bg-purple-50 rounded-lg p-4">
            <p class="text-sm text-gray-600">En attente</p>
            <p class="text-3xl font-bold text-purple-600" id="pendingCount">0</p>
          </div>
          <div class="bg-green-50 rounded-lg p-4">
            <p class="text-sm text-gray-600">Confirmées</p>
            <p class="text-3xl font-bold text-green-600" id="confirmedCount">0</p>
          </div>
          <div class="bg-blue-50 rounded-lg p-4">
            <p class="text-sm text-gray-600">Aujourd'hui</p>
            <p class="text-3xl font-bold text-blue-600" id="todayCount">0</p>
          </div>
          <div class="bg-red-50 rounded-lg p-4">
            <p class="text-sm text-gray-600">Refusées</p>
            <p class="text-3xl font-bold text-red-600" id="rejectedCount">0</p>
          </div>
        </div>

        <!-- Filtres -->
        <div class="flex flex-wrap gap-3">
          <button onclick="filterReservations('all')" class="filter-btn active px-4 py-2 rounded-lg font-semibold transition">
            Toutes
          </button>
          <button onclick="filterReservations('en_attente')" class="filter-btn px-4 py-2 rounded-lg font-semibold transition">
            En attente
          </button>
          <button onclick="filterReservations('confirmee')" class="filter-btn px-4 py-2 rounded-lg font-semibold transition">
            Confirmées
          </button>
          <button onclick="filterReservations('annulee')" class="filter-btn px-4 py-2 rounded-lg font-semibold transition">
            Refusées
          </button>
        </div>
      </div>
    </section>

    <main class="max-w-7xl mx-auto px-1 py-10 flex-1">
      <div id="reservationsList" class=" grid gap-4 grid-cols-3">
        <!-- Les réservations seront générées par JavaScript -->
      </div>

      <div id="noReservations" class="hidden text-center py-12">
        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <p class="text-xl text-gray-600">Aucune réservation</p>
        <p class="text-sm text-gray-500 mt-2">Vous n'avez pas encore de réservations</p>
      </div>
    </main>

    <footer class="bg-gray-900 text-white py-6">
      <div class="max-w-7xl mx-auto px-4 text-center text-sm">
        © 2025 Plateforme Coach & Sportif — Tous droits réservés
      </div>
    </footer>
  </div>
</div>

<!-- Modal Détails Réservation -->
<div id="detailsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
    <div class="p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Détails de la Réservation</h2>
        <button onclick="closeDetailsModal()" class="text-gray-400 hover:text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="space-y-4">
        <div class="bg-gray-50 rounded-lg p-4">
          <h3 class="font-semibold text-gray-700 mb-2">Informations Client</h3>
          <p class="text-sm"><span class="font-medium">Nom:</span> <span id="clientName"></span></p>
          <p class="text-sm"><span class="font-medium">Email:</span> <span id="clientEmail"></span></p>
          <p class="text-sm"><span class="font-medium">Téléphone:</span> <span id="clientPhone"></span></p>
        </div>

        <div class="bg-gray-50 rounded-lg p-4">
          <h3 class="font-semibold text-gray-700 mb-2">Détails de la Séance</h3>
          <p class="text-sm"><span class="font-medium">Sport:</span> <span id="sessionSport"></span></p>
          <p class="text-sm"><span class="font-medium">Date:</span> <span id="sessionDate"></span></p>
          <p class="text-sm"><span class="font-medium">Horaire:</span> <span id="sessionTime"></span></p>
          <p class="text-sm"><span class="font-medium">Durée:</span> <span id="sessionDuration"></span></p>
        </div>
        <div id="actionButtons" class="flex gap-3 pt-4">
          <!-- Buttons will be dynamically added -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="hidden fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-opacity">
  <p id="toastMessage"></p>
</div>

<script>
  let reservation=[];
  fetch("../../php/coach/getReservationsCoach.php")
      .then(res => res.json())
      .then(data => {
        reservation= data.map(r => ({
          id_reservation: r.id_reservation,
          coach_name: r.nom + " " + r.prenom,
          coach_image: r.coach_img || "https://via.placeholder.com/150",
          sport: r.nom_sport,
          date_seance: r.date,
          heure_debut: r.heure_debut,
          heure_fin: r.heure_fin,
          status: r.status,
          tel: r.telephone,
          id_disponibilite :r.id_disponibilite
        }));
        console.log(reservation)
        displayReservations();
      });

  let currentFilter = 'all';


  function getStatusBadge(status) {
    const badges = {
      pending: '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>',
      confirmed: '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmée</span>',
      rejected: '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Refusée</span>'
    };
    return badges[status] || '';
  }

  function createReservationCard(reservationO) {
    const isPending = reservationO.status === 'en_attente';
    const isConfirmed = reservationO.status === 'confirmee';
    
    return `
      <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
              <h3 class="text-lg font-bold text-gray-800">${reservationO.coach_name}</h3>
              ${getStatusBadge(reservationO.status)}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-gray-600">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>${reservationO.date_seance}</span>
              </div>
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>${reservationO.heure_debut}-${reservationO.heure_debut}</span>
              </div>
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span>${reservationO.sport}</span>
              </div>
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>${reservationO.tel}</span>
              </div>
            </div>
          </div>
          
          <div class="flex flex-wrap gap-2">
            ${isPending ? `
              <button onclick="confirmReservation(${reservationO.id_reservation})" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold text-sm">
                Confirmer
              </button>
              <button onclick="cancelReservation(${reservationO.id_reservation})" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-semibold text-sm">
                Refuser
              </button>
            ` : ''}
            ${isConfirmed ? `
              <button onclick="cancelReservation(${reservationO.id_reservation})" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-semibold text-sm">
                Annuler
              </button>
            ` : ''}
          </div>
        </div>
      </div>
    `;
  }

  function displayReservations() {
    const list = document.getElementById('reservationsList');
    const noReservations = document.getElementById('noReservations');
    
    let filtered = reservation;
    if (currentFilter !== 'all') {
      filtered = reservation.filter(r => r.status === currentFilter);
    }

    if (filtered.length === 0) {
      list.classList.add('hidden');
      noReservations.classList.remove('hidden');
    } else {
      list.classList.remove('hidden');
      noReservations.classList.add('hidden');
      list.innerHTML = filtered.map(r => createReservationCard(r)).join('');
    }

    updateStatistics();
  }

  function updateStatistics() {
    const today = new Date().toISOString().split('T')[0];
    
    document.getElementById('pendingCount').textContent = 
      reservation.filter(r => r.status === 'en_attente').length;
    document.getElementById('confirmedCount').textContent = 
      reservation.filter(r => r.status === 'confirmee').length;
    document.getElementById('todayCount').textContent = 
      reservation.filter(r => r.date === today).length;
    document.getElementById('rejectedCount').textContent = 
      reservation.filter(r => r.status === 'annulee').length;
  }

  function filterReservations(filter) {
    currentFilter = filter;
    
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.classList.remove('active', 'bg-purple-600', 'text-white');
      btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    
    event.target.classList.add('active', 'bg-purple-600', 'text-white');
    event.target.classList.remove('bg-gray-100', 'text-gray-700');
    
    displayReservations();
  }

 



  function confirmReservation(id) {
  let reservationO =reservation.find(r => r.id_reservation === id);
  console.log(reservationO)
  fetch('../../php/coach/confirmReservation.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `id_reservation=${id}&id_disponibilite=${reservationO.id_disponibilite}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      const resObj = reservation.find(r => r.id_reservation === id);
      if (resObj) resObj.status = 'confirmee';
      displayReservations();
      showToast(data.success);
    } else {
      showToast('Erreur : ' + data.success);
    }
  })
}



 function cancelReservation(id) {
  let reservationO =reservation.find(r => r.id_reservation === id);
  fetch('../../php/coach/annuleeReservation.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `id_reservation=${id}&id_disponibilite=${reservationO.id_disponibilite}`
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      const resObj = reservation.find(r => r.id_reservation === id);
      if (resObj) resObj.status = 'annulee';
      displayReservations();
      showToast(data.message);
    } else {
      showToast('Erreur : ' + data.message);
    }
  })
}

  function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toastMessage');
    toastMessage.textContent = message;
    toast.classList.remove('hidden');
    setTimeout(() => {
      toast.classList.add('hidden');
    }, 3000);
  }

  const style = document.createElement('style');
  style.textContent = `
    .filter-btn {
      background-color: #f3f4f6;
      color: #374151;
    }
    .filter-btn.active {
      background-color: #9333ea;
      color: white;
    }
    .filter-btn:hover {
      opacity: 0.9;
    }
  `;
  document.head.appendChild(style);

  displayReservations();
</script>

</body>
</html>
