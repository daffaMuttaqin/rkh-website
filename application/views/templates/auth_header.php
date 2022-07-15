<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primaryColor: '#F9A826',
                    },
                    fontFamily: {
                        'montserrat': 'Montserrat',
                        'nunito': 'Nunito'
                    },
                },
            }
        }
    </script>

    <!-- Style -->
    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Nunito:wght@300;400;700&display=swap');
    </style>

    <title>
        <?= $title; ?>
    </title>
</head>

<body>