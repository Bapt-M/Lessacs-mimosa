<?php 
    if ($_POST["submit"])
    {
        $to = $_POST["email"];
        $subject = "Merci de votre Commande !!!";
        $articles_list = $_POST["bag"];
        $articles_string = '';
        $total_price = 0;
        foreach ($articles_list as &$value) {
            $articles_string = $articles_string . $value . ' ; ';
            switch ($value) {
                case '1 sac Olea':
                    $total_price += 6.00;
                    break;
                
                case '1 sac Citron':
                    $total_price += 7.60;
                    break;
                
                case '1 sac Patate':
                    $total_price += 9.20;
                    break;

                case '1 pack de chaque sac':
                    $total_price += 19.80;
                    break;

                case '1 pack de 3 Citrons':
                    $total_price += 19.80;
                    break;
                
                default:
                    break;
            }
        }
        $message = `
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Confirmation de commande Mimosa. Merci ;)</title>
            <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700&family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    font-family: 'Dosis', sans-serif;
                }
                body{
                    height: 100vh;
                    width: 100%;
                    background: #d7eaf8;
                }
                img{
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    top: 5%;
                    left: 5%;
                    transform: translate(-5%, -5%);
                }
                h1{
                    text-align: center;
                    font-size: 50px;
                    color: #eca335;
                }
                p{
                    text-align: center;
                    margin-top: 100px;
                }
                a{
                    color: black;
                }
                button{
                    margin: 100px;
                    background: #eca335;
                    width: 150px;
                    height: 50px;
                    border: none;
                    border-radius: 15px;
                    cursor: pointer;
                    font-size: 1.5rem;
                    transition: .3s linear;
                }
                button:hover{
                    background: #fceb3a;
                    color: #eca335;
                    border: 2px solid;
                }
            </style>
        </head>
        <body>
            <img src='logo.png'>
            <h1>Merci de votre Commande !</h1>
            <p>
                Merci infiniment de soutenir notre projet, votre commande a bien été prise en compte. </br>Vous avez commandé
                {$articles_string}
                <br>Ce qui vous fera un total de {$total_price} €.
                <br><br><br><a href='paiement.html' target='_self'><i>Les instructions pour le paiement</i></a><br>
                <button onclick="window.open('./index.html', '_self')">Retour au site</button>
            </p>
        </body>
        </html>
        `;

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        mail($to, $subject, $message, implode("\r\n", $headers));

        $coordon = [$_POST["firstname"].' '.$_POST["name"], $_POST["adress"], $_POST["adressCity"], $_POST["adressCode"]];
        $recap = "Une nouvelle commande de ".$coordon[0]." vient d'être passé. 
        <br>Article(s): ".$articles_string." soit : ".$total_price." €
        <br>Coordonnées: ".$to." ; ".$coordon[0]." ; ".$coordon[1]." ".$coordon[2]." ".$coordon[3];
        mail('quentinbauer21@gmail.com', `nouvelle commande de {$coordon[0]}`, $recap);     
        header('location: merci.html');
    }else echo "ERROR"
    
?>