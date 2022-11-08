<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
          
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">

                    <form action ="/Additems" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label >Item</label>
                            <input type="text" class="form-control" name="item" placeholder="Enter item">
                            <span style="color:red">@error('item'){{$message}}@enderror</span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Qty</label>
                            <input type="number" class="form-control"  name="Qty" placeholder="Enter Quantity">
                            <span style="color:red">@error('Qty'){{$message}}@enderror</span>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <input type="text" class="form-control"   name="category" placeholder="Category">
                            <span style="color:red">@error('category'){{$message}}@enderror</span>
                          </div>
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn  bg-gradient-primary">Add new Item</button>
                        </div>
                      </form>

                </div>
            </div>
              
        </div>
    </div>
</x-app-layout>
