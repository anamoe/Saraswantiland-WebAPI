@extends('layouts.master')

@section('css')

@endsection
@section('content')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->

<div class="page-inner containermateri mt-4 d-block">

    <div class="row">

        <div class="col-md-12">
            <div class="px-3">
                <div class="card-header row">
                    <div class="col-md-12">
                        <span class="float-left" style="font-size: 24px;">Riwayat Pemesanan</span>
                        <!-- <i style="cursor:pointer;" onclick="edit('')" data-toggle="modal" data-target="#editMapel" class="fe fe-edit float-left text-warning mr-3"></i> -->
                    </div>

                </div>

            </div>

            <div class="row listmateri card mx-1 py-3 mt-3">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>

                            <tr>
                                <th>No.</th>
                                <th>Nama Pemesan</th>
                                <th>No Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($r as $p)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>>{{$p->nama_pemesan}}</td>
                                <td>{{$p->no_telp}}</td>
                                

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>


{{-- modal--}}





@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function() {

        @if(session()->has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{session()->get('message')}}",
        })
        @endif


    });

    $('#basic-datatables').DataTable({});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>




@endsection