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
                <h4>Edit group</h4>

                
            </div>
        </div>
        <form method="POST" action="{{url('/admin/roycesms/edit-contact-group')}}">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" name="id" value="{{$group->id}}" />
                <div class="col-sm-6">
                    <label>
                        Group Name
                    </label>
                    <input type="text" name="group" value="{{$group->name}}" class="form-control" />
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-6">
                    <input type="submit" value="Save changes" class="btn btn-primary" />
                </div>
            </div>

        </form>

   
   

{{-- {{$messages->links("pagination::bootstrap-4")}} --}}


 @endsection
{{-- </body>
</html> --}}