<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Rendez-vous - Clinique Lebdiri</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Cormorant+Garamond:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
        /* --- CSS identique à votre version (inchangé) --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --white: #FFFFFF;
            --off-white: #FCFAF7;
            --gold: #D4AF37;
            --gold-dark: #B28C1E;
            --black: #111111;
            --gray: #4D4D4D;
            --border: #DDDDDD;
        }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--white);
            padding: 20px;
            min-height: 100vh;
        }
        .wrap { max-width: 780px; margin: 0 auto; }
        .page-header { text-align: center; margin-bottom: 20px; }
        .page-header h1 { font-size: 1.7rem; }
        .page-header p { font-size: 0.85rem; }
        .cal-card { background: var(--white); border-radius: 20px; border: 1px solid var(--border); padding: 15px; }
        .calendar-header { margin-bottom: 12px; gap: 8px; }
        .month-nav button { background: var(--gold); border: none; padding: 5px 12px; border-radius: 30px; font-weight: 600; font-size: 0.8rem; cursor: pointer; }
        .current-month { font-size: 1rem; font-weight: 600; }
        .weekdays { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; margin-bottom: 8px; font-weight: 600; color: var(--gray); font-size: 10px; }
        .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; }
        .calendar-day {
            background: var(--white); border: 1px solid var(--border); border-radius: 10px;
            aspect-ratio: 1 / 1; display: flex; flex-direction: column;
            align-items: center; justify-content: center; cursor: pointer;
            font-size: 12px; font-weight: 500; padding: 4px;
        }
        .calendar-day.available { border-color: var(--gold); background: var(--off-white); }
        .calendar-day.disabled { opacity: 0.4; cursor: not-allowed; }
        .slot-count { font-size: 9px; color: var(--gold); margin-top: 2px; }
        .error-banner { background: #fee; color: #c00; padding: 8px; border-radius: 16px; margin-bottom: 15px; text-align: center; display: none; font-size: 0.8rem; }
        .reload-btn { background: var(--gold); border: none; padding: 4px 12px; border-radius: 30px; font-weight: bold; margin-top: 5px; cursor: pointer; font-size: 0.75rem; }
        .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); backdrop-filter: blur(5px); z-index: 1000; align-items: center; justify-content: center; padding: 15px; }
        .modal-overlay.open { display: flex; }
        .modal { background: white; border-radius: 24px; max-width: 460px; width: 100%; max-height: 80vh; overflow-y: auto; }
        .modal-top { padding: 12px 16px; border-bottom: 2px solid var(--gold); position: relative; }
        .modal-close { position: absolute; top: 12px; right: 16px; cursor: pointer; font-size: 22px; }
        .modal-date { font-size: 1rem; font-weight: 600; color: var(--gold); margin-right: 20px; }
        .modal-body { padding: 16px; }
        .time-slots { display: flex; flex-wrap: wrap; gap: 8px; margin: 12px 0; max-height: 200px; overflow-y: auto; }
        .time-slot-btn { background: var(--off-white); border: 1px solid var(--border); padding: 5px 12px; border-radius: 50px; cursor: pointer; font-size: 0.8rem; }
        .time-slot-btn.selected { background: var(--gold); border-color: var(--gold); color: black; }
        .btn-next { display: none; background: var(--gold); border: none; padding: 8px; width: 100%; border-radius: 40px; font-weight: bold; cursor: pointer; margin-top: 15px; font-size: 0.85rem; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px; }
        .fg { display: flex; flex-direction: column; gap: 4px; }
        .fg label { font-size: 10px; font-weight: 600; color: var(--gray); }
        input, select { padding: 6px 10px; border-radius: 10px; border: 1px solid var(--border); width: 100%; font-size: 0.85rem; }
        .svc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin: 8px 0; }
        .svc-radio { display: none; }
        .svc-label { background: var(--off-white); border: 1px solid var(--border); padding: 6px 12px; border-radius: 14px; text-align: center; cursor: pointer; font-size: 0.8rem; }
        .svc-radio:checked + .svc-label { background: var(--gold); border-color: var(--gold); }
        .form-actions { display: flex; gap: 8px; margin-top: 16px; }
        .btn-confirm, .btn-back { padding: 8px 12px; border-radius: 50px; font-weight: bold; cursor: pointer; font-size: 0.85rem; }
        .btn-confirm { background: var(--gold); border: none; flex: 1; }
        .btn-back { background: transparent; border: 1px solid var(--border); }
        .success-box { background: var(--off-white); padding: 12px; border-radius: 20px; margin: 15px 0; font-size: 0.8rem; }
        .alert { display: none; }
        @media (max-width: 600px) {
            .wrap { max-width: 100%; }
            .calendar-day { font-size: 10px; }
            .slot-count { font-size: 8px; }
            .modal { max-width: 95%; }
            .form-row { grid-template-columns: 1fr; }
            .svc-grid { grid-template-columns: 1fr; }
            .btn-confirm, .btn-back { font-size: 0.8rem; }
        }
        @media (max-width: 450px) {
            .calendar-day { font-size: 8px; }
            .month-nav button { padding: 3px 8px; font-size: 0.7rem; }
            .current-month { font-size: 0.8rem; }
        }
    </style>
</head>
<body>
<div class="wrap">
    @if(session('success'))
        <div class="alert alert-success" style="display:none;" data-success="1">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error" style="display:none;">{{ session('error') }}</div>
    @endif

    <div class="page-header">
        <h1>Prendre <em>rendez-vous</em></h1>
        <p>Sélectionnez un jour disponible</p>
    </div>
    <div id="errorBanner" class="error-banner">
        ⚠️ Problème de chargement. Vérifiez votre connexion ou réessayez.
        <button id="reloadBtn" class="reload-btn">🔄 Rafraîchir</button>
    </div>
    <div class="cal-card">
        <div class="calendar-header">
            <div class="month-nav">
                <button id="prevMonthBtn">← Mois précédent</button>
                <span class="current-month" id="currentMonth"></span>
                <button id="nextMonthBtn">Mois suivant →</button>
            </div>
        </div>
        <div class="weekdays">
            <span>Lun</span><span>Mar</span><span>Mer</span><span>Jeu</span><span>Ven</span><span>Sam</span><span>Dim</span>
        </div>
        <div id="calendarGrid" class="calendar-grid">Chargement...</div>
    </div>
</div>

<!-- Modal de réservation -->
<div id="modalOverlay" class="modal-overlay">
    <div class="modal">
        <div class="modal-top">
            <span class="modal-close" id="closeModal">✕</span>
            <div class="modal-date" id="modalDate"></div>
        </div>
        <div class="modal-body">
            <div id="step1">
                <div style="margin-bottom: 8px;">Choisissez une heure</div>
                <div id="slotsContainer" class="time-slots"></div>
                <button id="nextStepBtn" class="btn-next">Continuer</button>
            </div>
            <div id="step2" style="display: none;">
                <form id="rdvForm" method="POST" action="{{ route('rdv.store') }}">
                    @csrf
                    <input type="hidden" name="date" id="selectedDate">
                    <input type="hidden" name="time" id="selectedTime">
                    <div class="form-row">
                        <div class="fg"><label>Nom *</label><input type="text" name="patient_name" required></div>
                        <div class="fg"><label>Prénom *</label><input type="text" name="patient_firstname" required></div>
                    </div>
                    <div class="form-row">
                        <div class="fg"><label>Téléphone *</label><input type="tel" name="patient_phone" required></div>
                        <div class="fg"><label>Âge</label><input type="number" name="age"></div>
                    </div>
                    <div class="fg"><label>Service *</label>
                        <div class="svc-grid">
                            <input type="radio" name="service" value="consultation" id="s1" class="svc-radio" required><label for="s1" class="svc-label">Consultation</label>
                            <input type="radio" name="service" value="orthodontie" id="s2" class="svc-radio"><label for="s2" class="svc-label">Orthodontie</label>
                            <input type="radio" name="service" value="esthetique" id="s3" class="svc-radio"><label for="s3" class="svc-label">Esthétique</label>
                            <input type="radio" name="service" value="chirurgie" id="s4" class="svc-radio"><label for="s4" class="svc-label">Chirurgie</label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" id="backStep" class="btn-back">Retour</button>
                        <button type="submit" class="btn-confirm">Confirmer</button>
                    </div>
                </form>
            </div>
            <div id="step3" style="display: none; text-align: center;">
                <div style="font-size: 40px;">✅</div>
                <div style="font-size: 1.2rem;">Demande envoyée</div>
                <div id="successDetails" class="success-box"></div>
                <button id="closeModalBtn" class="btn-confirm">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- MODALE DE SUCCÈS (message : confirmation par téléphone/WhatsApp) -->
<div id="successModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); z-index: 2000; align-items: center; justify-content: center;">
    <div style="background: white; border-radius: 24px; max-width: 320px; width: 90%; padding: 20px; text-align: center;">
        <div style="font-size: 40px;">📋</div>
        <h3 style="color: var(--gold); margin-bottom: 8px; font-size: 1.2rem;">Demande envoyée</h3>
        <p style="font-size: 0.9rem; margin-bottom: 12px;">Nous vous contacterons par téléphone ou WhatsApp pour confirmer le créneau.</p>
        <button id="closeSuccessModal" style="background: var(--gold); border: none; padding: 8px 20px; border-radius: 30px; margin-top: 16px; cursor: pointer; font-weight: 600;">Fermer</button>
    </div>
</div>

<script>
    (function() {
        // Afficher la modale de succès si le paramètre "success" est présent dans l'URL
        function checkAndShowModal() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                const modal = document.getElementById('successModal');
                if (modal) {
                    modal.style.display = 'flex';
                    // Nettoyer l'URL pour éviter la réapparition au rafraîchissement
                    window.history.replaceState({}, document.title, window.location.pathname);
                } else {
                    console.error('Modale #successModal introuvable');
                }
            }
        }

        // Attendre que le DOM soit chargé
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', checkAndShowModal);
        } else {
            checkAndShowModal();
        }

        // Fermeture de la modale
        const closeSuccess = document.getElementById('closeSuccessModal');
        if (closeSuccess) {
            closeSuccess.onclick = () => {
                document.getElementById('successModal').style.display = 'none';
            };
        }
        window.onclick = (e) => {
            const modal = document.getElementById('successModal');
            if (e.target === modal) modal.style.display = 'none';
        };

        // --- Reste du code (calendrier, etc.) inchangé ---
        let currentYear = new Date().getFullYear();
        let currentMonth = new Date().getMonth();
        let selectedDateStr = null;
        let selectedTimeStr = null;
        const monthNames = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];

        async function fetchAvailability(year, month) {
            const start = new Date(year, month, 1).toISOString().slice(0,10);
            const end = new Date(year, month+1, 0).toISOString().slice(0,10);
            const url = `/rdv/availability?start=${start}&end=${end}`;
            const res = await fetch(url);
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            return await res.json();
        }

        async function fetchSlots(date) {
            const url = `/rdv/slots?date=${date}`;
            const res = await fetch(url);
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            return await res.json();
        }

        async function loadCalendar() {
            const grid = document.getElementById('calendarGrid');
            grid.innerHTML = 'Chargement...';
            try {
                const availability = await fetchAvailability(currentYear, currentMonth);
                const daysInMonth = new Date(currentYear, currentMonth+1, 0).getDate();
                const firstDay = new Date(currentYear, currentMonth, 1).getDay();
                let offset = firstDay === 0 ? 6 : firstDay - 1;
                grid.innerHTML = '';
                for (let i = 0; i < offset; i++) {
                    const empty = document.createElement('div');
                    empty.className = 'calendar-day disabled';
                    empty.style.visibility = 'hidden';
                    grid.appendChild(empty);
                }
                for (let d = 1; d <= daysInMonth; d++) {
                    const dateStr = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
                    const isPast = new Date(dateStr) < new Date(new Date().toDateString());
                    const count = availability[dateStr] || 0;
                    const available = count > 0 && !isPast;
                    const dayDiv = document.createElement('div');
                    dayDiv.className = 'calendar-day' + (available ? ' available' : ' disabled');
                    dayDiv.innerHTML = `<div>${d}</div>${count > 0 ? `<div class="slot-count">${count}</div>` : ''}`;
                    if (available) dayDiv.addEventListener('click', () => openModal(dateStr));
                    grid.appendChild(dayDiv);
                }
                document.getElementById('currentMonth').innerText = `${monthNames[currentMonth]} ${currentYear}`;
                document.getElementById('errorBanner').style.display = 'none';
            } catch (err) {
                document.getElementById('errorBanner').style.display = 'block';
                grid.innerHTML = 'Erreur de chargement. Cliquez sur "Rafraîchir".';
            }
        }

        async function openModal(date) {
            selectedDateStr = date;
            document.getElementById('selectedDate').value = date;
            const d = new Date(date);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('modalDate').innerText = d.toLocaleDateString('fr-FR', options);
            try {
                let slots = await fetchSlots(date);
                const today = new Date().toISOString().slice(0,10);
                if (date === today) {
                    const now = new Date();
                    const currentHour = now.getHours();
                    const currentMinute = now.getMinutes();
                    slots = slots.filter(slot => {
                        const [hour, minute] = slot.split(':').map(Number);
                        return (hour > currentHour) || (hour === currentHour && minute >= currentMinute);
                    });
                }
                const slotsDiv = document.getElementById('slotsContainer');
                slotsDiv.innerHTML = '';
                if (slots.length === 0) {
                    slotsDiv.innerHTML = '<div>Aucun créneau disponible</div>';
                    document.getElementById('nextStepBtn').style.display = 'none';
                } else {
                    slots.forEach(slot => {
                        const btn = document.createElement('button');
                        btn.innerText = slot;
                        btn.className = 'time-slot-btn';
                        btn.onclick = () => {
                            document.querySelectorAll('.time-slot-btn').forEach(b => b.classList.remove('selected'));
                            btn.classList.add('selected');
                            selectedTimeStr = slot;
                            document.getElementById('selectedTime').value = slot;
                            document.getElementById('nextStepBtn').style.display = 'block';
                        };
                        slotsDiv.appendChild(btn);
                    });
                    document.getElementById('nextStepBtn').style.display = 'none';
                    selectedTimeStr = null;
                }
            } catch (err) {
                document.getElementById('slotsContainer').innerHTML = '<div>Erreur de chargement des horaires</div>';
            }
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'none';
            document.getElementById('modalOverlay').classList.add('open');
        }

        function closeModal() {
            document.getElementById('modalOverlay').classList.remove('open');
            loadCalendar();
        }

        document.getElementById('prevMonthBtn').onclick = () => {
            if (currentMonth === 0) { currentMonth = 11; currentYear--; }
            else currentMonth--;
            loadCalendar();
        };
        document.getElementById('nextMonthBtn').onclick = () => {
            if (currentMonth === 11) { currentMonth = 0; currentYear++; }
            else currentMonth++;
            loadCalendar();
        };
        document.getElementById('nextStepBtn').onclick = () => {
            if (selectedTimeStr) {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            }
        };
        document.getElementById('backStep').onclick = () => {
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
        };
        document.getElementById('closeModal').onclick = closeModal;
        document.getElementById('closeModalBtn').onclick = closeModal;
        document.getElementById('modalOverlay').onclick = (e) => {
            if (e.target === document.getElementById('modalOverlay')) closeModal();
        };

        const form = document.getElementById('rdvForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!selectedDateStr || !selectedTimeStr) {
                    console.warn("Date ou heure non sélectionnée, mais on envoie quand même");
                }
            });
        }

        loadCalendar();
        document.getElementById('reloadBtn').addEventListener('click', () => location.reload());
    })();
</script>
</body>
</html>