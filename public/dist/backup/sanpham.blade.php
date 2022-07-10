<!DOCTYPE html>
<html lang="en" ng-app="myapp" ng-controller="sanphamcontroller">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}
        <link href="/dist/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/pagination/bootstrap.min.css">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
      </head>
    <body class="sb-nav-fixed">
        {{-- header --}}
        @include('includes.header')
        {{-- end header --}}
       
        <div id="layoutSidenav">
           {{-- slide --}}
           @include('includes.slide')
           {{-- end slide --}}
            <div id="layoutSidenav_content">
                <main>
                    <h1>PRODUCT MANAGEMENT FORM</h1>
                    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
                    <div>
                    <div>
                        Search: <input type="text" ng-model="timkiem">
                    </div>
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>TT</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr dir-paginate="sp in products|filter: timkiem|itemsPerPage: 10">
                                    <td>@{{$index + serial}}</td>
                                    <td><img src="/uploads/image/products/@{{sp.image}}" style='width:100px' alt=""></td>
                                    <td>@{{sp.product_name}}</td>
                                    <td>@{{sp.loaisanpham.category_name}}</td>
                                    <td >@{{sp.price |number:0}}</td>
                                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(sp.id)">&nbsp;</button></td>
                                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(sp.id)">&nbsp;</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <dir-pagination-controls 
                         max-size="5" 
                         direction-links="true" 
                         boundary-links="true" 
                         on-page-change='indexCount(newPageNumber)' style="display: flex;justify-content: center;">
                        </dir-pagination-controls> 
                    </div>
                
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                      Launch
                    </button>
                
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        {{-- <div class="form-group">
                                            <label for="name">Product name:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="product.name">
                                            </div>
                                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                                            <textarea id="name" name="name">
                                                             
                                            </textarea>
                                            <script>
                                                    CKEDITOR.replace( 'name' );
                                            </script>
                                         </div> --}}
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <label for="name">Price:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="product.unit_price">
                                            </div>
                                        </div>                      
                                    </div>
                
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <div ng-model="product">
                                            <label style="float:left;">Loại sản phẩm:</label>
                                                <select style="float:left;   width:100px;" ng-model='id_loai_sp' class="form-control form-control-lg" >
                                                    <option value="" selected>selected</option>
                                                    <option ng-repeat="lsp in lsps" value="@{{lsp.id}}">@{{lsp.tenloai}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                
                
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <label for="name">Image:</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="customFile" name="filename" ng-model="product.image">
                                                <label class="custom-file-label" id='img' for="customFile" >@{{product.image}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <script>
                        $('#exampleModal').on('show.bs.modal', event => {
                            var button = $(event.relatedTarget);
                            var modal = $(this);
                            // Use above variables to manipulate the DOM
                
                        });
                    </script>
                        </div>
                    </div>

                </main>  
               {{-- footer --}}
               @include('includes.footer')
               {{-- end footer --}}
            </div>
        </div>
         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
    <script src="/JS/angular.min.js"></script>
    <script src="/JS/sanphamcontroller.js">
    </script>
     <script src="/JS/dirPagination.js"></script>
     {{-- ------ --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
     <script src="/dist/js/scripts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
     <script src="/dist/assets/demo/chart-area-demo.js"></script>
     <script src="/dist/assets/demo/chart-bar-demo.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
     <script src="/dist/js/datatables-simple-demo.js"></script>
    </body>
</html>
