<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <style>
       .container{
        background-color: gray;
           width: 300px;
           height:100px;
           margin:200px auto 0 auto;
           display:flex;
           justify-content: center;
           align-items: center;
           justify: center;
           border-radius: 10px;
           padding: 20px;
       }
       #balance{
           border:0;
       }
      
   </style>
</head>
<body>
    
<div class="container">
    <form class="form" method="POST" action="{{route('firstPage')}}">
        @csrf
        <h5>Enter Your Balance</h5>
        <input type="number" name="balance" id="balance" placeholder="Enter Your Balance">
    </form>
</div>
</body>
</html>