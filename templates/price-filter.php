<div class="">
    <h1 class="text-center">FILTER BY PRICE</h1>
    <form class="" method="get" action="">
        <div class="flex justify-center h-2" id="slider-handles"> 
        </div>
        <div class="text-center" id="slider-value">
        </div>
        
        <!-- hidden input tags to send the price ranges via get method -->
        <input name="lower" class="hidden" id="lower">
        <input name="upper" class="hidden" id="upper">
        <input name="orderby" class="hidden" id="sort-filter">
        <button class="w-full text-white bg-red-500 " id="filter-btn" type="submit">FILTER</button>
    </form>
</div>