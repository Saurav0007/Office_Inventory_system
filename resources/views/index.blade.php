<!doctype html>
<html lang="en">

<head>
    <title>
        Office Inventory
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav>
                @include('navbar');
            </nav>
            <div class="col-md-2"></div>
            <div class="col-md-8">
               
                    <div class="card-body">
                        <h1> Insert Details of inventory</h1>
                        <form  method="GET" action="{{ route('search') }}" class="form-group">
                            <input type="text" name="search" required/>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                        <form method="post" action="/submitForm">
                            @csrf
                            <div class="form-group">
                                <label>Product type:</label>
                                <select name="type" class="form-control" onchange="getProductNameByType(this.value)">
                                    <option value="0">Select</option>
                                    @if (!empty($value))
                                        @foreach ($value as $val)
                                            <option value="{{ $val['pr_type'] }}">{{ $val['pr_type'] }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Product Name:</label>
                                <select name="cate" class="form-control" id="product_name">
                                    @include("product_name_dropdown")
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="itemId" placeholder="Item_ID">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control " name="brand" placeholder="Brand">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" placeholder="description">
                            </div>
                            <div class="form-group">
                                <label>Manufacturing Date</label>
                                <input type="date" class="form-control" name="manu-date"
                                    placeholder="Manufacturing Date">
                            </div>
                            <div class="form-group">
                                <label>Expired Date</label>
                                <input type="date" class="form-control" name="ex-date" placeholder="Expired Date">
                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control" name="stock" placeholder="stock amount">
                            </div>
                            <div class="form-group">
                                <label>Data Entry date</label>
                                <input type="date" class="form-control" name="entry-date" placeholder="Entry date">
                            </div>
                            <button class="btn btn-success" type="submit"> Submit </button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <h1>Data Table</h1>
                            <thead>
                                <th>Item-id</th>
                                <th>
                                    product Type
                                </th>
                                <th>product name</th>
                                <th>product brand</th>
                                <th>product description</th>
                                <th>manufactur date</th>
                                <th>expire date</th>
                                <th>stock</th>
                                <th>data entry date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $value)
                                    @php
                                        $stockout = DB::table('emp_selected_data')
                                            ->where('selectedData', $value->id)
                                            ->get();
                                    @endphp
                                    <tr>
                                        <td>{{ $value->item_id }}</td>
                                        <td>{{ $value->select_type }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ $value->brand }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td>{{ $value->man_date }}</td>
                                        <td>{{ $value->ex_date }}</td>
                                        <td>{{ $value->total_stock - count($stockout) }}</td>
                                        <td>{{ $value->entry_date }}</td>
                                        <td>
                                        
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#variable{{ $value->id }}"><button
                                                        class="btn btn-success"> Variable</button></a>
                                                    /
                                                    <a href="#" data-toggle="modal"
                                                data-target="#fixed{{ $value->id }}"><button
                                                    class="btn btn-success"> Fixed</button></a>

                                            / <a href="deleteData{{ $value->id }}"><button
                                                    class="btn btn-danger">Delete</button></a>
                                            {{-- / <a href="/get-details/{{ $value->id }}"><button class="btn"
                                                    style="background-color: burlywood">Details</button></a> --}}
                                                </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
               

            </div>
            {{-- bootstrap modal starts --}}
           

            @foreach ($data as $value)
                <div class="modal" tabindex="-1" id="variable{{ $value->id }}" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Product Assign here</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/empSelect" method="POST">
                                    @csrf
                                    <input type="hidden" name="selectedData" value="{{ $value->id }}">
                                    {{-- <select name="emp_id" id="">
                                        <option value="0">Select One</option>

                                        @if (!empty($emp))
                                            @foreach ($emp as $em)
                                                <option value="{{ $em['id'] }}">
                                                    {{ $em['name'] }}-{{ $em['phone'] }}</option>
                                            @endforeach
                                        @endif
                                    </select> --}}
                                    <div class="form-group">
                                        <input type="text" name="userName" class="form-control" placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="floor" class="form-control" placeholder="Floor Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="room" class="form-control" placeholder="Room Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="bed" class="form-control" placeholder="Bed Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="designation" class="form-control" placeholder="Designation">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="phone number">
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- second Modal for assign --}}
            @foreach ($data as $value)
            <div class="modal" tabindex="-1" id="fixed{{ $value->id }}" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Product for employee Assign here</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/fixedData" method="POST">
                                @csrf
                                <input type="hidden" name="selectedData" value="{{ $value->id }}">
                                {{-- <select name="emp_id" id="">
                                    <option value="0">Select One</option>

                                    @if (!empty($emp))
                                        @foreach ($emp as $em)
                                            <option value="{{ $em['id'] }}">
                                                {{ $em['name'] }}-{{ $em['phone'] }}</option>
                                        @endforeach
                                    @endif
                                </select> --}}
                                <div class="form-group">
                                    <input type="text" name="userName" class="form-control" placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="designation" class="form-control" placeholder="Designation">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="phone number">
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach




        </div>
    </div>

    <script>
        function getProductNameByType(type_id) {

            $.ajax({
                type: 'GET',
                url: "{{ route('get-product-name-by-type') }}",
                data: {
                    type_id: type_id
                },
                success: function(data) {
                    $("#product_name").html(data);
                }
            });
            // $.ajax({
            //     url: "{{ route('get-product-name-by-type') }}",
            //     type: 'GET',
            //     data: {
            //         type_id: type_id
            //     },
            //     cache: false,
            //     success: function(data) {
            //         alert('ok');
            //     },
            // });
        }
    </script>

</body>

</html>
