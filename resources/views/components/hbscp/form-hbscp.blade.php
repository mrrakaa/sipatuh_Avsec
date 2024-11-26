<!-- Table Pertama -->
<div class="container py-8">
    <div class="bg-white shadow-md rounded max-w-4xl mx-auto px-8 pt-6 pb-8 mb-4">
        <div class="flex justify-between items-center border-t-2 border-x-2 border-black p-2">
            <img src="{{ asset('images/airport-security-logo.png') }}" alt="Logo" class="w-28 h-28">
            <h2 class="text-2xl font-bold text-center flex-grow mr-27 ml-28">
                CHECK LIST PENGUJIAN HARIAN<br>
                MESIN X-RAY BAGASI MULTI VIEW
            </h2>
            <img src="{{ asset('images/Injourney-API.png') }}" alt="Adi Sutjipto" class="w-44 h-30">
        </div>
        <!-- End Table Pertama -->

        <form id="hbscpForm" action="{{ route('submit.hbscp.bagasi') }}" method="POST" enctype="multipart/form-data"
            onsubmit="onFormSubmit(event)" class="mt-0">
            @csrf
            <!-- Table Kedua -->
            <div class="flex justify-center">
                <table class="w-full border-collapse border-2 border-black">
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label for="operatorName" class="text-gray-700 font-bold">Nama Operator
                                Penerbangan:</label>
                        </th>
                        <td class="w-2/3 p-2">
                            <input type="text" id="operatorName" name="operatorName"
                                class="w-full border rounded px-2 py-1" value="Bandar Udara Adisutjipto Yogyakarta"
                                readonly>
                        </td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label for="testDateTime" class="text-gray-700 font-bold">Tanggal & Waktu
                                Pengujian:</label>
                        </th>
                        <td class="w-2/3 p-2">
                            <input type="datetime-local" id="testDateTime" name="testDateTime"
                                class="w-full border rounded px-2 py-1" readonly>
                        </td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label for="location" class="text-gray-700 font-bold">Lokasi Penempatan:</label>
                        </th>
                        <td class="w-2/3 p-2">
                            <select id="location" name="location" class="w-full border rounded px-2 py-1">
                                <option value="" disabled selected>Pilih Lokasi</option>
                                <option value="Bagasi Timur">Bagasi Timur</option>
                                <option value="Bagasi Barat">Bagasi Barat</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label for="deviceInfo" class="text-gray-700 font-bold">Merk/Tipe/Nomor Seri:</label>
                        </th>
                        <td class="w-2/3 p-2">
                            <input type="text" id="deviceInfo" name="deviceInfo"
                                class="w-full border rounded px-2 py-1">
                        </td>
                    </tr>
                    <tr class="border-b border-black">
                        <th class="w-1/3 text-left p-2">
                            <label for="certificateInfo" class="text-gray-700 font-bold">Nomor dan Tanggal
                                Sertifikat:</label>
                        </th>
                        <td class="w-2/3 p-2">
                            <input type="text" id="certificateInfo" name="certificateInfo"
                                class="w-full border rounded px-2 py-1">
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
                        <input type="checkbox" class="form-checkbox" id="terpenuhi" name="terpenuhi" value="1"
                            checked>
                        <!-- Checkbox Terpenuhi -->
                        <span class="ml-2 font-semibold">Terpenuhi</span>
                    </label>
                    <label class="inline-flex items-center ml-10">
                        <input type="checkbox" class="form-checkbox" id="tidak_terpenuhi" name="tidak_terpenuhi"
                            value="1">
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
                                        <input type="checkbox" id="t2a_ab" name="t2a_ab" class="form-checkbox"
                                            style="width: 20px; height: 20px;" value="1">
                                        <!-- Checkbox Test 2a -->
                                    </div>
                                </div>
                                <!-- Test 2b -->
                                <div class="mt-4 flex justify-center items-center ml-20">
                                    <p class="mr-2">TEST 2b</p>
                                    <input type="checkbox" id="t2b_ab" name="t2b_ab" class="form-checkbox"
                                        style="width: 20px; height: 20px;" value="1">
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
                                                <input type="checkbox" id="t3_14_ab" name="t3_14_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
                                                <!-- Checkbox nomor 14 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-200 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_16_ab" name="t3_16_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
                                                <!-- Checkbox nomor 16 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-300 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_18_ab" name="t3_18_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1"><!-- Checkbox nomor 18 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-400 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_20_ab" name="t3_20_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1"><!-- Checkbox nomor 20 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-500 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_22_ab" name="t3_22_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
                                                <!-- Checkbox nomor 22 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-600 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_24_ab" name="t3_24_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
                                                <!-- Checkbox nomor 24 -->
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-700 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_26_ab" name="t3_26_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-800 border-black border-r relative"
                                                style="width: 11.11%;">
                                                <input type="checkbox" id="t3_28_ab" name="t3_28_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
                                                <div
                                                    class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                                </div>
                                            </div>
                                            <div class="table-cell bg-blue-900 relative" style="width: 11.11%;">
                                                <input type="checkbox" id="t3_30_ab" name="t3_30_ab"
                                                    class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                                <input type="checkbox" class="form-checkbox" id="t1a_36_ab"
                                                    name="t1a_36_ab" style="width: 24px; height: 24px;"
                                                    value="1">
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">32</span>
                                                <input type="checkbox" class="form-checkbox" id="t1a_32_ab"
                                                    name="t1a_32_ab" style="width: 24px; height: 24px;"
                                                    value="1">
                                                <!-- Checkbox nomor 32 -->
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">30</span>
                                                <input type="checkbox" class="form-checkbox" id="t1a_30_ab"
                                                    name="t1a_30_ab" style="width: 24px; height: 24px;"
                                                    value="1">
                                                <!-- Checkbox nomor 30 -->
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span style="margin-right: 5px;">24</span>
                                                <input type="checkbox" class="form-checkbox" id="t1a_24_ab"
                                                    name="t1a_24_ab" style="width: 24px; height: 24px;"
                                                    value="1">
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
                                        <div
                                            class="flex flex-col items-center bg-green-200 p-0.5 border-r border-black">
                                            <span>4.7 mm</span>
                                            <div class="grid grid-rows-4 gap-1">
                                                <input type="checkbox" id="t1b_47mm_r1_ab" name="t1b_47mm_r1_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_47mm_r2_ab" name="t1b_47mm_r2_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_47mm_r3_ab" name="t1b_47mm_r3_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_47mm_r4_ab" name="t1b_47mm_r4_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                            </div>
                                            <span>3/16"</span>
                                        </div>

                                        <!-- Kolom 2 (7.9 mm) -->
                                        <div
                                            class="flex flex-col items-center bg-green-300 p-0.5 border-r border-black">
                                            <span>7.9 mm</span>
                                            <div class="grid grid-rows-4 gap-1">
                                                <input type="checkbox" id="t1b_79mm_r1_ab" name="t1b_79mm_r1_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_79mm_r2_ab" name="t1b_79mm_r2_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_79mm_r3_ab" name="t1b_79mm_r3_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_79mm_r4_ab" name="t1b_79mm_r4_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                            </div>
                                            <span>5/16"</span>
                                        </div>

                                        <!-- Kolom 3 (11.1 mm) -->
                                        <div class="flex flex-col items-center bg-green-400 p-0.5">
                                            <span>11.1 mm</span>
                                            <div class="grid grid-rows-4 gap-1">
                                                <input type="checkbox" id="t1b_111mm_r1_ab" name="t1b_111mm_r1_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_111mm_r2_ab" name="t1b_111mm_r2_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_111mm_r3_ab" name="t1b_111mm_r3_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
                                                <input type="checkbox" id="t1b_111mm_r4_ab" name="t1b_111mm_r4_ab"
                                                    class="form-checkbox border border-black"
                                                    style="width: 24px; height: 24px;" value="1">
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
                                                    <input type="checkbox" id="t4_15mm_hab" name="t4_15mm_hab"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        value="1">
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
                                                    <input type="checkbox" id="t4_15mm_vab" name="t4_15mm_vab"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        value="1">
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
                                                    <input type="checkbox" id="t4_20mm_hab" name="t4_20mm_hab"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        value="1">
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
                                                    <input type="checkbox" id="t4_20mm_vab" name="t4_20mm_vab"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        value="1">
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
                                                    <input type="checkbox" id="t4_10mm_hab" name="t4_10mm_hab"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        value="1">
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
                                                    <input type="checkbox" id="t4_10mm_vab" name="t4_10mm_vab"
                                                        class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                        value="1">
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
                                                <input type="checkbox" id="t5_k005mm_ab" name="t5_k005mm_ab"
                                                    class="form-checkbox w-6 h-6" value="1">
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
                                                <input type="checkbox" id="t5_k010mm_ab" name="t5_k010mm_ab"
                                                    class="form-checkbox w-6 h-6" value="1">
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
                                                <input type="checkbox" id="t5_k015mm_ab" name="t5_k015mm_ab"
                                                    class="form-checkbox w-6 h-6" value="1">
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
                                    <input type="checkbox" id="t2a_sp" name="t2a_sp" class="form-checkbox"
                                        style="width: 20px; height: 20px;" value="1">
                                    <!-- Checkbox Test 2a -->
                                </div>
                            </div>
                            <!-- Test 2b -->
                            <div class="mt-4 flex justify-center items-center ml-20">
                                <p class="mr-2">TEST 2b</p>
                                <input type="checkbox" id="t2b_sp" name="t2b_sp" class="form-checkbox"
                                    style="width: 20px; height: 20px;" value="1">
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
                                            <input type="checkbox" id="t3_14_sp" name="t3_14_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
                                            <!-- Checkbox nomor 14 -->
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-200 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_16_sp" name="t3_16_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
                                            <!-- Checkbox nomor 16 -->
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-300 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_18_sp" name="t3_18_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1"><!-- Checkbox nomor 18 -->
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-400 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_20_sp" name="t3_20_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1"><!-- Checkbox nomor 20 -->
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-500 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_22_sp" name="t3_22_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
                                            <!-- Checkbox nomor 22 -->
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-600 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_24_sp" name="t3_24_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
                                            <!-- Checkbox nomor 24 -->
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-700 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_26_sp" name="t3_26_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-800 border-black border-r relative"
                                            style="width: 11.11%;">
                                            <input type="checkbox" id="t3_28_sp" name="t3_28_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
                                            <div
                                                class="absolute w-full h-1 border border-black bg-black top-1/2 left-0">
                                            </div>
                                        </div>
                                        <div class="table-cell bg-blue-900 relative" style="width: 11.11%;">
                                            <input type="checkbox" id="t3_30_sp" name="t3_30_sp"
                                                class="form-checkbox w-4 h-4 absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                value="1">
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
                                            <input type="checkbox" class="form-checkbox" id="t1a_36_sp"
                                                name="t1a_36_sp" style="width: 24px; height: 24px;" value="1">
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">32</span>
                                            <input type="checkbox" class="form-checkbox" id="t1a_32_sp"
                                                name="t1a_32_sp" style="width: 24px; height: 24px;" value="1">
                                            <!-- Checkbox nomor 32 -->
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">30</span>
                                            <input type="checkbox" class="form-checkbox" id="t1a_30_sp"
                                                name="t1a_30_sp" style="width: 24px; height: 24px;" value="1">
                                            <!-- Checkbox nomor 30 -->
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span style="margin-right: 5px;">24</span>
                                            <input type="checkbox" class="form-checkbox" id="t1a_24_sp"
                                                name="t1a_24_sp" style="width: 24px; height: 24px;" value="1">
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
                                            <input type="checkbox" id="t1b_47mm_r1_sp" name="t1b_47mm_r1_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_47mm_r2_sp" name="t1b_47mm_r2_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_47mm_r3_sp" name="t1b_47mm_r3_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_47mm_r4_sp" name="t1b_47mm_r4_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                        </div>
                                        <span>3/16"</span>
                                    </div>

                                    <!-- Kolom 2 (7.9 mm) -->
                                    <div class="flex flex-col items-center bg-green-300 p-0.5 border-r border-black">
                                        <span>7.9 mm</span>
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" id="t1b_79mm_r1_sp" name="t1b_79mm_r1_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_79mm_r2_sp" name="t1b_79mm_r2_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_79mm_r3_sp" name="t1b_79mm_r3_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_79mm_r4_sp" name="t1b_79mm_r4_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                        </div>
                                        <span>5/16"</span>
                                    </div>

                                    <!-- Kolom 3 (11.1 mm) -->
                                    <div class="flex flex-col items-center bg-green-400 p-0.5">
                                        <span>11.1 mm</span>
                                        <div class="grid grid-rows-4 gap-1">
                                            <input type="checkbox" id="t1b_111mm_r1_sp" name="t1b_111mm_r1_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_111mm_r2_sp" name="t1b_111mm_r2_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_111mm_r3_sp" name="t1b_111mm_r3_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
                                            <input type="checkbox" id="t1b_111mm_r4_sp" name="t1b_111mm_r4_sp"
                                                class="form-checkbox border border-black"
                                                style="width: 24px; height: 24px;" value="1">
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
                                                <input type="checkbox" id="t4_15mm_hsp" name="t4_15mm_hsp"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                                <input type="checkbox" id="t4_15mm_vsp" name="t4_15mm_vsp"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                                <input type="checkbox" id="t4_20mm_hsp" name="t4_20mm_hsp"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                                <input type="checkbox" id="t4_20mm_vsp" name="t4_20mm_vsp"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                                <input type="checkbox" id="t4_10mm_hsp" name="t4_10mm_hsp"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                                <input type="checkbox" id="t4_10mm_vsp" name="t4_10mm_vsp"
                                                    class="form-checkbox border border-black absolute w-6 h-6 z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                                                    value="1">
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
                                            <input type="checkbox" id="t5_k005mm_sp" name="t5_k005mm_sp"
                                                class="form-checkbox w-6 h-6" / value="1">
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
                                            <input type="checkbox" id="t5_k010mm_sp" name="t5_k010mm_sp"
                                                class="form-checkbox w-6 h-6" / value="1">
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
                                            <input type="checkbox" id="t5_k015mm_sp" name="t5_k015mm_sp"
                                                class="form-checkbox w-6 h-6" value="1">
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
                                        <input type="radio" id="resultPass" name="result" value="pass"
                                            class="form-radio"
                                            onclick="document.getElementById('result').value='pass'">
                                        <label for="resultPass" class="text-sm ml-2">PASS</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="resultFail" name="result" value="fail"
                                            class="form-radio"
                                            onclick="document.getElementById('result').value='fail'">
                                        <label for="resultFail" class="text-sm ml-2">FAIL</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-2">
                                <label for="notes" class="block text-gray-700 font-bold mb-2">CATATAN:</label>
                                <textarea id="notes" name="notes" class="w-full border rounded px-2 py-1" rows="2"></textarea>
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
                                        <h4 class="font-bold">
                                            @if (Auth::guard('officer')->check())
                                                {{ Auth::guard('officer')->user()->name }}
                                            @else
                                                {{ Auth::user()->name }}
                                            @endif
                                        </h4>
                                        <label for="securityOfficerSignature" class="text-gray-700 font-normal">1.
                                            Airport Security Officer</label>
                                    </div>
                                    <div class="text-center self-end">
                                        <label for="securitySupervisorSignature" class="text-gray-700 font-normal">2.
                                            Airport Security
                                            Supervisor</label>
                                    </div>
                                </div>
                                <div>
                                    <!-- Kolom Kanan (Canvas dan Tombol Clear) -->
                                    <div class="flex flex-col items-start">
                                        <canvas class="border border-black rounded-md" id="signatureCanvas"
                                            width="200" height="100"></canvas>
                                        <div class="mt-2 flex items-start">
                                            <button type="button" id="clearSignature"
                                                class="bg-slate-200 border border-black text-black px-4 py-2 rounded w-20">Clear</button>
                                            <button type="button" id="saveOfficerSignature"
                                                class="bg-slate-200 border border-black text-black px-4 py-2 rounded ml-2 w-20">Save</button>
                                        </div>
                                        <input type="hidden" name="officer_signature_data"
                                            id="officerSignatureData">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="status" value="pending_supervisor">

            <div class="mt-4">
                <div class="mb-4">
                    <label for="supervisor_id" class="block text-gray-700 font-bold mb-2">Pilih Supervisor:</label>
                    <select name="supervisor_id" id="supervisor_id" class="w-full border rounded px-2 py-1" required>
                        <option value="">Pilih Supervisor</option>
                        @foreach (\App\Models\User::where('role', 'supervisor')->get() as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Submit to Approver
                    </button>
                </div>
        </form>
        <!-- End Elemen di luar table -->
    </div>
</div>
