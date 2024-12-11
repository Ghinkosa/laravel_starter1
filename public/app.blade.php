

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>


    </head>

    <body class="font-sans antialiased">
    
@if (!Auth::check())
    <div class="galata">iogigiu</div>
@endif


        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            @include('layouts.sidebar')
            
            <div class="flex-1 flex flex-col overflow-scroll">

                    @include('layouts.header')

                    @if(\Session::has('success'))
                        <div class="text-green-600 pt-5 pl-5">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    
                    @if(\Session::has('error'))
                        <div class="text-green-600 pt-5 pl-5">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="text-red-600  pt-5 pl-5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                   <div class="mx-5">
                        {{ $slot }}
                   </div> 
                    
            </div>
        </div>
    </body>
</html>
<script>
            function downloadPDF() {
            if (typeof pdfmake !== 'undefined') {
                var docDefinition = {
                    content: [
                        { text: 'Table Data', style: 'header' },
                        { table: getTableData(), style: 'table' }
                    ],
                    styles: {
                        header: { fontSize: 18, bold: true },
                        table: { margin: [0, 5, 0, 15] }
                    }
                };
                pdfmake.createPdf(docDefinition).download('table_data.pdf');
            } else {
                console.error('pdfmake is not defined or loaded.');
            }
        }

        // Function to download Excel using xlsx
        function downloadExcel() {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.json_to_sheet(getTableData(), { header: 1 });
            XLSX.utils.book_append_sheet(wb, ws, 'Table Data');
            XLSX.writeFile(wb, 'table_data.xlsx');
        }

        // Function to retrieve table data
        function getTableData() {
            var tableData = [];
            var tableRows = document.querySelectorAll('#table-body tr');
            tableRows.forEach(function(row) {
                var rowData = [];
                var cells = row.querySelectorAll('td');
                cells.forEach(function(cell) {
                    rowData.push(cell.innerText.trim());
                });
                tableData.push(rowData);
            });
            return tableData;
        }

        // Event listener to trigger fetchConfigs when DOM content is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Your existing JavaScript code for fetching data and handling pagination

            // Example event listener for download PDF button
            var pdfButton = document.querySelector('#pdf-button');
            if (pdfButton) {
                pdfButton.addEventListener('click', function() {
                    downloadPDF();
                });
            }

            // Example event listener for download Excel button
            var excelButton = document.querySelector('#excel-button');
            if (excelButton) {
                excelButton.addEventListener('click', function() {
                    downloadExcel();
                });
            }
        });
</script>


@stack('scripts')