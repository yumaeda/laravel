<div class="user_dropdown">
    <select name="user_id" class="user_selector">
        @inject('user_svc', 'App\Services\UserService')
        @foreach ($users as $user)
        <option value="{{ $user->id }}" style="background-image: url('{{ $user_svc->getProfileImageUrl($user->id) }}');">
            {{ $user->first_name . ' ' . $user->last_name }}
        </option>
        @endforeach
    </select>
</div>
