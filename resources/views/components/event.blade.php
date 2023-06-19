<div class="card">
    @if ($event->imageUrl)
        <img src="{{ $event->imageUrl }}" class="card-img-top" alt="...">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $event->title }}</h5>
        <p class="card-text">{{ $event->description }}</p>
        <p class="card-text">
            <img src="/icons/PartyLeader.png" alt="Party Leader Icon" width="28" height="28">
            {{ $event->leaderName }}
        </p>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($event->signups as $signup)
            <li class="list-group-item d-flex justify-content-between align-items-center">
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
                        @elseif ($signup->specName === 'Paladin')
                            <img src="/icons/Paladin_Icon_3.5.png" alt="Ninja Icon" height="28">
                        @elseif ($signup->specName === 'Warrior')
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

        @endforeach
    </ul>
    <!-- <div class="card-body">
        <a href="https://discord.com/channels/936658259429965915/1049267310482968576" class="card-link">
            <img src="/icons/FeatureQuest4.png" alt="Treasure Hunt" width="48" height="48">
            Sign Up
        </a>
    </div> -->
</div>
