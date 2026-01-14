<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gérer mes Disponibilités - Coach</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
  <aside class="hidden sm:flex sm:flex-col">
    <a href="" class="inline-flex items-center justify-center h-20 w-20 bg-purple-600 hover:bg-purple-500 focus:bg-purple-500">
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
        <a href="./reservationCoach.php" class="inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700  rounded-lg">
          <span class="sr-only">Réservations</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </a>
        <a href="./disponibilityCoach.php" class="inline-flex items-center text-purple-600 bg-white justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg">
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
        <h1 class="text-3xl font-bold">Gérer mes Disponibilités</h1>
        <p class="text-sm opacity-90">Ajoutez et gérez vos créneaux horaires disponibles</p>
      </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 py-8">
      <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
          <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Mes Créneaux Horaires</h2>
            <div class="flex gap-2">
              <button onclick="filterSlots('all')" class="filter-btn active px-4 py-2 rounded-lg text-sm font-medium transition" data-filter="all">
                Tous
              </button>
              <button onclick="filterSlots('available')" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition" data-filter="available">
                Disponibles
              </button>
              <button onclick="filterSlots('reserved')" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition" data-filter="reserved">
                Réservés
              </button>
            </div>
          </div>
          <button onclick="openAddModal()" class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter un créneau
          </button>
        </div>
      </div>

      <div id="availabilityGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Les créneaux seront générés par JavaScript -->
      </div>

      <div id="noSlots" class="hidden bg-white rounded-lg shadow p-12 text-center">
        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <p class="text-xl text-gray-600 mb-2">Aucun créneau disponible</p>
        <p class="text-sm text-gray-500">Commencez par ajouter vos créneaux horaires</p>
      </div>

    </main>

    <footer class="bg-gray-900 text-white py-6">
      <div class="max-w-7xl mx-auto px-4 text-center text-sm">
        © 2025 Plateforme Coach & Sportif - Tous droits réservés
      </div>
    </footer>
  </div>
</div>

<!-- Modal Ajouter un créneau -->
<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
  <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
    <div class="flex items-center justify-between p-6 border-b">
      <h3 class="text-xl font-bold text-gray-800">Ajouter un créneau</h3>
      <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="p-6">
      <form id="addForm" onsubmit="addSlot(event)">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
          <input type="date" id="newDate" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Heure de début</label>
          <input type="time" id="newStartTime" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700 mb-2">Heure de fin</label>
          <input type="time" id="newEndTime" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <div class="flex gap-3">
          <button type="button" onclick="closeAddModal()" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
            Annuler
          </button>
          <button type="submit" class="flex-1 px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
            Ajouter
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Modifier un créneau -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
  <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
    <div class="flex items-center justify-between p-6 border-b">
      <h3 class="text-xl font-bold text-gray-800">Modifier le créneau</h3>
      <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="p-6">
      <form id="editForm" onsubmit="updateSlot(event)">
        <input type="hidden" id="editId">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
          <input type="date" id="editDate" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Heure de début</label>
          <input type="time" id="editStartTime" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700 mb-2">Heure de fin</label>
          <input type="time" id="editEndTime" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <div class="flex gap-3">
          <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
            Annuler
          </button>
          <button type="submit" class="flex-1 px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
            Enregistrer
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Toast notification -->
<div id="toast" class="hidden fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg z-50">
  <p id="toastMessage"></p>
</div>

<style>
  .filter-btn {
    background-color: #f3f4f6;
    color: #6b7280;
  }
  .filter-btn.active {
    background-color: #9333ea;
    color: white;
  }
  .filter-btn:hover:not(.active) {
    background-color: #e5e7eb;
  }
</style>

<script>

let newDate = document.getElementById("newDate");
let newStartTime = document.getElementById("newStartTime");
let newEndTime = document.getElementById("newEndTime");

let editId = document.getElementById("editId");
let editDate = document.getElementById("editDate");
let editStartTime = document.getElementById("editStartTime");
let editEndTime = document.getElementById("editEndTime");

let availabilitySlots = [];
let currentFilter = 'all';


function formatDate(dateStr) {
  const date = new Date(dateStr);
  return date.toLocaleDateString('fr-FR', {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  });
}

