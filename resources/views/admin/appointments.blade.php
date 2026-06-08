<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rendez-vous du jour</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-chevalley.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: #f5f5f5; padding: 40px 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: white; border-radius: 32px; padding: 30px; box-shadow: 0 12px 32px rgba(0,0,0,0.05); }
        h1 { color: #D4AF37; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }
        .filters { margin-bottom: 20px; display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap; }
        .filters input, .filters button { padding: 8px 16px; border-radius: 30px; border: 1px solid #ddd; }
        .filters button { background: #D4AF37; border: none; cursor: pointer; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #fafafa; color: #333; }
        .status { padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block; }
        .confirme { background: #fff3cd; color: #856404; }
        .honore { background: #d4edda; color: #155724; }
        .annule { background: #f8d7da; color: #721c24; }
        button[type="submit"] { border: none; padding: 4px 12px; border-radius: 20px; cursor: pointer; font-weight: bold; }
        .btn-honore { background: #28a745; color: white; }
        .btn-annule { background: #dc3545; color: white; }
        .logout-btn { background: #D4AF37; padding: 6px 14px; border-radius: 30px; font-size: 14px; text-decoration: none; color: black; }
        .alert { padding: 12px; border-radius: 12px; margin-bottom: 20px; }
        .alert-success { background: #d4edda; color: #155724; }
    </style>
</head>
<body>
<div class="container">
    <h1>📋 Rendez-vous <a href="{{ route('admin.logout') }}" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="filters">
        <form method="GET" action="{{ route('admin.appointments') }}" style="display: flex; gap: 10px;">
            <label for="date">Date :</label>
            <input type="date" name="date" id="date" value="{{ $date }}" required>
            <button type="submit">Voir</button>
        </form>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr><th>Heure</th><th>Patient</th><th>Téléphone</th><th>Service</th><th>Âge</th><th>Statut</th><th>Action</th></tr>
            </thead>
            <tbody>
                @forelse($appointments as $apt)
                <tr>
                    <td>{{ $apt->time }}</td>
                    <td>{{ $apt->patient_name }} {{ $apt->patient_firstname }}</td>
                    <td>{{ $apt->patient_phone }}</td>
                    <td>{{ $apt->service }}</td>
                    <td>{{ $apt->age }}</td>
                    <td><span class="status {{ $apt->status }}">{{ $apt->status }}</span></td>
                    <td>
                        @if($apt->status != 'honore' && $apt->status != 'annule')
                            <form action="{{ route('admin.updateStatus', $apt->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="status" value="honore">
                                <button type="submit" class="btn-honore">✅ Honoré</button>
                            </form>
                            <form action="{{ route('admin.updateStatus', $apt->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="status" value="annule">
                                <button type="submit" class="btn-annule">❌ Annulé</button>
                            </form>
                        @else
                            <span class="status {{ $apt->status }}">Déjà traité</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="7">Aucun rendez-vous pour cette date.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ url('/') }}" class="logout-btn" style="display: inline-block; margin-top: 20px;"><i class="fas fa-home"></i> Retour au site</a>
</div>
</body>
</html>