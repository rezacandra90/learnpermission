<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $role->name }}">
</div>
<div class="form-group">
    <label for="guard_name">Guard Name</label>
    <input type="text" name="guard_name" id="guard_name" placeholder='default to "web"' class="form-control" value="{{ old('guard_name') ?? $role->guard_name }}">
</div>
<button type="submit" class="btn btn-primary">{{ $submit }}</button>