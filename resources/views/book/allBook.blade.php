<html>
<head>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    {{--<link rel="stylesheet" type="text/css" href="css/homeCSS.css">--}}
    {{--onload="startPage()"--}}
    <link href="{{asset('css/allBookStyle.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body style="background-color: #C4D3F6">
    <div id="container">
        <div id="table">
            <div class="header">
                <div class="cell">ID</div>
                <div class="cell">Email</div>
                <div class="cell">Name</div>
                <div class="cell">Permission</div>
                <div class="cell">Edit</div>
                <div class="cell">Delete</div>
            </div>

            @foreach($allBook as $book)
            <div class="rowGroup">
                <div class="row">
                    <div class="cell">{{$book->id}}</div>
                    <div class="cell">{{$book->email}}</div>
                    <div class="cell">{{$book->name}}</div>
                    <div class="cell">{{$book->permission}}</div>
                    <div class="cell"><a href="#">Edit</a></div>
                    <div class="cell"><a href="#">Delete</a></div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="width: 100%;">
            <div class="dropup" style="float: left">
                <button class="dropbtn">10</button>
                <div class="dropup-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>

            <div>
                <form id="submitForm">
                    <input type="search" id="textInput">
                    <i class="fa fa-search" id="search" onclick="searching();"></i>
                </form>
            </div>
        </div>
        {{--<div class="pagination-container">--}}
            {{--<nav>--}}
                {{--<ul class="pagination"></ul>--}}
            {{--</nav>--}}
        {{--</div>--}}
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
function searching(){
    var searchInput = document.getElementById('textInput').value;

    if(searchInput.length == 0){
        var formAction = "/myProject/allBook";
        window.location = formAction;
    } else {
        var formAction = "/myProject/searchBook/" + searchInput;
        window.location = formAction;
    }
}

//    var searchButton = document.getElementById('search');
//    searchButton.addEventListener("click",function(){
//        var searchInput = document.getElementById('textInput').value;
//        var submitButton = document.getElementById('submitForm');
//        submitButton.action = 'searchBook/' + searchInput;
//        submitButton.submit();
//    })
</script>


</html>
