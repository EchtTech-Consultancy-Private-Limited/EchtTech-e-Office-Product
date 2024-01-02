<div>
    <label for="country" class="required form-label">Country</label>
    <select name="country" id="country" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option">
        <option value="" selected>Select Country</option>
        @foreach($countries as $country)
            <option value="{{ $country->id ?? '' }}">{{ $country->name ?? '' }}</option>
        @endforeach
    </select>
    <span id="country_error" class="text-danger"></span>
</div>
