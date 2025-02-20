<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture - {{ $event->event_type }}</title>
    <style>


        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .company-info {
            text-align: left;
        }
        .company-info h2 {
            color: #007bff;
            margin: 0;
        }
        .invoice-title {
            text-align: right;
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            margin: 4px 0;
        }
        .table-container {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table-container th {
            background: #0891B2;
            color: white;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- En-tête -->
        <div class="header">
            <div class="company-info">
                <h2>{{ $company->name }}</h2>
                <p>{{ $company->address }}</p>
                <p>Email : {{ $company->email }}</p>
                <p>Tél : {{ $company->phone }}</p>
            </div>
            <div class="invoice-title">FACTURE</div>
        </div>

        <!-- Détails de la facture -->
        <div class="invoice-details header">
            <p><strong>Facture N° :</strong> #{{ $event->id }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</p>
            <p><strong>Client :</strong> {{ $event->user->name }}</p>
            <p><strong>Email :</strong> {{ $event->user->email }}</p>
        </div>
        <div class="invoice-details">

            <p><strong>Lieu de l'événement :</strong> {{ $event->hall->address}}</p>
            <p><strong>Salle :</strong> {{ $event->hall->title }}</p>
            <p><strong>Date de l'événement :</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} jusqu'au {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}</p>
            <p><strong>Adresse de la salle :</strong> {{ $event->hall->address }}</p>
        </div>

        <!-- Tableau des détails -->
        <table class="table-container">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Réservation - {{ $event->event_type }}</td>
                    <td>1</td>
                    <td>{{ number_format($event->amount, 2) }} FCFA</td>
                    <td>{{ number_format($event->amount, 2) }} FCFA</td>
                </tr>
            </tbody>
        </table>

        <!-- Montant total -->
        <p class="total">Montant Total : {{ number_format($event->amount, 2) }} FCFA</p>

        <!-- Pied de page -->
        <div class="footer">
            <p>Merci pour votre confiance !</p>
            <p>Entreprise | Adresse | Téléphone | Email</p>
        </div>
    </div>
</body>
</html>
