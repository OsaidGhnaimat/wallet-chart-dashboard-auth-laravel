<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container-form{
            width: 80%;
            height: 200px;
            margin:   auto;
            display: flex;
            justify-content: center;
        }
        .container-form .forms-sample{
            margin: 30px auto;
            width: 300px
        }
        .links{
            float: right;
        }
        .links a{
            padding: 0 10px
        }
        select{
        width: 100%;
        padding: 5px;
        margin: 8px 0;
        box-sizing: border-box;
        }
        .Balance-group{
            margin:20px;
        }
        #balance{
            height:30px;
        }
        #btn-submit{
            width: 100%;
            height: 30px;
            background-color: #1E90FF;
            border: 0;
        }
        #btn-submit:hover{
            cursor: pointer;
            background-color: #20B2AA;
        }
        #category{
            width: 89%;
        }
        .div-hidden{    
            margin: 10px 0;
            display: none;
        }
        .container-table{
            width: 60%;
            margin: 300px auto;
        }
        .head{
            width:70%;
            margin: auto ;
            color:#1E90FF;
        }
        .header-table{
            display: block;
        }
        .title-table{
            display: inline ;
        }
        .chart-btn{
            float: right;
            border: 1px;
            background-color: #20B2AA;
            color: white;
        }

    </style>
</head>
<body>
    
<div class="links">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
       
        <div class="container-form">
            <form class="forms-sample" action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">

            @if($errors->any())
				<div class="alert alert-danger text-center" role="alert">
					{{ $errors->first() }}
				</div>
			  @endif

            <div class="head"><h3 class="user-header">Welcome {{$user->name}}</h3></div>
				@csrf
				<div class="Balance-group">
				  <label for="amount">Amount</label>
				  <input type="number" id="amount" name="amount" placeholder="amount">
				</div>
				<div class="group">
				  <label for="transaction">Transaction</label>
                  <select name="transaction" id="transaction">  
                      <option value="income">Income</option>
                      <option value="expense">Expense</option>
                  </select>
				</div>
				
				<div class="group">
				  <label for="category">Category</label>
                  <select name="category" id="category"> 
                      <option value="salary">Salary</option>
                      <option value="bonuse">Bonuse</option>
                      <option value="food">Food</option>
                      <option value="shopping">Shopping</option>
                      <option value="housing">Housing</option>
                      <option value="transportation">Transportation</option>
                  </select> 

                  <button type="button" onclick="hideForm()">+</button>

                    <div class="div-hidden" id="div-hidden">
                        <input type="text" id="newCategory" name="newCategory"> <button id="btn-new" onclick="addOption()" type="button"> Add </button>
                    </div>
                    
				</div>

                <div class="group">
				  <label for="note">Note</label> <br>
                  <textarea name="note" id="note" cols="37" rows="2">
                    
                  </textarea>
				</div>

				<button type="submit" id="btn-submit" name="submit" >Add</button>
			  </form>
        </div>

        <div class="container-table" >
           <div class="header-table"><h1 class="title-table"> My Transactions</h1> <a href="{{ route('chart', $user->id) }}"><button class="chart-btn btn">Chart</button></a> </div> 
                <table class="table">
                <thead>
                    <tr>
                    <th >Amount	</th>
                    <th >Transaction	</th>
                    <th >Category</th>
                    <th >Note </th>
                    <th >Date </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $item)
                        <tr>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->transaction}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->note}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                        
                </tbody>
                </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

        hideForm = function(){
            let div_hidden = document.getElementById("div-hidden");
            if (div_hidden.style.display == 'none') {
                div_hidden.style.display = 'block';
            } else {
                div_hidden.style.display = 'none';  
            }
        }

        addOption = function(){
            var newCategory = document.getElementById("newCategory");
            var x = document.getElementById("category");
            var option = document.createElement("option");
            option.text = newCategory.value;
            x.add(option);
            x.value = newCategory.value;
        }

    </script>
</body>
</html>