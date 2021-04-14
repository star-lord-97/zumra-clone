<a href="#">Home</a>
<a href="#">Shop</a>
<div class="relative" x-data="{ categoryDropdownMenu: false }" @click="categoryDropdownMenu = !categoryDropdownMenu">
    <div class="hover:cursor-pointer">
        Categories
        <svg viewBox="0 0 24 24" class="inline fill-current h-6 w-6">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path d="M7 10l5 5 5-5H7z" />
        </svg>
    </div>
    <div x-show="categoryDropdownMenu" @click.away="categoryDropdownMenu = false" class="md:absolute flex flex-col items-start md:items-center justify-between space-y-4 mt-4 ml-4 md:ml-0 md:bg-primary md:w-40 md:py-4 md:-left-10 md:rounded-b-2xl z-10" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0 transform scale-y-0 -translate-y-1/2" x-transition:enter-end="opacity-100 transform scale-y-100 translate-y-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100 transform scale-y-100 translate-y-0" x-transition:leave-end="opacity-0 transform scale-y-0 -translate-y-1/2">
        <a href="#">blah</a>
        <a href="#">blah blah</a>
        <a href="#">blah blah blah</a>
        <a href="#">blah blah blah blah</a>
    </div>
</div>
<a href="#">Contact us</a>
<a href="#">About us</a>