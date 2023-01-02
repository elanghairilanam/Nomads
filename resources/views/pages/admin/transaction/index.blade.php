@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">Transaksi</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Travel</th>
                                            <th>User</th>
                                            <th>Visa</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->travel_package->title }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->additional_visa }}</td>
                                            <td>{{ $item->transaction_total }}</td>
                                            <td>{{ $item->transaction_status }}</td>
                                            <td>
                                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ route('transaction.destroy', $item->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <button wire:click="export" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                Data Kosong
                                            </td>
                                        </tr>

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<!-- /.container-fluid -->
<script>
    
</script>
@endsection
