<select name="user_id" class="user_selector">
    @foreach ($users as $user)
    <option value="{{ $user->id }}">
        {{ $user->first_name . ' ' . $user->last_name }}
    </option>
    @endforeach
</select>
