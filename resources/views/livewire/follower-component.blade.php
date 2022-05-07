<div>
    <div class="widget stick-widget">
        <h4 class="widget-title">Who's follownig</h4>
        <ul class="followers">
            @foreach ($followers as $follower)


            <li>
                <figure><img src="{{ $follower->user->profile_photo_path }}" alt=""></figure>
                <div class="friend-meta">
                    <h4><a href="time-line.html" title="">{{ $follower->user->name }}</a></h4>
                    <a href="#" title="" class="underline">Add Friend</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
