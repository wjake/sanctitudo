<div class="card mb-2 shadow border-dark" data-bs-theme="light">

    {{-- Container for event image and relative duty icon position --}}
    <div class="position-relative">

        {{-- Overlay for event date --}}
        <span class="badge text-bg-light shadow-sm fs-6
            position-absolute top-0 start-0" style="margin: .5rem">{{$event->date()}}</span>

        {{-- Event status --}}
        <span class="badge @if ($event->isOpen()) text-bg-success @else text-bg-danger @endif shadow-sm fs-6
            position-absolute top-0 start-50 translate-middle-x" style="margin-top: .5rem">@if ($event->isOpen()) Open @else Ended @endif </span>

        {{-- Overlay for event time --}}
        <span class="badge text-bg-light shadow-sm fs-6
            position-absolute top-0 end-0" style="margin: .5rem">{{$event->time()}}</span>

        {{-- Overlay of signup count --}}
        <span class="badge text-bg-light shadow-sm fs-6
            position-absolute bottom-0 start-0" style="margin: .5rem"><i class="bi bi-people-fill"></i> {{count($event->signups)}} / 8</span>

        {{-- Overlay of event leader --}}
        <span class="badge text-bg-light shadow-sm fs-6 position-absolute bottom-0 end-0" style="margin: .5rem">
            {{$event->leaderName}} <i class="bi bi-person-fill"></i>
        </span>

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

    </div>

    <div class="card-footer text-center">

        {{-- Show additional information button --}}
        <div class="d-grid gap-2">
            <button class="btn btn-outline-secondary btn-sm" type="button"
                data-bs-toggle="modal" data-bs-target="#{{$event->id}}">
                Additional Information
            </button>
        </div>

    </div>
</div>

{{-- Modal for full view unique event images --}}
<div class="modal fade" id="{{$event->id}}Image" tabindex="-1" aria-labelledby="{{$event->id}}ImageModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-truncate">{{$event->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <img src="{{$event->imageUrl}}" alt="{{$event->title}} modal image">
        </div>
    </div>
</div>

{{-- Modal for full view unique event images --}}
<div class="modal fade" id="{{$event->id}}" tabindex="-1" aria-labelledby="{{$event->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-truncate">{{$event->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="position-relative">

                {{-- Overlay for event date --}}
                <span class="badge text-bg-dark shadow-sm fs-6
                    position-absolute top-0 start-0" style="margin: .5rem">{{$event->date()}}</span>
        
                {{-- Event status --}}
                <span class="badge @if ($event->isOpen()) text-bg-success @else text-bg-danger @endif shadow-sm fs-6
                    position-absolute top-0 start-50 translate-middle-x" style="margin-top: .5rem">@if ($event->isOpen()) Open @else Ended @endif </span>
        
                {{-- Overlay for event time --}}
                <span class="badge text-bg-dark shadow-sm fs-6
                    position-absolute top-0 end-0" style="margin: .5rem">{{$event->time()}}</span>
        
                {{-- Overlay of signup count --}}
                <span class="badge text-bg-dark shadow-sm fs-6
                    position-absolute bottom-0 start-0" style="margin: .5rem"><i class="bi bi-people-fill"></i> {{count($event->signups)}} / 8</span>
        
                {{-- Overlay of event leader --}}
                <span class="badge text-bg-dark shadow-sm fs-6 position-absolute bottom-0 end-0" style="margin: .5rem">
                    {{$event->leaderName}} <i class="bi bi-person-fill"></i>
                </span>
        
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

            <br />

            <div class="modal-body text-center">
                {{-- Display event description --}}
                @if ($event->description)
                    <p class="card-text">
                        <br />
                        {{$event->description}}
                    </p>
                @endif
            </div>

            <ul class="list-group list-group-flush">
                @foreach ($event->signups as $signup)
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item">
    
                        {{-- Check whether signup is event leader --}}
                        @if ($event->leaderName === $signup->name)
                            <img src="/icons/PartyLeader.png" alt="Party Leader Icon">
                        @else
                            <img src="/icons/PartyMember.png" alt="Party Member Icon">
                        @endif
    
                        {{ $signup->name }}
    
                        <img src="/icons/role/{{$signup->specName}}.png" alt="{{$signup->specName}} Icon" height="28">
                    </li>
                @endforeach
            </ul>

            <div class="modal-footer">
                <a href="{{$event->channel->link()}}" class="btn btn-primary" type="button">
                    <i class="bi bi-discord"></i> {{$event->channel['tag']}}
                </a>
                <a href="https://raid-helper.dev/event/{{$event->id}}" class="btn btn-secondary" type="button">
                    <i class="bi bi-box-arrow-up-right"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
