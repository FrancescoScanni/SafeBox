<?php
    include_once("../models/password.php");
    $error_message = "";

    //FETCHING EXISTING PASSWORDS..
    try {
        $passwords = Password::fetchAllPasswords();
    } catch(Exception $e) {
        $error_message = "Error fetching passwords: " . $e->getMessage();
    }

    //time elapsed function
    function time_elapsed_string($datetime) {
        if (empty($datetime)) {
            return 'Unknown';
        }
        $diff = time() - strtotime($datetime);
        if ($diff < 60) {
            return 'just now';
        }
        if ($diff < 3600) {
            $mins = floor($diff / 60);
            return $mins . ($mins == 1 ? ' min ago' : ' mins ago');
        }
        if ($diff < 86400) {
            $hours = floor($diff / 3600);
            return $hours . ($hours == 1 ? ' hour ago' : ' hours ago');
        }
        if ($diff < 604800) {
            $days = floor($diff / 86400);
            return $days . ($days == 1 ? ' day ago' : ' days ago');
        }
        return date('M j, Y', strtotime($datetime));
    }
?>

<!-- PASSWORDS CONTENT -->
<div class="bg-navy-950 text-slate-300 font-sans relative">

    <!-- ERRORS -->
    <?php if ($error_message): ?>
        <div class="p-4 m-4 bg-red-500/10 border border-red-500/50 rounded-lg text-red-400">
            <?= htmlspecialchars($error_message) ?>
        </div>
    <?php elseif (empty($passwords)): ?>
        <div class="p-8 text-center text-slate-500">
            No passwords stored yet.
        </div>
    <?php else: ?>
        
    <!-- PASSWORD LIST -->
        <div class="flex flex-col divide-y divide-white/5">
            <?php foreach ($passwords as $item):
            
                    // Safe extraction supporting both Objects and Arrays
                    $id         = is_object($item) ? (method_exists($item, 'getId') ? $item->getId() : ($item->getId() ?? 0)) : ($item['id'] ?? 0);
                    $name       = is_object($item) ? $item->getName() : ($item['name'] ?? 'Unknown');
                    $username   = is_object($item) ? $item->getUsername() : ($item['username'] ?? 'No username');
                    $password   = is_object($item) ? $item->getPassword() : ($item['password'] ?? ''); 
                    $category   = is_object($item) ? $item->getCategory() : ($item['category'] ?? 'Uncategorized');
                    $updated_at = is_object($item) ? $item->getUpdated() : ($item['updated_at'] ?? '');
                    $initial    = is_object($item) ? $item->getInitial() : ($item['initial'] ?? 'Unknown');
                    
                    $timeAgo = time_elapsed_string($updated_at);
            ?>
            
            <div class="password-item flex items-center gap-4 px-5 py-4 border-b border-white/5 hover:bg-white/5 transition-colors group">
                
                <!-- INITIAL LETTER -->
                <div class="w-10 h-10 rounded-xl bg-teal-400/10 border border-teal-400/20 flex items-center justify-center text-sm font-bold text-teal-300 shrink-0 uppercase">
                    <?= htmlspecialchars($initial) ?>
                </div>
                
                <!-- INFO -->
                <div class="min-w-0 flex-1">
                    <p class="password-name text-sm font-semibold truncate text-white"><?= htmlspecialchars($name) ?></p>
                    <p class="text-xs text-slate-400 truncate"><?= htmlspecialchars($username) ?></p>
                </div>
                
                <!-- ACTION (Password Mask & Buttons) -->
                <div class="hidden sm:flex items-center gap-2 w-40">
                    <span class="password-value text-sm font-mono text-slate-300 tracking-wider w-[10vw] text-center truncate"
                        data-visible="false"
                        data-value="<?= htmlspecialchars($password, ENT_QUOTES) ?>">
                        ••••••••••
                    </span>
                    <button type="button" onclick="togglePSWD(this)" title="View Password" class="text-slate-500 hover:text-teal-300 transition-colors p-1 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><circle cx="12" cy="12" r="3" /></svg>
                    </button>
                </div>


                <!-- CATEGORY -->
                <span class="hidden md:inline-block text-xs text-slate-500 bg-white/5 border border-white/10 rounded-full px-3 py-1 shrink-0 w-[8vw] text-center">
                    <?= htmlspecialchars($category) ?>
                </span>
                
                <!-- UPDATE -->
                <span class="hidden lg:inline text-xs text-slate-500 shrink-0 w-24 text-right">
                    <?= htmlspecialchars($timeAgo) ?>
                </span>

                <!-- TOOLS (Edit / Delete) -->
                <div class="flex items-center gap-1 shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- EDIT BUTTON: Triggers JS function to open overlay and fill data -->
                    <button type="button" 
                            onclick="openEditModal(
                                '<?= $id ?>',
                                '<?= htmlspecialchars($name, ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($username, ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($category, ENT_QUOTES) ?>'
                            )">
                            
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    </button>

                    <!-- DELETE BUTTON: Form submission with confirmation --> 
                        <a href="../components/dashboard/deletePassword.php?id=<?= $id ?>"
                            onclick="return confirm('Are you sure you want to delete this password?');">
                        
                        <button type="submit" title="Delete" class="text-slate-500 hover:text-red-400 transition-colors p-1.5 focus:outline-none">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </a>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- EDIT MODAL OVERLAY (Hidden by default) -->
    <div id="edit-modal" class="hidden fixed inset-0 z-50 items-center justify-center px-4 bg-black/70 backdrop-blur-sm">
        <div class="relative bg-navy-900 border border-white/10 rounded-2xl w-full max-w-md p-7 text-slate-300">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-display font-bold text-xl text-white">Edit password</h2>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-white transition-colors cursor-pointer p-1">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <!-- EDIT FORM -->
            <form id="edit-password-form" action="../components/dashboard/updatePSWD.php" method="POST" class="space-y-4">
                <input type="hidden" id="edit_id" name="id" value="">
                <input type="hidden" id="edit_original_title" name="original_title" value="">
                

                <!-- Title -->
                <div>
                    <label for="edit_title" class="block text-sm font-medium text-slate-300 mb-1.5">Title</label>
                    <input type="text" id="edit_title" name="title" required
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-teal-400/50">
                </div>

                <!-- Username/Email -->
                <div>
                    <label for="edit_username" class="block text-sm font-medium text-slate-300 mb-1.5">Username or email</label>
                    <input type="text" id="edit_username" name="username" required
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-teal-400/50">
                </div>

                <!-- New Password (Optional) -->
                <div>
                    <label for="edit_password" class="block text-sm font-medium text-slate-300 mb-1.5">New Password (leave blank to keep current)</label>
                    <input type="password" id="edit_password" name="password" autocomplete="new-password"
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-teal-400/50">
                </div>

                <!-- Category -->
                <div>
                    <label for="edit_category" class="block text-sm font-medium text-slate-300 mb-1.5">Category</label>
                    <select id="edit_category" name="category"
                            class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-slate-300 focus:outline-none focus:ring-2 focus:ring-teal-400/50">
                        <option value="personal">Personal</option>
                        <option value="work">Work</option>
                        <option value="shopping">Shopping</option>
                        <option value="entertainment">Entertainment</option>
                        <option value="finance">Finance</option>
                    </select>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-400 to-teal-500 hover:from-emerald-300 hover:to-teal-400 text-navy-950 font-bold text-sm py-3 rounded-full shadow-lg shadow-emerald-500/25 transition-all">
                        Update password
                    </button>
                    <button type="button" onclick="closeEditModal()" class="flex-1 text-center text-sm font-semibold text-slate-300 hover:text-white border border-white/10 hover:border-white/20 py-3 rounded-full transition-colors cursor-pointer">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript to handle modal state -->
    <script>
        function openEditModal(id, title, username, category) {
            document.getElementById('edit_id').value = id;
            
            document.getElementById('edit_original_title').value = title;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_category').value = category.toLowerCase();
            document.getElementById('edit_password').value = ''; // clear password field
            
            const modal = document.getElementById('edit-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            const modal = document.getElementById('edit-modal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
    <!-- Basic page render -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function(e) {
            // 1. Prendi il testo digitato e convertilo in minuscolo
            const searchTerm = e.target.value.toLowerCase();
            
            // 2. Prendi tutti gli elementi della lista
            const items = document.querySelectorAll('.password-item');
            
            // 3. Cicla ogni elemento e nascondilo/mostralo
            items.forEach(item => {
                const itemName = item.querySelector('.password-name').textContent.toLowerCase();
                
                if (itemName.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
    <!-- Password toggle -->
    <script>
        pswdBlock=document.querySelectorAll('.password-item');
        function togglePSWD(button) {
            const item = button.closest('.password-item');
            const pwdSpan = item.querySelector('.password-value');

            if (!pwdSpan) {
                console.error("Password span not found");
                return;
            }

            const isVisible = pwdSpan.dataset.visible === 'true';

            if (isVisible) {
                pwdSpan.textContent = '••••••••••';
                pwdSpan.dataset.visible = 'false';
            } else {
                pwdSpan.textContent = pwdSpan.dataset.value;
                pwdSpan.dataset.visible = 'true';
            }
        }
    </script>


                
</div>