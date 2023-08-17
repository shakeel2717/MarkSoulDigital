<div>
    <div class="card card-body shadow-lg">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="search">Search User</label>
                    <div class="input-group">
                        <input type="text" wire:model='username' wire:keydown.enter="searchUser" id="leftRefer" class="form-control">
                        <button class="btn btn-danger" wire:click="searchUser" type="button"
                            id="button-addon2">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
