<div
    class="alert-display fixed z-[100] opacity-0 top-[5%] right-0 translate-x-full h-[50px] flex items-center max-w-[500px] bg-green-600 text-white btn-font px-4 py-2 rounded-lg">
    <div class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24"
            strokeWidth={1.5} stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round"
                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </div>
    {{ $slot }}
</div>
