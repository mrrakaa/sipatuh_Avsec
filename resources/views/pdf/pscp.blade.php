<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-size: 10px;
            /* Mengurangi ukuran font */
        }

        .custom-checkbox-alt {
            -webkit-appearance: none;
            appearance: none;
            width: 12px;
            /* Mengurangi ukuran checkbox */
            height: 12px;
            border: 1px solid #b9b9b9;
            border-radius: 3px;
            cursor: not-allowed;
        }

        .custom-checkbox-alt:checked {
            background-color: #1e3bdd;
            position: relative;
        }

        .custom-checkbox-alt:checked::before {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 10px;
            /* Mengurangi ukuran font untuk tanda centang */
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .custom-radio {
            -webkit-appearance: none;
            appearance: none;
            width: 12px;
            /* Mengurangi ukuran radio button */
            height: 12px;
            border: 1px solid #b9b9b9;
            border-radius: 50%;
            cursor: not-allowed;
        }

        .custom-radio:checked {
            background-color: white;
            position: relative;
        }

        .custom-radio:checked::before {
            content: '';
            position: absolute;
            width: 6px;
            /* Mengurangi ukuran lingkaran dalam radio button */
            height: 6px;
            background-color: #1e3bdd;
            border-radius: 50%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        /* Mengurangi padding dan margin di dalam konten */
        .content {
            padding: 2mm;
            /* Mengurangi padding */
            margin: 0;
            /* Menghapus margin */
        }

        img {
            max-width: 50px;
            /* Mengatur ukuran gambar agar lebih kecil */
            height: auto;
            /* Memastikan proporsi gambar tetap */
        }
    </style>
</head>

<body class="m-auto items-center">
    <div class="bg-white content" style="width: 210mm; min-height: 297mm;">
        <div id="format" class="mx-auto">
            <div class="flex justify-between items-center border-t-2 border-x-2 border-black p-2">
                <img src="{{ public_path('images/airport-security-logo.png') }}" alt="Logo" class="w-16 h-16">
                <h2 class="text-xl font-bold text-center flex-grow mx-4">
                    CHECK LIST PENGUJIAN HARIAN<br>
                    MESIN X-RAY KABIN MULTI VIEW
                </h2>
                <img src="{{ public_path('images/Injourney-API.png') }}" alt="Logo" class="w-16 h-16">
            </div>

            <div class="flex justify-center">
                <table class="w-full border-collapse border-2 border-black">
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-1">
                            <label class="text-gray-700 font-bold">Nama Operator Penerbangan:</label>
                        </th>
                        <td class="w-2/3 p-1">{{ $form->operatorName }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-1">
                            <label class="text-gray-700 font-bold">Tanggal & Waktu Pengujian:</label>
                        </th>
                        <td class="w-2/3 p-1">{{ $form->testDateTime }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-1">
                            <label class="text-gray-700 font-bold">Lokasi Penempatan:</label>
                        </th>
                        <td class="w-2/3 p-1">{{ $form->location }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-1">
                            <label class="text-gray-700 font-bold">Merk/Tipe/Nomor Seri:</label>
                        </th>
                        <td class="w-2/3 p-1">{{ $form->deviceInfo }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-1">
                            <label class="text-gray-700 font-bold">Nomor dan Tanggal Sertifikat:</label>
                        </th>
                        <td class="w-2/3 p-1">{{ $form->certificateInfo }}</td>
                    </tr>
                </table>
            </div>

            <!-- Checkbox Terpenuhi & Tidak Terpenuhi -->
            <div class="mb-2 border-b-2 border-x-2 border-black">
                <div class="flex flex-col">
                    <label class="inline-flex items-center mt-1 mb-1 ml-4">
                        <input type="checkbox" class="custom-checkbox-alt" {{ $form->terpenuhi ? 'checked' : '' }}
                            disabled>
                        <span class="ml-1 text-xs font-semibold">Terpenuhi</span>
                    </label>
                    <label class="inline-flex items-center ml-4">
                        <input type="checkbox" class="custom-checkbox-alt" {{ $form->tidak_terpenuhi ? 'checked' : '' }}
                            disabled>
                        <span class="ml-1 text-xs font-semibold">Tidak Terpenuhi</span>
                    </label>
                </div>

                <!-- Generator Atas/Bawah Section -->
                <div>
                    <h3 class="text-center font-bold mt-1 text-xs">GENERATOR ATAS/BAWAH</h3>
                    <div class="border-2 border-black mx-1 p-1">
                        <!-- Konten Generator Atas/Bawah -->
                        <!-- Gunakan pendekatan yang sama untuk mengecilkan elemen -->
                        <!-- Contoh: Kurangi padding, margin, dan ukuran font -->

                        <!-- Test 2a, Test 2b, Test 3, dll -->
                        <div class="grid grid-cols-3 gap-2 ml-2">
                            <!-- Test 2a -->
                            <div class="p-2 text-center">
                                <p class="text-xs ml-28">TEST 2a</p>
                                <div class="relative flex border-2 border-black h-10 w-20 ml-32 mt-2">
                                    <!-- Menggeser ke kanan dan bawah -->
                                    <div class="bg-green-500 flex-1 flex items-center justify-center relative">
                                        <div class="absolute right-0 top-0 bottom-0 w-0.5 border-r-2 border-black">
                                        </div>
                                    </div>
                                    <div class="bg-orange-500 flex-1 flex items-center justify-center relative">
                                        <div class="absolute left-0 top-0 bottom-0 w-0.5 border-l-2 border-black"></div>
                                    </div>
                                    <div class="absolute inset-0 flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t2a_ab ? 'checked' : '' }} disabled>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-center items-center ml-36"> <!-- Menggeser ke kanan -->
                                    <p class="mr-1 text-xs">TEST 2b</p>
                                    <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                        {{ $form->t2b_ab ? 'checked' : '' }} disabled>
                                </div>
                            </div>

                            <!-- Test 3 -->
                            <div class="p-2 text-center"> <!-- Mengurangi padding -->
                                <p class="text-xs">TEST 3</p> <!-- Mengurangi ukuran teks -->
                                <div class="relative">
                                    <div class="table border-2 border-black" style="width: 135%; height: 60px;">
                                        <!-- Mengurangi tinggi -->
                                        <div class="table-row">
                                            <div class="table-cell bg-blue-100 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_14_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div> <!-- Mengurangi tinggi garis -->
                                            </div>
                                            <div class="table-cell bg-blue-200 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_16_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-300 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_18_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-400 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_20_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-500 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_22_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-600 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_24_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-700 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_26_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-800 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt                     w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_28_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-900 relative" style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_30_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-1" style="width: 135%;">
                                        <span class="text-center text-xs" style="width: 9.9%;">14</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">16</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">18</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">20</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">22</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">24</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">26</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">28</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">30</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Test 1a, Test 1b, Test 4, Test 5 -->
                        <div class="flex items-start space-x-2 mt-1 ml-24">
                            <!-- Test 1a -->
                            <div class="flex flex-col items-center">
                                <div class="flex items-start">
                                    <span class="transform -rotate-90 mt-12 mr-1 text-xs">AWG</span>
                                    <div class="grid grid-rows-4 gap-1 mt-4">
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">36</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_36_ab ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">32</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_32_ab ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">30</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_30_ab ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">24</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_24_ab ? 'checked' : '' }} disabled>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 ml-6 text-xs">TEST 1a</p>
                            </div>

                            <!-- Test 1b -->
                            <div class="flex flex-col items-center">
                                <div class="grid grid-cols-3 gap-0 border border-black">
                                    <!-- Kolom 1 (4.7 mm) -->
                                    <div class="flex flex-col items-center bg-green-200 p-0.5 border-r border-black">
                                        <span style="font-size: 0.7rem;">4.7 mm</span> <!-- Mengurangi ukuran teks -->
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r1_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r2_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r3_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r4_ab ? 'checked' : '' }} disabled>
                                        </div>
                                        <span style="font-size: 0.7rem;">3/16"</span> <!-- Mengurangi ukuran teks -->
                                    </div>

                                    <!-- Kolom 2 (7.9 mm) -->
                                    <div class="flex flex-col items-center bg-green-300 p-0.5 border-r border-black">
                                        <span style="font-size: 0.7rem;">7.9 mm</span> <!-- Mengurangi ukuran teks -->
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r1_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r2_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r3_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r4_ab ? 'checked' : '' }} disabled>
                                        </div>
                                        <span style="font-size: 0.7rem;">5/16"</span> <!-- Mengurangi ukuran teks -->
                                    </div>

                                    <!-- Kolom 3 (11.1 mm) -->
                                    <div class="flex flex-col items-center bg-green-400 p-0.5">
                                        <span style="font-size: 0.7rem;">11.1 mm</span> <!-- Mengurangi ukuran teks -->
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r1_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r2_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r3_ab ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r4_ab ? 'checked' : '' }} disabled>
                                        </div>
                                        <span style="font-size: 0.7rem;">7/16"</span> <!-- Mengurangi ukuran teks -->
                                    </div>
                                </div>
                                <p class="mt-2" style="font-size: 0.7rem;">TEST 1b</p>
                                <!-- Mengurangi ukuran teks -->
                            </div>

                            <!-- Test 4 -->
                            <div class="flex flex-col items-center w-57">
                                <div class="bg-sky-300 w-56 h-40 relative px-8">
                                    <!-- 1.5 mm gaps horizontal -->
                                    <div class="absolute top-1 left-6 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-1 text-black">1.5 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_15mm_hab ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5 -mt-5">
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.5 mm gaps vertical -->
                                    <div class="absolute top-4 right-16 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_15mm_vab ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-0.5 -mt-5">
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2.0 mm gaps horizontal -->
                                    <div class="absolute top-14 left-12 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-1 text-black">2.0 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_20mm_hab ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5 -mt-5">
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2.0 mm gaps vertical -->
                                    <div class="absolute top-14 right-8 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_20mm_vab ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-1 -mt-5">
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.0 mm gaps horizontal -->
                                    <div class="absolute bottom-2 left-6 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-1 text-black relative top-5">1.0 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 translate-y-[15%]"
                                                    {{ $form->t4_10mm_hab ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5">
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.0 mm gaps vertical -->
                                    <div class="absolute bottom-2 right-16 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 translate-y-[15%]"
                                                    {{ $form->t4_10mm_vab ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-0.5">
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-1 text-xs">TEST 4</p>
                            </div>

                            <!-- Test 5 -->
                            <div class="w-16 font-sans">
                                <!-- Kotak 1 -->
                                <div class="relative inline-block mr-0">
                                    <div
                                        class="w-12 h-12 border-2 border-black bg-[#c8e6c9] flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t5_k005mm_ab ? 'checked' : '' }} disabled>
                                    </div>
                                    <span
                                        class="text-[0.7rem] absolute top-1/2 right-[-16px] transform -translate-y-1/2 -rotate-90">0.05
                                        mm</span>
                                </div>

                                <!-- Kotak 2 -->
                                <div class="relative inline-block mr-0">
                                    <div
                                        class="w-12 h-12 border-2 border-black bg-[#a5d6a7] flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t5_k010mm_ab ? 'checked' : '' }} disabled>
                                    </div>
                                    <span
                                        class="text-[0.7rem] absolute top-1/2 right-[-16px] transform -translate-y-1/2 -rotate-90">0.10
                                        mm</span>
                                </div>

                                <!-- Kotak 3 -->
                                <div class="relative inline-block mr-0">
                                    <div
                                        class="w-12 h-12 border-2 border-black bg-[#81c784] flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t5_k015mm_ab ? 'checked' : '' }} disabled>
                                    </div>
                                    <span
                                        class="text-[0.7rem] absolute top-1/2 right-[-16px] transform -translate-y-1/2 -rotate-90">0.15
                                        mm</span>
                                </div>

                                <!-- Teks "Test 5" -->
                                <div class="text-center mt-1 text-[0.7rem]">TEST 5</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Generator Samping Section (Gunakan pendekatan yang sama) -->
                <div>
                    <h3 class="text-center font-bold mt-1 text-xs">GENERATOR SAMPING</h3>
                    <div class="border-2 border-black mx-1 p-1">
                        <!-- Konten Generator Atas/Bawah -->
                        <!-- Gunakan pendekatan yang sama untuk mengecilkan elemen -->
                        <!-- Contoh: Kurangi padding, margin, dan ukuran font -->

                        <!-- Test 2a, Test 2b, Test 3, dll -->
                        <div class="grid grid-cols-3 gap-2 ml-2">
                            <!-- Test 2a -->
                            <div class="p-2 text-center">
                                <p class="text-xs ml-28">TEST 2a</p>
                                <div class="relative flex border-2 border-black h-10 w-20 ml-32 mt-2">
                                    <!-- Menggeser ke kanan dan bawah -->
                                    <div class="bg-green-500 flex-1 flex items-center justify-center relative">
                                        <div class="absolute right-0 top-0 bottom-0 w-0.5 border-r-2 border-black">
                                        </div>
                                    </div>
                                    <div class="bg-orange-500 flex-1 flex items-center justify-center relative">
                                        <div class="absolute left-0 top-0 bottom-0 w-0.5 border-l-2 border-black">
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t2a_sp ? 'checked' : '' }} disabled>
                                    </div>
                                </div>
                                <div class="mt-2 flex justify-center items-center ml-36"> <!-- Menggeser ke kanan -->
                                    <p class="mr-1 text-xs">TEST 2b</p>
                                    <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                        {{ $form->t2b_sp ? 'checked' : '' }} disabled>
                                </div>
                            </div>

                            <!-- Test 3 -->
                            <div class="p-2 text-center"> <!-- Mengurangi padding -->
                                <p class="text-xs">TEST 3</p> <!-- Mengurangi ukuran teks -->
                                <div class="relative">
                                    <div class="table border-2 border-black" style="width: 135%; height: 60px;">
                                        <!-- Mengurangi tinggi -->
                                        <div class="table-row">
                                            <div class="table-cell bg-blue-100 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_14_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div> <!-- Mengurangi tinggi garis -->
                                            </div>
                                            <div class="table-cell bg-blue-200 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_16_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-300 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_18_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-400 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_20_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-500 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_22_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-600 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_24_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-700 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_26_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-800 border-black border-r relative"
                                                style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt                     w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_28_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-900 relative" style="width: 9.9%;">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt w-3 h-3 absolute top-1/4 left-1/2 transform -translate-x-[120%] -translate-y-1/2"
                                                    {{ $form->t3_30_sp ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-0.5 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-1" style="width: 135%;">
                                        <span class="text-center text-xs" style="width: 9.9%;">14</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">16</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">18</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">20</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">22</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">24</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">26</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">28</span>
                                        <span class="text-center text-xs" style="width: 9.9%;">30</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Test 1a, Test 1b, Test 4, Test 5 -->
                        <div class="flex items-start space-x-2 mt-1 ml-24">
                            <!-- Test 1a -->
                            <div class="flex flex-col items-center">
                                <div class="flex items-start">
                                    <span class="transform -rotate-90 mt-12 mr-1 text-xs">AWG</span>
                                    <div class="grid grid-rows-4 gap-1 mt-4">
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">36</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_36_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">32</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_32_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">30</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_30_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="mr-1 text-xs">24</span>
                                            <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                                {{ $form->t1a_24_sp ? 'checked' : '' }} disabled>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 ml-6 text-xs">TEST 1a</p>
                            </div>

                            <!-- Test 1b -->
                            <div class="flex flex-col items-center">
                                <div class="grid grid-cols-3 gap-0 border border-black">
                                    <!-- Kolom 1 (4.7 mm) -->
                                    <div class="flex flex-col items-center bg-green-200 p-0.5 border-r border-black">
                                        <span style="font-size: 0.7rem;">4.7 mm</span> <!-- Mengurangi ukuran teks -->
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r1_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r2_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r3_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_47mm_r4_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <span style="font-size: 0.7rem;">3/16"</span> <!-- Mengurangi ukuran teks -->
                                    </div>

                                    <!-- Kolom 2 (7.9 mm) -->
                                    <div class="flex flex-col items-center bg-green-300 p-0.5 border-r border-black">
                                        <span style="font-size: 0.7rem;">7.9 mm</span> <!-- Mengurangi ukuran teks -->
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r1_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r2_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r3_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_79mm_r4_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <span style="font-size: 0.7rem;">5/16"</span> <!-- Mengurangi ukuran teks -->
                                    </div>

                                    <!-- Kolom 3 (11.1 mm) -->
                                    <div class="flex flex-col items-center bg-green-400 p-0.5">
                                        <span style="font-size: 0.7rem;">11.1 mm</span> <!-- Mengurangi ukuran teks -->
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r1_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r2_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r3_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="custom-checkbox-alt border border-black"
                                                style="width: 18px; height: 18px;"
                                                {{ $form->t1b_111mm_r4_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <span style="font-size: 0.7rem;">7/16"</span> <!-- Mengurangi ukuran teks -->
                                    </div>
                                </div>
                                <p class="mt-2" style="font-size: 0.7rem;">TEST 1b</p>
                                <!-- Mengurangi ukuran teks -->
                            </div>

                            <!-- Test 4 -->
                            <div class="flex flex-col items-center w-57">
                                <div class="bg-sky-300 w-56 h-40 relative px-8">
                                    <!-- 1.5 mm gaps horizontal -->
                                    <div class="absolute top-1 left-6 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-1 text-black">1.5 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_15mm_hsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5 -mt-5">
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.5 mm gaps vertical -->
                                    <div class="absolute top-4 right-16 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_15mm_vsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-0.5 -mt-5">
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-7 w-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2.0 mm gaps horizontal -->
                                    <div class="absolute top-14 left-12 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-1 text-black">2.0 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_20mm_hsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5 -mt-5">
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2.0 mm gaps vertical -->
                                    <div class="absolute top-14 right-8 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-[56%]"
                                                    {{ $form->t4_20mm_vsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-1 -mt-5">
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.0 mm gaps horizontal -->
                                    <div class="absolute bottom-2 left-6 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-1 text-black relative top-5">1.0 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 translate-y-[15%]"
                                                    {{ $form->t4_10mm_hsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5">
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                    <div class="w-16 h-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.0 mm gaps vertical -->
                                    <div class="absolute bottom-2 right-16 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="custom-checkbox-alt border border-black absolute w-4 h-4 z-10 top-1/2 left-1/2 transform -translate-x-1/2 translate-y-[15%]"
                                                    {{ $form->t4_10mm_vsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-0.5">
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                    <div class="h-8 w-0.5 border-1 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-1 text-xs">TEST 4</p>
                            </div>

                            <!-- Test 5 -->
                            <div class="w-16 font-sans">
                                <!-- Kotak 1 -->
                                <div class="relative inline-block mr-0">
                                    <div
                                        class="w-12 h-12 border-2 border-black bg-[#c8e6c9] flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t5_k005mm_sp ? 'checked' : '' }} disabled>
                                    </div>
                                    <span
                                        class="text-[0.7rem] absolute top-1/2 right-[-16px] transform -translate-y-1/2 -rotate-90">0.05
                                        mm</span>
                                </div>

                                <!-- Kotak 2 -->
                                <div class="relative inline-block mr-0">
                                    <div
                                        class="w-12 h-12 border-2 border-black bg-[#a5d6a7] flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t5_k010mm_sp ? 'checked' : '' }} disabled>
                                    </div>
                                    <span
                                        class="text-[0.7rem] absolute top-1/2 right-[-16px] transform -translate-y-1/2 -rotate-90">0.10
                                        mm</span>
                                </div>

                                <!-- Kotak 3 -->
                                <div class="relative inline-block mr-0">
                                    <div
                                        class="w-12 h-12 border-2 border-black bg-[#81c784] flex justify-center items-center">
                                        <input type="checkbox" class="custom-checkbox-alt w-4 h-4"
                                            {{ $form->t5_k015mm_sp ? 'checked' : '' }} disabled>
                                    </div>
                                    <span
                                        class="text-[0.7rem] absolute top-1/2 right-[-16px] transform -translate-y-1/2 -rotate-90">0.15
                                        mm</span>
                                </div>

                                <!-- Teks "Test 5" -->
                                <div class="text-center mt-1 text-[0.7rem]">TEST 5</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <div class="border-t border-black mt-1">
                            <div class="flex items-start m-1">
                                <label class="text-gray-700 font-bold mr-1 text-xs">Hasil:</label>
                                <div class="flex flex-col text-xs">
                                    <div class="flex items-center">
                                        <input type="radio" class="custom-radio"
                                            {{ $form->result == 'pass' ? 'checked' : '' }} disabled>
                                        <label class="ml-1">PASS</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" class="custom-radio"
                                            {{ $form->result == 'fail' ? 'checked' : '' }} disabled>
                                        <label class="ml-1">FAIL</label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-1">
                                <label class="text-gray-700 font-bold text-xs">CATATAN:</label>
                                <p class="text-xs">{{ $form->notes }}</p>
                            </div>
                        </div>

                        <input type="hidden" id="result" name="result" value="">

                        <div class="border-t border-black p-1">
                            <h3 class="text-xs font-bold">Personel Pengamanan Penerbangan</h3>
                            <div class="flex flex-col">
                                <div class="text-center">
                                    <h4 class="font-bold text-xs">{{ $form->officerName }}</h4>
                                    <label class="text-xs">1. Airport Security Officer</label>
                                </div>
                                <div class="flex justify-center mt-0.5">
                                    @if ($form->officer_signature)
                                        <img src="{{ $form->officer_signature }}" alt="Tanda tangan Officer"
                                            class="w-8">
                                    @else
                                        <p class="text-xs">Tanda tangan Officer tidak tersedia</p>
                                    @endif
                                </div>
                                <div class="text-center mt-1">
                                    <label class="text-xs">2. Airport Security Supervisor</label>
                                </div>
                                <div class="flex justify-center mt-0.5">
                                    @if ($form->supervisor_signature)
                                        <img src="{{ $form->supervisor_signature }}" alt="Tanda tangan Supervisor"
                                            class="w-8" id="supervisorSignatureImage">
                                    @else
                                        <p class="text-xs">Tanda tangan Supervisor tidak tersedia</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
