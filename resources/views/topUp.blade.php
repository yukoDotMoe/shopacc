@extends('layouts.guest')
@section('content')

    <div id="mainContent" class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0" style='
    background-color: #3b82f6;
    background-image: linear-gradient(to top, rgb(33,58,98) 0%,rgba(0,0,0,0.6) 100%), url("https://preview.redd.it/help-need-grid-lines-gone-v0-ujtagkb2j6z91.png?width=640&crop=smart&auto=webp&s=19bb4f9fe1cf0b24af31b5e08d0723f1fac9e974");
    background-repeat: repeat;
    '>

        <div class="mainContent1">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto w-96">
                    <form id="topupForm" action="#">
                        <label for="cars" class="block text-gray-700">Vui lòng chọn mệnh giá:</label>
                        <select id="cars" name="menhGia"
                                class="block w-full mt-1 py-2 px-3 border rounded-md shadow-sm bg-white focus:outline-none focus:border-indigo-500">
                            @foreach(explode(',', \App\Http\Controllers\UtilsController::getSetting('topupRange')['data']) as $item)
                                <option value="{{ $loop->index	 }}">{{ number_format($item) }}</option>
                            @endforeach
                        </select>

                        <button
                            class="w-full h-12 px-6 text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 mt-6" id="submitBtn">
                            <span class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 my-auto">
  <path fill-rule="evenodd" d="M3 4.875C3 3.839 3.84 3 4.875 3h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 0 1 3 9.375v-4.5ZM4.875 4.5a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5Zm7.875.375c0-1.036.84-1.875 1.875-1.875h4.5C20.16 3 21 3.84 21 4.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5a1.875 1.875 0 0 1-1.875-1.875v-4.5Zm1.875-.375a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5ZM6 6.75A.75.75 0 0 1 6.75 6h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75A.75.75 0 0 1 6 7.5v-.75Zm9.75 0A.75.75 0 0 1 16.5 6h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75ZM3 14.625c0-1.036.84-1.875 1.875-1.875h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.035-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 0 1 3 19.125v-4.5Zm1.875-.375a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5Zm7.875-.75a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm6 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75ZM6 16.5a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm9.75 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm-3 3a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm6 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Z" clip-rule="evenodd" />
</svg>




                            <span class="my-auto ml-2">Tạo lệnh nạp tiền</span>
                        </span>
                        </button>
                    </form>
                </div>
        </div>

        <div id="contentChildTwo" style="display: none" class="maincontent2">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                <div class="flex justify-center items-center">
                    <img id="qrCode" class="object-cover max-w-full max-h-full" style="width: 70%" />
                </div>
                <div class="mt-6">
                    <h5 class="text-xl font-bold leading-none text-gray-900 text-center my-3">Thông tin chuyển khoản</h5>
                    <p class="text-center text-sm text-gray-500 truncate dark:text-gray-400">
                        ( Bấm vào thông tin để copy )
                    </p>
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">

                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray truncate">
                                        Ngân hàng
                                    </p>

                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    MB Bank
                                </div>
                            </div>
                        </li>

                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">

                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray truncate">
                                            Số tiền
                                        </p>

                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 copyable" id="sotien">
                                    </div>
                                </div>
                            </li>

                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">

                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray truncate">
                                        Tên TK:
                                    </p>

                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 copyable" id="tentk">
                                </div>
                            </div>
                        </li>

                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">

                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Số TK:
                                    </p>

                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 copyable" id="sotk">
                                </div>
                            </div>
                        </li>

                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">

                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray truncate">
                                        Nội dung:
                                    </p>

                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 copyable" id="noidung">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h5 class="text-xl font-bold leading-none text-red-400 text-center my-3">Lưu ý!</h5>
                    <ul>
                        <li>- Đây là hệ thống tự động.</li>
                        <li>- Không chịu trách nhiệm khi chuyển nhiều/ít hơn số tiền.</li>
                        <li>- Giao dịch được giới hạn trong <b id="timer">05:00</b>, qua thời gian vui lòng không chuyển khoản vào thông tin trên.</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <!-- Main Content QR-->
@endsection

@section('javascript')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
        integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script src="https://alecrios.github.io/image-zoom-js/demo/js/image-zoom.js"></script>
    <script>
        $(document).ready(function () {
            var timeInSeconds = 300;
            function updateTimer() {
                var minutes = Math.floor(timeInSeconds / 60);
                var seconds = timeInSeconds % 60;
                var formattedMinutes = String(minutes).padStart(2, '0');
                var formattedSeconds = String(seconds).padStart(2, '0');
                $('#timer').text(formattedMinutes + ':' + formattedSeconds);
            }

            function startCountdown() {
                updateTimer();
                var timerInterval = setInterval(function() {
                    timeInSeconds--;
                    updateTimer();
                    if (timeInSeconds <= 0) {
                        clearInterval(timerInterval);
                        location.reload()
                    }
                }, 1000);
            }

            function formatCurrency(number) {
                var formattedNumber = parseFloat(number).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                return formattedNumber;
            }
            $(".copyable").click(function(e){
                const old = $(this).html();
                navigator.clipboard.writeText(($(this).html()).replace(/,/g, ''))
                    .then(function() {
                        toast('success', 'Đã copy "' + $(this).html() + '" !')
                    })
                    .catch(function(err) {
                        console.error('Failed to copy HTML: ', err);
                    });

                toast('success', 'Đã copy "' + $(this).html() + '"')
            });
            $('#submitBtn').click(function (e) {
                e.preventDefault();
                const menhGia = $('select[name="menhGia"]').val();
                $(this).attr('disabled', '')
                $(this).html('Vui lòng đợi')
                $.ajax({
                    url: "{{ route('topup.create') }}",
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        amount: menhGia
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('.mainContent1').hide();
                        data = data.data
                        $('#qrCode').attr('src', `https://img.vietqr.io/image/${data.bin}-${data.number}-qr_only.png?amount=${data.amount}&addInfo=${data.description.split(' ').join('+')}`)
                        // generateQrCode(data.qr)
                        $('#tentk').html(data.name)
                        $('#sotk').html(data.number)
                        $('#noidung').html(data.description)
                        $('#sotien').html(formatCurrency(data.amount))
                        $('.maincontent2').fadeIn();
                        startCountdown();
                    }
                });
            })
        })
    </script>
@endsection

