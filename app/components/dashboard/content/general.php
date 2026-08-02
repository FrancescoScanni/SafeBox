<?php
    $activeSection = $_GET['section'] ?? 'passwords';
?>

<main class="flex-1 px-6 lg:px-10 py-16 max-w-6xl w-full mx-auto">
    <!-- HEADER -->
        <?php require_once('../components/dashboard/header.php'); ?>

            <!-- password list -->
            <div class="bg-white/[0.03] border border-white/10 rounded-2xl divide-y divide-white/10 overflow-hidden">

                <!--check if CORRECT SECTION -->
                <?php

                switch ($activeSection) {
                    case "passwords":
                        foreach ($vaultItems as $item){
                            require ("passwords.php");
                        }
                        break;
                    case "notes":
                        require_once '../components/dashboard/notes.php';
                        break;
                    case "shared":
                        require_once '../components/dashboard/shared.php';
                        break;
                    default:
                        foreach ($vaultItems as $item){
                            require ("../components/dashboard/vault-item.php");
                        }
                        break;
                }

                ?>
    </div>
</main>