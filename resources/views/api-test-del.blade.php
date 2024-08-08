<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>hello</h1>

    <div id="show1">

    </div>

<script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(window).on('load',function() {
           
            $.ajax({
                type:'get',
                url:'http://localhost:80/api/t1/t1',
                success:function(res) {
                   
                    let card= `<p>${res}</p>`
                  $('#show1').append(card);
 
                    
                }


            });

           
        });
    </script>



</body>

</html>
