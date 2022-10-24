<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="https://i.ibb.co/PNXq1v6/logo-cpn2.png" sizes="16x16">
    <title>cpn aides aux entreprises</title>
    <style>
        /* .bg-image{
            background-image: url(https://i.ibb.co/TtwrFv4/man.jpg);
            background-position: right;
            -webkit-background-repeat-x: no-repeat;
            -webkit-background-repeat-y: no-repeat;
            background-repeat-x: no-repeat;
            background-repeat-y: no-repeat;
            -o-background-repeat-x: no-repeat;
            -o-background-repeat-y: no-repeat;
            -moz-background-repeat-x: no-repeat;
            -moz-background-repeat-y: no-repeat;
            -webkit-background-repeat: no-repeat;
            -o-background-repeat: no-repeat;
            -moz-background-repeat: no-repeat;
            background-repeat: no-repeat;
        } */
    </style>
</head>
<body>
    <table id="Tableau_01" width="600" height="649" border="0" cellpadding="0" cellspacing="0">
	    <tbody class="tbody">
            <tr>
                <td width="600" height="80" colspan="2">
                    <ul style="margin:0; padding:0; display:inline-flex">
                        <li style="list-style:none; width:80px; height:80px; display:inline-block; vertical-align:middle; text-align:center"><a href="#"><img style="margin-left: 10px;" src="https://i.ibb.co/PNXq1v6/logo-cpn2.png" height="40" alt=""></a></li>
                        <li style="list-style:none; width:500px">
                            <ul style="margin:0; padding:0; width:100%; text-align:center">
                                <li style="list-style:none; width:fit-content; margin: 0 auto;"><h1 style=" font-size:35px; margin:0; color:#111D5E;">{{$data["time"]}}</h1></li>
                                <li style="list-style:none; width:fit-content; position:relative; margin: 0 auto;">
                                    <h1>Lien zoom: 
                                        <a style="position:absolute; top:-7px; right:-50px" href="{{$data['zlink']}}">
                                            <img width="40" src="https://i.ibb.co/Fm2fXgR/zoom.png" alt="">
                                        </a>
                                    </h1>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr class="bg-image" width="600" height="379">
                <td width="350" height="379">
                    <div style="height:100%; width:100%; padding: 20px 5px">
                        <div style="color:#038418; width:fit-content; border:4px solid #038418; border-radius:0 20px 0 20px; padding:10px 20px; text-transform:uppercase; font-size:22px; font-weight:700">Validé</div>
                        <h1 style="color:#111D5E; width: fit-content; margin-top: 25px; text-transform:uppercase; font-size:34px">Félicitation, votre entreprise est éligible à <span style="color:#CE1212">500 €</span></h1>
                        <p style="color:#111D5E; width: fit-content; margin-top: 20px; margin:0; font-size:25px" >Votre conseiller numérique</p>
                        <p style="color:#111D5E; width: fit-content; margin-top: 20px; margin:0; font-size:25px">confirmera avec vous</p>
                        <p style="color:#111D5E; width: fit-content; margin-top: 20px; margin:0; font-size:25px">votre présence.</p>
                        <p style="color:#919090; width: fit-content; margin-top: 20px; margin:0; font-size:20px">Conserver ce mail d'invitation.</p>
                    </div>
                </td>
                <td width="250" height="379">
                </td>
            </tr>
            <tr>
                <td colspan="2" width="600" height="10"></td>
            </tr>
            <tr>
                <td style="vertical-align:top;text-align:center" colspan="2" width="600" height="150">
                    <h2 style="width:100%;text-align:center;margin:0;margin-bottom:10px;color:#111d5e;font-size:25px">Rendez vous</h2>
                    <ul style="padding:0; margin:0; display:inline-flex;">
                        <li style="list-style:none; padding:0 5px; height:70px">
                            <a style="width:70px; height:70px; text-decoration:none" href="http://localhost/mail/confirm/?uid={{$data['uid']}}&mid={{$data['mid']}}&zlink={{$data['zlink']}}&pass={{$data['pass']}}&dstr={{$data['dstr']}}&dend={{$data['dend']}}&ttl={{$data['ttl']}}&desc={{$data['desc']}}">
                                <img src="https://i.ibb.co/tms2s8J/confirm.png" width="70" alt="">
                                <p style="color: #919090;text-decoration: none;font-weight: 600;">Confirmer</p>
                            </a>
                        </li>
                        <li style="list-style:none; padding:0 5px; height:70px">
                            <a style="width:70px; height:70px; text-decoration:none" href="http://localhost/mail/change?uid={{$data['uid']}}">
                                <img src="https://i.ibb.co/TKW5QSS/change.png" width="70" alt="">
                                <p style="color: #919090;text-decoration: none;font-weight: 600;">Changer</p>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="600" height="10"></td>
            </tr>
            <tr>
                <td style="background:#111D5E; text-align:center" colspan="2" width="600" height="100">
                    <ul style="padding:0; margin:0; display:inline-flex;">
                        <li style="list-style:none; padding:0 5px; height:40px">
                            <a style="width:40px; height:40px" target="_blank" href="https://www.facebook.com/CPN.aideauxentreprises">
                                <img width="40" height="40" src="https://i.ibb.co/cyVW4FP/facebook.png" alt="">
                            </a>
                        </li>
                        <li style="list-style:none; padding:0 5px; height:40px">
                            <a style="width:40px; height:40px" target="_blank" href="https://www.instagram.com/cpn_aideauxentreprises/">
                                <img width="40" height="40" src="https://i.ibb.co/MN6SjNB/instagram.png" alt="">
                            </a>
                        </li>
                        <li style="list-style:none; padding:0 5px; height:40px">
                            <a style="width:40px; height:40px" target="_blank" href="https://www.linkedin.com/company/cpn-aide-aux-entreprises/">
                                <img width="40" height="40" src="https://i.ibb.co/pXt14bw/linkedin.png" alt="">
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td style="background: #CE1212; text-align:center;" colspan="2" width="600" height="50">
                    <a style="text-decoration: none; color:white;" target="_blank" href="http://cpn-aide-aux-entreprises.com/">www.cpn-aide-aux-entreprises.com</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>