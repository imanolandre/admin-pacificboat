@extends('tablar::page')

@section('title', 'View Invoice')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        View
                    </div>
                    <h2 class="page-title">
                        {{ __('Invoice ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('invoices.index') }}" class="btn btn-danger d-none d-sm-inline-block texto">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                            Cancel
                        </a>
                        <a href="{{ route('invoices.index') }}" class="btn btn-danger d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-pulse icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Invoice Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Customer Name:</strong>
                                {{ $invoice->week->customer_name }}
                            </div>
                            <div class="form-group">
                                <strong>Yacht Name:</strong>
                                {{ $invoice->yacht_name }}
                            </div>
                            <div class="form-group">
                                <strong>Location:</strong>
                                {{ $invoice->location }}
                            </div>
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $invoice->email }}
                            </div>
                            <div class="form-group">
                                <strong>Date:</strong>
                                {{ $invoice->date }}
                            </div>

                            <div class="form-group">
                                <h4>Descriptions</h4>
                                @foreach($invoice->details as $detail)
                                    <div class="description-item">
                                        <p><strong>QTY:</strong> {{ $detail->qty }}</p>
                                        <p><strong>Description:</strong> {{ $detail->description }}</p>
                                        <p><strong>Date:</strong> {{ $detail->date }}</p>
                                        <p><strong>Total:</strong> {{ $detail->total }}</p>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group d-flex justify-content-between" style="margin-bottom: 5px;">
                                <strong>Document:</strong>
                                <span class="col">{{ pathinfo($invoice->file)['filename'] }}</span>
                                <div class="d-flex align-items-center">
                                    @if ($invoice->file)
                                    <div class="btn-list ml-2">
                                        <!-- Enlace para mostrar PDF en modal -->
                                        <a href="#" onclick="mostrarPDF('{{ asset($invoice->file) }}', '{{ pathinfo($invoice->file)['filename'] }}');" class="btn btn-youtube d-none d-sm-inline-block texto" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada icon-tabler icon-tabler-file-type-pdf ml-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                            Ver
                                        </a>
                                        <!-- Enlace para mostrar PDF en modal (versión para dispositivos pequeños) -->
                                        <a href="#" onclick="mostrarPDF('{{ asset($invoice->file) }}', '{{ pathinfo($invoice->file)['filename'] }}');" class="btn btn-youtube d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tada icon-tabler icon-tabler-file-type-pdf ml-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar el PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">{{ pathinfo($invoice->file)['filename'] }}</h5>
                    <div class="d-flex align-items-center">
                        <!-- Ícono de descarga -->
                        @if ($invoice->file)
                        <a href="{{ asset($invoice->file) }}" download="{{ pathinfo($invoice->file)['filename'] }}.pdf">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                        </a>
                        @endif
                        <!-- Botón de cierre -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- Contenido del PDF se cargará aquí -->
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos -->
    <style>
        #pdfModal .modal-body {
            max-width: 100%;
            overflow-x: auto;
            background-color: rgba(36, 36, 36, 0.151);
        }
        #pdfModal .modal-body canvas {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
    </style>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        function mostrarPDF(pdfURL, pdfFileName) {
            console.log('Mostrando PDF:', pdfFileName);
            const modal = $('#pdfModal');
            modal.find('.modal-title').text(pdfFileName);
            cargarPDF(pdfURL, modal.find('.modal-body'));
            modal.modal('show');
        }

        function cargarPDF(pdfURL, container) {
            console.log('Cargando PDF desde:', pdfURL);
            pdfjsLib.getDocument(pdfURL).promise.then(pdf => {
                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    pdf.getPage(pageNum).then(page => {
                        const canvas = document.createElement('canvas');
                        container.append(canvas);

                        const viewport = page.getViewport({ scale: 1 });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        page.render({ canvasContext: canvas.getContext('2d'), viewport: viewport });
                    });
                }
            }).catch(error => {
                console.error('Error al cargar el PDF:', error);
                // Manejar el error, por ejemplo, mostrar un mensaje al usuario.
            });
        }
    </script>
@endsection
