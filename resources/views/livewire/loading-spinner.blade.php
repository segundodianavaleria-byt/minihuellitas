<div x-data="{ show: true }" 
     x-show="show" 
     x-init="setTimeout(() => { show = false }, 1500)"
     class="fixed inset-0 bg-white z-50 flex items-center justify-center transition-opacity duration-500"
     style="display: flex;">
    <div class="text-center">
        <div class="relative">
            <div class="w-24 h-24 border-4 border-orange-200 rounded-full animate-pulse"></div>
            <div class="absolute top-0 left-0 w-24 h-24 border-4 border-orange-500 rounded-full animate-spin border-t-transparent"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <i class="fas fa-paw text-orange-500 text-3xl animate-bounce"></i>
            </div>
        </div>
        <h2 class="mt-4 text-2xl font-bold text-gray-800">MiniHuellitas</h2>
        <p class="text-gray-500 text-sm">Cargando...</p>
        <div class="flex justify-center mt-4 space-x-1">
            <div class="w-2 h-2 bg-orange-500 rounded-full animate-bounce" style="animation-delay: 0s"></div>
            <div class="w-2 h-2 bg-orange-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            <div class="w-2 h-2 bg-orange-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
        </div>
    </div>
</div>

<style>
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.animate-spin { animation: spin 1s linear infinite; }
.animate-pulse { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
@keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .5; } }
.animate-bounce { animation: bounce 1s infinite; }
@keyframes bounce {
    0%, 100% { transform: translateY(-25%); animation-timing-function: cubic-bezier(0.8, 0, 1, 1); }
    50% { transform: translateY(0); animation-timing-function: cubic-bezier(0, 0, 0.2, 1); }
}
</style>