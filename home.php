<?php

/**
 * 自定义首页模板
 *
 * @package index
 */
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1,viewport-fit=cover" name="viewport">
    <meta content="on" http-equiv="x-dns-prefetch-control">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="windows-Target" contect="_top">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=no">
    <link crossorigin="" href="https://cdn.jsdelivr.net" rel="preconnect">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title>Mr.Seaning</title>
    <style>
        html {
            background: #f2f5f8;
            height: 100%;
            color: #212529;
            font-size: 16px;
            line-height: 1.8;
            font-family: 'Comic Sans MS', 'Consolas', Arial, sans-serif;

        }

        body {
            display: table;
            margin: 0 auto;
            height: 100%;
            text-align: center;
        }

        a {
            color: #7c8891;
            text-decoration: none;
        }

        a:hover,
        a:active {
            color: #0056b3;
        }

        .container {
            display: table-cell;
            vertical-align: middle;
        }

        .name {
            margin: 0;
            font-size: 3.5rem;
        }

        .bio {
            margin: 0 0 1.5rem;
            font-size: 2rem;
        }

        .bio .ll {
            display: block;
        }

        .contact {
            font-size: 2rem;
        }

        .contact a {
            margin: 0 .5rem;
        }

        .icp {
            margin-top: 5rem;
        }

        .icp a {
            font-size: .75rem;
            color: #ADB5BD;
        }

        .icp a:hover {
            color: #6C757D;
        }

        img {
            width: 8rem;
            height: 8rem;
            border-radius: 50%;

            padding: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 2, 4, 0.06), 0 0 1px rgba(0, 2, 4, 0.11);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cols">
            <main class="main-col">
                <img src="<?php $this->options->themeUrl("assets/img/tx.jpg") ?>" alt="">
                <h1 class="name">Hello, I'm Mr.Seaning</h1>
                <p class="bio"><span class="lf">I'm a </span> <strong>teacher</strong> &amp; <strong>developer</strong> <span class="ll">
                        <font _mstmutation="1">specializing </font>in web
                    </span></p>
                <nav class="contact">
                    <a title="Blog" target="_blank" href="<?php $this->options->siteUrl() ?>/blog/">
                        <svg t="1613923046935" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2712" width="48" height="48">
                            <path d="M857.4272 644.2944a32.0384 32.0384 0 0 0 32.1344-31.9424V318.912l-9.6768-9.3952c-23.0016-22.336-65.0304-64.4352-109.5296-109.0048-50.4832-50.56-102.688-102.848-128.448-127.5648L632.5696 64H275.84A141.184 141.184 0 0 0 134.4 204.5888v614.816A141.1904 141.1904 0 0 0 275.84 960h472.32a141.184 141.184 0 0 0 141.44-140.608v-34.56a32.1344 32.1344 0 0 0-64.2624 0v34.56a77.0368 77.0368 0 0 1-77.1776 76.7296H275.84a77.0304 77.0304 0 0 1-77.1712-76.7168V204.5888A77.0304 77.0304 0 0 1 275.84 127.872h296.1344v175.68a68.4416 68.4416 0 0 0 68.5696 68.16h184.7552v240.64a32.0384 32.0384 0 0 0 32.128 31.9424zM636.2432 303.552V157.1328c25.6768 25.4592 57.408 57.2416 88.5056 88.384 22.0544 22.0928 43.4112 43.4816 62.2912 62.304h-146.496a4.2944 4.2944 0 0 1-4.3008-4.2688z" fill="#7c8891" p-id="2713"></path>
                            <path d="M497.6064 517.9648H320.2816a31.8144 31.8144 0 1 1 0-63.6224h177.3248a31.8144 31.8144 0 1 1 0 63.6224z m174.08 141.024H320.2816a31.8144 31.8144 0 1 1 0-63.616h351.424a31.8144 31.8144 0 1 1 0 63.616z m0 141.0304H320.2816a31.8144 31.8144 0 1 1 0-63.6224h351.424a31.8144 31.8144 0 1 1 0 63.6032z" fill="#7c8891" p-id="2714"></path>
                        </svg>
                    </a>
                    <a title="GitHub" target="_blank" href="http://github.com/">
                        <svg t="1613922222738" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="12154" width="48" height="48">
                            <path d="M512 0C229.283787 0 0.142041 234.942803 0.142041 524.867683c0 231.829001 146.647305 428.553077 350.068189 497.952484 25.592898 4.819996 34.976961-11.38884 34.976961-25.294314 0-12.45521-0.469203-45.470049-0.725133-89.276559-142.381822 31.735193-172.453477-70.380469-172.453477-70.380469-23.246882-60.569859-56.816233-76.693384-56.816234-76.693385-46.493765-32.58829 3.540351-31.948468 3.540351-31.948467 51.356415 3.71097 78.356923 54.086324 78.356923 54.086324 45.683323 80.19108 119.817417 57.072162 148.993321 43.593236 4.649376-33.91059 17.915029-57.029508 32.50298-70.167195-113.675122-13.222997-233.151301-58.223843-233.1513-259.341366 0-57.285437 19.919806-104.163095 52.678715-140.846248-5.246544-13.265652-22.820334-66.626844 4.990615-138.884127 0 0 42.996069-14.076094 140.760939 53.787741 40.863327-11.644769 84.627183-17.445825 128.177764-17.6591 43.465272 0.213274 87.271782 6.014331 128.135109 17.6591 97.679561-67.906489 140.59032-53.787741 140.59032-53.787741 27.938914 72.257282 10.407779 125.618474 5.118579 138.884127 32.844219 36.683154 52.593405 83.560812 52.593405 140.846248 0 201.586726-119.646798 245.990404-233.663158 258.957473 18.341577 16.208835 34.721032 48.199958 34.721032 97.210357 0 70.167195-0.639822 126.7275-0.639823 143.960051 0 14.033439 9.213443 30.370239 35.190235 25.209005 203.250265-69.527373 349.769606-266.123484 349.769605-497.867175C1023.857959 234.942803 794.673558 0 512 0" fill="#7c8891" p-id="12155"></path>
                        </svg>
                    </a>
                    <a title="Email" href="mailto:seaning@seaning.com">
                        <svg t="1613922307888" class="icon" viewBox="0 0 1228 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="13996" width="48" height="48">
                            <path d="M32 108.733c0-42.365 34.474-76.733 76.807-76.733h998.393c42.413 0 76.8 34.454 76.8 76.733v806.534c0 42.374-34.474 76.733-76.81 76.733h-998.39c-42.413 0-76.8-34.454-76.8-76.733v-806.534zM128 896h960v-768h-960v768zM822.954 472.832c3.293 2.333 6.346 5.126 9.063 8.37l332.64 397.584c6.958 8.272 11.185 19.043 11.185 30.802 0 26.511-21.491 48.002-48.002 48.002-14.752 0-27.951-6.655-36.756-17.127l-332.7-397.667c-5.319-6.313-9.065-14.122-10.524-22.708l-110.388 97.003c-8.046 6.307-18.315 10.114-29.472 10.114s-21.426-3.807-29.577-10.192l-111.706-86.897c-1.824 4.492-4.368 8.774-7.642 12.691l-332.659 397.584c-8.865 10.545-22.063 17.2-36.816 17.2-26.511 0-48.002-21.491-48.002-48.002 0-11.758 4.227-22.529 11.245-30.875l332.601-397.521c2.506-2.986 5.298-5.597 8.304-7.824l-333.619-259.488c-11.253-8.867-18.412-22.495-18.412-37.795 0-26.51 21.49-48.001 48.001-48.001 11.106 0 21.33 3.772 29.463 10.103l488.82 380.204 488.928-380.285c8.046-6.305 18.315-10.113 29.472-10.113 26.512 0 48.004 21.492 48.004 48.004 0 15.354-7.207 29.025-18.427 37.812l-333.033 259.011z" fill="#7c8891" p-id="13997"></path>
                        </svg>
                    </a>
                </nav>

                <div class="icp"><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"> 豫ICP备14029761号</a></div>

            </main>
        </div>
    </div>
</body>

</html>