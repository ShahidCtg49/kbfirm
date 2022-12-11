@extends('layout.app')

@section('content')

<div class="container">
    <div class="row m-3 card">
        <div class="col-12 table-responsive offset-0 card-body">
                <h3>Navigation Head View</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Master Head</th>
                        <th>Sub Head</th>
                        <th>Child One</th>
                        <th>Child Two</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($navigationHeadView as $cat)
                        <tr>
                            <td>{{ ++$loop->index}}</td>
                            <td>{{$cat->master_head}}</td>
                            <td>{{$cat->sub_head}}</td>
                            <td>{{$cat->child_one}}</td>
                            <td>{{$cat->child_two}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="11">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $navigationHeadView->links() !!}
                </div>
        </div>
    </div>
</div>
@endsection