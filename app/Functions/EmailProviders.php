<?php 
function getEmailProviderInfo($email) {
    $providers = [
        "gmail.com" => (object)[
            "name" => "Gmail",
            "url" => "https://mail.google.com/"
        ],
        "outlook.com" => (object)[
            "name" => "Outlook",
            "url" => "https://outlook.live.com/"
        ],
        "hotmail.com" => (object)[
            "name" => "OutLook",
            "url" => "https://outlook.live.com/"
        ],
        "live.com" => (object)[
            "name" => "OutLook",
            "url" => "https://outlook.live.com/"
        ],
        "msn.com" => (object)[
            "name" => "MSN",
            "url" => "https://www.msn.com/"
        ],
        "yahoo.com" => (object)[
            "name" => "Yahoo Mail",
            "url" => "https://mail.yahoo.com/"
        ],
        "ymail.com" => (object)[
            "name" => "Yahoo Mail",
            "url" => "https://mail.yahoo.com/"
        ],
        "rocketmail.com" => (object)[
            "name" => "Yahoo Mail",
            "url" => "https://mail.yahoo.com/"
        ],
        "aol.com" => (object)[
            "name" => "AOL Mail",
            "url" => "https://mail.aol.com/"
        ],
        "icloud.com" => (object)[
            "name" => "iCloud Mail",
            "url" => "https://www.icloud.com/mail"
        ],
        "me.com" => (object)[
            "name" => "iCloud Mail",
            "url" => "https://www.icloud.com/mail"
        ],
        "mac.com" => (object)[
            "name" => "iCloud Mail",
            "url" => "https://www.icloud.com/mail"
        ],
        "zoho.com" => (object)[
            "name" => "Zoho Mail",
            "url" => "https://www.zoho.com/mail/"
        ],
        "protonmail.com" => (object)[
            "name" => "ProtonMail",
            "url" => "https://mail.proton.me/"
        ],
        "proton.me" => (object)[
            "name" => "ProtonMail",
            "url" => "https://mail.proton.me/"
        ],
        "tutanota.com" => (object)[
            "name" => "Tutanota",
            "url" => "https://mail.tutanota.com/"
        ],
        "tutanota.de" => (object)[
            "name" => "Tutanota",
            "url" => "https://mail.tutanota.com/"
        ],
        "tutamail.com" => (object)[
            "name" => "Tutanota",
            "url" => "https://mail.tutanota.com/"
        ],
        "tuta.io" => (object)[
            "name" => "Tutanota",
            "url" => "https://mail.tutanota.com/"
        ],
        "keemail.me" => (object)[
            "name" => "Tutanota",
            "url" => "https://mail.tutanota.com/"
        ],
        "gmx.com" => (object)[
            "name" => "GMX Mail",
            "url" => "https://www.gmx.com/"
        ],
        "gmx.net" => (object)[
            "name" => "GMX Mail",
            "url" => "https://www.gmx.net/"
        ],
        "yandex.com" => (object)[
            "name" => "Yandex Mail",
            "url" => "https://mail.yandex.com/"
        ],
        "yandex.ru" => (object)[
            "name" => "Yandex Mail",
            "url" => "https://mail.yandex.ru/"
        ],
        "mail.com" => (object)[
            "name" => "Mail.com",
            "url" => "https://www.mail.com/"
        ],
        "email.com" => (object)[
            "name" => "Mail.com",
            "url" => "https://www.mail.com/"
        ],
        "fastmail.com" => (object)[
            "name" => "Fastmail",
            "url" => "https://www.fastmail.com/"
        ],
        "mailbox.org" => (object)[
            "name" => "Mailbox.org",
            "url" => "https://mailbox.org/"
        ],
        "mailfence.com" => (object)[
            "name" => "Mailfence",
            "url" => "https://mailfence.com/"
        ],
        "startmail.com" => (object)[
            "name" => "StartMail",
            "url" => "https://www.startmail.com/"
        ],
        "hushmail.com" => (object)[
            "name" => "Hushmail",
            "url" => "https://www.hushmail.com/"
        ],
        "hush.com" => (object)[
            "name" => "Hushmail",
            "url" => "https://www.hushmail.com/"
        ],
        "neo-mail.com" => (object)[
            "name" => "Neo Mail",
            "url" => "https://www.neomailbox.com/"
        ],
        "neomailbox.com" => (object)[
            "name" => "Neo Mail",
            "url" => "https://www.neomailbox.com/"
        ],
        "titan.email" => (object)[
            "name" => "Titan Mail",
            "url" => "https://www.titan.email/"
        ],
        "hey.com" => (object)[
            "name" => "HEY",
            "url" => "https://www.hey.com/"
        ],
        "10minutemail.com" => (object)[
            "name" => "10 Minute Mail",
            "url" => "https://10minutemail.com/"
        ],
        "simplelogin.co" => (object)[
            "name" => "SimpleLogin",
            "url" => "https://simplelogin.io/"
        ],
        "duck.com" => (object)[
            "name" => "DuckDuckGo Email Protection",
            "url" => "https://duckduckgo.com/email"
        ],
        "relay.firefox.com" => (object)[
            "name" => "Firefox Relay",
            "url" => "https://relay.firefox.com/"
        ]
    ];

    $domain = strtolower(substr(strrchr($email, "@"), 1));
    
    return $providers[$domain] ?? (object)[
        "name" => $domain,
        "url" => $domain
    ];
}
