<div class="card mb-2 @if (!$event->isOpen()) opacity-75 @endif shadow border-dark" data-bs-theme="light">

    {{-- Container for event image and relative duty icon position --}}
    <div class="position-relative">

        <span class="badge @if ($event->isOpen()) text-bg-success @else text-bg-danger @endif shadow-sm fs-6
                position-absolute bottom-0 start-0" style="margin: .5rem">@if ($event->isOpen()) Open @else Ended @endif</span>

        {{-- Overlay for event date --}}
        <span class="badge text-bg-light shadow-sm fs-6
            position-absolute top-0 start-0" style="margin: .5rem">{{$event->date()}}</span>

        {{-- Overlay for event time --}}
        <span class="badge text-bg-light shadow-sm fs-6
            position-absolute top-0 end-0" style="margin: .5rem">{{$event->time()}}</span>

        {{-- Overlay of signup count --}}
        <span class="badge text-bg-light shadow-sm fs-6
            position-absolute bottom-0 end-0" style="margin: .5rem">{{count($event->signups)}} / 8 <i class="bi bi-people-fill"></i></span>

        {{-- Display event duty type and channel link --}}
        <a href="/events/{{$event->channel_id}}">
            <img src="/icons/duty/{{$event->channel_id}}.png" alt="Duty Icon" height="72"
            class="position-absolute top-100 start-50 translate-middle rounded">
        </a>

        {{-- Display event image if exists, otherwise placeholder --}}
        @if ($event->imageUrl)
            <img src="{{$event->imageUrl}}" class="card-img-top object-fit-cover shadow-sm" alt="{{$event->title}} image" style="height: 15rem;"
                data-bs-toggle="modal" data-bs-target="#{{$event->id}}Image">
        @else
            <img src="/images/placeholder.png" class="card-img-top object-fit-cover shadow-sm" alt="{{$event->title}} placeholder" style="height: 15rem;">
        @endif

    </div>

    <div class="card-body shadow-sm text-center" style="padding-top: 3.5rem;">

        {{-- Event title with truncated text --}}
        <h5 class="card-title text-truncate">{{ $event->title }}</h5>

        {{-- Additional event links --}}
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="{{$event->channel->link()}}" class="btn btn-primary btn-sm" type="button">
                <i class="bi bi-discord"></i>
            </a>
            <a href="/events/{{$event->channel_id}}" class="btn btn-secondary btn-sm" type="button">
                #{{$event->channel['tag']}}
            </a>
            <a href="https://raid-helper.dev/event/{{$event->id}}" class="btn btn-outline-secondary btn-sm" type="button">
                Edit <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </div>

    </div>

    <div class="card-footer text-center">

        {{-- Toggle button for more information --}}
        <div class="d-grid gap-2">
            <button class="btn btn-outline-secondary btn-sm" type="button" data-bs-toggle="collapse"
                data-bs-target="#signups-{{ $event->id }}" aria-expanded="false"
                aria-controls="#signups-{{ $event->id }}">
                Show / Hide Information
            </button>
        </div>

        <div class="collapse" id="signups-{{$event->id}}">

            {{-- Display event description --}}
            <p class="card-text">
                <br />
                {{$event->description}}
            </p>

            <ul class="list-group shadow-sm" data-bs-theme="light">
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
    </div>
</div>

{{-- Modal for full view unique event images --}}
<div class="modal fade" id="{{$event->id}}Image" tabindex="-1" aria-labelledby="{{$event->id}}ImageModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <img src="{{$event->imageUrl}}" alt="{{$event->title}} modal image">
        </div>
    </div>
</div>
