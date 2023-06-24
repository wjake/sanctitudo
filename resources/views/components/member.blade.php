<div class="card mb-3 text-bg-light" style="min-width: 200px;" >

    {{-- <span class="position-absolute top-0 start-0 translate-middle">
        <img src="{{ $member->rankIcon }}" alt="High-end Dut Icon">
        <span class="visually-hidden">High-end Duty</span>
    </span> --}}

    <div class="row g-0">
        <div class="col-4">
            <img src="{{ $member->avatar }}" class="img-fluid rounded-start" alt="{{ $member->name }} avatar" width="72" height="72">
        </div>
        <div class="col-8">
            <div class="card-body" style="padding-top: 0.5rem;">
                <p class="card-text text-truncate">
                    <small>
                        <a href="https://eu.finalfantasyxiv.com/lodestone/character/{{ $member->uid }}/" class="text-decoration-none stretched-link">{{ $member->name }}</a>
                        <br />
                        <img src="{{ $member->rankIcon }}" alt="High-end Dut Icon">
                        {{ $member->rank }}
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>