function createSlotCard(slot) {
  const statusColor = slot.isReserved == 1
    ? 'bg-green-100 text-green-800'
    : 'bg-purple-100 text-purple-800';

  const statusText = slot.isReserved == 1 ? 'Réservé' : 'Disponible';

  const statusIcon = slot.isReserved == 1
    ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
         d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />`
    : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
         d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />`;

  return `
  <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
    <div class="flex items-start justify-between mb-4">
      <div>
        <p class="text-sm text-gray-500 mb-1">${formatDate(slot.date)}</p>
        <p class="text-lg font-bold text-gray-800">
          ${slot.heure_debut} - ${slot.heure_fin}
        </p>
      </div>
      <span class="${statusColor} px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          ${statusIcon}
        </svg>
        ${statusText}
      </span>
    </div>

    <div class="flex gap-2">
      ${slot.isReserved == 0 ? `
        <button onclick="openEditModal(${slot.id_disponibilite})"
          class="flex-1 px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
          Modifier
        </button>
        <button onclick="deleteSlot(${slot.id_disponibilite})"
          class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
          Supprimer
        </button>
      ` : `
        <div class="flex-1 text-center text-sm text-gray-500 py-2">
          Ce créneau est réservé et ne peut pas être modifié
        </div>
      `}
    </div>
  </div>`;
}

function displaySlots() {
  const grid = document.getElementById('availabilityGrid');
  const noSlots = document.getElementById('noSlots');

  let filtered = availabilitySlots;

  if (currentFilter === 'available') {
    filtered = availabilitySlots.filter(s => s.isReserved == 0);
  } else if (currentFilter === 'reserved') {
    filtered = availabilitySlots.filter(s => s.isReserved == 1);
  }

  if (filtered.length === 0) {
    grid.classList.add('hidden');
    noSlots.classList.remove('hidden');
  } else {
    grid.classList.remove('hidden');
    noSlots.classList.add('hidden');
    grid.innerHTML = filtered.map(createSlotCard).join('');
  }
}

function filterSlots(filter) {
  currentFilter = filter;

  document.querySelectorAll('.filter-btn').forEach(btn =>
    btn.classList.remove('active')
  );

  document.querySelector(`[data-filter="${filter}"]`).classList.add('active');
  displaySlots();
}

function loadSlots() {
  fetch('../../php/coach/getDisponibilites.php')
    .then(res => res.json())
    .then(data => {
      availabilitySlots = data;
      displaySlots();
    });
}

function openAddModal() {
  addModal.classList.remove('hidden');
  newDate.value = new Date().toISOString().split('T')[0];
}

function closeAddModal() {
  addModal.classList.add('hidden');
  addForm.reset();
}

function openEditModal(id) {
  const slot = availabilitySlots.find(s => s.id_disponibilite == id);
  if (!slot) return;

  editId.value = slot.id_disponibilite;
  editDate.value = slot.date;
  editStartTime.value = slot.heure_debut;
  editEndTime.value = slot.heure_fin;
  editModal.classList.remove('hidden');
}

function closeEditModal() {
  editModal.classList.add('hidden');
  editForm.reset();
}

function addSlot(e) {
  e.preventDefault();

  fetch('../../php/coach/addDisponibilite.php', {
    method: 'POST',
    headers: {'Content-Type':'application/x-www-form-urlencoded'},
    body: `date=${newDate.value}&startTime=${newStartTime.value}&endTime=${newEndTime.value}`
  })
  .then(response=>response.json())
  .then(data => {
    if(data.success){
      closeAddModal();
      loadSlots();
      showToast(data.message);
    }else{
      showToast(data.message);
    }
    
  });
}

function updateSlot(e) {
  e.preventDefault();
  console.log(editDate.value)

  fetch('../../php/coach/updateDisponibilite.php', {
    method: 'POST',
    headers: {'Content-Type':'application/x-www-form-urlencoded'},
    body: `id=${editId.value}&date=${editDate.value}&startTime=${editStartTime.value}&endTime=${editEndTime.value}`
  })
  .then(response=>response.json())
  .then(data => {
    if(data.success){
      closeAddModal();
    loadSlots();
    closeEditModal();
    showToast(data.message);
    }else{
      showToast(data.message);
    }
    
  });
}


function deleteSlot(id) {
  if (!confirm('Supprimer ce créneau ?')) return;

  fetch('../../php/Coach/deleteDisponibilite.php', {
    method: 'POST',
    headers: {'Content-Type':'application/x-www-form-urlencoded'},
    body: `id=${id}`
  })
  .then(() => {
    loadSlots();
    showToast('Créneau supprimé');
  });
}

function showToast(message) {
  toastMessage.textContent = message;
  toast.classList.remove('hidden');
  setTimeout(() => toast.classList.add('hidden'), 3000);
}


loadSlots();
</script>


</body>
</html>
