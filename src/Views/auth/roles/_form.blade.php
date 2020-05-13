<div class="row mb-3">
  <div class="col-lg-6">
    <x-form-text name="name" label="Role Name" placeholder="product-manager" class="mb-2"/>
  </div>
  <div class="col-lg-6">
    <x-form-text name="label" label="Role Label" placeholder="Product Manager" class="mb-2"/>
  </div>
  <div class="col-lg-12">
    <x-form-textarea name="description" label="Permission Description" class="mb-2"/>
  </div>
  <div class="col-lg-12">
    <label class="form-label">Permission type</label>
    <div class="form-selectgroup-boxes row mb-3">
      <div class="col-lg-6">
        <label class="form-selectgroup-item">
          <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked="">
          <span class="form-selectgroup-label d-flex align-items-center p-3">
            <span class="mr-3">
              <span class="form-selectgroup-check"></span>
            </span>
            <span class="form-selectgroup-label-content">
              <span class="form-selectgroup-title strong mb-1">Simple</span>
              <span class="d-block text-muted">Simple permission without any individual permissions assigned.</span>
            </span>
          </span>
        </label>
      </div>
      <div class="col-lg-6">
        <label class="form-selectgroup-item">
          <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
          <span class="form-selectgroup-label d-flex align-items-center p-3">
            <span class="mr-3">
              <span class="form-selectgroup-check"></span>
            </span>
            <span class="form-selectgroup-label-content">
              <span class="form-selectgroup-title strong mb-1">Advanced</span>
              <span class="d-block text-muted">Advanced permission with individual permissions assigned.</span>
            </span>
          </span>
        </label>
      </div>
    </div>
  </div>
</div>
