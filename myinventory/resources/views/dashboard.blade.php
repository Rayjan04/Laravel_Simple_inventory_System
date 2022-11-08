<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              {{-- table --}}
                  <div class="card">
                    <div class="card-header">
                      <nav class="navbar navbar-light bg-light justify-content-between" >
                        <a class="navbar-brand"> </a>
                        <form class="form-inline" action="Search" method="get">
                          <div class="inline-group">
                          <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                          </div>
                        </form>
                      </nav>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Item</th>
                          <th>Qty</th>
                          <th>Category</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- create foreach --}}
                        @foreach ($inventories as $invetory)
                            <tr>
                                <td>{{$invetory->id}}</td>
                                <td>{{$invetory->items}}</td>
                                <td>{{$invetory->qty}}</td>
                                <td>{{$invetory->category}}</td>
                                <td>

                                  {{-- blade template if else statements --}}
                                  @if ($invetory->qty <= 0)
                                      <span class="badge bg-danger">Not Available</span>
                                  @elseif ($invetory->qty <= 10)
                                      <span class="badge bg-warning">Low stock</span>
                                  @else
                                      <span class="badge bg-success">Available</span>
                                  @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              {{-- table --}}
           
        
        </div>
    </div>
</x-app-layout>
