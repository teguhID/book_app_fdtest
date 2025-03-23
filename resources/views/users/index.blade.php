<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>                                          
                    <b>List Users</b>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="users-table" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verification Status</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verification Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $key => $value)
                            <tr>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $value->name }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $value->email }}</td>
                                <td class="px-6 py-4 text-center text-sm">
                                    @if($value->email_verified_at == '')
                                        <div class="flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold text-red-500">need verification</span>
                                        </div>
                                    @else
                                        <div class="flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-bold text-green-500">verified</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $value->email_verified_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#users-table').DataTable({
                "initComplete": function() {
                    $('.dt-search').remove();
                    this.api().columns().every(function(index) {
                        var column = this;
                        var title = column.header().textContent;
                        var filterContainer = $('<div class="filter-container"></div>').appendTo($(column.header()));
                        
                        if (index == 3) {
                            var select = $('<select class="column-filter"><option value="">All Data</option></select>')
                                .appendTo(filterContainer)
                                .on('change', function() {
                                    if (column.search() !== this.value) {
                                        column.search(this.value).draw();
                                    }
                                });
                            
                            // Add fixed options instead of generating from data
                            select.append('<option value="verified">verified</option>');
                            select.append('<option value="need verification">need verification</option>');
                        } 
                        
                        if (index != 0 && index != 3) {    
                            var input = $('<input type="text" class="column-filter" />')
                                .appendTo(filterContainer)
                                .on('keyup change clear', function() {
                                    if (column.search() !== this.value) {
                                        column.search(this.value).draw();
                                    }
                                });
                        }                 
                    });
                },
                "columnDefs": [
                    { "orderable": false, "targets": [0,1,2,3,4] } 
                ],
                "order": [],
                "lengthChange": false
            });
        });

    </script>
</x-app-layout>
