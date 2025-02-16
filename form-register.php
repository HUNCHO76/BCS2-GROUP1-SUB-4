<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="assets/images/favicon.png" rel="icon" type="image/png">

    <!-- title and description-->
    <title>Socialite</title>
    <meta name="description" content="Socialite - Social sharing network HTML Template">

    <!-- css files -->
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body>

    <div class="sm:flex">

        <div
            class="relative lg:w-[580px] md:w-96 w-full p-10 min-h-screen bg-white shadow-xl flex items-center pt-10 dark:bg-slate-900 z-10">

            <div class="w-full lg:max-w-sm mx-auto space-y-10"
                uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">

                <!-- logo image-->
                <a href="#"> <img src="assets/images/facebook.svg" class="w-28 absolute top-10 left-10 dark:hidden"
                        alt=""></a>
                <a href="#"> <img src="assets/images/facebook.svg"
                        class="w-28 absolute top-10 left-10 hidden dark:!block" alt=""></a>

                <!-- logo icon optional -->
                <div class="hidden">
                    <img class="w-12" src="assets/images/facebook.svg" alt="Socialite html template">
                </div>

                <!-- title -->
                <div>
                    <h2 class="text-2xl font-semibold mb-1.5"> Sign up to get started </h2>
                    <p class="text-sm text-gray-700 font-normal">If you already have an account, <a
                            href="form-login.php" class="text-blue-700">Login here!</a></p>
                    <?php 
          // $error = $_GET['error'];
          // echo "<p>username taken</p>";
          ?>
                </div>


                <!-- form -->
                <form space-y-7 text-sm text-black font-medium dark:text-white"
                    uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" method="POST"
                    action="include/reg.inc.php">

                    <div class="grid grid-cols-2 gap-4 gap-y-7">

                        <!-- first name -->
                        <div>
                            <label for="firstname" class="">First name</label>
                            <div class="mt-2.5">
                                <input id="text" name="first_name" type="text" autofocus="" placeholder="First name"
                                    required=""
                                    class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">
                            </div>
                        </div>

                        <!-- Last name -->
                        <div>
                            <label for="lastname" class="">Last name</label>
                            <div class="mt-2.5">
                                <input id="text" name="last_name" type="text" placeholder="Last name" required=""
                                    class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">
                            </div>
                        </div>

                        <!-- email -->
                        <div class="col-span-2">
                            <label for="email" class="">Email address</label>
                            <div class="mt-2.5">
                                <input id="email" name="email" type="email" placeholder="Email" required=""
                                    class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">
                            </div>
                        </div>

                        <!-- password -->
                        <div>
                            <label for="email" class="">Password</label>
                            <div class="mt-2.5">
                                <input id="password" name="password_hash" type="password" placeholder="***"
                                    class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="email" class="">Confirm Password</label>
                            <div class="mt-2.5">
                                <input id="password" name="pwd-repeart" type="password" placeholder="***"
                                    class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">
                            </div>
                        </div>

                        <div class="col-span-2">

                            <label class="inline-flex items-center" id="rememberme">
                                <input type="checkbox" id="accept-terms" class="!rounded-md accent-red-800" />
                                <span class="ml-2">you agree to our <a href="#"
                                        class="text-blue-700 hover:underline">terms of use </a> </span>
                            </label>

                        </div>


                        <!-- submit button -->
                        <div class="col-span-2">
                            <button type="submit" name="signup-submit" class="button bg-primary text-white w-full">Get
                                Started</button>
                        </div>

                    </div>

                </form>


            </div>

        </div>

        <!-- image slider -->
        <div class="flex-1 relative bg-primary max-md:hidden">


            <div class="relative w-full h-full" tabindex="-1" uk-slideshow="animation: slide; autoplay: true">

                <ul class="uk-slideshow-items w-full h-full">
                    <li class="w-full">
                        <img src="assets/images/login/friends.jpg" alt=""
                            class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                        <div class="absolute bottom-0 w-full uk-tr ansition-slide-bottom-small z-10">
                            <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative"
                                uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                                <img class="w-12" src="assets/images/logo-icon.png" alt="Socialite html template">
                                <h4 class="!text-white text-2xl font-semibold mt-7" uk-slideshow-parallax="y: 600,0,0">
                                    Connect With Friends </h4>
                                <p class="!text-white text-lg mt-7 leading-8" uk-slideshow-parallax="y: 800,0,0;"> This
                                    phrase is more casual and playful. It suggests that you are keeping your friends
                                    updated on what’s happening in your life.</p>
                            </div>
                        </div>
                        <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                    </li>
                    <li class="w-full">
                        <img src="assets/images/login/friends-2.jpg" alt=""
                            class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                        <div class="absolute bottom-0 w-full uk-tr ansition-slide-bottom-small z-10">
                            <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative"
                                uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                                <img class="w-12" src="assets/images/logo-icon.png" alt="Socialite html template">
                                <h4 class="!text-white text-2xl font-semibold mt-7" uk-slideshow-parallax="y: 800,0,0">
                                    Connect With Friends </h4>
                                <p class="!text-white text-lg mt-7 leading-8" uk-slideshow-parallax="y: 800,0,0;"> This
                                    phrase is more casual and playful. It suggests that you are keeping your friends
                                    updated on what’s happening in your life.</p>
                            </div>
                        </div>
                        <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                    </li>
                </ul>

                <!-- slide nav -->
                <div class="flex justify-center">
                    <ul
                        class="inline-flex flex-wrap justify-center  absolute bottom-8 gap-1.5 uk-dotnav uk-slideshow-nav">
                    </ul>
                </div>


            </div>


        </div>

    </div>


    <!-- Uikit js you can use cdn  https://getuikit.com/docs/installation  or fine the latest  https://getuikit.com/docs/installation -->
    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/script.js"></script>

    <!-- Ion icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Dark mode -->
    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }

    // Whenever the user explicitly chooses light mode
    localStorage.theme = 'light'

    // Whenever the user explicitly chooses dark mode
    localStorage.theme = 'dark'

    // Whenever the user explicitly chooses to respect the OS preference
    localStorage.removeItem('theme')
    </script>

</body>

</html>