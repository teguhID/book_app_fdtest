<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @if (session()->has('success'))
                <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-md" role="alert">
                    <div class="flex justify-between">
                        <div class="ml-3 flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" onclick="document.getElementById('alert-success').remove()" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div id="alert-success" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-md" role="alert">
                    <div class="flex justify-between">
                        <div class="ml-3 flex items-center">
                            <svg class="h-5 w-5 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" onclick="document.getElementById('alert-success').remove()" class="inline-flex rounded-md p-1.5 text-red-500 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-between items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>                      
                    <b>List Book</b>
                </div>
                <a href="#" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" onclick="showModalAdd()">
                    Add Book
                </a>
            </div>
            <div class="overflow-x-auto">
                <table id="booksTable" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">cover</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $key => $value)
                        <tr>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                @if ($value->cover != '' || $value->cover != null || $value->cover || !empty($value->cover) )
                                    <img src="{{asset('/storage/' . $value->cover)}}" width="100">    
                                @else
                                    <img src="https://store.bookbaby.com/BookShop/CommonControls/BookshopThemes/bookshop/OnePageBookCoverImage.jpg?BookID=BK90023891&abOnly=False&ImageType=Back" width="100">   
                                @endif
                                
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $value->title }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $value->author }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">{{ $value->description }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $value->rating }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                <a href="#" class="w-100 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" onclick="showModalEdit('{{ $value->id_books }}')">
                                    Edit
                                </a>
                                <a href="#" class="w-100 mt-1 inline-block px-6 py-2.5 bg-red-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-900 active:shadow-lg transition duration-150 ease-in-out" onclick="showModalDelete('{{ $value->id_books }}', '{{ $value->title }}')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- MODAL ADD --}}
    <div id="modal-add" class="modal fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-backdrop fixed inset-0 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="modal-content inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Add New Book
                </h3>
                
                <form action="{{ route('books.add') }}" id="form-add" class="mt-4" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Cover</label>
                        <input type="file" name="image" id="image" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" onchange="previewImage(this, 'add')" accept="image/*" >
                        <div id="image-preview-add" class="mt-2" style="display: none;">
                            <img src="" class="max-w-xs rounded-md shadow-sm" style="max-height: 200px;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" id="title" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                        <input type="text" name="author" id="author" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="description" required rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating <small>range dari 0.0 - 5.0</small></label>
                        <input type="number" name="rating" min="0" max="5" step="0.1" id="rating" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" onchange="this.value = Math.min(Math.max(parseFloat(this.value) || 0, 0), 5).toFixed(1)">
                    </div>
                </form>
            </div>
            
            <div class="bg-gray-50 px-4 py-3 sm:px-6">
            <div class="flex justify-center space-x-3">
                <button type="submit" form="form-add" class="inline-flex justify-center px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                    Submit
                </button>
                <button id="closeModalBtn" type="button" class="inline-flex justify-center px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-colors" onclick="closeModalAdd()">
                    Cancel
                </button>
            </div>
            </div>
        </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="modal-edit" class="modal fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-backdrop fixed inset-0 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="modal-content inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline-edit">
                    Edit Book
                </h3>
                
                <form action="" id="form-edit" class="mt-4" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Cover</label>
                        <input type="file" name="image" id="image" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" onchange="previewImage(this, 'edit')" accept="image/*" >
                        <div id="image-preview-edit" class="mt-2">
                            <img id="image-edit" src="" class="max-w-xs rounded-md shadow-sm" style="max-height: 200px;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" id="title-edit" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                        <input type="text" name="author" id="author-edit" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="description-edit" required rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating <small>range dari 0.0 - 5.0</small></label>
                        <input type="number" name="rating" min="0" max="5" step="0.1" id="rating-edit" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" onchange="this.value = Math.min(Math.max(parseFloat(this.value) || 0, 0), 5).toFixed(1)">
                    </div>
                </form>
            </div>
            
            <div class="bg-gray-50 px-4 py-3 sm:px-6">
            <div class="flex justify-center space-x-3">
                <button type="submit" form="form-edit" class="inline-flex justify-center px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                    Submit
                </button>
                <button id="closeModalBtn" type="button" class="inline-flex justify-center px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-colors" onclick="closeModalEdit()">
                    Cancel
                </button>
            </div>
            </div>
        </div>
        </div>
    </div>

    {{-- MODAL DELETE --}}
    <div id="modal-delete" class="modal fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="modal-backdrop fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
    
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
            <div class="modal-content inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline-delete">
                        Delete Confirmation
                    </h3>
                    <p class="text-gray-600 mt-2" id="title-delete">

                    </p>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6">
                    <form id="form-delete" method="POST">
                        @csrf
                        <div class="flex justify-center space-x-3">
                            <button type="submit" class="inline-flex justify-center px-4 py-2 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors">
                                Delete
                            </button>
                            <button type="button" class="inline-flex justify-center px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-colors" onclick="closeModalDelete()">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#booksTable').DataTable({
                "initComplete": function() {
                    $('.dt-search').remove();
                    this.api().columns().every(function(index) {
                        var column = this;
                        var title = column.header().textContent;
                        var filterContainer = $('<div class="filter-container"></div>').appendTo($(column.header()));
                        
                        if (index !== 0 && index !== 6) {
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
                    { "orderable": false, "targets": [0, 1, 2, 3, 4, 6] } 
                ],
                "order": [],
                "lengthChange": false
            });
        });

        function validateRating(input) {
            let value = input.value;

    // Jika input kosong, biarkan kosong
    if (value === "") return;

    // Konversi ke angka float
    value = parseFloat(value);

    // Batasi angka agar tetap dalam rentang 0.0 - 5.0
    if (value < 0) {
        value = 0.0;
    } else if (value > 5) {
        value = 5.0;
    }

    // Pastikan hanya memiliki satu angka desimal
    input.value = value.toFixed(1);
        }

        
        function showModalAdd(){
            $('#modal-add').removeClass('hidden');
            setTimeout(function() {
                $('#modal-add').addClass('active');
            }, 10);
        }

        function closeModalAdd(){
            $('#modal-add').removeClass('active');
            setTimeout(function() {
                $('#modal-add').addClass('hidden');
            }, 300);
        }

        function showModalEdit(id_books){
            $('#modal-edit').removeClass('hidden');
            setTimeout(function() {
                $('#modal-edit').addClass('active');
            }, 10);

            getDetailData(id_books)
        }

        function closeModalEdit(){
            $('#modal-edit').removeClass('active');
            setTimeout(function() {
                $('#modal-edit').addClass('hidden');
            }, 300);
        }

        function showModalDelete(id_books, title){
            $('#modal-delete').removeClass('hidden');
            setTimeout(function() {
                $('#modal-delete').addClass('active');
            }, 10);

            var url = "{{ route('books.delete', ':id_books') }}"; 
            url = url.replace(':id_books', id_books);

            $('#form-delete').attr('action', url);
            $('#title-delete').html('Are you sure you want to delete book <b>' + title + '</b> ? This action cannot be undone.')
        }

        function closeModalDelete(){
            $('#modal-delete').removeClass('active');
            setTimeout(function() {
                $('#modal-delete').addClass('hidden');
            }, 300);
        }

        function getDetailData(id_books){
            var url = "{{ route('books.detail', ':id') }}".replace(':id', id_books);

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                befoerSend: function (){

                },
                success: function (response) {
                    var url = "{{ route('books.edit', ':id_books') }}"; 
                    url = url.replace(':id_books', id_books);

                    var image = "{{ asset('/storage/') }}/" + response.cover;

                    $('#form-edit').attr('action', url);
                    
                    $('#modal-headline-edit').html('Edit Book ' + response.title)
                    $('#image-edit').attr('src', image)

                    $('#title-edit').val(response.title)
                    $('#author-edit').val(response.author)
                    $('#description-edit').val(response.description)
                    $('#rating-edit').val(response.rating)

                },
                error: function () {  

                },
                complete: function () {  

                }
            });

        }

        function previewImage(input, status) {

            var previewContainer = '';

            if (status == 'add'){
                previewContainer = $('#image-preview-add');
            } 
            if (status == 'edit'){
                previewContainer = $('#image-preview-edit');
            }


            var previewImage = previewContainer.find('img');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImage.attr('src', e.target.result);
                    previewContainer.show();
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.hide();
                previewImage.attr('src', '');
            }
        }
    </script>
</x-app-layout>
