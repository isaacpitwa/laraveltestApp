 <!DOCTYPE html>
 <html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('scss/bootstrap.min.css') }}" rel="stylesheet">
    <style>
    .login {
                text-align: center;
             }
    </style>
</head>
<body>
@if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      
      <?php
         echo Form::open(array('url'=>'/'));
      ?>
    <div class="login">
      <label style="text-align:center">LOGIN FORM</label><br>
    <label style="text-align:left">Name</label>
     <?php echo Form::text('name');?><br>
     <label style="text-align:left">Passowrd</label>
      <?php echo Form:: password('password');?><br>
      <?php echo Form::submit('Login');?><br>
     
 <button class"btn btn-success">Bootstrap</button>
    </div>
</body>
</html>