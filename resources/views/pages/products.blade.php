@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 ">
        <div class="card">
          <div class="card-header">Products</div>

          <div class="card-body">
            <table class="table-striped table-hover table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Images</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $index => $product)
                  <tr>
                    <th scope="row">{{ ++$index }}</th>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>
                      @foreach ($product['assets'] as $item)
                        @if($loop->index < 3)
                            {{ Str::limit($item['image'], 15) }},
                        @endif
                      @endforeach
                    </td>
                    <td>Rp.{{ number_format($product['price']) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
