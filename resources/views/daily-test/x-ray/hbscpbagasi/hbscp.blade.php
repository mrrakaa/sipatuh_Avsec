@if (!isset($isPdf))
    @extends('layouts.app')

    @section('content')
    @endif

    <div class="bg-gray-100 px-32">
        <div>
            <x-form-xray form-type="hbscp" />
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set current date and time to 'testDateTime'
            let now = new Date();
            let year = now.getFullYear();
            let month = (now.getMonth() + 1).toString().padStart(2, '0');
            let day = now.getDate().toString().padStart(2, '0');
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            document.getElementById('testDateTime').value = formattedDateTime;

            // Update result on form submit
            document.getElementById('hbscpForm').addEventListener('submit', function(event) {
                updateResult(); // Pastikan result diupdate sebelum form disubmit
            });
        });

        const checkboxIds = [
            // Checkbox AB (Atas Bawah)
            't2a_ab', 't2b_ab', 't3_14_ab', 't3_16_ab', 't3_18_ab', 't3_20_ab', 't3_22_ab',
            't1a_30_ab', 't1a_24_ab',
            't1b_47mm_r3_ab', 't1b_47mm_r4_ab', 't1b_79mm_r4_ab',
            't1b_111mm_r4_ab', 't4_20mm_hab', 't4_20mm_vab',
            't5_k010mm_ab',

            // Checkbox SP (Samping)
            't2a_sp', 't2b_sp', 't3_14_sp', 't3_16_sp', 't3_18_sp', 't3_20_sp', 't3_22_sp',
            't1a_30_sp', 't1a_24_sp',
            't1b_47mm_r3_sp', 't1b_47mm_r4_sp', 't1b_79mm_r4_sp',
            't1b_111mm_r4_sp', 't4_20mm_hsp', 't4_20mm_vsp',
            't5_k010mm_sp',
        ];

        function updateResult() {
            const resultPass = document.getElementById('resultPass');
            const resultFail = document.getElementById('resultFail');
            const resultHidden = document.getElementById('result');

            // Check if all checkboxes in checkboxIds are checked
            const allChecked = checkboxIds.every(id => document.getElementById(id)?.checked);

            // Update result based on allChecked condition
            resultPass.checked = allChecked;
            resultFail.checked = !allChecked;
            resultHidden.value = allChecked ? 'pass' : 'fail';
        }

        // Bind updateResult to 'change' event for each checkbox in checkboxIds
        checkboxIds.forEach(id => {
            const checkbox = document.getElementById(id);
            if (checkbox) {
                checkbox.addEventListener('change', updateResult);
            }
        });

        // Call updateResult initially to set the result
        document.addEventListener('DOMContentLoaded', updateResult);

        document.addEventListener('DOMContentLoaded', function() {
            // Canvas drawing functionality
            const canvas = document.getElementById('signatureCanvas');
            const ctx = canvas.getContext('2d');
            let isDrawing = false;
            let lastX = 0;
            let lastY = 0;

            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mouseout', stopDrawing);
            document.getElementById('clearSignature').addEventListener('click', clearCanvas);
            document.getElementById('saveOfficerSignature').addEventListener('click', saveOfficerSignature);

            function startDrawing(e) {
                isDrawing = true;
                [lastX, lastY] = [e.offsetX, e.offsetY];
                draw(e);
            }

            function draw(e) {
                if (!isDrawing) return;
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.strokeStyle = '#000';
                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
                [lastX, lastY] = [e.offsetX, e.offsetY];
            }

            function stopDrawing() {
                isDrawing = false;
                ctx.beginPath();
            }

            function clearCanvas() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }

            function saveOfficerSignature() {
                const officerSignatureData = canvas.toDataURL('image/png');
                document.getElementById('officerSignatureData').value = officerSignatureData;
                alert('Tanda tangan Officer disimpan!');
            }
        });
    </script>


    <style>
        .invalid {
            border: 2px solid red;
        }

        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #ef4444;
            color: #dc2626;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 0.375rem;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        #signatureCanvas {
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 10px 0;
        }

        .button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            background-color: #3b82f6;
            color: white;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .button:hover {
            background-color: #2563eb;
        }

        .button:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }
    </style>

    @if (!isset($isPdf))
    @endsection
@endif
