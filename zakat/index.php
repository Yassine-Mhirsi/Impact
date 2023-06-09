<!DOCTYPE html>
<html lang="en" style="background-color: #083642;">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, shrink-to-fit=no">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- App Theme Color -->
  <meta name='theme-color' content='#083642'>

  <title>Zakalc – A Simple Zakat Calculator</title>

  <!-- Social Media Meta -->
  <!-- Twitter protocol -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Zakalc – A simple REPL-like Zakat calculator">
  <meta name="twitter:description"
    content="A simple REPL-like Zakat calculator of one's personal Islamic or Muslim annual charity.">
  <meta name="twitter:image" content="/logo.png">
  <meta name="twitter:image:secure_url" content="/logo.png" />
  <meta name="twitter:site" content="Zakalc " />
  <meta name="twitter:url" content="https://ramz.info" />

  <!-- Open Graph protocol -->
  <meta property="og:site_name" content="Zakalc" />
  <meta property="og:url" content="https://ramz.info">
  <meta property="og:title" content="Zakalc – A simple REPL-like Zakat calculator">
  <meta property="og:description"
    content="A simple REPL-like Zakat calculator of one's personal Islamic or Muslim annual charity.">
  <meta property="og:type" content="website" />

  <meta property="og:image" content="/logo.png">
  <meta property="og:image:secure_url" content="/logo.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="512">
  <meta property="og:image:height" content="512">

  <link rel="apple-touch-icon" sizes="57x57" href="/logo.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="/logo.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="/logo.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="/logo.png" />
  <link rel="apple-touch-icon" sizes="600x600" href="/logo.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css"
    rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i|Cairo:200,300,400,600,700,900|Changa:200,300,400,500,600,700,800|El+Messiri:400,500,600,700|Reem+Kufi&amp;display=swap&amp;subset=arabic,cyrillic,latin-ext"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="solar.css" />


  <!-- Meta Info -->
  <meta name="description"
    content="A simple REPL-like Zakat calculator of one's personal Islamic or Muslim annual charity." />
  <meta name="keywords"
    content="Zakat is the Islamic annual charity. This is a simple Zakat calculator, built with Bootstrap 4 and vanilla JavaScript. This REPL-like Zakat calculator is designed to only aid you in calculating the Zakat of your liquid assets, and is not in any way, shape, or form a professional Zakat calculation application." />

  <style>
    *::-webkit-input-placeholder {
      color: #506469 !important;
    }

    *:-moz-placeholder {
      color: #506469 !important;
      opacity: 1;
    }

    *::-moz-placeholder {
      color: #506469 !important;
      opacity: 1;
    }

    *:-ms-input-placeholder {
      color: #506469 !important;
    }

    body {
      font-family: 'Cairo', sans-serif !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: bold;
    }

    .table-sm td,
    .table-sm th {
      padding: 0;
    }

    .cmd-line {
      background-color: #171314;
      border: medium none;
      border-radius: 4px;
      box-shadow: 1px 1px 2px rgb(0 0 0 / 70%) inset, -1px -1px 1px rgb(255 255 255 / 20%) inset;
      color: #bbb;
      font-family: 'Share Tech Mono', monospace !important;
      font-size: 11pt;
      padding: 40px 55px;
      margin-bottom: -23px;
    }

    .cmd-line pre {
      background-color: #171314;
      color: #bbb;
      font-family: 'Share Tech Mono', monospace !important;
      font-size: 11pt;
      margin: 0;
    }

    .fndsrc-row td {
      padding: 2px 0 1px;
    }

    .fndsrc-grp-header td {
      padding: 2px 0 1px;
    }

    .fndsrc-grp-body td {
      padding: 1px 2px;
    }

    .coral-circle {
      background: #cb4b17;
      position: absolute;
      font-size: 15pt;
      left: -34px;
      top: 4px;
      text-align: center;
      height: 35px;
      width: 35px;
      padding: 6px 0;
    }

    .navbar-dark>.container {
      background: url(top.png) no-repeat calc(100% - 90px) center;
      background-size: 40%;
    }

    .form-control:disabled,
    .form-control:read-only {
      background-color: #a9bdbd;
    }

    @media (max-width: 991px) {
      .navbar-dark>.container {
        background: none;
      }
    }

    @media (max-width: 575px) {

      #currLocal,
      #currSavings {
        width: calc(100% - 170px);
      }

      [id^="cmdline-msg"] {
        white-space: normal;
      }
    }
  </style>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&amp;display=swap" rel="stylesheet">

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  <meta name="date" content="May. 10, 2021">
  <meta name="author" content="Lionbytes">
  <link rel="author" href="/humans.txt" type="text/plain">

  <!-- Manifest -->
  <link rel='manifest' href='manifest.json'>

  <link href="favicon.ico" type="image/x-icon" rel="icon" />
  <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />

