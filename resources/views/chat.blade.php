<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweet-alerts/sweetalert.css')}}">
    <script src="{{asset('js/lib/jquery-3.1.0.min.js')}}"></script>
    <script src="{{asset('js/lib/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>

<h1 class="title">Simple Chat Test Project</h1>

<div class="form-container">
    <form>
         <div class="input-group custom-search-form">
              <input type="text" id="text" class="form-control">
              <span class="input-group-btn">
                  <button  id="send-message" class="btn btn-success" type="button">
                  <span class="glyphicon glyphicon-search"></span> Search
                 </button>
             </span>
         </div>
    </form>
</div>

<div class="table-conteiner col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
    <table class="table table-sm" id="chat-table">
        <thead>
            <tr>
                <th class="small-td black">created</th>
                <th class="black">text</th>
            </tr>
        </thead>

        <tbody class="tbody">
            <tr class="empty-row hidden">
                <td colspan="2" class="text-center">No Messages found</td>
            </tr>
            <tr class="table-row hidden">
                <td class="date text-left"></td>
                <td class="text text-left"></td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
