<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Embroidered Beanies in Montreal-Nord, Canada</title>
    <meta name="description" content="Customize Embroidered Beanies in Montreal-Nord, Canada, with unique designs. Get high-quality, stylish, and cozy Customize Embroidered Beanies for any occasion.">
    <meta name="keywords" content="customize beanies, embroidered beanies, Customize Embroidered Beanies in Montreal-Nord, Customize Embroidered Beanies in Canada">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #121212, #3B3B58);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .modal {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .modal-content {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(25px);
            padding: 40px;
            text-align: center;
            border-radius: 16px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.4);
            width: 400px;
            animation: slideUp 0.4s ease-in-out;
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .logo {
            display: block;
            margin: 0 auto 15px;
            max-width: 100px;
        }
        h3 {
            color: #fff;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #FFB703, #FD8204);
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
        }
        button img {
            width: 24px;
            height: auto;
        }
        button:hover {
            background: #E67E22;
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(255, 183, 7, 0.6);
        }
        .error-message {
            margin-top: 18px;
            color: #FF4747;
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="modal">
        <div class="modal-content">
            <img src="{{ asset('assetsMain/images/logo-light.png') }}" alt="Logo" class="logo">
            <h3>Select Your Country</h3>
            <form action="{{ route('set.country') }}" method="POST">
                @csrf
                <div class="button-container">
                    <button type="submit" name="country" value="USA">
                        <img src="{{ asset('assetsCommon/svgs/usa.svg')}}" alt=""> USA
                    </button>
                    <button type="submit" name="country" value="CANADA">
                        <img src="{{ asset('assetsCommon/svgs/canada.svg')}}" alt=""> Canada
                    </button>
                </div>
            </form>
            @if(session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
        </div>
    </div>

</body>
</html>
