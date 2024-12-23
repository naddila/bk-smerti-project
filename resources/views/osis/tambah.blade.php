@extends('layouts.main')
@section('title', 'Tambah Pelanggaran')
@section('content')
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show ms-auto" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card" style="background-color: white;">
    <div class="card-body">
        <form action="/osis/pelanggaran/{{ $siswa->id }}" method="post" id="form">

            @csrf
            @method('put')
            <input type="text" name="total" id="total" value=0 hidden>
            <input type="text" name="id_user" id="id_user" value="{{ $siswa->user_id }}" hidden>

            <table class="table display" cellspacing="0" width="100%" id="table_data_user">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th data-priority="1">Pelanggaran</th>
                        <th>Poin</th>
                        <th data-priority="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rules as $rule)
                    <tr>
                        <td scope="row">{{ $rule->id }}</td>
                        <td>{{ $rule->nama }}</td>
                        <td>{{ $rule->poin }}</td>
                        <td>
                            <input type="checkbox" name="poin" class="check" id="poin{{ $rule->id }}"
                            value="{{ $rule->poin }}"
                            onmousedown="this.form.rule{{ $rule->id }}.disabled=this.checked">
                            <input class="rule" type="text" name="rule[]" id="rule{{ $rule->id }}"
                            value="{{ $rule->id }}" disabled hidden>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end" style="font-size: 13px;">
                <a href="/osis/daftar-siswa" class="btn btn-md btn-secondary btn-rounded me-1">Back</a>
                <button class="btn btn-md me-1 my-2 show_confirm"  style="background-color:#395886; color:white" type="submit">
                    Tambah Poin
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        var total = 0;

        var table = $('#table_data_user').DataTable({
            'pagingType': 'simple_numbers',
            'responsive': true,
            'processing': true,
            'language': {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                paginate: {
                    first: '«',
                    previous: '‹',
                    next: '›',
                    last: '»'
                },
                aria: {
                    paginate: {
                        first: 'First',
                        previous: 'Previous',
                        next: 'Next',
                        last: 'Last'
                    }
                },
            },
            'columnDefs': [{
                orderable: false,
                className: "my_class",
                targets: 3
            },
            {
                orderable: false,
                targets: 1
            },
            {
                responsivePriority: 1,
                targets: 1
            },
            {
                responsivePriority: 2,
                targets: 3
            }

            ],
            'bPaginate': false,
        });

        $('input:checkbox').change(function() {
            if (!$(this).is(":checked")) {
                total -= isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            } else {
                total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
            }
            $("#total").val(total);
        });

        $('.show_confirm').click(function(event) {
            var form = $('#form');
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Tambah Poin?`,
                text: 'Total Poin : ' + total,
                icon: "info",
                buttons: [true, "Iya"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    table.search('').draw();
                    form.submit();
                }
            });

        });
    });
</script>
@endpush
