<?php if($status): ?>

<div id="toast"
     class="fixed top-5 right-5 z-50 flex items-center gap-3 px-5 py-4 rounded-xl shadow-lg 
     <?= $status === 'success' 
        ? 'bg-emerald-500/20 border border-emerald-400/30 text-emerald-300' 
        : 'bg-red-500/20 border border-red-400/30 text-red-300' ?>">
    
    <?php if($status === "success"): ?>
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 13l4 4L19 7"/>
        </svg>
    <?php else: ?>
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 18L18 6M6 6l12 12"/>
        </svg>
    <?php endif; ?>

    <span class="text-sm font-semibold">
        <?= htmlspecialchars($message) ?>
    </span>

</div>


<script>
setTimeout(() => {
    const toast = document.getElementById("toast");

    if(toast){
        toast.style.opacity = "0";
        toast.style.transform = "translateY(-10px)";

        setTimeout(() => {
            toast.remove();
        },300);
    }
},5000);
</script>

<?php endif; ?>