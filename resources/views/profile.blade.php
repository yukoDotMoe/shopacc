@extends('layouts.guest')
@section('content')
    <section style='
    background-color: #3b82f6;
    background-image: linear-gradient(to top, rgb(33,58,98) 0%,rgba(0,0,0,0.6) 100%), url("https://preview.redd.it/help-need-grid-lines-gone-v0-ujtagkb2j6z91.png?width=640&crop=smart&auto=webp&s=19bb4f9fe1cf0b24af31b5e08d0723f1fac9e974");
    background-repeat: repeat;
    '>
        <div class="py-8 mx-auto max-w-screen-2xl lg:py-16">
            <div class="bg-gray/30 backdrop-blur-sm border border-gray-50 rounded-lg mb-8 min-h-20 p-3" style="border-color: rgb(255 255 255 / 10%) !important;">
                <div class="flex">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                         src="https://i.pinimg.com/474x/2f/aa/d3/2faad31c599c50d588953bd9d09a2362.jpg"
                         alt="Bonnie image"/>
                    <div class="my-auto mx-3">
                        <h5 class="mb-1 text-xl font-medium text-gray-100">{{ \Illuminate\Support\Facades\Auth::user()->username }} <span class="text-gray-400 text-sm">(UID: {{ \Illuminate\Support\Facades\Auth::id() }})</span></h5>
                        <span class="text-sm text-gray-100">Tham gia vào: {{ \Carbon\Carbon::parse(\Illuminate\Support\Facades\Auth::user()->created_at)->format('d/m/Y') }}</span>
                    </div>
                </div>
{{--                    <div class="">--}}
{{--                        <div class="gap-8 space-y-2 text-end">--}}
{{--                            <div>--}}
{{--                                <dl>--}}
{{--                                    <dt class="text-sm font-medium text-gray-500">Số dư</dt>--}}
{{--                                        <span class="text-sm font-medium text-gray-500 font-semibold">{{ number_format(\Illuminate\Support\Facades\Auth::user()->balance) }}đ</span>--}}
{{--                                    </dd>--}}
{{--                                </dl>--}}
{{--                                <dl>--}}
{{--                                    <dt class="text-sm font-medium text-gray-500">Đã tiêu</dt>--}}
{{--                                        <span class="text-sm font-medium text-gray-500 font-semibold">{{ number_format(\App\Models\Transactions::where([--}}
{{--    ['userId', \Illuminate\Support\Facades\Auth::id()],--}}
{{--    ['status', 1],--}}
{{--    ['transactionType', 1],--}}
{{--])->sum('amount')) }}đ</span>--}}
{{--                                    </dd>--}}
{{--                                </dl>--}}
{{--                                <dl>--}}
{{--                                    <dt class="text-sm font-medium text-gray-500">Số account đã mua</dt>--}}
{{--                                        <span class="text-sm font-medium text-gray-500 font-semibold">{{ number_format(\App\Models\Transactions::where([--}}
{{--    ['userId', \Illuminate\Support\Facades\Auth::id()],--}}
{{--    ['status', 1],--}}
{{--    ['transactionType', 1],--}}
{{--])->count()) }}</span>--}}
{{--                                    </dd>--}}
{{--                                </dl>--}}
{{--                                <dl>--}}
{{--                                    <dt class="text-sm font-medium text-gray-500">Tổng nạp</dt>--}}
{{--                                        <span class="text-sm font-medium text-gray-500 font-semibold">{{ number_format(\App\Models\Topup::where([--}}
{{--    ['userId', \Illuminate\Support\Facades\Auth::id()],--}}
{{--    ['status', 1],--}}
{{--])->sum('amount')) }}đ</span>--}}
{{--                                    </dd>--}}
{{--                                </dl>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50  border border-gray-200  rounded-lg p-8 md:p-12" >
                    <h2 class="text-gray-900  text-3xl font-extrabold mb-2">Danh sách account đã mua</h2>
                    <div class="relative overflow-x-auto mt-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Loại account
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Thông tin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ngày mua
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->productName }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->result }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="w-4/6 mx-auto mt-4 flex justify-center">
                            {{ $transactions->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50  border border-gray-200  rounded-lg p-8 md:p-12">
                    <h2 class="text-gray-900  text-3xl font-extrabold mb-2">Danh sách nạp tiền</h2>
                    <div class="relative overflow-x-auto mt-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Số tiền
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Trạng thái
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ngày nạp
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topups as $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ number_format($item->amount) }}đ
                                    </td>
                                    <td class="px-6 py-4">
                                        @switch($item->status)
                                            @case(0)
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-yellow-300">Chờ xử lí</span>

                                                @break

                                            @case(1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-green-400">Thành công</span>

                                            @break

                                            @case(2)
                                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-400">Thất bại</span>

                                                @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="w-4/6 mx-auto mt-4 flex justify-center">
                            {{ $topups->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
