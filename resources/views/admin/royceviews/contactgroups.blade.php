{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royce Bulk SMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" > </script>
</head>
<body> --}}
    @extends('admin.royceviews.base')

    @section('content')
        
   
   
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4>Contact Groups</h4>
                
            </div>
        </div>
        <div class="table-responsive">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add Group
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('/admin/roycesms/contacts-group')}}" method="POST">
        {{ csrf_field() }}
            
      <div class="modal-body">
          
            <div class="row">
                <div class="col-sm-8">
                    <label>Name <small style="color: red">*</small></label>
                    <input type="text" class="form-control" name="group" placeholder="Group Name"  required/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label>Description (Optional)</label>
                    <textarea class="form-control" name="description" placeholder="Group description (optional)"></textarea>
                    
                </div>
            </div>
        

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<table id="example" class="display table table-bordered table-head-bg-info table-bordered-bd-info" style="width:100%;margin-top: 1cm;">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Contacts</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
            
            
        </tr>
    </thead>
    <tbody>
        @if(!empty($groups) && $groups->count())
        @php $count=0 @endphp
            @foreach($groups as $key => $value)

            @php $count++ @endphp
                <tr>
                    <td>{{ $count}}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->contacts_count }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <form action="{{ url('roycesms/delete-group',$value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('/admin/roycesms/edit-group',$value->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="submit"  class="btn btn-sm btn-danger"onclick="return confirm('Are you sure to delete {{$value->name}}?')">
                                Delete
                            </button>
                            
                        </form>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif
    </tbody>
</table>
</div>

   

{{-- {{$messages->links("pagination::bootstrap-4")}} --}}
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

 @endsection
{{-- </body>
</html> --}}