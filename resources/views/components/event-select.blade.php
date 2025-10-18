<select name="nature" required class="w-full border p-2 rounded-md mt-1">
    <option value="">Sélectionnez un type d'événement</option>
    @foreach($events as $event)
        <option value="{{ $event->id }}">{{ $event->name }}</option>
    @endforeach
</select>
