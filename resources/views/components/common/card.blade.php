<div>
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex flex-stack">
                <div>
                    <h5 class="card-title">
                        {{ ucfirst($title ?? 'Card title') }}
                    </h5>
                </div>
                <div>
                    {{ $button ?? '' }}
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $body ?? '' }}
        </div>
    </div>
</div>
