<x-admin.layout.app-layout>
    <x-slot name="title">
        Add Department
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Add Department
        </x-slot>
        <x-slot name="headerButton">
            <a href="{{ route('admin.departments.index') }}" class="btn btn-light-primary">Departments</a>
        </x-slot>
        <x-slot name="body">
            <form method="post" action="{{ route('admin.departments.store') }}">
                @csrf
                <div class="row w-100">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="mb-10">
                            <label for="name" class="required form-label">Department Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-solid" placeholder="Enter department name"/>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="mb-10">
                            <label for="title" class="required form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-solid" placeholder="Enter title"/>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-10">
                            <label for="description" class="required form-label">Description</label>
                            <textarea name="description" id="description" class="form-control form-control-solid" placeholder="Enter title"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <x-active-in-active-toggle/>
                    </div>
                </div>
                <div class="d-flex justify-content-end w-100">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-slot>
    </x-common.card>
</x-admin.layout.app-layout>
