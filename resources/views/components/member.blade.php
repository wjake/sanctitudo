<div class="card mb-3 text-bg-light position-relative shadow border-dark">

    <img src="{{ $member->avatar }}" alt="{{ $member->name }} avatar" height="72" style="margin-top: 1rem; "
            class="position-absolute top-0 start-50 translate-middle-x
                border-light rounded shadow-sm">

    <div class="card-body shadow-sm text-center" style="margin-top: 5.5rem">
        <h5 class="card-title text-truncate">
            <a href="https://eu.finalfantasyxiv.com/lodestone/character/{{ $member->uid }}/"
                class="text-decoration-none link-secondary stretched-link">{{ $member->name }}</a>
        </h5>

        <p class="card-text text-truncate">
            <img src="{{ $member->rankIcon }}" alt="{{ $member->rankIcon }} Rank Icon">
            {{ $member->rank }}
        </p>
    </div>
</div>