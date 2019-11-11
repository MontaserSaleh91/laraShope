@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('add'))
                <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session('add') }}
                      </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Delete!</strong> {{ session('delete') }}
                  </div>
        @endif
        @if (session('update'))
            <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Update!</strong> {{ session('update') }}
                  </div>
        @endif
            
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('categories')}}" method="POST">@csrf
                                <div class="form-row align-items-center">
                                
                                
                               
                                    <div class="col-auto">
                                            <label class="sr-only" for="name">Category Name</label>
                                            <input type="text" class="form-control mb-2" id="name" name="name" autocomplete="off" placeholder="Category Name" required>
                                    </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Add New Category</button>
                                </div>
                                </div>
                            </form>
                        </div>


                       @foreach ($categories as $category)
                       
                           <div class="col-lg-3 close" >
                                
                               <div class="alert alert-primary" role="alert">

                                    <a href="" data-toggle="modal" onclick="editData({{$category->id}})" 
                                            data-target="#EditModal"  class="btn btn-xs btn-primary" style="float: right"><i class="fa fa-pencil-square-o"></i></a>
                                       
                                   
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$category->id}})" 
                                            data-target="#DeleteModal" class="btn btn-xs btn-danger" style="float: right; margin-right: 5px"><i class="fa fa-trash"></i></a>                                    
                                    
                               <p>{{$category->name}}</p>
                               
                             
                               </div>
                               
                           </div>
                       @endforeach
                       <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                            <div class="modal-dialog ">
                              <!-- Modal content-->
                              <form action="" id="deleteForm" method="POST">
                                  <div class="modal-content">
                                      <div class="modal-header bg-danger">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                                      </div>
                                      <div class="modal-body">
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                          <p class="text-center">Are You Sure Want To Delete ?</p>
                                      </div>
                                      <div class="modal-footer">
                                          <center>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                              <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                                          </center>
                                      </div>
                                  </div>
                              </form>
                            </div>
                           </div>

                           
  

                        <!--Edit Modal -->
                        <div id="EditModal" class="modal fade text-light" tabindex="-1" role="dialog" aria-hidden="true" >
                                <div class="modal-dialog " role="document">
                                  <!-- Modal content-->
                                <form action="" id="editForm" method="POST">{{ csrf_field()}}
                                      <div class="modal-content">
                                          <div class="modal-header bg-primary">
                                              <h4 class="modal-title text-center">EDIT CONFIRMATION</h4>
                                          </div>
                                          <div class="modal-body">
                                              
                                            
                                                    <div class="col-auto">
                                                            <label class="sr-only" for="name">Category Name</label>
                                                            <input type="text" autocomplete="off" class="form-control mb-2"  name="name" placeholder="Category Name" required>
                                                        </div>
                                          </div>
                                          <div class="modal-footer">
                                              <center>
                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                  <button type="submit" name="" class="btn btn-success" data-dismiss="modal" onclick="formESubmit()" >EDIT</button>
                                              </center>
                                          </div>
                                      </div>
                                  </form>
                                </div>
                               </div>
                       
                   </div>
                   {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("categories.delete", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }

    
 </script>
 <script>
 function editData(id)
    {
        var id = id;
        var url = '{{ route("categories.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editForm").attr('action', url);
    }

    function formESubmit()
    {
        $("#editForm").submit();
    }
 </script>
 
