@extends('master')

@section('content')


<h2 class="page-header">{{ ucfirst('Biodata') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        {{ ucfirst('Mahasiswa') }}
    </div>

    <div class="panel-body">
        
        <a href="{{url('penelitians/create')}}" class="btn btn-primary" role="button">Add penelitian</a>
    </div>
</div>




@endsection



@section('scripts')
    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('penelitians/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/penelitians') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/penelitians') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 10                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 10+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/penelitians') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection