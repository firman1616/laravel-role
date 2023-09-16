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
                        @if (request()->user()->can('Create'))
                            <button type="button" class="btn btn-primary mb-3"><i class="ti-plus"></i> | Tambah Data</button>
                        @endif
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>

<div class="modal fade" id="modalAction" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        
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

<script>
    const modal = new bootstrap.Modal($('#modalAction'))
    $('#role-table').on('click','.action',function () {
        let data = $(this).data()
        let id = data.id
        let jenis = data.jenis

        $.ajax({
            method: 'GET',
            url: `{{url('konfigurasi/roles/')}}/${id}/edit`,
            success: function (res) {
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
        })

    })

    function store() {
        $('#formAction').on('submit', function (e) {
            let id = data.id
            e.preventDefault()
            const _form = this
            const formData = new formData(_form)
            
            $.ajax({
                method: 'POST',
                url: `{{ url('konfigurasi/roles/') }}/${id}`,
                headers: {'X-CSRF-TOKEN':$('meta[nem="csrf-token"]').attr('content')},
                data: formData,
                prosessData: false,
                contentType: false,
                success: function (res) {
                    window.LaravelDataTables["role-table"].ajax.reload()
                    modal.hide()
                }
            })
        })
    }
</script>

@endpush