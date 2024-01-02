<x-admin.layout.app-layout>
    <x-slot name="title">Add New Designation</x-slot>
    <x-common.card>
        <x-slot name="title">Add New Designation</x-slot>
        <x-slot name="headerButton">
            <a href="{{ route('admin.designations.index') }}" class="btn btn-light-primary">Designations</a>
        </x-slot>
        <x-slot name="body">
            <form method="post" id="designationForm" action="{{ route('admin.designations.store')}}">
                @csrf
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                <div class="row w-100">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="mb-10">
                            <label for="name" class="required form-label">Department Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-solid" placeholder="Enter department name"/>
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="mb-10">
                            <label for="title" class="required form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-solid" placeholder="Enter title"/>
                            <span class="text-danger" id="title_error"></span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-10">
                            <label for="description" class="required form-label">Description</label>
                            <textarea name="description" id="description" class="form-control form-control-solid" placeholder="Enter description"></textarea>
                            <span class="text-danger" id="description_error"></span>
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
    <x-slot name="script">
        <script src="{{ asset('assets/js/designation-create.js') }}"></script>
    </x-slot>
</x-admin.layout.app-layout>
