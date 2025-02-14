<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="event_type">Type d'événement</label>
        <input type="text" name="event_type" class="form-control" id="event_type" required>
    </div>
    <div class="form-group">
        <label for="start_date">Date de début</label>
        <input type="date" name="start_date" class="form-control" id="start_date" required>
    </div>
    <div class="form-group">
        <label for="end_date">Date de fin</label>
        <input type="date" name="end_date" class="form-control" id="end_date" required>
    </div>
    <div class="form-group">
        <label for="start_time">Heure de début</label>
        <input type="time" name="start_time" class="form-control" id="start_time" required>
    </div>
    <div class="form-group">
        <label for="end_time">Heure de fin</label>
        <input type="time" name="end_time" class="form-control" id="end_time" required>
    </div>
    <div class="form-group">
        <label for="guests_count">Nombre d'invités</label>
        <input type="number" name="guests_count" class="form-control" id="guests_count" required>
    </div>
    <div class="form-group">
        <label for="budget">Budget estimé</label>
        <input type="number" step="0.01" name="budget" class="form-control" id="budget" required>
    </div>
    <div class="form-group">
        <label for="details">Détails de la demande</label>
        <textarea name="details" class="form-control" id="details"></textarea>
    </div>
    <div class="form-group">
        <label for="salle_id">Salle</label>
        <select name="salle_id" class="form-control" required>
            @foreach ($salles as $salle)
                <option value="{{ $salle->id }}">{{ $salle->name }} - {{ $salle->location }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Créer l'événement</button>
</form>
