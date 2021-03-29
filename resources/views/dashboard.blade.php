<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div class="container" style="width:100%; background:#ddd" >
    <iframe class="responsive-iframe" src="https://app.powerbi.com/view?r=eyJrIjoiZDJmZjY4OTQtN2U5ZC00MDczLWFlNzktOGNkZTM4YTJmYjc0IiwidCI6IjMyNDlmZGUwLTA3YzgtNDNhNS04NTdmLTBjOWRlZjQ5YTYyOSJ9&pageName=ReportSection158a4705531e74b1b3b1" frameborder="0" allowFullScreen="true"></iframe>
</div>
<style>

    body{
        background-color: #ddddddb3;
        margin: 0
    }

    .container {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 45.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
    }

    /* Then style the iframe to fit in the container div with full height and width */
    .responsive-iframe {
        position: absolute;
        margin:0;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }
</style>
</body>
</html>
