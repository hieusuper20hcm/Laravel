<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet", href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand text-white" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-white" href="#">Link</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-black" href="{{URL::to('users')}}">Users</a>
                <a class="dropdown-item text-black" href="#">Another action</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
    </nav>
    <nav class="nav bg-success justify-content-lg-start justify-content-md-center">
        <a class="nav-link active" href="#"><i class="fa fa-github" style="font-size:28px"></i></a>   
        <a class="nav-link active" href="#"><i class="fa fa-facebook-square" style="font-size:28px"></i></a>   
        <a class="nav-link active" href="#"><i class="fa fa-youtube-play" style="font-size:28px"></i></a>   
        <a class="nav-link active" href="#"><i class="fa fa-shopping-cart" style="font-size:28px"><sup>2</sup></i></a>   
    </nav>
    @yield('content')
    
    @if (!empty(session('messeger')))
        <p class="messeger">{{session('messeger')}}</p>
    @endif
        
    
    <footer class="bg-success text-center text-light">
      <p>&copy;2020 Bùi Thế Minh Hiếu</p>
    </footer>

    <script>
      $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $(document).on('click','.btn-delete',function(){
        let url= $(this).attr('data-url');
        if(confirm('Bạn có chắc muốn xóa không')){
          $.ajax({
            method:'delete',
            url:url,
            success: function(response){
               window.location.reload();        
           }
          })
        }
      })

      setInterval(() => {
        $(".messeger").hide(2000);
      }, 2000);    


      
    </script>
</body>
</html>