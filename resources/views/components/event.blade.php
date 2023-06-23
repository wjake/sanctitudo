<div class="card mb-2 @if ($event->startTime <= time()) opacity-50 @endif">

    <span class="position-absolute top-0 start-50 translate-middle">
        @if ($event->channelName === 'schedule')
            <img src="/icons/HighEndDuty.png" alt="High-end Dut Icon" height="32">
            <span class="visually-hidden">High-end Duty</span>
        @elseif ($event->channelName === 'treasure-planner')
            <img src="/icons/TreasureHunt.png" alt="Treasure Hunt Icon" height="32">
            <span class="visually-hidden">Treasure Hunt</span>
        @elseif ($event->channelName === 'events')
            <img src="/icons/Trial.png" alt="Trial Icon" height="32">
            <span class="visually-hidden">Trial</span>
        @endif
    </span>

    @if ($event->imageUrl)
        <img src="{{ $event->imageUrl }}" class="card-img-top" alt="{{ $event->title }} image">
    @endif
    <div class="card-body ">
        <h5 class="card-title text-truncate">{{ $event->title }}</h5>
        <p class="card-text">
            {{ $event->description }}
        </p>
        <p class="card-text">
            <img src="/icons/PartyLeader.png" alt="Party Leader Icon" width="28" height="28">
            {{ $event->leaderName }}
        </p>

        <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#signups-{{ $event->event_uid }}" aria-expanded="false" aria-controls="#signups-{{ $event->event_uid }}">
            Show / Hide Signups
            <span class="badge text-bg-secondary">{{ count($event->signups) }} / 8</span>
        </button>
        <a href="https://raid-helper.dev/event/{{ $event->event_uid }}" class="btn btn-link">Edit</a>
    </div>

    <div class="collapse" id="signups-{{ $event->event_uid }}">
        <ul class="list-group list-group-flush">
            @foreach ($event->signups as $signup)
                @if ($signup->specName !== 'Absence')
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item">
                        {{ $signup->name }}
                        <span class="badge">
                            @if ($signup->specName === 'Allrounder')
                                <img src="/icons/All_Rounder_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Bard')
                                <img src="/icons/Bard_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Dragoon')
                                <img src="/icons/Dragoon_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Monk')
                                <img src="/icons/Monk_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'PaladinFF')
                                <img src="/icons/Paladin_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'WarriorFF')
                                <img src="/icons/Warrior_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Blackmage')
                                <img src="/icons/Black_Mage_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Whitemage')
                                <img src="/icons/White_Mage_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Scholar')
                                <img src="/icons/Scholar_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Summoner')
                                <img src="/icons/Summoner_Icon_3.5.png" alt="Summoner Icon" height="28">
                            @elseif ($signup->specName === 'Ninja')
                                <img src="/icons/Ninja_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Astrologian')
                                <img src="/icons/Astrologian_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Darkknight')
                                <img src="/icons/Dark_Knight_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Machinist')
                                <img src="/icons/Machinist_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Redmage')
                                <img src="/icons/Red_Mage_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Samurai')
                                <img src="/icons/Samurai_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Bluemage')
                                <img src="/icons/Blue_Mage_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Gunbreaker')
                                <img src="/icons/Gunbreaker_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Dancer')
                                <img src="/icons/Dancer_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Reaper')
                                <img src="/icons/Reaper_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @elseif ($signup->specName === 'Sage')
                                <img src="/icons/Sage_Icon_3.5.png" alt="Ninja Icon" height="28">
                            @else
                                {{ $signup->specName }}
                            @endif
                        </span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="card-footer text-center">
        @if ($event->startTime >= time())
            <i class="bi-alarm" style="font-size: 1rem;"></i> {{ \Carbon\Carbon::parse($event->startTime)->format('l jS \of F H:i')}} UTC
        @else
            <i class="bi-alarm" style="font-size: 1rem; color:red;"></i> {{ \Carbon\Carbon::parse($event->startTime)->format('l jS \of F H:i')}} UTC
        @endif
    </div>
</div>
