<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

<table id="example" >
    {{-- class="table table-striped table-bordered" --}}
    <thead>
        <tr>
            <th>user name</th>
            <th>email</th>
            <th>training session name</th>
            <th>attendance time</th>
            <th>attendance date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @dd($table)
           <td>adham</td> 
        </tr>
    <tbody>
    
</table>

<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
   </script>
   