<div class="row w-100">
    @foreach($modules as $module)
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-check">
                <input name="module[]" class="form-check-input" type="checkbox" value="{{ $module->id }}" id="module_{{ $module->id }}" />
                <label class="form-check-label" for="module_{{ $module->id }}">
                    {{ $module->module_name ?? '' }}
                </label>
            </div>
        </div>
    @endforeach
    <div>
        <span id="module_error" class="text-danger"></span>
    </div>
</div>
