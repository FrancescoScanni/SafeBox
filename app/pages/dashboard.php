<?php
    session_start();

    require_once("../components/updateSuccess.php");
    
    $_SESSION["dashboard_section"]="passwords";
    $activeNav = 'passwords'; // usata da sidebar.php per evidenziare la voce corrente
 
    
    $vaultItems = [
        ['id' => 1, 'initial' => 'G', 'name' => 'Gmail',    'username' => 'alex.morgan@gmail.com', 'password' => 'Tr0ub4dor&3xyz', 'category' => 'Personal',      'updated' => '2 days ago'],
    ];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!--HEAD-->
    <?php require("../components/dashboard/headDOM.php"); ?>
</head>
<body class="font-body bg-navy-950 text-white antialiased">

    <div class="flex min-h-screen relative">

    <!-- mobile sidebar toggle (checkbox hack, no JS needed) -->
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">
    <label for="sidebar-toggle" class="fixed inset-0 bg-black/60 z-30 hidden peer-checked:block md:hidden"></label>

    <!-- SIDEBAR -->
    <?php require("../components/dashboard/sidebar.php"); ?>


    <!------------------------->
    <!-- ============ MAIN ============ -->
    <div class="flex-1 flex flex-col min-w-0">

        <!-- TOPBAR -->
        <?php require_once '../components/dashboard/topbar.php'; ?>

        <!-- MAIN CONTENT -->
        <?php require_once ('../components/dashboard/content/general.php'); ?>
    </div>
    </div>
    <!------------------------->

    <!-- ADD PASSWORD MODAL -->
    <?php require('../components/dashboard/addPSWD.php'); ?>

    <!-- Toggle -->
    <script>
        function togglePassword(id) {
            const el = document.getElementById('pwd-' + id);
            if (el.dataset.visible === 'true') {
            el.textContent = '••••••••••';
            el.dataset.visible = 'false';
            } else {
            el.textContent = el.dataset.value;
            el.dataset.visible = 'true';
            }
        }

        function copyPassword(id) {
            const el = document.getElementById('pwd-' + id);
            if (navigator.clipboard) {
            navigator.clipboard.writeText(el.dataset.value);
            }
        }
    </script>

    <?php
        $status = $_SESSION["password_status"] ?? null;
        $message = $_SESSION["password_message"] ?? null;


        if(isset($_SESSION["password_status"])){
            if($_SESSION["password_status"]=="success"){
                require_once("../components/addSuccess.php");
                unset($_SESSION["password_status"]);
                unset($_SESSION["password_message"]);
            }else{
            }
        }
    ?>

</body>
</html>