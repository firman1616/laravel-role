<div class="modal-content">
    <form id="formAction" action="{{route('roles.update',$role->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="RoleName" class="form-label">Role Name</label>
                    <input type="text" placeholder="Role Name" class="form-control" name="name" id="RoleName" value="{{$role->name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="guardName" class="form-label">Guard</label>
                    <input type="text" placeholder="Guard Name" name="guard_name" class="form-control" id="guardName" value="{{$role->guard_name}}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </form>
</div>