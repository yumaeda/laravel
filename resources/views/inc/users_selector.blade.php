<select multiple="multiple" class="js-multi_user_picker" name="selected_users[]">
    @foreach ($users as $user)
    <option value='{{ $user->id }}'>
        {{ $user->first_name . ' ' . $user->last_name }}
    </option>
    @endforeach
</select>
