<div class="team-container">
@forelse ($team as $item)

<div class="team-card">

    <div class="team-img">

        <img src="{{ asset('images/team/'.$item->image) }}" 
             alt="{{ $item->fullName }}">

        <div class="team-overlay">

            <ul>
                <li>
                    <a href="{{ $item->facebook }}" target="_blank">
                        <svg viewBox="0 0 24 24">
                            <path d="M14 8h3V4h-3c-3.3 0-5 2-5 5v3H6v4h3v8h4v-8h3l1-4h-4V9c0-.6.4-1 1-1z"/>
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="{{ $item->instagram }}" target="_blank">
                        <svg viewBox="0 0 24 24">
                            <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm5 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6-1a1.2 1.2 0 1 0 0 2.4A1.2 1.2 0 0 0 18 6z"/>
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="{{ $item->twitter }}" target="_blank">
                        <svg viewBox="0 0 24 24">
                            <path d="M18.9 2H22l-6.8 7.8L23 22h-6.1l-4.8-6.3L6.6 22H3.5l7.3-8.4L2 2h6.2l4.3 5.7L18.9 2z"/>
                        </svg>
                    </a>
                </li>
            </ul>

        </div>

    </div>


    <div class="team-content">
        <h3>{{ $item->fullName }}</h3>
        <p>{{ $item->caption }}</p>
    </div>


</div>

@empty

<h4>empty</h4>

@endforelse
</div>