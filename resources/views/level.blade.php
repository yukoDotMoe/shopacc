@extends('layouts.guest')
@section('head')
    <link rel="stylesheet" href="https://alecrios.github.io/image-zoom-js/demo/css/image-zoom.css">
    <style>
        input {
            border-color: #ff9494ff;

            box-shadow: 0 0 0 2px #ff9494ff;

        }

        #mainContent {

            display: flex;
            flex-direction: colum;
            justify-content: center;
            background: linear-gradient(rgba(255, 163, 163, 0.3), rgb(243, 244, 246)), url(https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg);
        }

        .childContent {
            display: flex;
            flex-direction: column;
        }


        .leftContent {
            margin-right: 20px;
            background-color: rgb(252, 252, 252);
            width: 500px;
            max-height: 700px;
            text-align: center;

        }

        .rightContent {
            margin-left: 20px;
            background-color: rgb(252, 252, 252);
            width: 500px;
            height: 700px;
            text-align: left;

        }

        .content {
            /* margin-right: 60px; */
            border-radius: 10px;
            border: 3px solid #ff9494ff;
            margin-top: 40px;
            margin-bottom: 45px;
            opacity: 0;
            animation: fadeIn 1.5s ease forwards;

        }

        .stk,
        .bankMess,
        .typeBank {
            margin-top: 40px;
            margin-left: 40px;
        }

        .typeBank {
            margin-top: 100px;
        }

        .qr {
            margin-top: 59px;
            border: 3px solid rgb(163, 77, 77);
        }

        .step {
            margin-top: 25px;
        }

        .bg-imageLeft {
            background-image: url('img/owen.png');
            background-size: cover;
            background-position: center;
            transform: translateX(-10%);
            position: absolute;
            top: 0;
            left: 0;
            width: 30%;
            height: 100%;
            z-index: -1;
        }

        .bg-imageRight {
            background-image: url('img/chammbar.png');
            background-size: cover;
            transform: translateX(240%);
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 27%;
            height: 100%;
            z-index: -2;
        }

        #contentChild {
            justify-content: space-around;
            display: flex;
        }

        @media (max-width: 800px) {
            .backimg {
                visibility: hidden;
            }

            .copy {
                scale: 0.8;
            }

            .content {
                margin: 0;
                margin-top: 10px;
                width: 100%;
            }

            #contentChild {
                margin: 0;
                flex-direction: column;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px); /* Di chuyển form lên trên một chút */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
@section('content')
    <div id="mainContent" class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="bg-imageLeft"></div>
        <div class="bg-imageRight"></div>

        <div class="mainContent1">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto w-96">
                <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3 " aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"/>
                </svg>
                @if(!empty(\Illuminate\Support\Facades\Auth::user()->level()))
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Hiện tại bạn
                        đang ở cấp: <strong>{{ \Illuminate\Support\Facades\Auth::user()->level()->levelName }}</strong>
                    </h5>
                    @if(\App\Models\Levels::where('expNeeded', '>', \Illuminate\Support\Facades\Auth::user()->exp)->orderBy('expNeeded', 'asc')->count() > 0)
                        @php($currentLvl = \Illuminate\Support\Facades\Auth::user()->level())
                        @php($nextLvl = \App\Models\Levels::where('expNeeded', '>', \Illuminate\Support\Facades\Auth::user()->exp)->orderBy('expNeeded', 'asc')->first())
                        <div class="flex items-center justify-between">
                            <span>{{ $currentLvl->levelName }}</span>
                            <div class="w-full bg-gray-200 h-4 rounded-full mx-4 relative">
                                <div class="bg-blue-500 h-full rounded-full absolute left-0 top-0"
                                     style="width: {{ (\Illuminate\Support\Facades\Auth::user()->exp / $nextLvl->expNeeded) * 100 }}%;"></div>
                            </div>
                            <span>{{ $nextLvl->levelName }}</span>
                        </div>

                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 my-2 text-center">Bạn
                            còn {{ number_format($nextLvl->expNeeded - \Illuminate\Support\Facades\Auth::user()->exp) }}
                            EXP nữa để lên cấp tiếp theo!</p>
                    @else
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 text-center">Bạn đang ở cấp cao nhất
                            của hệ
                            thống! Xin chúc mừng bạn và cảm ơn vì đã đồng hành cùng tụi mình.</p>
                    @endif

                    <hr class="w-48 h-1 mx-auto my-6 bg-gray-100 border-0 rounded md:my-6 dark:bg-gray-700">
                    @if(\Carbon\Carbon::parse(\Illuminate\Support\Facades\Auth::user()->reward_claimed)->lt(\Carbon\Carbon::now()->timezone('Asia/Ho_Chi_Minh')))
                        <form method="POST">
                            @csrf
                            <button type="button" id="confirmBuyButton"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">
                                Nhận quà hôm nay
                            </button>
                        </form>
                    @else
                        <button type="button" disabled=""
                                class="text-white bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-600
                    dark:hover:bg-blue-700 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5
                    inline-flex justify-center w-full text-center">Đã nhận quà hôm nay!
                        </button>
                    @endif
                @else
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Bạn chưa được
                        sử dụng hệ thống này!</h5>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Bắt đầu mua hàng và bạn sẽ nhận được
                        phần thưởng hàng ngày rồi, còn chờ gì nữa mà không mua ngay nào!</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('authJs')
    <script>
        $('#confirmBuyButton').click(function (e) {
            $(this).attr('disabled', '')
            const typeAcc = $(this).data('productid');
            $.ajax({
                url: "{{ route('level.claim') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function (data) {
                    Swal.fire({
                        title: "Nhận quà hàng ngày thành công!",
                        text: data.data,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    });
                },
                error: function(error)
                {
                    data = error.responseJSON
                    toast('error', data.data)
                }
            });
        })
    </script>
@endsection