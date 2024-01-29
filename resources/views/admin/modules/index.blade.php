<x-admin.layout.app-layout>
    <x-slot name="title">
        Modules
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Modules
        </x-slot>
        <x-slot name="headerButton">
            <a class="btn btn-light-primary">Create Module</a>
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800">
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($modules as $module)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $module->module_name }}</td>
                           <td>{{ $module->title }}</td>
                           <td>{{ $module->created_at }}</td>
                           <td>{!! $module->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>' !!}</td>
                           <td>
                               <div class="btn-group">
                                   <a class="btn btn-light-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Action
                                   </a>
                                   <div class="dropdown-menu">
                                       <a class="dropdown-item" href="#">Edit</a>
                                       <a class="dropdown-item" href="#">Delete</a>
                                   </div>
                               </div>

                           </td>
                       </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-common.card>
</x-admin.layout.app-layout>
