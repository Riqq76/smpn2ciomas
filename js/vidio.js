// pilih tipe video atau gambar
const tipeSelect = document.getElementById('tipeSelect');
            const fileInput = document.getElementById('fileInput');
            const videoInput = document.getElementById('videoInput');

            tipeSelect.addEventListener('change', function () {
                if (this.value === 'video') {
                    fileInput.classList.add('d-none');
                    fileInput.required = false;
                    videoInput.classList.remove('d-none');
                    videoInput.required = true;
                } else if (this.value === 'image') {
                    fileInput.classList.remove('d-none');
                    fileInput.required = true;
                    videoInput.classList.add('d-none');
                    videoInput.required = false;
                } else {
                    // default hide both
                    fileInput.classList.remove('d-none');
                    fileInput.required = true;
                    videoInput.classList.add('d-none');
                    videoInput.required = false;
                }
            });