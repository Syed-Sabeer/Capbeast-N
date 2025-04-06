<!DOCTYPE html>
<html>
<head>
    <title>Your Reseller Application is Under Review</title>
</head>
<body>




@if($user->language == 'fr')

    <h2>Cher, {{ $user->first_name ?? 'Client précieux' }}!</h2>
    <p>Bienvenue à Monkey Beanies! Nous sommes ravis de vous faire rejoindre notre communauté. Pour terminer votre inscription, nous devons vérifier que vous êtes une entreprise enregistrée comme promotion ou décorateur à des fins de marketing. Veuillez nous permettre un total de 24 à 48 heures.</p>
    <p>En vérifiant votre entreprise, vous pourrez recevoir des mises à jour importantes, des notifications de compte et des offres exclusives.</p>
    <p>Si vous n'avez pas demandé cette inscription ou si vous avez des questions, veuillez ignorer cet e-mail.</p>
    <p>Merci d'avoir choisi Monkey Beanies. Nous sommes impatients de vous offrir une grande expérience!<br>Cordialement,</p>
    <h4>Bruno Torres</h4>
    <h4>PDG</h4>

@else

    <h2>Dear, {{ $user->first_name ?? 'Valuable Customer' }}!</h2>
    <p>Welcome to Monkey Beanies! We're thrilled to have you join our community. To complete your registration we need to verify you are a company registered as promotional or decorator for marketing purposes. Please allow us a total of 24 to 48 hours.</p>
    <p>By verifying your business, you'll be able to receive important updates, account notifications, and exclusive offers.</p>
    <p>If you did not request this registration or if you have any questions, please disregard this email.</p>
    <p>Thank you for choosing Monkey Beanies. We look forward to providing you with a great experience! <br>Best Regards,</p>
    <h4>Bruno Torres</h4>
    <h4>CEO</h4>

@endif

   
    <a href="https://monkeybeanies.com/">Monkey Beanies</a>
</body>
</html>
