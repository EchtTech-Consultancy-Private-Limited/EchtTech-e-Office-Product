<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Generate License Key</h4>
            <div class="mb-3">
                <button id="generateLicense" class="btn btn-primary btn-lg w-100">Generate License</button>
            </div>
            <div class="mb-3">
                <input type="hidden" id="duration">
                <input type="hidden" id="validFromDate">
                <input type="hidden" id="validToDate">
                <label for="license_key" class="form-label">License Key:</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="license_key" id="license_key" readonly>
            </div>
            <div id="licenseKeyData">
                <div class="mb-3">
                    <label for="licenseKeyDuration" class="form-label"><b>Duration</b>:</label>
                    <span id="licenseKeyDuration" class="fw-bold"></span>
                </div>
                <div class="mb-3">
                    <label for="validFrom" class="form-label"><b>Valid From</b>:</label>
                    <span id="validFrom" class="fw-bold"></span>
                </div>
                <div class="mb-3">
                    <label for="expireDate" class="form-label"><b>Expiration Date</b>:</label>
                    <span id="expireDate" class="fw-bold"></span>
                </div>
            </div>
        </div>
    </div>
</div>
