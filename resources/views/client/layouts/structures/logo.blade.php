<header-custom>
    <h-custom class="gradient-text header-custom">
        <a href="/">OusayGaming</a>
    </h-custom>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
</header-custom>
<style type="text/css">
    .gradient-text {
        background-color: #CA4246;
        background-image: linear-gradient(
                45deg,
                #CA4246 16.666%, 
                #E16541 16.666%, 
                #E16541 33.333%, 
                #F18F43 33.333%, 
                #F18F43 50%, 
                #8B9862 50%, 
                #8B9862 66.666%, 
                #476098 66.666%, 
                #476098 83.333%, 
                #A7489B 83.333%);
        background-size: 100%;
        background-repeat: repeat;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent; 
        animation: rainbow-text-simple-animation-rev 0.75s ease forwards;

        }
        .gradient-text:hover{
            animation: rainbow-text-simple-animation 0.5s ease-in forwards;
        }
        @keyframes rainbow-text-simple-animation-rev {
            0% {
                background-size: 650%;
            }
            40% {
                background-size: 650%;
            }
            100% {
                background-size: 100%;
            }
        }
        @keyframes rainbow-text-simple-animation {
            0% {
                background-size: 100%;
            }
            80% {
                background-size: 650%;
            }
            100% {
                background-size: 650%;
            }
        }
        header-custom {
          margin-top: 1em;
        }
        @media only screen and (max-width: 600px) {
          h-custom {
            font-size: 2em !important;
          }
        }
        h-custom {
            font-family: "Archivo Black", sans-serif;
            font-weight: normal;
            font-size: 4em;
            text-align: center;
            margin-bottom: 0;
            margin-bottom: -0.25em;
            margin-left: auto;
            margin-right: auto;
            cursor: pointer;
            width: 605px;
            display: inline;
        }
</style>