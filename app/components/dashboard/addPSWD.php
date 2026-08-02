<?php
    include_once("../models/password.php");

    // Initialize variables
    $err = false;
    $title=$url=$username=$pswd=$category="";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // 1. Safely retrieve and sanitize inputs
        $title         = trim($_POST["title"] ?? '');
        $url         = trim($_POST["url"] ?? '');
        $username         = $_POST["username"] ?? '';
        $pswd         = $_POST["pswd"] ?? '';
        $category        = $_POST["category"] ?? '';

        $maxInitials = 2; // Limit initials to 2 characters
        $words = preg_split('/\s+/', $title);
            $initials = '';

          //initials
          foreach ($words as $word) {
              $initials .= mb_substr($word, 0, 1, 'UTF-8');
              if (mb_strlen($initials, 'UTF-8') >= $maxInitials) {
                  break;
              }
          }

        // 2. Validate inputs
        if (empty($title) || empty($url) || !filter_var($url, FILTER_VALIDATE_URL) || empty($pswd) || empty($category)) {
            $err = true;
        }

        // Process form
        if (!$err) {
            $password=new Password($_SESSION['user_id'], $title, $initials, $username, $pswd, $category, date("Y-m-d H:i:s"));
            try{
                $password->createPassword($password->getUser_id(), $password->getName(), $password->getInitial(), $password->getUsername(), $password->getPassword(), $password->getCategory());
                header("Location: dashboard.php");
            }catch(Exception $e){
                echo "Error creating password: " . $e->getMessage();
            }
        }else{
            echo "Please fill in all required fields correctly.";
        }
    }
?>


<!-- ADD PASSWORD MODAL -->
<input type="checkbox" id="add-modal-toggle" class="peer hidden">
<div class="hidden peer-checked:flex fixed inset-0 z-50 items-center justify-center px-4">
  <label for="add-modal-toggle" class="absolute inset-0 bg-black/70"></label>

  <div class="relative bg-navy-900 border border-white/10 rounded-2xl w-full max-w-md p-7">
    <div class="flex items-center justify-between mb-6">
      <h2 class="font-display font-bold text-xl">Add new password</h2>
      <label for="add-modal-toggle" class="text-slate-400 hover:text-white transition-colors cursor-pointer p-1">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
      </label>
    </div>


    <!--FORM-->
    <form id="add-password-form" method="POST" class="space-y-4">

      <!-- Title -->
      <div>
        <label for="item_name" class="block text-sm font-medium text-slate-300 mb-1.5">Title</label>
        <input type="text" id="item_name" name="title" required placeholder="e.g. Gmail"
               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
      </div>

      <!-- Website URL -->
      <div>
        <label for="item_url" class="block text-sm font-medium text-slate-300 mb-1.5">Website URL</label>
        <input type="url" id="item_url" name="url" placeholder="https://example.com"
               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
      </div>

      <!-- Username/Email -->
      <div>
        <label for="item_username" class="block text-sm font-medium text-slate-300 mb-1.5">Username or email</label>
        <input type="text" id="item_username" name="username" required autocomplete="off"
               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
      </div>

      <!-- Password -->
      <div>
        <label for="item_password" class="block text-sm font-medium text-slate-300 mb-1.5">Password</label>
        <div class="flex gap-2">
          <input type="password" id="item_password" name="pswd" required autocomplete="new-password"
                 class="flex-1 bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
          <button type="button" class="shrink-0 text-xs font-semibold text-teal-300 border border-teal-400/30 bg-teal-400/10 hover:bg-teal-400/20 rounded-lg px-3 transition-colors">Generate</button>
        </div>
      </div>

      <!-- Category -->
      <div>
        <label for="item_category" class="block text-sm font-medium text-slate-300 mb-1.5">Category</label>
        <select id="item_category" name="category"
                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-slate-300 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
          <option value="personal">Personal</option>
          <option value="work">Work</option>
          <option value="shopping">Shopping</option>
          <option value="entertainment">Entertainment</option>
          <option value="finance">Finance</option>
        </select>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-400 to-teal-500 hover:from-emerald-300 hover:to-teal-400 text-navy-950 font-bold text-sm py-3 rounded-full shadow-lg shadow-emerald-500/25 transition-all">
          Save password
        </button>
        <label for="add-modal-toggle" class="flex-1 text-center text-sm font-semibold text-slate-300 hover:text-white border border-white/10 hover:border-white/20 py-3 rounded-full transition-colors cursor-pointer">
          Cancel
        </label>
      </div>
    </form>
  </div>
</div>