<div class="card mb-3 text-bg-light" style="" >
    <div class="row g-0">
        <div class="col-4">
            <img src="{{ $member->avatar }}" class="img-fluid rounded-start" alt="{{ $member->name }} avatar">
        </div>
        <div class="col-8">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="https://eu.finalfantasyxiv.com/lodestone/character/{{ $member->uid }}/">{{ $member->name }}</a>
                </h5>
                <p class="card-text">
                    <img src="{{ $member->rankIcon }}" alt="{{ $member->rank }} icon">
                    {{ $member->rank }}
                </p>
            </div>
        </div>
    </div>
</div>
