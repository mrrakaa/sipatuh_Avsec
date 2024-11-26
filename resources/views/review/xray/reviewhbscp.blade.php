@extends('layouts.app')

@section('content')
    <!-- Table Pertama -->
    <div class="container py-8">
        <div class="bg-white shadow-md w-fit rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Tinjau Formulir HBSCP</h1>

            <div class="flex justify-between items-center border-t-2 border-x-2 border-black p-2">
                <img src="{{ asset('images/airport-security-logo.png') }}" alt="Logo" class="w-28 h-28">
                <h2 class="text-2xl font-bold text-center flex-grow mr-27 ml-28">
                    CHECK LIST PENGUJIAN HARIAN<br>
                    MESIN X-RAY BAGASI MULTI VIEW
                </h2>
                <img src="{{ asset('images/Injourney-API.png') }}" alt="Adi Sutjipto" class="w-44 h-30">
            </div>
            <!-- End Table Pertama -->

            <!-- Table Kedua -->
            <div class="flex justify-center">
                <table class="w-full border-collapse border-2 border-black">
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label class="text-gray-700 font-bold">Nama Operator
                                Penerbangan:</label>
                        </th>
                        <td class="w-2/3 p-2">{{ $form->operatorName }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label class="text-gray-700 font-bold">Tanggal & Waktu
                                Pengujian:</label>
                        </th>
                        <td class="w-2/3 p-2">{{ $form->testDateTime }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label class="text-gray-700 font-bold">Lokasi Penempatan:</label>
                        </th>
                        <td class="w-2/3 p-2">{{ $form->location }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label class="text-gray-700 font-bold">Merk/Tipe/Nomor Seri:</label>
                        </th>
                        <td class="w-2/3 p-2">{{ $form->deviceInfo }}</td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label class="text-gray-700 font-bold">Nomor dan Tanggal
                                Sertifikat:</label>
                        </th>
                        <td class="w-2/3 p-2">{{ $form->certificateInfo }}</td>
                        </td>
                    </tr>
                    <tr>
                        <th class="border-y-2 border-black px-3 py-2 text-left h-10"></th>
                        <td class="border-y-2 border-black px-0 py-2 text-left"></td>
                        <td class="border-y-2 border-black px-1 py-2"></td>
                    </tr>
                </table>
            </div>
            <!-- End Table Kedua -->

            <!-- Checkbox Terpenuhi & Tidak Terpenuhi -->
            <div class="mb-4 border-b-2 border-x-2 border-black">
                <div class="flex flex-col">
                    <label class="inline-flex items-center mt-2 mb-2 ml-10">
                        <input type="checkbox" class="form-checkbox" {{ $form->terpenuhi ? 'checked' : '' }} disabled>
                        <!-- Checkbox Terpenuhi -->
                        <span class="ml-2 font-semibold">Terpenuhi</span>
                    </label>
                    <label class="inline-flex items-center ml-10">
                        <input type="checkbox" class="form-checkbox" {{ $form->tidak_terpenuhi ? 'checked' : '' }} disabled>
                        <span class="ml-2 font-semibold">Tidak Terpenuhi</span>
                    </label>
                </div>

                <div>
                    <!-- Box Generator Atas/Bawah -->
                    <h3 class="text-center font-bold my-2">GENERATOR ATAS/BAWAH</h3>
                    <div class="border-2 border-black mx-4 p-4">
                        <div class="grid grid-cols-3 gap-4 ml-20">
                            <!-- Test 2a -->
                            <div class="p-4 text-center">
                                <p>TEST 2a</p>
                                <div class="relative flex border-2 border-black" style="height: 100px;">
                                    <div class="bg-green-500 flex-1 flex items-center justify-center relative">
                                        <div class="absolute right-0 top-0 bottom-0 w-0.01 border-r-2 border-black">
                                        </div>
                                    </div>
                                    <div class="bg-orange-500 flex-1 flex items-center justify-center relative">
                                        <div class="absolute left-0 top-0 bottom-0 w-0.01 border-l-2 border-black">
                                        </div>
                                    </div>
                                    <div class="absolute inset-0 flex justify-center items-center" style="top: -37px;">
                                        <input type="checkbox" class="form-checkbox" style="width: 20px; height: 20px;"
                                            {{ $form->t2a_ab ? 'checked' : '' }} disabled>
                                        <!-- Checkbox Test 2a -->
                                    </div>
                                </div>
                                <!-- Test 2b -->
                                <div class="mt-4 flex justify-center items-center ml-20">
                                    <p class="mr-2">TEST 2b</p>
                                    <input type="checkbox" class="form-checkbox" style="width: 20px; height: 20px;"
                                        {{ $form->t2b_ab ? 'checked' : '' }} disabled>
                                    <!-- Checkbox Test 2b -->
                                </div>
                                <!-- End Test 2b -->
                            </div>
                            <!-- End Test 2a -->

                            <!-- Test 3 -->
                            <div class="p-4 text-center">
                                <p>TEST 3</p>
                                <div class="relative">
                                    <div class="table border-2 border-black" style="width: 200%; height: 100px;">
                                        <div class="table-row">
                                            <div class="table-cell bg-blue-100 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_14_ab ? 'checked' : '' }} disabled>
                                                <!-- Checkbox nomor 14 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-200 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_16_ab ? 'checked' : '' }}
                                                    disabled><!-- Checkbox nomor 16 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-300 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_18_ab ? 'checked' : '' }}
                                                    disabled><!-- Checkbox nomor 18 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-400 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_20_ab ? 'checked' : '' }}
                                                    disabled><!-- Checkbox nomor 20 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-500 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_22_ab ? 'checked' : '' }}
                                                    disabled><!-- Checkbox nomor 22 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-600 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_24_ab ? 'checked' : '' }}
                                                    disabled><!-- Checkbox nomor 24 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-700 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_26_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-800 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_28_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-900 relative" style="width: 11.11%;">
                                                <input type="checkbox"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t3_30_ab ? 'checked' : '' }} disabled>
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-1" style="width: 200%;">
                                        <span class="text-center" style="width: 11.11%;">14</span>
                                        <span class="text-center" style="width: 11.11%;">16</span>
                                        <span class="text-center" style="width: 11.11%;">18</span>
                                        <span class="text-center" style="width: 11.11%;">20</span>
                                        <span class="text-center" style="width: 11.11%;">22</span>
                                        <span class="text-center" style="width: 11.11%;">24</span>
                                        <span class="text-center" style="width: 11.11%;">26</span>
                                        <span class="text-center" style="width: 11.11%;">28</span>
                                        <span class="text-center" style="width: 11.11%;">30</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Test 3 -->

                        </div>

                        <div class="flex flex-col items-start space-y-4">
                            <!-- Test 1a dan Test 1b -->
                            <div class="flex items-start space-x-4 mt-10">
                                <!-- Test 1a -->
                                <div class="flex flex-col items-center">
                                    <div class="flex items-start">
                                        <span
                                            style="transform: rotate(-90deg); margin-top: 75px; margin-right: 10px;">AWG</span>
                                        <div class="grid grid-rows-4 gap-1 mt-7">
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">36</span>
                                                <input type="checkbox" class="form-checkbox"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1a_36_ab ? 'checked' : '' }} disabled>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">32</span>
                                                <input type="checkbox" class="form-checkbox"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1a_32_ab ? 'checked' : '' }} disabled>
                                                <!-- Checkbox nomor 32 -->
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">30</span>
                                                <input type="checkbox" class="form-checkbox"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1a_30_ab ? 'checked' : '' }} disabled>
                                                <!-- Checkbox nomor 30 -->
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">24</span>
                                                <input type="checkbox" class="form-checkbox"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1a_24_ab ? 'checked' : '' }} disabled>
                                                <!-- Checkbox nomor 24 -->
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-7 ml-10">TEST 1a</p>
                                </div>
                                <!-- End Test 1a -->

                                <!-- Test 1b -->
                                <div class="flex flex-col items-center">
                                    <div class="grid grid-cols-3 gap-0 border border-black">
                                        <!-- Kolom 1 (4.7 mm) -->
                                        <div class="flex flex-col items-center bg-green-200 p-0.5 border-r border-black">
                                            <span>4.7 mm</span>
                                            <div class="grid grid-rows-4 gap-1">
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_47mm_r1_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_47mm_r2_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_47mm_r3_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_47mm_r4_ab ? 'checked' : '' }} disabled>
                                            </div>
                                            <span>3/16"</span>
                                        </div>

                                        <!-- Kolom 2 (7.9 mm) -->
                                        <div class="flex flex-col items-center bg-green-300 p-0.5 border-r border-black">
                                            <span>7.9 mm</span>
                                            <div class="grid grid-rows-4 gap-1">
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_79mm_r1_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_79mm_r2_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_79mm_r3_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_79mm_r4_ab ? 'checked' : '' }} disabled>
                                            </div>
                                            <span>5/16"</span>
                                        </div>

                                        <!-- Kolom 3 (11.1 mm) -->
                                        <div class="flex flex-col items-center bg-green-400 p-0.5">
                                            <span>11.1 mm</span>
                                            <div class="grid grid-rows-4 gap-1">
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_111mm_r1_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_111mm_r2_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_111mm_r3_ab ? 'checked' : '' }} disabled>
                                                <input type="checkbox" class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;"
                                                    {{ $form->t1b_111mm_r4_ab ? 'checked' : '' }} disabled>
                                            </div>
                                            <span>7/16"</span>
                                        </div>
                                    </div>
                                    <p class="mt-2">TEST 1b</p>
                                </div>

                                <!-- Test 4 -->
                                <div class="flex flex-col items-center w-72">
                                    <div class="bg-sky-300 w-72 h-52 relative px-16">
                                        <!-- 1.5 mm gaps horizontal -->
                                        <div class="absolute top-3 left-10 flex">
                                            <div class="flex flex-col items-center">
                                                <span class="text-xs mb-2 text-black">1.5 mm gaps</span>
                                                <div class="relative">
                                                    <input type="checkbox"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        {{ $form->t4_15mm_hab ? 'checked' : '' }} disabled>
                                                    <div class="flex flex-col gap-0.5">
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 1.5 mm gaps vertical -->
                                        <div class="absolute top-8 right-24 flex">
                                            <div class="flex flex-col items-center">
                                                <div class="relative">
                                                    <input type="checkbox"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        {{ $form->t4_15mm_vab ? 'checked' : '' }} disabled>
                                                    <div class="flex flex-row gap-1.5">
                                                        <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                        <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                        <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                        <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 2.0 mm gaps horizontal -->
                                        <div class="absolute top-20 left-20 flex">
                                            <div class="flex flex-col items-center">
                                                <span class="text-xs mb-2 text-black">2.0 mm gaps</span>
                                                <div class="relative">
                                                    <input type="checkbox"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        {{ $form->t4_20mm_hab ? 'checked' : '' }} disabled>
                                                    <div class="flex flex-col gap-0.5">
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 2.0 mm gaps vertical -->
                                        <div class="absolute top-20 right-12 flex">
                                            <div class="flex flex-col items-center">
                                                <div class="relative">
                                                    <input type="checkbox"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        {{ $form->t4_20mm_vab ? 'checked' : '' }} disabled>
                                                    <div class="flex flex-row gap-2">
                                                        <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                        </div>
                                                        <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                        </div>
                                                        <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                        </div>
                                                        <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 1.0 mm gaps horizontal -->
                                        <div class="absolute bottom-6 left-10 flex">
                                            <div class="flex flex-col items-center">
                                                <span class="text-xs mb-2 text-black">1.0 mm gaps</span>
                                                <div class="relative">
                                                    <input type="checkbox"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        {{ $form->t4_10mm_hab ? 'checked' : '' }} disabled>
                                                    <div class="flex flex-col gap-0.5">
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                        <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 1.0 mm gaps vertical -->
                                        <div class="absolute bottom-5 right-24 flex">
                                            <div class="flex flex-col items-center">
                                                <div class="relative">
                                                    <input type="checkbox"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        {{ $form->t4_10mm_vab ? 'checked' : '' }} disabled>
                                                    <div class="flex flex-row gap-0.5">
                                                        <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                        <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                        <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                        <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-4 text">TEST 4</p>
                                </div>
                                <!-- End Test 4 -->

                                <!-- Test 5 -->
                                <div class="w-[80px] font-sans">
                                    <!-- Kotak 1 -->
                                    <div class="relative">
                                        <div
                                            class="w-16 h-16 border-x-2 border-y-2 border-black bg-[#c8e6c9] flex justify-center items-center">
                                            <div class="w-[23px] h-[24px] flex justify-center items-center">
                                                <input type="checkbox" class="form-checkbox w-6 h-6"
                                                    {{ $form->t5_k005mm_ab ? 'checked' : '' }} disabled>
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs absolute top-1/2 right-[-25px] transform -translate-y-1/2 -rotate-90">0.05
                                            mm</span>
                                    </div>

                                    <!-- Kotak 2 -->
                                    <div class="relative">
                                        <div
                                            class="w-16 h-16 border-x-2 border-black bg-[#a5d6a7] flex justify-center items-center">
                                            <div class="w-[23px] h-[24px] flex justify-center items-center">
                                                <input type="checkbox" class="form-checkbox w-6 h-6"
                                                    {{ $form->t5_k010mm_ab ? 'checked' : '' }} disabled>
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs absolute top-1/2 right-[-25px] transform -translate-y-1/2 -rotate-90">0.10
                                            mm</span>
                                    </div>

                                    <!-- Kotak 3 -->
                                    <div class="relative">
                                        <div
                                            class="w-16 h-16 border-x-2 border-y-2 border-black bg-[#81c784] flex justify-center items-center">
                                            <div class="w-[23px] h-[24px] flex justify-center items-center">
                                                <input type="checkbox" class="form-checkbox w-6 h-6"
                                                    {{ $form->t5_k015mm_ab ? 'checked' : '' }} disabled>
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs absolute top-1/2 right-[-25px] transform -translate-y-1/2 -rotate-90">0.15
                                            mm</span>
                                    </div>

                                    <!-- Teks "Test 5" -->
                                    <div class="text-center mt-2 font">TEST 5</div>
                                </div>
                                <!-- End Test 5 -->
                            </div>
                        </div>
                    </div>
                    <!-- End Box Generator Atas/Bawah -->
                </div>

                <!-- Box Generator Samping -->
                <h3 class="text-center font-bold my-2">GENERATOR SAMPING</h3>
                <div class="border-2 border-black mx-4 p-4">
                    <div class="grid grid-cols-3 gap-4 ml-20">
                        <!-- Test 2a -->
                        <div class="p-4 text-center">
                            <p>TEST 2a</p>
                            <div class="relative flex border-2 border-black" style="height: 100px;">
                                <div class="bg-green-500 flex-1 flex items-center justify-center relative">
                                    <div class="absolute right-0 top-0 bottom-0 w-0.01 border-r-2 border-black">
                                    </div>
                                </div>
                                <div class="bg-orange-500 flex-1 flex items-center justify-center relative">
                                    <div class="absolute left-0 top-0 bottom-0 w-0.01 border-l-2 border-black">
                                    </div>
                                </div>
                                <div class="absolute inset-0 flex justify-center items-center" style="top: -37px;">
                                    <input type="checkbox" class="form-checkbox" style="width: 20px; height: 20px;"
                                        {{ $form->t2a_sp ? 'checked' : '' }} disabled>
                                    <!-- Checkbox Test 2a -->
                                </div>
                            </div>
                            <!-- Test 2b -->
                            <div class="mt-4 flex justify-center items-center ml-20">
                                <p class="mr-2">TEST 2b</p>
                                <input type="checkbox" class="form-checkbox" style="width: 20px; height: 20px;"
                                    {{ $form->t2b_sp ? 'checked' : '' }} disabled>
                                <!-- Checkbox Test 2b -->
                            </div>
                            <!-- End Test 2b -->
                        </div>
                        <!-- End Test 2a -->

                        <!-- Test 3 -->
                        <div class="p-4 text-center">
                            <p>TEST 3</p>
                            <div class="relative">
                                <div class="table border-2 border-black" style="width: 200%; height: 100px;">
                                    <div class="table-row">
                                        <div class="table-cell bg-blue-100 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_14_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 14 -->
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-200 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_16_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 16 -->
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-300 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_18_sp ? 'checked' : '' }}
                                                disabled><!-- Checkbox nomor 18 -->
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-400 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_20_sp ? 'checked' : '' }}
                                                disabled><!-- Checkbox nomor 20 -->
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-500 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_22_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 22 -->
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-600 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_24_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 24 -->
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-700 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_26_sp ? 'checked' : '' }}
                                                disabled>
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-800 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_28_sp ? 'checked' : '' }}
                                                disabled>
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-900 relative" style="width: 11.11%;">
                                            <input type="checkbox"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"{{ $form->t3_30_sp ? 'checked' : '' }}
                                                disabled>
                                            <div class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-1" style="width: 200%;">
                                    <span class="text-center" style="width: 11.11%;">14</span>
                                    <span class="text-center" style="width: 11.11%;">16</span>
                                    <span class="text-center" style="width: 11.11%;">18</span>
                                    <span class="text-center" style="width: 11.11%;">20</span>
                                    <span class="text-center" style="width: 11.11%;">22</span>
                                    <span class="text-center" style="width: 11.11%;">24</span>
                                    <span class="text-center" style="width: 11.11%;">26</span>
                                    <span class="text-center" style="width: 11.11%;">28</span>
                                    <span class="text-center" style="width: 11.11%;">30</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Test 3 -->

                    </div>

                    <div class="flex flex-col items-start space-y-4">
                        <!-- Test 1a dan Test 1b -->
                        <div class="flex items-start space-x-4 mt-10">
                            <!-- Test 1a -->
                            <div class="flex flex-col items-center">
                                <div class="flex items-start">
                                    <span
                                        style="transform: rotate(-90deg); margin-top: 75px; margin-right: 10px;">AWG</span>
                                    <div class="grid grid-rows-4 gap-1 mt-7">
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">36</span>
                                            <input type="checkbox" class="form-checkbox"
                                                style="width: 24px; height: 24px;" {{ $form->t1a_36_sp ? 'checked' : '' }}
                                                disabled>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">32</span>
                                            <input type="checkbox" class="form-checkbox"
                                                style="width: 24px; height: 24px;" {{ $form->t1a_32_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 32 -->
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">30</span>
                                            <input type="checkbox" class="form-checkbox"
                                                style="width: 24px; height: 24px;" {{ $form->t1a_30_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 30 -->
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">24</span>
                                            <input type="checkbox" class="form-checkbox"
                                                style="width: 24px; height: 24px;" {{ $form->t1a_24_sp ? 'checked' : '' }}
                                                disabled>
                                            <!-- Checkbox nomor 24 -->
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-7 ml-10">TEST 1a</p>
                            </div>
                            <!-- End Test 1a -->

                            <!-- Test 1b -->
                            <div class="flex flex-col items-center">
                                <div class="grid grid-cols-3 gap-0 border border-black">
                                    <!-- Kolom 1 (4.7 mm) -->
                                    <div class="flex flex-col items-center bg-green-200 p-0.5 border-r border-black">
                                        <span>4.7 mm</span>
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_47mm_r1_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_47mm_r2_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_47mm_r3_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_47mm_r4_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <span>3/16"</span>
                                    </div>

                                    <!-- Kolom 2 (7.9 mm) -->
                                    <div class="flex flex-col items-center bg-green-300 p-0.5 border-r border-black">
                                        <span>7.9 mm</span>
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_79mm_r1_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_79mm_r2_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_79mm_r3_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_79mm_r4_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <span>5/16"</span>
                                    </div>

                                    <!-- Kolom 3 (11.1 mm) -->
                                    <div class="flex flex-col items-center bg-green-400 p-0.5">
                                        <span>11.1 mm</span>
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_111mm_r1_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_111mm_r2_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_111mm_r3_sp ? 'checked' : '' }} disabled>
                                            <input type="checkbox" class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;"
                                                {{ $form->t1b_111mm_r4_sp ? 'checked' : '' }} disabled>
                                        </div>
                                        <span>7/16"</span>
                                    </div>
                                </div>
                                <p class="mt-2">TEST 1b</p>
                            </div>
                            <!-- Test 1b -->

                            <!-- Test 4 -->
                            <div class="flex flex-col items-center w-72">
                                <div class="bg-sky-300 w-72 h-52 relative px-16">
                                    <!-- 1.5 mm gaps horizontal -->
                                    <div class="absolute top-3 left-10 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-2 text-black">1.5 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t4_15mm_hsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5">
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.5 mm gaps vertical -->
                                    <div class="absolute top-8 right-24 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t4_15mm_vsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-1.5">
                                                    <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                    <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                    <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                    <div class="h-11 w-1 border-2 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2.0 mm gaps horizontal -->
                                    <div class="absolute top-20 left-20 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-2 text-black">2.0 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t4_20mm_hsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5">
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2.0 mm gaps vertical -->
                                    <div class="absolute top-20 right-12 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t4_20mm_vsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-2">
                                                    <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                    </div>
                                                    <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                    </div>
                                                    <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                    </div>
                                                    <div class="h-12 w-1.5 border-2 border-black bg-white">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.0 mm gaps horizontal -->
                                    <div class="absolute bottom-6 left-10 flex">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xs mb-2 text-black">1.0 mm gaps</span>
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t4_10mm_hsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-col gap-0.5">
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                    <div class="w-24 h-1 border-2 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1.0 mm gaps vertical -->
                                    <div class="absolute bottom-5 right-24 flex">
                                        <div class="flex flex-col items-center">
                                            <div class="relative">
                                                <input type="checkbox"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    {{ $form->t4_10mm_vsp ? 'checked' : '' }} disabled>
                                                <div class="flex flex-row gap-0.5">
                                                    <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                    <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                    <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                    <div class="h-12 w-1 border-2 border-black bg-white"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 text">TEST 4</p>
                            </div>
                            <!-- End Test 4 -->

                            <!-- Test 5 -->
                            <div class="w-[80px] font-sans">
                                <!-- Kotak 1 -->
                                <div class="relative">
                                    <div
                                        class="w-16 h-16 border-x-2 border-y-2 border-black bg-[#c8e6c9] flex justify-center items-center">
                                        <div class="w-[23px] h-[24px] flex justify-center items-center">
                                            <input type="checkbox" class="form-checkbox w-6 h-6"
                                                {{ $form->t5_k005mm_sp ? 'checked' : '' }} disabled>
                                        </div>
                                    </div>
                                    <span
                                        class="text-xs absolute top-1/2 right-[-25px] transform -translate-y-1/2 -rotate-90">0.05
                                        mm</span>
                                </div>

                                <!-- Kotak 2 -->
                                <div class="relative">
                                    <div
                                        class="w-16 h-16 border-x-2 border-black bg-[#a5d6a7] flex justify-center items-center">
                                        <div class="w-[23px] h-[24px] flex justify-center items-center">
                                            <input type="checkbox" class="form-checkbox w-6 h-6"
                                                {{ $form->t5_k010mm_sp ? 'checked' : '' }} disabled>
                                        </div>
                                    </div>
                                    <span
                                        class="text-xs absolute top-1/2 right-[-25px] transform -translate-y-1/2 -rotate-90">0.10
                                        mm</span>
                                </div>

                                <!-- Kotak 3 -->
                                <div class="relative">
                                    <div
                                        class="w-16 h-16 border-x-2 border-y-2 border-black bg-[#81c784] flex justify-center items-center">
                                        <div class="w-[23px] h-[24px] flex justify-center items-center">
                                            <input type="checkbox" class="form-checkbox w-6 h-6"
                                                {{ $form->t5_k015mm_sp ? 'checked' : '' }} disabled>
                                        </div>
                                    </div>
                                    <span
                                        class="text-xs absolute top-1/2 right-[-25px] transform -translate-y-1/2 -rotate-90">0.15
                                        mm</span>
                                </div>

                                <!-- Teks "Test 5" -->
                                <div class="text-center mt-2 font">TEST 5</div>
                            </div>
                            <!-- End Test 5 -->
                        </div>
                    </div>
                </div>
                <!-- End Box Generator Samping -->

                <!-- Hasil dan Tanda Tangan Section -->
                <div>
                    <div>
                        <!-- Border atas -->
                        <div class="border-t-2 border-black mt-5">
                            <div class="flex items-start mt-2 mb-2 ml-2">
                                <label class="text-gray-700 font-bold mr-4">Hasil:</label>
                                <div class="flex flex-col">
                                    <div class="flex items-center mb-0">
                                        <input type="radio" {{ $form->result == 'pass' ? 'checked' : '' }} disabled>
                                        <label for="resultPass" class="text-sm ml-2">PASS</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" {{ $form->result == 'fail' ? 'checked' : '' }} disabled>
                                        <label for="resultFail" class="text-sm ml-2">FAIL</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-2">
                                <label for="notes" class="block text-gray-700 font-bold mb-2">CATATAN:</label>
                                <p>{{ $form->notes }}</p>
                            </div>
                        </div>

                        <!-- Hidden input untuk hasil -->
                        <input type="hidden" id="result" name="result" value="">

                        <!-- Border bawah dengan modifikasi -->
                        <div class="border-t-2 border-black p-4">
                            <h3 class="text-sm font-bold mb-2">Personel Pengamanan Penerbangan</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="grid grid-rows-2 gap-2 items-center">
                                    <!-- Kolom Kiri (Label 1) -->
                                    <div class="text-center self-end">
                                        <h4 class="font-bold">{{ $form->officerName }}</h4>
                                        <label class="text-gray-700 font-normal">1. Airport Security Officer</label>
                                    </div>
                                    <div class="text-center self-end">
                                        <label class="text-gray-700 font-normal">2. Airport Security Supervisor</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col items-center">
                                        @if ($form->officer_signature)
                                            <img src="{{ $form->officer_signature }}" alt="Tanda tangan Officer">
                                        @else
                                            <p>Tanda tangan Officer tidak tersedia</p>
                                        @endif
                                    </div>
                                    <div class="flex flex-col items-center">
                                        @if ($form->supervisor_signature)
                                            <img src="{{ $form->supervisor_signature }}" alt="Tanda tangan Supervisor"
                                                id="supervisorSignatureImage">
                                        @else
                                            <p>Tanda tangan Supervisor tidak tersedia</p>
                                        @endif
                                    </div>
                                    <!-- Canvas untuk Tanda Tangan Supervisor -->
                                    @if (!$form->supervisor_signature)
                                        <div class="flex flex-col items-center mt-4" id="signatureContainer">
                                            <h3 class="text-sm font-bold mb-2">Tanda Tangan Supervisor</h3>
                                            <canvas id="signatureCanvas" width="300" height="150"
                                                style="border: 1px solid #000;"></canvas>
                                            <div class="mt-2">
                                                <button type="button" id="clearSignature"
                                                    class="bg-red-500 text-white px-4 py-2 rounded">Clear</button>
                                                <button type="button" id="saveSupervisorSignature"
                                                    class="bg-green-500 text-white px-4 py-2 rounded ml-2">Save</button>
                                            </div>
                                            <input type="hidden" name="supervisor_signature_data"
                                                id="supervisorSignatureData">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('hbscp.updateStatus', $form->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                        Status
                    </label>
                    <select name="status" id="status"
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="approved">Setujui</option>
                        <option value="rejected">Tolak</option>
                    </select>
                </div>

                <div id="rejectionNoteContainer" class="mb-4 hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rejection_note">
                        Catatan Penolakan
                    </label>
                    <textarea name="rejection_note" id="rejection_note" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Masukkan alasan penolakan..."></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Perbarui Status
                    </button>
                    <a href="{{ route('dashboard') }}"
                        class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Kembali ke Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const rejectionNoteContainer = document.getElementById('rejectionNoteContainer');
            const rejectionNoteTextarea = document.getElementById('rejection_note');

            statusSelect.addEventListener('change', function() {
                if (this.value === 'rejected') {
                    rejectionNoteContainer.classList.remove('hidden');
                    // Tambahkan validasi bahwa catatan harus diisi
                    rejectionNoteTextarea.setAttribute('required', 'required');
                } else {
                    rejectionNoteContainer.classList.add('hidden');
                    rejectionNoteTextarea.removeAttribute('required');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('signatureCanvas');
            const ctx = canvas.getContext('2d');
            let isDrawing = false;
            let lastX = 0; // Menyimpan posisi X terakhir
            let lastY = 0; // Menyimpan posisi Y terakhir

            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mouseout', stopDrawing);

            document.getElementById('clearSignature').addEventListener('click', clearCanvas);
            document.getElementById('saveSupervisorSignature').addEventListener('click', saveSupervisorSignature);

            function startDrawing(e) {
                isDrawing = true;
                [lastX, lastY] = [e.offsetX, e.offsetY]; // Menggunakan offsetX dan offsetY
                draw(e);
            }

            function draw(e) {
                if (!isDrawing) return;
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.strokeStyle = '#000';

                ctx.beginPath();
                ctx.moveTo(lastX, lastY); // Menggunakan posisi terakhir
                ctx.lineTo(e.offsetX, e.offsetY); // Menggunakan offsetX dan offsetY
                ctx.stroke();
                [lastX, lastY] = [e.offsetX, e.offsetY]; // Memperbarui posisi terakhir
            }

            function stopDrawing() {
                isDrawing = false;
                ctx.beginPath();
            }

            function clearCanvas() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }

            function saveSupervisorSignature() {
                const supervisorSignatureData = canvas.toDataURL('image/png');
                document.getElementById('supervisorSignatureData').value = supervisorSignatureData;

                // Menampilkan tanda tangan yang disimpan
                const signatureContainer = document.getElementById('signatureContainer');
                signatureContainer.innerHTML = `
                <h3 class="text-sm font-bold mb-2">Tanda Tangan Supervisor</h3>
                <img src="${supervisorSignatureData}" alt="Tanda tangan Supervisor" id="supervisorSignatureImage">
            `;

                // Mengirim data tanda tangan ke server
                fetch('{{ route('hbscp.saveSupervisorSignature', $form->id) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        signature: supervisorSignatureData
                    })
                })
            }
        });
    </script>
@endsection
