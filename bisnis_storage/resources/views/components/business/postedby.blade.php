<div class="bycard shadow-sm overview">
    <h2 class="border-bottom">Posted By</h2>
    <div class="usercover">
        <img src="{{ $user->resize }}" alt="">

        <h4>{{ $user->name }}</h4>
        <p>Member Since {{\Carbon\Carbon::parse($user->created_at)->format('M Y')}}</p>
    </div>
</div>