<div class="card mb-2 text-bg-light @if ($event->startTime <= time()) opacity-75 @endif shadow border-dark" style="margin-top: .5rem">

    {{-- Container for event image and relative duty icon position --}}
    <div class="position-relative">

        {{-- Display event duty type (based on channel ID) --}}
        @if ($event->startTime > time()) 
            <span class="badge text-bg-success shadow fs-6
                position-absolute bottom-0 start-0" style="margin: .5rem">Open</span>
        @else
            <span class="badge text-bg-danger shadow fs-6
                position-absolute bottom-0 start-0" style="margin: .5rem">Ended</span>
        @endif

        {{-- Overlay for event date --}}
        <span class="badge text-bg-light shadow fs-6
            position-absolute top-0 start-0" style="margin: .5rem">{{\Carbon\Carbon::parse($event->startTime)->format('jS F')}}</span>

        {{-- Overlay for event time --}}
        <span class="badge text-bg-light shadow fs-6
            position-absolute top-0 end-0" style="margin: .5rem">{{\Carbon\Carbon::parse($event->startTime)->format('H:i')}} UTC</span>

        {{-- Overlay of signup count --}}
        <span class="badge text-bg-light shadow fs-6
            position-absolute bottom-0 end-0" style="margin: .5rem">{{count($event->signups)}} / 8</span>

        {{-- Display event duty type (based on channel ID) --}}
        <img src="/icons/duty/{{$event->channelId}}.png" alt="Duty Icon" height="48" style="margin-top: .5rem"
            class="position-absolute top-0 start-50 translate-middle">

        {{-- Display event image if exists, otherwise placeholder --}}
        @if ($event->imageUrl)
            <img src="{{$event->imageUrl}}" class="card-img-top object-fit-cover" alt="{{$event->title}} image" style="height: 15rem;"
                data-bs-toggle="modal" data-bs-target="#{{$event->event_uid}}Image">
        @else
            <img src="images/placeholder.png" class="card-img-top object-fit-cover" alt="{{$event->title}} placeholder" style="height: 15rem;">
        @endif

    </div>

    <div class="card-body shadow-sm text-center">

        {{-- Event title with web-view link and truncated text --}}
        <h5 class="card-title text-truncate">
            <a href="https://raid-helper.dev/event/{{$event->event_uid}}" class="text-decoration-none">{{ $event->title }}</a>
        </h5>

        <hr />

        <p class="card-text" style="height: 2rem;">{{$event->description}}</p>

        {{-- Button responsible for signup collapsing, showing number count --}}
        <div class="d-grid gap-2">
            <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse"
                data-bs-target="#signups-{{ $event->event_uid }}" aria-expanded="false"
                aria-controls="#signups-{{ $event->event_uid }}">
                Show / Hide Signups
            </button>
        </div>

    </div>

    <div class="collapse" id="signups-{{$event->event_uid}}">
        <ul class="list-group list-group-flush">
            @foreach ($event->signups as $signup)
                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item">

                    {{-- Check whether signup is event leader --}}
                    @if ($event->leaderName === $signup->name)
                        <img src="/icons/PartyLeader.png" alt="Party Leader Icon">
                    @else
                        <img src="/icons/PartyMember.png" alt="Party Leader Icon">
                    @endif

                    {{ $signup->name }}

                    <img src="/icons/role/{{$signup->specName}}.png" alt="{{$signup->specName}} Icon" height="28">
                </li>
            @endforeach
        </ul>
    </div>

    <div class="card-footer text-center @if ($event->startTime >= time()) text-success @endif">
        <i class="bi-alarm"></i> {{\Carbon\Carbon::parse($event->startTime)->format('jS F H:i')}} UTC
    </div>
</div>

{{-- Modal for full view unique event images --}}
<div class="modal fade" id="{{$event->event_uid}}Image" tabindex="-1" aria-labelledby="{{$event->event_uid}}ImageModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <img src="{{$event->imageUrl}}" alt="{{$event->title}} modal image">
        </div>
    </div>
</div>
