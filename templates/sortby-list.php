<div class="grid grid-flow-col bg-white">
    <div id="results-counter" class="relative pt-1 m-2"></div>
    <div class="grid justify-self-end">
        <form class="h-8 m-2 border-2 w-52" method="get" action="">
            <select id="orderby-list" name="orderby" >
            </select>
            <!-- hidden input tags to send the sorting values via get method -->
            <input name="lower" class="hidden" id="lower">
            <input name="upper" class="hidden" id="upper">
            <input class="hidden" id="sort-btn" type="submit">
        </form>
    </div>
</div>