@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Coaches</div>

                        <div class="panel-body">
                            <table class="table" style="color: black" id="datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascripts')
    <script type="text/javascript" charset="utf8"
            src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                contentType: "application/json",
                ajax: {
                    url: "{{ route('show_coaches_table') }}",
                    dataSrc: "data",
                },
                columns: [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "phone"},
                    {"data": "address"},
                    {
                        "defaultContent": ` <div class="buttonsContainer">
                                            <button  class='btn btn-primary btnEdit'>
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button  class='btn btn-danger btnDelete'>
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        <div>`
                    },
                ],
            });
        });

        let table = document.getElementById("datatable");
        table.addEventListener("click", (event) => {
            let rowID;
            if (event.target.classList.contains(['btnEdit']) || event.target.classList.contains('fa-edit') || event.target.classList.contains(['btnDelete'])) {
                let rowID = event.target.closest('tr').firstElementChild.innerText;
                console.log(rowID);
            }
        });
    </script>
@endsection
