@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Transaksi</h3>
            </div>
            <div class="card-body table-responsive p-0">
                
                <table class="table table-hover text-wrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction Id</th>
                            <th>Customer</th>
                            <th>Total Belanja</th>
                            <th>Total Pembayaran</th>
                            <th>Kasir</th>
                            <th>Status Transaction</th>
                            <th>Tanggal Transaction</th>
                            <th><a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm">Create Transaction</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->transaction_id }}</td>
                            <td>{{ $transaction->customer->customer_name ?? 'Guest' }}</td>
                            <td>Rp. {{ number_format($transaction->total_amount, 2) }}</td>
                            <td>Rp. {{ number_format($transaction->payment->amount ?? 0, 2) }}</td>
                            <td>{{ $transaction->users->name }}</td>
                            <td>{{ ucfirst($transaction->status) }}</td>
                            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('transaction.show', $transaction->transaction_id) }}"
                                    class="btn btn-success btn-sm">Detail</a>
                                <form action="{{ route('transaction.destroy', $transaction->transaction_id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection