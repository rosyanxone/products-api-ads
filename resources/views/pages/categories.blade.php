@extends('layouts.app') @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span>
              Categories
            </span>
            <span class="d-flex align-items-center gap-2">
              <span class="text-nowrap">
                Sort Product Amount by:
              </span>
              <select class="form-select" id="sort" name="sort"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="{{ route('categories') }}">Default</option>
                <option value="{{ route('categories.sorted', 'ascending') }}"
                  {{ request()->is('categories/ascending') ? 'selected' : '' }}
                >
                  Ascending
                </option>
                <option value="{{ route('categories.sorted', 'descending') }}"
                  {{ request()->is('categories/descending') ? 'selected' : '' }}
                >
                  Descending
                </option>
              </select>
            </span>
          </div>
          <div class="card-body">
            <table class="table-striped table-hover table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">
                    Product Amount
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $index => $category)
                  <tr>
                    <th scope="row">{{ ++$index }}</th>
                    <td>{{ $category['name'] }}</td>
                    <td colspan="2">{{ $category['product_amount'] }}</td>
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
