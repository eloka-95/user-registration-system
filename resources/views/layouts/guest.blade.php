<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
         {{-- CDN FOR PHONE INPUT WITH INTERNATIONAL NUMBER --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
            {{-- END OF INTENATIONAL NUMBER CDN --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        {{-- SCRIPT FOR INTERNATIONAL CODE --}}
        <script>
            // THIS FUNCTION GET THE IP OF THE USER, THE IP IS BEEN USED TO CHANGE THE COUNTRY CODE THE VERY COUNTRY OF THE USER
            function getIp(callback) {
                fetch('https://ipinfo.io/json?token=9feb87cb4af7ab', { headers: { 'Accept': 'application/json' }})
                .then((resp) => resp.json())
                .catch(() => {
                    return {
                    country: 'us',
                    };
                })
                .then((resp) => callback(resp.country));
                }

            const phoneInputField = document.querySelector("#phone");
            const error = document.querySelector(".alert-error");

            const phoneInput = window.intlTelInput(phoneInputField, {
                preferredCountries: ["us", "co", "in", "de"],
                initialCountry: "auto",
                geoIpLookup: getIp,
                utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });

            // THIS FUNCTION CHANGES THE VALUE OF PHONE INPUT TO THE NEEDED COUNTRY CODE.
            function process(event) {
                error.style.display = "none";

                if (phoneInput.isValidNumber()) {                   
                    const phoneNumber = phoneInput.getNumber();
                    const c_number= document.querySelector('input[name="phone"]').value =phoneNumber;
                } else {
                error.style.display = "";
                error.innerHTML = `Invalid phone number.`;
                event.preventDefault();
                }


                // return c_number;
            }
          </script>
        {{-- END OF SCRIPT FOR INTERNATIONAL CODE --}}
</html>
