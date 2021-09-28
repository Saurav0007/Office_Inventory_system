<!doctype html>
        <html lang="en">
            <head>
                <title>
                    Office Inventory
                </title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            </head>
                <body>
                    <div class="container-fluid">
                        <div class="row">
                            <nav>
                                @include('navbar');
                            </nav>
                            <div class="col-md-2"></div>
                            
                            <div class="col-md-8">
                               
                                <div class="table-responsive">
                                    <table class="table table-striped" >
                                            <h1>For Variable type Product</h1>
                                            <thead>
                                                <th>Name</th>
                                                <th>Floor</th>
                                                <th>Room</th>
                                                <th>Bed Number</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $val)
                                                <tr>
                                                    <td>{{$val['userName']}}</td>
                                                    <td>{{$val['floor']}}</td>
                                                    <td>{{$val['room']}}</td>
                                                    <td>{{$val['bedNumber']}}</td>
                                                
                                               </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                               

                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                </body>
        </html>
