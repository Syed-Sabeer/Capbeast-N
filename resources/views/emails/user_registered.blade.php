<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Monkey Beanies</title>
</head>
<body>




@if($user->language == 'fr')

    <h2>Cher, {{ $user->first_name ?? 'Client précieux' }}!</h2>
    <h4>Merci de vous inscrire avec Monkey Beanies! Nous sommes ravis de vous avoir à bord. </h4>
    <p> Si vous avez des questions ou des préoccupations, veuillez consulter notre section FAQ ou contacter notre équipe d'assistance pour obtenir de l'aide.</p>
    <p> Merci d'avoir choisi Monkey Beanies. Nous sommes impatients de vous servir et de vous offrir une expérience exceptionnelle.</p>
    <h4>Bruno Torres</h4>
    <h4>PDG</h4>
    
@else

    <h2>Dear, {{ $user->first_name ?? 'Valuable Customer' }}!</h2>
    <h4>Thank you for registering with Monkey Beanies! We're excited to have you on board. </h4>
    <p>If you have any questions or concerns, please refer to our FAQ section or contact our support team for assistance.</p>
    <p>Thank you for choosing Monkey Beanies. We look forward to serving you and providing you with an outstanding experience.Warm regards,</p>
    <h4>Bruno Torres</h4>
    <h4>CEO</h4>

@endif

    <a href="https://monkeybeanies.com/">Monkey Beanies</a>
</body>
</html>
