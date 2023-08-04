<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <p>Xin chào {{ $data['user_name'] }}</p>
    <p>
        <div>Cảm ơn bạn đã liên hệ HTR Blog. Chúng tôi đã nhận được yêu cầu của bạn:</div>
        <div>• Tiêu đề: {{ $data['subject'] }}</div>
        <div>• Nội dung: {{ $data['message'] }}</div>
        <div>• Thời gian gửi: {{ $data['date_send'] }}</div>
    </p>
    <p>
        Chúng tôi sẽ phản hồi cho bạn trong thời gian sớm nhất.
    </p>
    
</body>
</html>