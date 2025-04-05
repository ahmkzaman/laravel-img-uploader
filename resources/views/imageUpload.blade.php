<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container">
  
        <div class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i> Laravel 12 Image Upload </h3>
            <div class="card-body">
      
                @session('success')
                    <div class="alert alert-success" role="alert"> 
                        {{ $value }}
                    </div>
                    <img src="images/{{ Session::get('image') }}" width="40%">
                @endsession
                
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="mb-3">
                        <label class="form-label" for="inputImage">Image:</label>
                        <input 
                            type="file" 
                            name="image" 
                            id="inputImage"
                            class="form-control @error('image') is-invalid @enderror">
            
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
             
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                    </div>
                    
                 
                </form>
                <form action="{{route('image.delete')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                  <input type="hidden" name="image" value="{{ Session::get('image') }}">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>