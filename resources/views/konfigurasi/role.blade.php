@extends('layouts.master');
@push('css');
{{-- <link rel="stylesheet" href="{{asset('./vendor/chart.js/dist/Chart.min.css')}} "> --}}
<link href="{{asset('/vendor/datatables.net-dt/css/jquery.dataTables.min.css')}} " rel="stylesheet" />
<link href="{{asset('/vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}} " rel="stylesheet" />
@endpush

@section('content')

<div class="main-content">
    <div class="title">
        Konfigurasi
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
    
@endsection

@push('js')
<script src=" {{asset('/vendor/jquery/dist/jquery.min.js')}} "></script>
<script src=" {{asset('/vendor/datatables.net/js/jquery.dataTables.min.js')}} "></script>
<script src=" {{asset('/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}} "></script>
<script src=" {{asset('/assets/js/page/datatables.js')}} "></script>
{{$dataTable->scripts()}}
{{-- <script src="{{asset('./vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{asset('./assets/js/page/index.js')}} "></script>     --}}


@endpush