document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const jadwalCard = document.getElementById('jadwalCard');
    const detailModal = document.getElementById('detailModal');
    const closeModal = document.getElementById('closeModal');
    
    // Open Modal
    jadwalCard.addEventListener('click', function() {
        detailModal.classList.remove('hidden');
        detailModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Add active class to clicked card
        jadwalCard.classList.add('ring-4', 'ring-[#004643]/20');
    });

    // Close Modal
    closeModal.addEventListener('click', function() {
        closeModalFunction();
    });

    // Close Modal when clicking outside
    detailModal.addEventListener('click', function(e) {
        if (e.target === detailModal) {
            closeModalFunction();
        }
    });

    // Close Modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && detailModal.classList.contains('flex')) {
            closeModalFunction();
        }
    });

    function closeModalFunction() {
        detailModal.classList.remove('flex');
        detailModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        jadwalCard.classList.remove('ring-4', 'ring-[#004643]/20');
    }

    // Upload gambar di modal
    const modalUploadAreas = document.querySelectorAll('#detailModal .border-dashed');
    modalUploadAreas.forEach((area, index) => {
        area.addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(e) {
                if (e.target.files && e.target.files[0]) {
                    // Show loading state
                    area.innerHTML = `
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-12 h-12 border-4 border-[#004643] border-t-transparent rounded-full animate-spin mb-3"></div>
                            <p class="text-gray-500 text-center">Mengupload...</p>
                        </div>
                    `;
                    area.classList.add('uploading');
                    
                    // Simulate upload delay
                    setTimeout(() => {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            area.innerHTML = `
                                <img src="${event.target.result}" 
                                     class="w-full h-64 object-cover rounded-2xl" 
                                     alt="Preview">
                            `;
                            area.classList.remove('uploading');
                            
                            // Update status text
                            const parentDiv = area.parentElement;
                            const textElement = parentDiv.querySelector('p.text-center');
                            if (textElement) {
                                textElement.textContent = 'Gambar terupload ✓';
                                textElement.className = 'text-green-600 font-bold mt-3 text-center';
                                
                                // Update status in status section
                                const statusSection = document.querySelector('.bg-white.p-6.rounded-2xl.shadow-sm:last-child');
                                if (statusSection) {
                                    const statusItems = statusSection.querySelectorAll('.flex.items-center.justify-between');
                                    if (statusItems[index]) {
                                        statusItems[index].querySelector('span:last-child').textContent = '✓ Terupload';
                                        statusItems[index].querySelector('span:last-child').className = 'text-sm text-green-600 font-bold';
                                        statusItems[index].classList.remove('bg-yellow-50');
                                        statusItems[index].classList.add('bg-green-50');
                                    }
                                }
                            }
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    }, 1500);
                }
            };
            input.click();
        });
    });

    // Tandai Selesai button
    const selesaiBtn = document.querySelector('#detailModal button:first-child');
    if (selesaiBtn) {
        selesaiBtn.addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin menandai jadwal ini sebagai selesai?')) {
                // Update status in modal
                const statusElement = document.querySelector('#detailModal .text-\\[\\#F9BC60\\]');
                if (statusElement) {
                    statusElement.textContent = 'Selesai';
                    statusElement.className = 'text-xl font-bold text-green-600';
                }
                
                // Update status badge on card
                const cardStatus = document.querySelector('#jadwalCard span:last-child');
                if (cardStatus) {
                    cardStatus.textContent = 'Selesai';
                    cardStatus.className = 'px-8 py-3 bg-white text-green-600 border-2 border-green-600 font-bold rounded-xl text-lg inline-block shadow-md';
                }
                
                // Update status in status section
                const statusSection = document.querySelector('.bg-white.p-6.rounded-2xl.shadow-sm:last-child .bg-green-50');
                if (statusSection) {
                    const statusText = statusSection.querySelector('span:last-child');
                    if (statusText) {
                        statusText.textContent = 'Selesai';
                    }
                }
                
                // Show success notification
                showNotification('Jadwal berhasil ditandai sebagai selesai!', 'success');
                
                // Close modal after delay
                setTimeout(() => {
                    closeModalFunction();
                }, 2000);
            }
        });
    }

    // Simpan Perubahan button
    const simpanBtn = document.querySelector('#detailModal button.bg-\\[\\#004643\\]');
    if (simpanBtn) {
        simpanBtn.addEventListener('click', function() {
            showNotification('Perubahan berhasil disimpan!', 'success');
        });
    }

    // Helper function for notifications
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-blue-500';
        const icon = type === 'success' ? 'check_circle' : 'info';
        
        notification.className = `fixed top-4 right-4 ${bgColor} text-white shadow-lg rounded-lg p-4 z-50 transform translate-x-full opacity-0 transition-all duration-300 flex items-center gap-3`;
        notification.innerHTML = `
            <span class="material-symbols-outlined">
                ${icon}
            </span>
            <span class="font-medium">${message}</span>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full', 'opacity-0');
            notification.classList.add('translate-x-0', 'opacity-100');
        }, 10);
        
        // Animate out after 3 seconds
        setTimeout(() => {
            notification.classList.remove('translate-x-0', 'opacity-100');
            notification.classList.add('translate-x-full', 'opacity-0');
            
            // Remove from DOM
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
});