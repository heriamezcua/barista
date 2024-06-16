@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <h1 style="padding: 1rem;">Dashboard</h1>


    <div class="container">

        <!-- Reviews -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Reviews</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Summary</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                            @if(\App\Models\Review::all()->count() !== 0)
                                @php
                                    $reviews = \App\Models\Review::orderBy('created_at', 'desc')->paginate(10);
                                @endphp
                                @foreach($reviews as $review)
                                    <tr>
                                        <td>{{$review->product_id}}</td>
                                        <td>{{$review->summary}}</td>
                                        <td>{{ Str::limit($review->review, 60) }}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>{{\Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</td>
                                        <td>
                                            <span class="status status--{{$review->status}}">{{($review->status == 'under_review') ? 'Under review': $review->status}}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex" style="gap: 5px">
                                                <form action="{{route('reviews.approve', $review->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="action" value="approved"
                                                            class="btn btn-primary">Approve
                                                    </button>
                                                    <button type="submit" name="action" value="rejected"
                                                            class="btn btn-danger text-white">Reject
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align: center">No reviews</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div>
                            {{ $reviews->links('vendor.pagination.bootstrap-5') }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