</head>

<body style="background-color: rgb(233, 236, 239);">
  <main role="main">
    <header style="
      background: url(bg.png) repeat center center;
      background-color: rgb(4, 38, 47);
  ">
      <div class="collapse" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Zakat is the Islamic annual charity. This is a simple Zakat calculator, built with
                Bootstrap 4 and vanilla JavaScript. This REPL-like Zakat calculator is designed to only aid you in
                calculating the Zakat of your liquid assets, and is not in any way, shape, or form a professional Zakat
                calculation application.<br><br>
              </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="https://twitter.com/lionbytes" target="_blank" class="text-primary">Follow on Twitter</a>
                </li>
                <li><a href="https://github.com/lionbytes" target="_blank" class="text-primary">Follow on GitHub</a>
                </li>
                <li><a href="mailto:lionbytes.net@gmail.com" target="_blank" class="text-muted">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="../main.php" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Journeys of Faith<span>.</span></h1>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader"
            aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation"
            style="border-color: #94793b;">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <div class="container-fluid py-md-5 py-4 mb-4 bg-dark text-light" style="background-color: #e9ecef;">
      <div class="container">
        <div class="row d-flex flex-column-reverse flex-lg-row">
          <div class="col-12 text-right d-none" style="margin: 5px -5px -44px; z-index: 1;">
            <button type="button" class="btn btn-sm btn-primary mb-2 d-inline">
              <strong>Import </strong>
              <i class="far fa-folder-open ml-1"></i>
              <span class="fa-xs"> JSON </span>
            </button>
            <button type="button" class="btn btn-sm btn-primary mb-2 d-inline">
              <strong>Export </strong>
              <i class="fas fa-file-import ml-1"></i>
              <span class="fa-xs"> JSON </span>
            </button>
          </div>

          <div class="col-lg-6 col-12 pb-5 mb-3">

            <section class="form-inline border border-primary rounded p-3 mb-5 position-relative d-none">
              <h5 class="p-2 position-absolute" style="background-color: #083642;top: -23px;">Date</h5>
              <div class="bg-black text-muted px-4 py-3 mb-2 fa-sm w-100"
                style="background-color: #05252d;border-radius: 5px;">
                Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                erat volutpat.
              </div>
              <div class="form-row mt-1">
                <span class="col-auto mb-1">
                  <label class="p-2 d-inline-block">Hijri <span>Year &nbsp;</span></label>
                  <input id="hijri" type="text" class="form-control px-3 py-0 disabled border border-light" value=""
                    style="width: 140px; background-color: #ced6de;" disabled="">
                </span>
                <span class="col-auto mb-1">
                  <label class="p-2 mb-2 d-inline-block">Gregorian </label>
                  <input id="gregorian" type="text" class="form-control px-3 py-0 disabled border border-light" value=""
                    style="width: 188px; background-color: #ced6de;" disabled="">
                </span>
              </div>
            </section>

            <form id="formCurrency" action="javascript:void(0);"
              class="border border-primary rounded p-3 mb-5 position-relative">
              <h5 class="p-2 position-absolute" style="background-color: #083642;top: -23px;">
                <span class="badge badge-pill badge-dark rounded-circle coral-circle">1</span>
                Currency
              </h5>
              <div class="bg-black text-muted px-4 py-3 mb-2 fa-sm w-100"
                style="background-color: #05252d;border-radius: 5px;">
                Select the the currency in which you would like to calculate all your savings and funds, then select the
                currency of the country you reside in.
              </div>
              <label class="p-2 mb-2" data-toggle="tooltip" data-placement="top"
                title="Currency to calculate all your savings in">Calculation Currency <i
                  class="far fa-question-circle fa-sm text-muted"></i></label>
              <select id="currSavings" class="form-control d-inline float-right float-sm-none mb-2 mr-sm-2 px-1 py-0"
                required>
                <option value="" selected="">– Select –</option>
                <option value="USD">USD</option>
                <option value="EURO">EURO</option>
                <option value="GBP">GBP</option>
                <option value="JPY">JPY</option>
                <option value="CAD">CAD</option>
                <option value="KD">KD</option>
                <option value="SFr.">SFr.</option>
                <option value="INR">INR</option>
                <option value="AUD">AUD</option>
                <option value="TRY">TRY</option>
                <option value="GOLD">GOLD</option>
                <option value="Silver">Silver</option>
                <option value="local currency">Other currency</option>
              </select>

              <label class="p-2 mb-2" data-toggle="tooltip" data-placement="top"
                title="Currency of the country you reside in">Local Currency <i
                  class="far fa-question-circle fa-sm text-muted"></i></label>
              <select id="currLocal" class="form-control d-inline float-right float-sm-none mb-2 mr-sm-2 px-1 py-0"
                required>
                <option value="" selected="">– Select –</option>
                <option value="USD">USD</option>
                <option value="EURO">EURO</option>
                <option value="GBP">GBP</option>
                <option value="JPY">JPY</option>
                <option value="CAD">CAD</option>
                <option value="KD">KD</option>
                <option value="SFr.">SFr.</option>
                <option value="INR">INR</option>
                <option value="AUD">AUD</option>
                <option value="TRY">TRY</option>
                <option value="GOLD">GOLD</option>
                <option value="Silver">Silver</option>
                <option value="local currency">Other currency</option>
              </select>

              <button id="defineCurrency" type="submit" class="btn btn-primary mb-2"
                style="background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);">
                Submit
              </button>

            </form>

            <form class="allform" action="javascript:void(0);">
              <div id="formRates" class="border border-primary rounded p-3 mb-5 position-relative">
                <h5 class="p-2 position-absolute" style="background-color: #083642;top: -23px;">
                  <span class="badge badge-pill badge-dark rounded-circle coral-circle">2</span>
                  Rates
                  <!-- <a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" title="Currency and precious metal exchange local prices"><i class="far fa-question-circle fa-sm mx-1 text-muted"></i></a> -->
                </h5>
                <div class="bg-black text-muted px-4 py-3 mb-2 fa-sm w-100"
                  style="background-color: #05252d;border-radius: 5px;">
                  Currency and precious metal exchange local prices.
                </div>
                <div class="form-row">
                  <div class="col-auto col-5 col-sm-4 d-flex flex-column" id="convert">
                    <label class="py-2 pl-2 pr-1 mb-0 text-nowrap">_ to _</label>
                    <input type="number" step="0.01" class="form-control mb-2 px-1 py-0 w-100"
                      placeholder="Exchange rate" style="width: 70px;z-index: 1;" required="">
                  </div>
                  <div class="col-auto col-4 d-flex flex-column" id="rateGold">
                    <label class="py-2 pl-2 pr-1 mb-0">Gold</label>
                    <input type="number" step="0.01" class="form-control mb-2 px-1 py-0 w-100"
                      placeholder="Price of 1 gr" style="width: 70px;" required="">
                  </div>
                  <div class="col-auto col-3 col-sm-4 d-flex flex-column" id="rateSilver">
                    <label class="py-2 pl-2 pr-1 mb-0">Silver</label>
                    <input type="number" step="0.01" class="form-control mb-2 px-1 py-0 w-100"
                      placeholder="Price of 1 gr" style="width: 70px;" required="">
                  </div>
                </div>
              </div>

              <div id="formQuorum" class="border border-primary rounded p-3 mb-5 position-relative">
                <h5 class="p-2 position-absolute" style="background-color: #083642;top: -23px;">
                  <span class="badge badge-pill badge-dark rounded-circle coral-circle">3</span>Quorum Base
                </h5>
                <div class="bg-black text-muted px-4 py-3 mb-2 fa-sm w-100"
                  style="background-color: #05252d;border-radius: 5px;">
                  Zakat calculation in this app is based on the gold quorum by default. Please choose Silver if that's
                  your preference.
                </div>
                <div class="form-row my-3 mx-sm-2 mx-0">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input mt-1" type="radio" name="quorum" id="goldRadio" value="gold" required
                      checked="checked">
                    <label class="form-check-label" for="goldRadio">Gold</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input mt-1" type="radio" name="quorum" id="silverRadio" value="silver"
                      required>
                    <label class="form-check-label " for="silverRadio">Silver</label>
                  </div>
                  <!-- <div class="form-check form-check-inline mr-0">
          <input class="form-check-input mt-1" type="radio" name="quorum" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Mix of both</label>
        </div> -->
                </div>
              </div>

              <div id="formSavings" class="border border-primary rounded p-3 pb-4 mb-4 position-relative">
                <h5 class="p-2 position-absolute" style="background-color: #083642;top: -23px;">
                  <span class="badge badge-pill badge-dark rounded-circle coral-circle">4</span>
                  My
                  Funds<!-- <a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" title="Savings, cash on hand, expected refunds, loans, debts, taxes, etc. "><i class="far fa-question-circle fa-sm mx-1 text-muted"></i></a> -->
                </h5>
                <div class="bg-black text-muted px-4 py-3 mb-2 fa-sm w-100"
                  style="background-color: #05252d;border-radius: 5px;">
                  List your savings, loans, debts, taxes, cash on hand, expected refunds, etc. Click the
                  <strong>Calculate&nbsp;Zakat</strong> button when you're done.

                </div>
                <table id="savingsTable" class="table table-borderless table-sm mt-2 mb-0">
                  <tbody>
                    <tr class="fndsrc fndsrc-grp fndsrc-grp-header template d-none" style="background-color: #0d4554;">
                      <th scope="row" class="text-right text-white"><label class="p-2 mb-0">Label</label></th>
                      <td>
                        <div class="input-group mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                          </div>
                          <input type="number" step="0.01" class="form-control pr-1 disabled"
                            placeholder="Please add a new sub-field..." value="0" disabled="">
                          <button type="button" class="btn-delsrc btn btn-sm border ml-2">
                            <i class="fas fa-trash-alt fa-1x px-1"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr class="fndsrc fndsrc-grp fndsrc-grp-body template d-none" style="background-color: #0d4554;">
                      <td colspan="2">
                        <div class="row px-2">
                          <div class="col-12 position-relative">
                            <table class="table table-borderless mx-2 mb-1">
                              <tbody>
                                <tr class="fndsrc fndsrc-subrow template d-none">
                                  <th scope="row" class="text-right"><label class="p-1 mb-0">Sub-label</label></th>
                                  <td>
                                    <div class="input-group input-group-sm mr-sm-2">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                      </div>
                                      <input type="number" step="0.01" class="form-control pr-1" placeholder="In USD">
                                      <button type="button" class="btn-delsrc btn btn-sm btn-dark ml-2">
                                        <i class="far fa-trash-alt fa-sm px-0"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                            <div class="addsrc-sm text-right rounded-bottom"
                              style="margin: 4px -11px 0px;background-color: #072e38;">
                              <small class="text-muted">Add Fund Sub-source</small>
                              <button type="button" class="btn btn-addsrc-sub btn-sm btn-success m-1"
                                data-toggle="tooltip" data-placement="top" title="Add New Sub-field">
                                <i class="fa fa-plus fa-sm px-0"></i>
                              </button>
                              <div></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="fndsrc fndsrc-row template d-none">
                      <th scope="row" class="text-right text-white"><label class="p-2 mb-0">Label</label></th>
                      <td>
                        <div class="input-group mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text text-light" style="background-color: #0b2d35;">$</div>
                          </div>
                          <input type="number" step="0.01" class="form-control pr-1" placeholder="In USD">
                          <button type="button" class="btn-delsrc btn btn-sm border ml-2">
                            <i class="fas fa-trash-alt fa-1x px-1"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="addsrc-lg text-right rounded-bottom p-1"
                  style="margin: 20px -16px -24px;background-color: #05252d;">
                  <span class="text-muted mx-1">Add Fund Source </span>
                  <div class="btn-group dropup">
                    <button id="bigGreen" type="button" class="btn btn-addsrc btn-success" data-toggle="tooltip"
                      data-placement="top" title="Add New Field">
                      <i class="fa fa-plus"></i>
                    </button>
                    <button type="button"
                      class="btn btn-secondary dropdown-toggle dropdown-toggle-split border border-success"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                      style="background-color: #258880;">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right bg-white">
                      <a class="dropdown-item btn-addsrc" href="#" role="button"
                        onclick="document.querySelector('#bigGreen').click();">Add Fund Source </a>
                      <a class="dropdown-item btn-addsrc-grp" href="#" role="button" data-toggle="modal"
                        data-target="#addFieldGroupModal">Add Grouped Fund Sources</a>
                    </div>
                  </div>

                </div>
              </div>
              <button id="zakalc" type="submit" class="btn btn-lg btn-primary w-100 mb-2"
                style="background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);">
                <i class="fa fa-seedling d-none"></i><span> Calculate Zakat </span></button>
            </form>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <!-- <div class="modal fade" id="addFieldModal" tabindex="-1" aria-labelledby="addFieldModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addFieldModalLabel">
            Fund Source Label
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control pr-1 fa-2x border-0" title="Wallet, Safe, Bank, etc." placeholder="Write title here..">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success pl-4 pr-3 font-weight-bold">Add <i class="fa fa-plus px-1"></i></button>
        </div>
      </div>
    </div>
  </div> -->

          </div>

          <div class="col-lg-6 col-12 d-flex pb-5 mb-3 mb-lg-5">
            <div class="cmd-line align-self-stretch w-100 px-4 px-lg-5 py-4 py-lg-5 overflow-hidden">
              <pre id="cmdline-dates" class="text-muted d-none"><strong>Hijri Date:</strong> <span id="cmd-hijri"></span>     <br class="d-inline d-sm-none" /><strong>Gregorian Date:</strong> <span id="cmd-gregorian" style="width: 78px; display: inline-block; overflow: hidden; margin: -7px 0;"></span>
      </pre>
              <pre
                id="cmdline-msg"><span class="msg-success text-success d-none d-sm-block" style="display: none"></span><span class="msg-error"><h5 class="mb-0" style="color: #bbb;">Welcome, to the Zakalc app. </h5><span style="color: #bbb;">1. First, please fill in the Currency form fields.</span></span></pre>

              <pre id="cmdline-rates"></pre>
              <div id="cmdline-savings" class="d-none">
                <strong>My Funds</strong><br>
                <table class="table table-sm table-borderless mb-0" style="color: #bbb;">
                  <tbody>
                    <tr class="savrow template d-none">
                      <td style="white-space: nowrap; width: 1%; padding-right: 20px;">Label</td>
                      <td>$XXXX</td>
                    </tr>
                    <tr class="savrow-subtable template d-none">
                      <td colspan="2">
                        <table class="table table-borderless m-0 p-0">
                          <tbody>
                            <tr class="savrow-subrow template d-none">
                              <td style="white-space: nowrap; width: 1%; padding-right: 20px;">Sub-label</td>
                              <td>$XXXX</td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <pre id="cmdline-result"></pre>
            </div>
          </div>
        </div>

      </div><!-- /.container -->
    </div>

    <!-- FOOTER -->
    <footer class="footer" style="height: 65px; border-top: 3px solid #b5882a;">
      <div class="container">
        <p class="float-right">
          <a href="#" id="backtotop" style="text-decoration:none;">
            <i class="fa fa-chevron-circle-up fa-lg text-warning"></i>
            <span class="position-relative mb-2 mx-1" style="top: -2px;">Back to top</span>
          </a>
        </p>
        <span class="text-muted">
          <span class="d-none d-sm-inline">Designed and developed by </span>
          <span class="d-inline d-sm-none">Developed by </span>
          <a href="https://www.lionbytes.net" target="_blank" rel="noreferrer">
            <img src="https://lionbytes.net/images/lionbytes.webp" alt="Lionbytes" title="Lionbytes"
              style="height: 21px; width: auto; margin: -2px -8px 0;"></a>.
        </span>
      </div>
    </footer>
  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="zakat.js"></script>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

</body>

</html>