@extends('master')

@section('content')


<h2 class="page-header">{{ ucfirst('penelitian') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('penelitian') }}
    </div>

    

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Judul</th>
                                        <th>Peneliti</th>
                                        <th>Nidn Nim</th>
                                        <th>Program Studi</th>
                                        <th>Tahun</th>
                                        <th>Jangka Waktu</th>
                                        <th>Biaya</th>
                                        <th>Lokasi</th>
                                        <th>Created At</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        
        <a href="{{url('penelitians/create')}}" class="btn btn-primary" role="button" id="add">Add penelitian</a>
        
    </div>
</div>




@endsection



@section('scripts')
    <script type="text/javascript">
        var user = document.getElementById("user").innerHTML
        var theGrid = null;
        var loggedUser = {!! json_encode((object)auth()->user()) !!}
        var authuser = loggedUser.name
        if(authuser === undefined || authuser !=="admin"){
            document.getElementById("add").setAttribute("class", "hidden");
        }
        
        
        console.log(authuser);
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
                            if(authuser==="admin"){
                                return '<a href="{{ url('/penelitians') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                            }else{
                                return '<a href="{{ url('/penelitians') }}/'+row[0]+'/edit" class="btn btn-default hidden">Update</a>';
                            }
                        },
                        "targets": 10                    },
                    {
                        "render": function ( data, type, row ) {
                            if(authuser==="admin"){
                                return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                            }else{
                                return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger hidden">Delete</a>';
                            }
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