@props([
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'label' => '',
    'id' => '',
    'errorMessage' => ''
])

<div class="d-flex flex-column fv-row">
    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
        <span class="required">{{ $label ?? '' }}</span>
    </label>
    <input type="text" id="{{ $id }}" class="form-control form-control-solid" placeholder="{{ $placeholder ?? '' }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" />

</div>
