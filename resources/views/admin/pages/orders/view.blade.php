@extends ('layouts.admin')
@section('title', 'Order #' . $order->id)
@section('content')

    <div class="fs-1">Order #{{$order->id}}</div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <tbody>
                            <tr>
                                <td>Order Id</td>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <form action="{{route('adminpanel.orders.status.update', $order->id)}}" method="post" style="display: flex; gap: 15px; max-width: 300px;">
                                        @csrf

                                        <select name="status" id="form-control">
                                            @foreach($states as $status)
                                                <option value="{{$status}}"
                                                        @if($order->status === $status) selected @endif>{{$status}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td>${{$order->total / 100}}</td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td>{{$order->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>{{$order->state}}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{$order->city}}</td>
                            </tr>
                            <tr>
                                <td>Zip Code</td>
                                <td>{{$order->zip}}</td>
                            </tr>
                            <tr>
                                <td>Stripe</td>
                                <td>{{$order->stripe_id}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
