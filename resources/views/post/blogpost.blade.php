<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>

    <title>{{ env('APP_NAME')}}</title>
    <meta property="og:title" content="{{ env('APP_NAME')}}" />
    <meta property="og:type" content="website" />
    <
<style>
    #social-links ul li {
        display: inline;
        margin-right: 10px;


    }
</style>

</head>
{!! $shareButtons !!}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>