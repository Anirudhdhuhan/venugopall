<head>
    @include('layout.head')
    <title>Ravindra Dalvi</title>
    <style>
        @media only screen and (max-width: 1368px) {
            .large-button {
                font-size: 1.1em !important;
                height: 40px !important;
            }
        }
        .large-button {
            width: 340px;
            height: 45px;
            font-size: 20px !important;
            background-color: #d51f44;
            color: #fff;
            border: solid 1px #d51f44;
            border-radius: 5px;
            text-transform: uppercase;
            word-spacing: 5px;
        }
    </style>
</head>
<main>
    @include('includes.top-menu')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 margeen-bot">
                <center>
                    <img src="https://www.molitics.in/images/404.svg" class="error image-responsive">
                    <p style="font-size: 14px;"> We Couldn't find the page you are looking for</p>
                    <a href="{{url('/')}}"><button class="large-button">BACK TO HOME</button></a>
                </center>
            </div>
        </div>
    </div>
    @include('includes.footers')
</main>