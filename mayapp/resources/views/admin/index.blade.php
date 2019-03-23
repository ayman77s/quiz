@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">

            <div class="pull-right">
                <a href="{{route('product.create')}}" class="btn btn-success">Create New Products</a>
            </div>
        </div>
    </div>
    @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>title</th>
                <th>price</th>
                <th>count</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)

                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->count}}</td>
                    <td>
                        <form action="{{route('product.destroy',$product->id)}}" method="post" role="form">
                            <a href="{{route('product.show',$product->id)}}" class="btn btn-info">Show</a>
                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            {{$products->onEachSide(1)->links()}}

            </tbody>
        </table>
    </div>
@endsection
