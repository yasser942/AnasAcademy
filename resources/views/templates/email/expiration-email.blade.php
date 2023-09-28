<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تنبيه انتهاء الاشتراك</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            direction: rtl;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: right;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .cta-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>انتهى اشتراكك</h1>
    <p>لقد انتهى اشتراكك. لديك {{ $daysLeft }} أيام متبقية في اشتراكك. لمتابعة استخدام خدماتنا، يرجى تجديد اشتراكك.</p>
    <a href="" class="cta-button">تجديد الاشتراك</a>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تنبيه انتهاء صلاحية الاشتراك</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            direction: rtl;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: right;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .cta-button:hover {
            background-color: #2980b9;
        }
        .header-img {
            width: 100%;
            max-width: 200px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>تنبيه: سينتهي اشتراكك قريباً</h1>
    <p>يودّ فريقنا تذكيرك بأن اشتراكك في خدمتنا سينتهي خلال {{ $daysLeft }} أيام. للتجديد والاستمرار في الاستفادة من الخدمة، انقر على الزر أدناه.</p>
    <a href="" class="cta-button">تجديد الاشتراك</a>
</div>
</body>
</html>
