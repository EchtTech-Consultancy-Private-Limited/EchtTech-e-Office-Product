<x-admin.layout.app-layout>
    <x-slot name="title">
        Modules | Create
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Create Module
        </x-slot>
        <x-slot name="body">
            <form method="post" action="{{ route('api.admin.module.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-10">
                            <label for="module_name" class="required form-label">Module Name</label>
                            <input type="text" name="module_name" class="form-control form-control-solid"
                                   id="module_name" placeholder="Enter module name.."/>
                            <span id="module_name_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-10">
                            <label for="title" class="required form-label">Title</label>
                            <input type="text" name="title" class="form-control form-control-solid" id="title"
                                   placeholder="Enter module title.."/>
                            <span id="title_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-10">
                            <label for="description" class="required form-label">Description</label>
                            <textarea name="description" class="form-control form-control-solid" id="description"
                                      placeholder="Enter description.."></textarea>
                            <span id="description_error" class="text-danger"></span>
                        </div>
                        <div>
                            <x-active-in-active-toggle/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="d-flex w-100 justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-common.card>
    <x-slot name="script">
        <script src="{{ asset('assets/js/module/module.js') }}"></script>
    </x-slot>
</x-admin.layout.app-layout>
