@extends('backend.layouts.master')

@section('title','IDA | Cash In')
@section('page','Cash In')

@section('content')

<table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="border py-2 w-36">#</th>
                <th class="border py-2">Dipositor</th>
                <th class="border py-2">Amount</th>
                <th class="border py-2">Transaction ID</th>
                <th class="border py-2">Type</th>
                <th class="border py-2">Date</th>
                <th class="border py-2">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($cashins as $cash)
            <tr>
                <td class="border py-2 text-center px-2 w-36">
                    {{ $cash->id }}
                </td>
                <td class="border py-2 text-center px-2">
                    {{ $cash->user->name }}
                </td>
                <td class="border py-2 text-center px-2">
                    {{ $cash->amount }}
                </td>
                <td class="border py-2 text-center px-2">
                    {{ $cash->transaction_id }}
                </td>
                <td class="border py-2 text-center px-2 capitalize">
                    {{ $cash->type }}
                </td>
                <td class="border py-2 text-center px-2">
                    {{ $cash->created_at->format('d M, Y') }} <br>
                    <small>{{ $cash->created_at->diffForHumans() }}</small>
                </td>
                <td class="border py-2 text-center px-2">
                    <div class="bg-red-500 px-2 py-1 inline-block">
                       <form action="{{ route('cashin.delete',$cash->id) }}" method="POST" onsubmit="return confirm('Do you want to delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa fa-trash text-white"></i></button>
                       </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="6">No Cash In Record Found!</td>
            </tr>
            @endforelse

        </tbody>
    </table>

    <div class="">
        {{ $cashins->links() }}
    </div>

@endsection
