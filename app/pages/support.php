<?php
    include_once("../components/header.php");
    include_once("../models/ticket.php");
    include_once("db/confDB.php");

    $err = ""; // Initialize empty. No errors on first load.
    $success = ""; // Initialize empty. No success message on first load.
    // FORM HANDLING
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = trim($_POST["name"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $topic = trim($_POST["topic"] ?? '');
        $message = trim($_POST["message"] ?? '');

        if (!empty($name) && !empty($email) && !empty($topic) && !empty($message)) {
            
            // Optional but recommended: check if email is actually an email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err = "Invalid email format.";
            } else {
                // Success: All fields are valid. Insert into DB here.
                $ticket = new Ticket($name, $email, $topic, $message);
                Ticket::createTicket($ticket->getName(), $ticket->getEmail(), $ticket->getTopic(), $ticket->getMessage());
                
            }

        } else {
            $err = "All fields are required.";
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact & Support — LockGuard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script>
    tailwind.config = {
        theme: {
        extend: {
            fontFamily: {
            display: ['Manrope', 'sans-serif'],
            body: ['Inter', 'sans-serif'],
            },
            colors: {
            navy: { 950: '#081527', 900: '#0b1f3a' },
            }
        }
        }
    }
    </script>
</head>
<!-- Aggiunti: h-screen overflow-hidden flex flex-col per bloccare lo scroll e gestire il layout -->
<body class="font-body bg-navy-950 text-white antialiased h-screen overflow-hidden flex flex-col">
    
    <?php echo $headerSide; ?>

    <!-- ============ CONTACT / SUPPORT ============ -->
    <!-- Sostituito py-24 con py-6, aggiunto flex-1 e justify-center per centrare verticalmente il contenuto -->
    <section class="bg-navy-950 border-t border-white/5 py-6 flex-1 flex flex-col justify-center">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full">

            <!-- Heading -->
            <div class="max-w-2xl mx-auto text-center">
            <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-teal-300 bg-teal-400/10 border border-teal-400/20 px-3 py-1.5 rounded-full">
                Contact us
            </span>
            <h2 class="font-display font-extrabold text-3xl sm:text-4xl leading-tight tracking-tight mt-3">
                We're here to help
            </h2>
            <p class="text-slate-400 text-base mt-2 leading-relaxed">
                Questions about your vault, billing, or security? Reach out and our team will get back to you within 24 hours.
            </p>
            </div>

            <!-- Ridotto mt-16 a mt-8 per recuperare spazio verticale -->
            <div class="grid lg:grid-cols-5 gap-6 mt-8">

            <!-- Left: support channels -->
            <div class="lg:col-span-2 flex flex-col gap-4">

                <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-5 flex gap-4">
                <div class="w-11 h-11 shrink-0 rounded-xl bg-teal-400/10 border border-teal-400/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="font-display font-bold">Email support</h3>
                    <p class="text-sm text-slate-400 mt-1">support@lockguard.app</p>
                    <p class="text-xs text-slate-500 mt-1">Typical response time: a few hours</p>
                </div>
                </div>

                <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-5 flex gap-4">
                <div class="w-11 h-11 shrink-0 rounded-xl bg-teal-400/10 border border-teal-400/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h3 class="font-display font-bold">Help center</h3>
                    <p class="text-sm text-slate-400 mt-1">Browse guides, tutorials, and FAQs</p>
                    <a href="#" class="text-xs text-teal-300 hover:text-teal-200 transition-colors mt-1 inline-block">Visit Help Center →</a>
                </div>
                </div>

            </div>

            <!-- Right: contact form -->
            <!-- Ridotto il padding da p-8 a p-6 -->
            <div class="lg:col-span-3 bg-white/[0.03] border border-white/10 rounded-2xl p-6">
                <form id="contact-form" method="POST" action="support.php" class="space-y-4">

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                        <label for="full_name" class="block text-sm font-medium text-slate-300 mb-1">Full name</label>
                        <input type="text" id="full_name" name="name"  autocomplete="name" placeholder="Jane Doe"
                                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
                        </div>
                        <div>
                        <label for="email" class="block text-sm font-medium text-slate-300 mb-1">Email</label>
                        <input type="email" id="email" name="email"  autocomplete="email" placeholder="jane@example.com"
                                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
                        </div>
                    </div>

                    <div>
                        <label for="topic" class="block text-sm font-medium text-slate-300 mb-1">Topic</label>
                        <select id="topic" name="topic" 
                                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-slate-300 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50">
                        <option value="" disabled selected>Select a topic</option>
                        <option value="account_billing" class="bg-slate-900 text-white">Account & billing</option>
                        <option value="security" class="bg-slate-900 text-white">Security concern</option>
                        <option value="technical_issue" class="bg-slate-900 text-white">Technical issue</option>
                        <option value="feature_request" class="bg-slate-900 text-white">Feature request</option>
                        <option value="other" class="bg-slate-900 text-white">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-300 mb-1">Message</label>
                        <!-- Ridotto da rows="5" a rows="3" -->
                        <textarea id="message" name="message" rows="3"  placeholder="How can we help?"
                                class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-teal-400/50 focus:border-teal-400/50 resize-none"></textarea>
                    </div>

                    <div class="flex items-center gap-6">
                        <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center gap-2 bg-gradient-to-r from-emerald-400 to-teal-500 hover:from-emerald-300 hover:to-teal-400 text-navy-950 font-bold px-7 py-3 rounded-full shadow-lg shadow-emerald-500/25 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white">
                            Send message
                        </button>

                        <p class="text-[#f21b0c]"><?php echo $err;?></p>

                    </div>
                

                </form>
            </div>

            </div>
        </div>
    </section>

</body>
</html>