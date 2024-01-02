<div>
    <div class="card">
        <div class="card-header">
            <div class="w-100 d-flex flex-stack">
                    <h3 class="card-title">
                        {{ ucfirst($title ?? 'Card title') }}
                    </h3>
                <div class="card-toolbar">
                    {{ $headerButton ?? '' }}
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $body ?? '' }}
        </div>
    </div>
</div>
