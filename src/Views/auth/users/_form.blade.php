<div class="row mb-3">
  <div class="col-lg-4">
    <x-form-text name="name" label="User Name" placeholder="John Smith" class="mb-2"/>
  </div>
  <div class="col-lg-4">
    <x-form-text name="title" label="User Title" placeholder="Sales Manager" class="mb-2"/>
  </div>
  <div class="col-lg-4">
    <x-form-email name="email" label="User Email" placeholder="john@smith.com" class="mb-2"/>
  </div>
  <div class="col-lg-4">
    <x-form-select-tags name="role" label="Roles" placeholder="Select Role..." :options="$roles->pluck('label', 'name')->toArray()" class="mb-2"/>
  </div>
  <div class="col-lg-4">
    <x-form-select name="role" label="Permissions" placeholder="Select Permission..." :options="$permissions->pluck('label', 'name')->toArray()" class="mb-2"/>
  </div>
</div>
