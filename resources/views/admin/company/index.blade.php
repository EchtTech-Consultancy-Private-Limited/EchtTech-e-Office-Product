<x-admin.layout.app-layout>
    <x-slot name="title">
        Company Listing
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Companies Listing
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive">
                <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                <thead>
                <tr class="fw-semibold fs-6 text-gray-800">
                    <th>Sr.No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img data-src="{{ $company->logo_path ?? '' }}"
                                 class="lozad rounded w-40px h-40px" src="{{ $company->logo_path ?? '' }}" alt="company logo"/></td>
                        <td>{{ $company->company_name ?? '' }}</td>
                        <td>{{ $company->company_email ?? '' }}</td>
                        <td>{{ $company->contactDetails->phone ?? '' }}</td>
                        <td>{{ optional(\Carbon\Carbon::parse($company->created_at))->format('d-m-Y') ?? '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-common.card>
</x-admin.layout.app-layout>
