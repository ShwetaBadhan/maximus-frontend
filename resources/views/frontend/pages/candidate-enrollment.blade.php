@extends('frontend.layouts.master')
@section('title', 'Candidate Enrollment')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Sora:wght@600;700;800&display=swap"
        rel="stylesheet">

    <style>
        .cr {
            --teal: #228230;
            --teal-d: #01274f;
            --deep: #062B28;
            --aqua: #5EEAD4;
            --mint: #EAFBF7;
            --ink: #0E2B28;
            --mute: #5F7A76;
            --line: #E2EEEB;
            --r: 14px
        }

        .cr,
        .cr *,
        .cr *::before,
        .cr *::after {
            box-sizing: border-box
        }

        .cr {
            font-family: 'DM Sans', system-ui, sans-serif;
            color: var(--ink);
            background: #fff;
            font-size: 15px
        }

        .cr h1,
        .cr h2,
        .cr h3,
        .cr h4,
        .cr h5,
        .cr .sora {
            font-family: 'Sora', sans-serif;
            letter-spacing: -.02em
        }

        .cr a {
            color: var(--teal-d);
            font-weight: 600
        }

        .cr .strength {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--mint);
            border-radius: 30px;
            padding: 5px 14px;
            color: var(--teal-d);
            font-weight: 600
        }

        .cr .strength b {
            font: 700 .95rem 'Sora';
            color: var(--deep)
        }

        .cr .stp {
            padding: 4px 0 16px
        }

        .cr .tl {
            display: flex;
            margin: 0;
            padding: 0;
            list-style: none
        }

        .cr .tl li {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            color: #8CA5A1;
            font-weight: 600;
            font-size: .88rem;
            white-space: nowrap
        }

        .cr .tl li:last-child {
            flex: none
        }

        .cr .tl li:not(:last-child)::after {
            content: "";
            flex: 1;
            height: 2px;
            margin: 0 14px;
            background: #DDEBE8;
            border-radius: 2px
        }

        .cr .tl li.done:not(:last-child)::after {
            background: var(--teal)
        }

        .cr .dot {
            width: 34px;
            height: 34px;
            flex: none;
            border-radius: 50%;
            border: 2px solid #D3E4E0;
            background: #fff;
            display: grid;
            place-items: center;
            font-size: .95rem
        }

        .cr .tl .ts {
            display: none
        }

        .cr .tl li.active {
            color: var(--deep);
            font-weight: 700
        }

        .cr .tl li.active .dot {
            background: var(--teal);
            border-color: var(--teal);
            color: #fff;
            box-shadow: 0 0 0 5px rgba(0, 192, 163, .18)
        }

        .cr .tl li.done {
            color: var(--deep);
            cursor: pointer
        }

        .cr .tl li.done .dot {
            background: var(--teal);
            border-color: var(--teal);
            color: #fff
        }

        .cr .pbar {
            height: 3px;
            background: #E6F2EF
        }

        .cr .pbar i {
            display: block;
            height: 100%;
            background: linear-gradient(90deg, #228230, #5EEAD4);
            transition: width .4s
        }

        .cr .main {
            padding: 0;
            max-width: 860px;
            width: 100%;
            margin: 0 auto
        }

        .cr .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 34px 0 22px;
            font-size: .88rem;
            color: var(--mute)
        }

        .cr .crumb {
            font-weight: 700;
            color: var(--teal-d);
            background: var(--mint);
            border-radius: 30px;
            padding: 5px 14px
        }

        .cr h3.title {
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 6px
        }

        .cr .sub {
            color: var(--mute);
            margin-bottom: 30px;
            max-width: 520px
        }

        .cr .grp {
            margin-bottom: 34px
        }

        .cr .grp>h6 {
            font: 700 .8rem 'DM Sans';
            color: var(--teal-d);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .cr .grp>h6::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--line)
        }

        .cr .form-floating>.form-control,
        .cr .form-floating>.form-select {
            border: 1.5px solid #D6E6E2;
            border-radius: var(--r);
            background-color: #fff;
            height: 58px;
            font-weight: 500
        }

        .cr .form-floating>label {
            color: var(--mute);
            font-size: .9rem
        }

        .cr .form-control:focus,
        .cr .form-select:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(0, 192, 163, .14)
        }

        .cr .form-control.is-invalid,
        .cr .form-select.is-invalid {
            border-color: #E5484D;
            background-image: none
        }

        .cr .invalid-feedback {
            font-size: .78rem;
            margin-top: 5px
        }

        .cr .invalid-feedback.show {
            display: block
        }

        .cr .hint {
            font-size: .77rem;
            color: var(--mute);
            margin: 5px 4px 0
        }

        .cr .vbtn {
            position: absolute;
            right: 10px;
            top: 10px;
            height: 38px;
            border: 0;
            border-radius: 10px;
            padding: 0 14px;
            font-weight: 700;
            font-size: .82rem;
            background: var(--mint);
            color: var(--teal-d);
            z-index: 5
        }

        .cr .vbtn:hover {
            background: #d4f6ef
        }

        .cr .vbtn.ok {
            background: var(--teal);
            color: #fff;
            pointer-events: none
        }

        .cr .pr {
            padding-right: 96px !important
        }

        .cr .otpbox {
            background: var(--mint);
            border-radius: 18px;
            padding: 20px;
            margin-top: 6px;
            display: flex;
            gap: 18px;
            align-items: center;
            flex-wrap: wrap
        }

        .cr .otpbox .cells {
            display: flex;
            gap: 8px
        }

        .cr .otpbox input {
            width: 46px;
            height: 52px;
            text-align: center;
            font: 700 1.2rem 'Sora';
            border: 1.5px solid #bfe8df;
            border-radius: 12px;
            background: #fff
        }

        .cr .otpbox input:focus {
            outline: 0;
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(0, 192, 163, .15)
        }

        .cr .btn {
            border-radius: 12px;
            font-weight: 700;
            padding: .75rem 1.6rem
        }

        .cr .btn-teal {
            background: var(--teal);
            color: #fff;
            border: 0;
            box-shadow: 0 8px 20px rgba(0, 192, 163, .35)
        }

        .cr .btn-teal:hover {
            background: var(--teal-d);
            color: #fff
        }

        .cr .btn-teal:disabled {
            background: var(--teal);
            color: #fff
        }

        .cr .btn-soft {
            background: #fff;
            border: 1.5px solid #D6E6E2;
            color: var(--ink)
        }

        .cr .btn-soft:hover {
            background: var(--mint);
            border-color: var(--teal)
        }

        .cr .btn-ghost {
            background: none;
            border: 0;
            color: var(--teal-d)
        }

        .cr .sm {
            padding: .45rem 1rem;
            font-size: .85rem
        }

        .cr .form-check-input:checked {
            background-color: var(--teal);
            border-color: var(--teal)
        }

        .cr .pick {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px
        }

        .cr .pick input {
            display: none
        }

        .cr .pick label {
            border: 1.5px solid #D6E6E2;
            border-radius: 18px;
            padding: 22px;
            cursor: pointer;
            display: block;
            transition: .15s;
            background: #fff
        }

        .cr .pick label i {
            font-size: 1.6rem;
            color: var(--teal);
            display: block;
            margin-bottom: 10px
        }

        .cr .pick label b {
            display: block;
            font: 700 1.05rem 'Sora'
        }

        .cr .pick label span {
            font-size: .82rem;
            color: var(--mute)
        }

        .cr .pick input:checked+label {
            border-color: var(--teal);
            background: var(--mint);
            box-shadow: 0 0 0 4px rgba(0, 192, 163, .14)
        }

        .cr .chips {
            display: flex;
            gap: 10px;
            flex-wrap: wrap
        }

        .cr .chips input {
            display: none
        }

        .cr .chips label {
            border: 1.5px solid #D6E6E2;
            border-radius: 30px;
            padding: .5rem 1.1rem;
            cursor: pointer;
            font-weight: 600;
            font-size: .88rem;
            background: #fff
        }

        .cr .chips label:hover {
            border-color: var(--teal)
        }

        .cr .chips input:checked+label {
            background: var(--teal);
            color: #fff;
            border-color: var(--teal)
        }

        .cr .edu {
            border: 1.5px solid var(--line);
            border-radius: 20px;
            padding: 22px;
            margin-bottom: 16px;
            background: #fff
        }

        .cr .edu .hd {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            font: 700 1rem 'Sora'
        }

        .cr .edu .hd span {
            color: var(--teal-d);
            font-size: .75rem;
            background: var(--mint);
            padding: 3px 10px;
            border-radius: 20px;
            margin-left: 8px;
            font-family: 'DM Sans'
        }

        .cr .add {
            width: 100%;
            border: 2px dashed #A9DDD3;
            border-radius: 18px;
            background: #F7FEFC;
            color: var(--teal-d);
            font-weight: 700;
            padding: 16px
        }

        .cr .add:hover {
            background: var(--mint)
        }

        .cr .tagbox {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            border: 1.5px solid #D6E6E2;
            border-radius: var(--r);
            padding: 10px;
            min-height: 56px;
            align-items: center
        }

        .cr .tagbox:focus-within {
            border-color: var(--teal);
            box-shadow: 0 0 0 4px rgba(0, 192, 163, .14)
        }

        .cr .tagbox input {
            border: 0;
            outline: 0;
            flex: 1;
            min-width: 150px;
            font-size: .92rem;
            padding: 4px
        }

        .cr .tag {
            background: var(--mint);
            color: #007768;
            border-radius: 30px;
            padding: 4px 6px 4px 13px;
            font-size: .84rem;
            font-weight: 600
        }

        .cr .tag button {
            border: 0;
            background: rgba(0, 0, 0, .07);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            line-height: 1;
            margin-left: 6px;
            color: inherit;
            font-size: .8rem
        }

        .cr .sugg {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 10px;
            align-items: center;
            font-size: .78rem;
            color: var(--mute)
        }

        .cr .sugg button {
            border: 1px solid #CBE7E1;
            background: #fff;
            border-radius: 30px;
            font-size: .8rem;
            padding: 3px 12px;
            color: var(--teal-d);
            font-weight: 600
        }

        .cr .sugg button:hover {
            background: var(--mint)
        }

        .cr .drop {
            border: 2px dashed #96D9CC;
            border-radius: 22px;
            padding: 38px 20px;
            text-align: center;
            background: linear-gradient(180deg, #F5FEFC, #fff);
            transition: .15s
        }

        .cr .drop.over {
            background: var(--mint);
            border-color: var(--teal)
        }

        .cr .drop .ico {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--teal);
            display: grid;
            place-items: center;
            font-size: 1.7rem;
            margin: 0 auto 12px
        }

        .cr .tiles {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px
        }

        .cr .tile {
            border: 1.5px solid var(--line);
            border-radius: 18px;
            padding: 18px
        }

        .cr .tile b {
            font: 700 .95rem 'Sora'
        }

        .cr .tile small {
            display: block;
            color: var(--mute);
            margin: 2px 0 12px
        }

        .cr .frow {
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 14px;
            padding: 12px 14px;
            background: var(--mint);
            margin-top: 12px
        }

        .cr .frow i.big {
            font-size: 1.5rem;
            color: var(--teal-d)
        }

        .cr .frow .n {
            font-weight: 700;
            font-size: .9rem;
            word-break: break-all
        }

        .cr .frow .s {
            font-size: .76rem;
            color: var(--teal-d)
        }

        .cr .pcard {
            border: 1.5px solid var(--line);
            border-radius: 24px;
            overflow: hidden;
            margin-bottom: 22px
        }

        .cr .pcard .ban {
            height: 92px;
            background: linear-gradient(120deg, #228230, #5EEAD4)
        }

        .cr .pcard .pb {
            padding: 0 26px 24px;
            margin-top: -38px
        }

        .cr .av {
            width: 78px;
            height: 78px;
            border-radius: 22px;
            background: var(--deep);
            color: var(--aqua);
            display: grid;
            place-items: center;
            font: 800 1.6rem 'Sora';
            border: 4px solid #fff
        }

        .cr .psec {
            padding: 22px 0;
            border-bottom: 1px solid var(--line)
        }

        .cr .psec .ph {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font: 700 1rem 'Sora'
        }

        .cr .psec .ph a {
            font: 600 .82rem 'DM Sans';
            text-decoration: none
        }

        .cr .psec dl {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 6px 14px;
            margin: 0;
            font-size: .9rem
        }

        .cr .psec dt {
            color: var(--mute);
            font-weight: 500
        }

        .cr .psec dd {
            margin: 0;
            font-weight: 600
        }

        .cr .bar-bottom {
            position: sticky;
            bottom: 0;
            z-index: 10;
            margin: 40px 0 0;
            padding: 16px 0;
            background: rgba(255, 255, 255, .96);
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap
        }

        .cr .ok-wrap {
            text-align: center;
            padding: 70px 0
        }

        .cr .ok-ring {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 26px;
            display: grid;
            place-items: center;
            background: var(--teal);
            color: #fff;
            font-size: 3.6rem;
            box-shadow: 0 0 0 12px rgba(0, 192, 163, .15), 0 0 0 28px rgba(0, 192, 163, .07)
        }

        .cr .rid {
            display: inline-block;
            font: 700 1rem ui-monospace, monospace;
            background: var(--mint);
            color: var(--deep);
            padding: 6px 14px;
            border-radius: 10px
        }

        .cr .nextc {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            text-align: left;
            margin-top: 34px
        }

        .cr .nextc a {
            border: 1.5px solid var(--line);
            border-radius: 18px;
            padding: 20px;
            text-decoration: none;
            color: var(--ink);
            display: block
        }

        .cr .nextc a:hover {
            border-color: var(--teal);
            background: var(--mint)
        }

        .cr .nextc i {
            font-size: 1.5rem;
            color: var(--teal)
        }

        .cr .nextc b {
            display: block;
            font: 700 1rem 'Sora';
            margin-top: 8px
        }

        .cr .nextc span {
            font-size: .83rem;
            color: var(--mute);
            font-weight: 400
        }

        @media(max-width:991px) {
            .cr .stepcard {
                padding: 14px 16px 0
            }

            .cr .pbar {
                margin: 0 -16px
            }

            .cr .stp {
                padding: 4px 0 12px
            }

            .cr .sc-login a {
                display: none
            }

            .cr .tl li:not(.active) .tt {
                display: none
            }

            .cr .tl li:not(:last-child)::after {
                margin: 0 8px
            }

            .cr .dot {
                width: 30px;
                height: 30px;
                font-size: .85rem
            }

            .cr .cr-wrap {
                padding: 16px 12px 40px
            }

            .cr .bar-bottom {
                margin: 26px 0 0;
                padding: 12px 0
            }

            .cr h3.title {
                font-size: 1.55rem
            }

            .cr .top {
                padding: 24px 0 16px
            }
        }

        @media(max-width:575px) {

            .cr .pick,
            .cr .tiles,
            .cr .nextc {
                grid-template-columns: 1fr
            }

            .cr .psec dl {
                grid-template-columns: 1fr
            }

            .cr .otpbox {
                padding: 14px
            }

            .cr .otpbox input {
                width: 38px;
                height: 46px
            }

            .cr .btn-ghost span {
                display: none
            }
        }

        @media(prefers-reduced-motion:reduce) {
            .cr * {
                transition: none !important
            }
        }

        .cr .cr-wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px 15px 48px
        }

        .cr .stepcard {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 16px 24px 0;
            overflow: hidden;
            margin-bottom: 6px;
            box-shadow: 0 6px 24px rgba(6, 43, 40, .05)
        }

        .cr .sc-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 14px;
            font-size: .88rem;
            color: var(--mute)
        }

        .cr .pbar {
            margin: 0 -24px
        }

        .cr .cr-toast {
            position: fixed;
            left: 50%;
            bottom: 24px;
            transform: translate(-50%, 20px);
            background: #0E2B28;
            color: #fff;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: .9rem;
            opacity: 0;
            pointer-events: none;
            transition: .25s;
            z-index: 9999;
            max-width: 90vw
        }

        .cr .cr-toast.show {
            opacity: 1;
            transform: translate(-50%, 0)
        }
    </style>

    <div class="cr" id="cr">
        <div class="cr-wrap">
            <div class="stepcard">
                <div class="sc-top"><span class="strength">Profile strength <b id="pct">0%</b></span><span
                        class="sc-login">Already registered? <a href="#" onclick="CR.resumeDraft();return false">Log in to
                            resume</a></span></div>
                <div class="stp">
                    <ol class="tl" id="tl"></ol>
                </div>
                <div class="pbar"><i id="bar" style="width:0"></i></div>
            </div>
            <div class="main">
                <div class="top" id="top"><span class="crumb" id="crumb"></span></div>

                <form id="form" novalidate>
                    <!-- STEP 1 -->
                    <section class="pane" data-s="0">
                        <h3 class="title">Create your account</h3>
                        <p class="sub">Use an email and mobile number you check often. Recruiters and job alerts will reach
                            you here.</p>
                        <div class="grp">
                            <h6>Your details</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating"><input class="form-control" name="name"
                                            placeholder="Full name" autocomplete="name"><label>Full name</label></div>
                                    <div class="invalid-feedback">Enter your full name (at least 3 characters).</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating position-relative"><input type="email" class="form-control pr"
                                            name="email" placeholder="Email" autocomplete="email"><label>Email
                                            address</label><button type="button" class="vbtn" id="vb-email"
                                            onclick="CR.sendOtp('email')">Verify</button></div>
                                    <div class="invalid-feedback" id="emailErr"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating position-relative"><input class="form-control pr"
                                            name="mobile" inputmode="numeric" maxlength="10" placeholder="Mobile"
                                            autocomplete="tel"><label>Mobile number (+91)</label><button type="button"
                                            class="vbtn" id="vb-mobile" onclick="CR.sendOtp('mobile')">Verify</button></div>
                                    <div class="invalid-feedback" id="mobileErr"></div>
                                </div>
                            </div>
                            <div class="otpbox d-none" id="otpBox">
                                <div><b class="sora" id="otpFor">Enter the 6-digit code</b>
                                    <div class="hint">Demo code: 123456</div>
                                </div>
                                <div class="cells" id="otpIn"></div><button type="button" class="btn btn-teal sm"
                                    onclick="CR.checkOtp()">Confirm</button>
                            </div>
                        </div>
                        <div class="grp">
                            <h6>Secure your account</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating"><input type="password" class="form-control" name="pw"
                                            placeholder="Password" autocomplete="new-password"><label>Password</label></div>
                                    <div class="invalid-feedback">Use 8+ characters with letters and numbers.</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating"><input type="password" class="form-control" name="pw2"
                                            placeholder="Confirm" autocomplete="new-password"><label>Confirm
                                            password</label></div>
                                    <div class="invalid-feedback">Passwords do not match.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" name="terms"
                                id="terms"><label class="form-check-label" for="terms">I agree to the <a href="#">Terms
                                    &amp; Conditions</a> and <a href="#">Privacy Policy</a>.</label>
                            <div class="invalid-feedback">Please accept to continue.</div>
                        </div>
                    </section>

                    <!-- STEP 2 -->
                    <section class="pane d-none" data-s="1">
                        <h3 class="title">Where are you in your career?</h3>
                        <p class="sub">We’ll tailor the next questions to your stage.</p>
                        <div class="grp">
                            <div class="pick">
                                <input type="radio" name="status" id="st-f" value="Fresher" checked><label for="st-f"><i
                                        class="bi bi-mortarboard"></i><b>Fresher</b><span>I’m starting my career or still
                                        studying</span></label>
                                <input type="radio" name="status" id="st-e" value="Experienced"><label for="st-e"><i
                                        class="bi bi-briefcase"></i><b>Experienced</b><span>I have professional work
                                        experience</span></label>
                            </div>
                        </div>
                        <div class="grp d-none" id="expFields">
                            <h6>Current job</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating"><input class="form-control" name="company"
                                            placeholder="Company"><label>Current company</label></div>
                                    <div class="invalid-feedback">Enter your current company.</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating"><input class="form-control" name="designation"
                                            placeholder="Role"><label>Current designation</label></div>
                                    <div class="invalid-feedback">Enter your designation.</div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-floating"><select class="form-select" name="expY">
                                            <option value=""></option>
                                        </select><label>Experience (yrs)</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-floating"><select class="form-select" name="expM">
                                            <option value=""></option>
                                        </select><label>Months</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-floating"><input type="number" min="0" step="0.1" class="form-control"
                                            name="ctc" placeholder="CTC"><label>Current CTC (LPA)</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-floating"><select class="form-select" name="notice">
                                            <option value=""></option>
                                            <option>Immediate</option>
                                            <option>15 days</option>
                                            <option>30 days</option>
                                            <option>60 days</option>
                                            <option>90 days</option>
                                        </select><label>Notice period</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="grp">
                            <h6>Job type you’re open to</h6>
                            <div class="chips" id="empType"></div>
                        </div>
                    </section>

                    <!-- STEP 3 -->
                    <section class="pane d-none" data-s="2">
                        <h3 class="title">Your education</h3>
                        <p class="sub">Start with your highest qualification. Add more if you like.</p>
                        <div id="eduList"></div><button type="button" class="add" onclick="CR.addEdu()"><i
                                class="bi bi-plus-circle me-1"></i>Add another education</button>
                    </section>

                    <!-- STEP 4 -->
                    <section class="pane d-none" data-s="3">
                        <h3 class="title">Skills &amp; what you want next</h3>
                        <p class="sub">The more specific you are, the better your job matches.</p>
                        <div class="grp">
                            <h6>Key skills</h6>
                            <div class="tagbox" data-tags="skills"><input placeholder="Type a skill and press Enter"></div>
                            <div class="sugg" id="skSug"></div>
                            <div class="invalid-feedback" id="skillsErr"></div>
                        </div>
                        <div class="grp">
                            <h6>Job preferences</h6>
                            <div class="row g-3">
                                <div class="col-md-6"><label class="hint mb-1 d-block">Preferred job roles</label>
                                    <div class="tagbox" data-tags="roles"><input placeholder="e.g. Backend Developer"></div>
                                </div>
                                <div class="col-md-6"><label class="hint mb-1 d-block">Preferred industries</label>
                                    <div class="tagbox" data-tags="inds"><input placeholder="e.g. Fintech"></div>
                                </div>
                                <div class="col-md-6"><label class="hint mb-1 d-block">Preferred locations</label>
                                    <div class="tagbox" data-tags="locs"><input placeholder="e.g. Chandigarh"></div>
                                </div>
                                <div class="col-md-6"><label class="hint mb-1 d-block">&nbsp;</label>
                                    <div class="form-floating"><input type="number" min="0" step="0.1" class="form-control"
                                            name="exp" placeholder="Expected"><label>Expected salary (LPA)</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="grp">
                            <h6>Work mode</h6>
                            <div class="chips" id="mode"></div>
                        </div>
                        <div class="grp">
                            <h6>About you</h6>
                            <div class="form-floating"><textarea class="form-control" style="height:130px" maxlength="400"
                                    name="summary" placeholder="Summary"></textarea><label>Professional summary</label>
                            </div>
                            <div class="hint"><span id="cc">0</span>/400 characters</div>
                        </div>
                    </section>

                    <!-- STEP 5 -->
                    <section class="pane d-none" data-s="4">
                        <h3 class="title">Add your resume</h3>
                        <p class="sub">Candidates with a resume are shortlisted far more often.</p>
                        <div class="grp">
                            <div class="drop" id="drop">
                                <div class="ico"><i class="bi bi-cloud-arrow-up"></i></div><b class="sora">Drag &amp; drop
                                    your resume here</b>
                                <div class="hint mb-3">PDF, DOC or DOCX · up to 5 MB</div><button type="button"
                                    class="btn btn-teal sm" onclick="CR.pick('resume')">Browse files</button>
                            </div>
                            <div id="f-resume"></div>
                            <div class="invalid-feedback" id="resumeErr"></div>
                        </div>
                        <div class="grp">
                            <h6>Optional extras</h6>
                            <div class="tiles">
                                <div class="tile"><b><i class="bi bi-person-circle me-1"></i>Profile photo</b><small>JPG or
                                        PNG · up to 2 MB</small><button type="button" class="btn btn-soft sm"
                                        onclick="CR.pick('photo')">Choose image</button>
                                    <div id="f-photo"></div>
                                </div>
                                <div class="tile"><b><i class="bi bi-award me-1"></i>Certificates</b><small>PDF, JPG or PNG
                                        · up to 5 MB</small><button type="button" class="btn btn-soft sm"
                                        onclick="CR.pick('cert')">Choose file</button>
                                    <div id="f-cert"></div>
                                </div>
                            </div>
                        </div>
                        <input type="file" hidden data-up="resume" accept=".pdf,.doc,.docx"><input type="file" hidden
                            data-up="photo" accept="image/png,image/jpeg"><input type="file" hidden data-up="cert"
                            accept=".pdf,.png,.jpg,.jpeg">
                    </section>

                    <!-- STEP 6 -->
                    <section class="pane d-none" data-s="5">
                        <h3 class="title">Review &amp; submit</h3>
                        <p class="sub">This is how recruiters will see you. Edit anything before you submit.</p>
                        <div id="preview"></div>
                    </section>

                    <div class="bar-bottom" id="actions">
                        <button type="button" class="btn btn-soft" id="prev"><i
                                class="bi bi-arrow-left me-1"></i>Previous</button>
                        <div class="d-flex gap-2 align-items-center"><button type="button" class="btn btn-ghost"
                                onclick="CR.saveDraft(true)"><i class="bi bi-bookmark me-1"></i><span>Save &amp; continue
                                    later</span></button><button type="submit" class="btn btn-teal"
                                id="next">Continue</button></div>
                    </div>
                </form>

                <section class="ok-wrap d-none" id="success">
                    <div class="ok-ring"><i class="bi bi-check-lg"></i></div>
                    <h2 class="fw-bold">You’re in, <span id="sName"></span>!</h2>
                    <p class="text-secondary mb-4">Your profile is live and visible to recruiters.</p>
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <div>
                            <div class="hint mb-1">Registration ID</div><span class="rid" id="rid"></span>
                        </div>
                        <div>
                            <div class="hint mb-1">Profile completion</div><span class="rid" id="sPct"></span>
                        </div>
                    </div>
                    <div class="nextc"><a href="{{ route('home') }}"><i class="bi bi-speedometer2"></i><b>Go to dashboard</b><span>Track
                                applications and recruiter views.</span></a><a href="{{ route('jobs-list') }}"><i
                                class="bi bi-search-heart"></i><b>Explore jobs</b><span>See roles that match your
                                skills.</span></a></div>
                    <p class="hint mt-4">Tip: add projects and a headline to reach 100%.</p>
                </section>
            </div>
        </div>
        <div class="cr-toast" id="toast" role="status" aria-live="polite"></div>
    </div>

    <script>
        (function () {
            'use strict';
            const STEPS = [["bi-person", "Account", "Email, mobile, password", "Let’s set up your account", "It takes about five minutes and unlocks thousands of openings."], ["bi-briefcase", "Professional", "Experience and salary", "Tell us about your work", "Fresher or experienced, we’ll show the right questions."], ["bi-mortarboard", "Education", "Degrees and scores", "What have you studied?", "Employers filter by qualification, so keep this accurate."], ["bi-stars", "Skills & goals", "Preferences", "What are you great at?", "Skills drive 70% of recruiter searches."], ["bi-file-earmark-text", "Resume", "Documents", "Show your best work", "A resume makes your profile far easier to shortlist."], ["bi-clipboard-check", "Review", "Preview and submit", "One last look", "Check the details, then submit your profile."]];
            const R = document.getElementById('cr');
            const $ = (s, r = R) => r.querySelector(s), $$ = (s, r = R) => [...r.querySelectorAll(s)];
            const D = { tags: { skills: [], roles: [], inds: [], locs: [] }, edu: [], files: {}, ver: { email: false, mobile: false }, f: {} };
            let cur = 0, otpKind = null;
            const esc = s => String(s ?? '').replace(/[&<>"]/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[c]));
            let tt, ready = false; function toast(m) { const t = $('#toast'); t.textContent = m; t.classList.add('show'); clearTimeout(tt); tt = setTimeout(() => t.classList.remove('show'), 2600) }
            function toTop(smooth) { if (ready) R.scrollIntoView({ behavior: smooth ? 'smooth' : 'auto', block: 'start' }) }
            function delFile(k) { delete D.files[k]; drawFile(k); paint() }

            /* rail */
            function drawRail() { $('#tl').innerHTML = STEPS.map((s, i) => `<li class="${i == cur ? 'active' : i < cur ? 'done' : ''}" ${i < cur ? `onclick="CR.go(${i})"` : ''}><span class="dot"><i class="bi ${i < cur ? 'bi-check-lg' : s[0]}"></i></span><span><div class="tt">${s[1]}</div><div class="ts">${s[2]}</div></span></li>`).join(''); const c = Math.min(cur, 5); $('#crumb').textContent = `Step ${c + 1} of 6 · ${STEPS[c][1]}` }
            function pct() { const f = D.f; let n = 0; if (f.name) n++; if (D.ver.email) n++; if (D.ver.mobile) n++; if (f.status) n++; if (D.edu[0] && D.edu[0].qual) n++; if (D.tags.skills.length) n++; if (D.tags.roles.length || D.tags.locs.length) n++; if (f.summary) n++; if (D.files.resume) n += 2; return Math.round(n * 10) }
            function paint() { syncF(); const p = pct(); $('#pct').textContent = p + '%'; $('#bar').style.width = p + '%'; drawRail() }
            function go(i) { syncF(); cur = i; $$('.pane').forEach(p => p.classList.toggle('d-none', +p.dataset.s != i)); $('#prev').style.visibility = i ? 'visible' : 'hidden'; $('#next').innerHTML = i == 5 ? 'Submit &amp; register <i class="bi bi-check2 ms-1"></i>' : 'Continue <i class="bi bi-arrow-right ms-1"></i>'; if (i == 5) preview(); paint(); toTop(true); saveDraft() }
            function syncF() { $$('#form [name]').forEach(e => { if (e.name.startsWith('edu_')) return; if (e.type == 'radio') { if (e.checked) D.f[e.name] = e.value } else if (e.type == 'checkbox') { if (e.name != 'etype') D.f[e.name] = e.checked } else D.f[e.name] = e.value }); D.f.etype = $$('[name=etype]:checked').map(x => x.value).join(', '); D.f.mode = ($('[name=mode]:checked') || {}).value || '' }

            /* validation */
            function fb(el) { return (el.closest('[class*=col],.form-check') || el.parentElement).querySelector('.invalid-feedback') }
            function bad(el, msg) { el.classList.add('is-invalid'); const n = fb(el); if (n) { if (msg) n.textContent = msg; n.classList.add('show') } return false }
            function clear(el) { el.classList.remove('is-invalid'); const n = el.closest && fb(el); if (n && !n.id) n.classList.remove('show') }
            function validate(i) {
                syncF(); let ok = true; const pane = $(`.pane[data-s="${i}"]`); $$('.is-invalid', pane).forEach(clear); $$('.invalid-feedback', pane).forEach(n => n.classList.remove('show'));
                const err = (id, m) => { const n = $(id); n.textContent = m; n.classList.add('show'); ok = false }; const f = D.f;
                if (i == 0) {
                    if (!f.name || f.name.trim().length < 3) ok = bad($('[name=name]'));
                    if (!/^\S+@\S+\.\S+$/.test(f.email || '')) err('#emailErr', 'Enter a valid email address.'); else if (!D.ver.email) err('#emailErr', 'Verify your email with the OTP.');
                    if (!/^[6-9]\d{9}$/.test(f.mobile || '')) err('#mobileErr', 'Enter a valid 10-digit mobile number.'); else if (!D.ver.mobile) err('#mobileErr', 'Verify your mobile number with the OTP.');
                    if (!f.pw || f.pw.length < 8 || !/\d/.test(f.pw) || !/[a-z]/i.test(f.pw)) ok = bad($('[name=pw]'));
                    if (!f.pw2 || f.pw !== f.pw2) ok = bad($('[name=pw2]'));
                    if (!f.terms) ok = bad($('#terms'));
                }
                if (i == 1 && f.status == 'Experienced') { if (!f.company) ok = bad($('[name=company]')); if (!f.designation) ok = bad($('[name=designation]')) }
                if (i == 2) { readEdu(); $$('.edu').forEach(c => ['qual', 'course', 'inst', 'year', 'mark'].forEach(n => { const e = $(`[name=edu_${n}]`, c); if (!e.value) { ok = false; e.classList.add('is-invalid') } })) }
                if (i == 3 && !D.tags.skills.length) err('#skillsErr', 'Add at least one skill.');
                if (i == 4 && !D.files.resume) err('#resumeErr', 'Please upload your resume to continue.');
                if (!ok) toast('Please fix the highlighted fields.'); return ok
            }
            $('#form').addEventListener('input', e => { const t = e.target; clear(t); if (t.name == 'summary') $('#cc').textContent = t.value.length; if (t.name == 'mobile') t.value = t.value.replace(/\D/g, ''); if (['email', 'mobile'].includes(t.name) && D.ver[t.name]) { D.ver[t.name] = false; const b = $('#vb-' + t.name); b.classList.remove('ok'); b.textContent = 'Verify' } if (t.name == 'email' || t.name == 'mobile') { $('#' + t.name + 'Err').classList.remove('show') } paint() });
            $('#form').addEventListener('submit', e => { e.preventDefault(); if (!validate(cur)) return; if (cur < 5) go(cur + 1); else submit() });
            $('#prev').onclick = () => go(cur - 1);

            /* OTP */
            $('#otpIn').innerHTML = [...Array(6)].map((_, i) => `<input maxlength="1" inputmode="numeric" aria-label="Digit ${i + 1}">`).join('');
            $$('#otpIn input').forEach((el, i, a) => { el.addEventListener('input', () => { el.value = el.value.replace(/\D/g, ''); if (el.value && a[i + 1]) a[i + 1].focus() }); el.addEventListener('keydown', e => { if (e.key == 'Backspace' && !el.value && a[i - 1]) a[i - 1].focus() }) });
            function sendOtp(k) {
                syncF(); const v = D.f[k]; if (k == 'email' && !/^\S+@\S+\.\S+$/.test(v || '')) return bad($('[name=email]'), 'Enter a valid email first.') && 0 || ($('#emailErr').textContent = 'Enter a valid email first.', $('#emailErr').classList.add('show'));
                if (k == 'mobile' && !/^[6-9]\d{9}$/.test(v || '')) return $('#mobileErr').textContent = 'Enter a valid mobile number first.', $('#mobileErr').classList.add('show');
                $('#' + k + 'Err').classList.remove('show'); otpKind = k; $('#otpFor').textContent = 'Code sent to ' + v; $('#otpBox').classList.remove('d-none'); $$('#otpIn input').forEach(i => i.value = ''); $('#otpIn input').focus(); toast('OTP sent to ' + v)
            }
            function checkOtp() { if ($$('#otpIn input').map(i => i.value).join('') !== '123456') return toast('Incorrect OTP. Try again.'); D.ver[otpKind] = true; const b = $('#vb-' + otpKind); b.classList.add('ok'); b.innerHTML = '<i class="bi bi-check2"></i> Verified'; $('#otpBox').classList.add('d-none'); toast(otpKind[0].toUpperCase() + otpKind.slice(1) + ' verified'); paint() }

            /* step 2 */
            $('[name=expY]').innerHTML += [...Array(31)].map((_, i) => `<option>${i}</option>`).join(''); $('[name=expM]').innerHTML += [...Array(12)].map((_, i) => `<option>${i}</option>`).join('');
            const chips = (id, name, arr, multi) => $(id).innerHTML = arr.map((a, i) => `<input type="${multi ? 'checkbox' : 'radio'}" name="${name}" id="${name}${i}" value="${a}" ${i == 0 && !multi ? 'checked' : ''}><label for="${name}${i}">${a}</label>`).join('');
            chips('#empType', 'etype', ['Full-time', 'Part-time', 'Contract', 'Internship'], true); chips('#mode', 'mode', ['On-site', 'Remote', 'Hybrid']);
            $$('[name=status]').forEach(r => r.onchange = () => { $('#expFields').classList.toggle('d-none', $('[name=status]:checked').value == 'Fresher'); paint() });

            /* education */
            const opt = a => a.map(x => `<option>${x}</option>`).join('');
            function addEdu(d = {}) {
                const k = $$('.edu').length, y = new Date().getFullYear(), c = document.createElement('div'); c.className = 'edu';
                const fl = (n, l, col, t = 'text', ph = ' ') => `<div class="${col}"><div class="form-floating"><input type="${t}" class="form-control" name="edu_${n}" placeholder="${l}" ${t == 'number' ? 'step="0.01" min="0" max="100"' : ''}><label>${l}</label></div></div>`;
                const sl = (n, l, col, o) => `<div class="${col}"><div class="form-floating"><select class="form-select" name="edu_${n}"><option value=""></option>${opt(o)}</select><label>${l}</label></div></div>`;
                c.innerHTML = `<div class="hd"><div>Education ${k + 1}${k ? '' : '<span>Highest</span>'}</div>${k ? '<button type="button" class="btn btn-sm text-danger p-0" onclick="this.closest(\'.edu\').remove();CR.paint()"><i class="bi bi-trash"></i> Remove</button>' : ''}</div><div class="row g-3">${sl('qual', 'Highest qualification', 'col-md-6', ['Doctorate', 'Post graduate', 'Graduate', 'Diploma', '12th', '10th'])}${fl('course', 'Course / degree', 'col-md-6')}${fl('spec', 'Specialization', 'col-md-6')}${fl('inst', 'University / institution', 'col-md-6')}${sl('year', 'Passing year', 'col-md-4', [...Array(40)].map((_, i) => y + 4 - i))}${sl('grade', 'Grading system', 'col-md-4', ['Percentage', 'CGPA (10)'])}${fl('mark', 'Marks / CGPA', 'col-md-4', 'number')}</div>`;
                $('#eduList').append(c); Object.entries(d).forEach(([n, v]) => { const e = $(`[name=edu_${n}]`, c); if (e) e.value = v })
            }
            function readEdu() { D.edu = $$('.edu').map(c => { const o = {}; $$('[name]', c).forEach(e => o[e.name.slice(4)] = e.value); return o }) }

            /* tags */
            const SK = ['JavaScript', 'React', 'Python', 'SQL', 'Java', 'Node.js', 'Excel', 'Communication', 'Data Analysis', 'Project Management'];
            function drawTags(n) { const b = $(`[data-tags=${n}]`); $$('.tag', b).forEach(t => t.remove()); D.tags[n].forEach((t, i) => { const s = document.createElement('span'); s.className = 'tag'; s.innerHTML = `${esc(t)}<button type="button" aria-label="Remove ${esc(t)}">×</button>`; s.querySelector('button').onclick = () => { D.tags[n].splice(i, 1); drawTags(n); paint() }; b.insertBefore(s, $('input', b)) }); if (n == 'skills') { const r = SK.filter(s => !D.tags.skills.includes(s)).slice(0, 7); $('#skSug').innerHTML = r.length ? 'Popular: ' + r.map(s => `<button type="button" onclick="CR.addTag('skills','${s}')">+ ${s}</button>`).join('') : '' } }
            function addTag(n, v) { v = v.trim(); if (v && !D.tags[n].some(x => x.toLowerCase() == v.toLowerCase())) { D.tags[n].push(v); if (n == 'skills') $('#skillsErr').classList.remove('show'); drawTags(n); paint() } }
            $$('[data-tags]').forEach(b => { const n = b.dataset.tags, i = $('input', b); i.onkeydown = e => { if (e.key == 'Enter' || e.key == ',') { e.preventDefault(); addTag(n, i.value); i.value = '' } else if (e.key == 'Backspace' && !i.value) { D.tags[n].pop(); drawTags(n); paint() } }; i.onblur = () => { if (i.value) { addTag(n, i.value); i.value = '' } }; drawTags(n) });

            /* uploads */
            const RULES = { resume: [/\.(pdf|docx?)$/i, 5], photo: [/\.(jpe?g|png)$/i, 2], cert: [/\.(pdf|jpe?g|png)$/i, 5] };
            function pick(k) { $(`[data-up=${k}]`).click() }
            function up(k, f) { if (!f) return; const [r, mb] = RULES[k]; if (!r.test(f.name)) return toast('Unsupported file type.'); if (f.size > mb * 1048576) return toast(`File too large. Max ${mb} MB.`); D.files[k] = { name: f.name, size: f.size }; if (k == 'resume') $('#resumeErr').classList.remove('show'); drawFile(k); paint(); toast('Upload complete') }
            $$('[data-up]').forEach(i => i.onchange = () => { up(i.dataset.up, i.files[0]); i.value = '' });
            const dz = $('#drop');['dragover', 'dragenter'].forEach(ev => dz.addEventListener(ev, e => { e.preventDefault(); dz.classList.add('over') }));['dragleave', 'drop'].forEach(ev => dz.addEventListener(ev, e => { e.preventDefault(); dz.classList.remove('over') })); dz.addEventListener('drop', e => up('resume', e.dataTransfer.files[0]));
            function drawFile(k) { const f = D.files[k], h = $('#f-' + k); if (!f) return h.innerHTML = ''; h.innerHTML = `<div class="frow"><i class="bi bi-file-earmark-check-fill big"></i><div class="flex-grow-1"><div class="n">${esc(f.name)}</div><div class="s">Uploaded · ${(f.size / 1024).toFixed(0)} KB</div></div><button type="button" class="btn btn-soft sm" onclick="CR.pick('${k}')">Replace</button><button type="button" class="btn btn-sm text-danger" onclick="CR.delFile('${k}')" aria-label="Remove"><i class="bi bi-trash"></i></button></div>` }

            /* preview */
            function preview() {
                readEdu(); const f = D.f, exp = f.status == 'Experienced';
                const ini = (f.name || '?').split(' ').map(w => w[0]).slice(0, 2).join('').toUpperCase();
                const sec = (t, s, b) => `<div class="psec"><div class="ph">${t}<a href="#" onclick="CR.go(${s});return false"><i class="bi bi-pencil me-1"></i>Edit</a></div>${b}</div>`;
                const dl = o => '<dl>' + Object.entries(o).map(([k, v]) => `<dt>${k}</dt><dd>${esc(v) || '—'}</dd>`).join('') + '</dl>';
                const tg = a => a.length ? a.map(t => `<span class="tag me-1 d-inline-block mb-1" style="padding:4px 13px">${esc(t)}</span>`).join('') : '—';
                $('#preview').innerHTML = `<div class="pcard"><div class="ban"></div><div class="pb"><div class="av">${esc(ini)}</div><h4 class="fw-bold mt-3 mb-1">${esc(f.name)}</h4><div class="text-secondary">${exp ? esc(f.designation) + ' at ' + esc(f.company) : 'Fresher · ' + esc(D.edu[0]?.course || 'Student')}</div><div class="d-flex flex-wrap gap-3 mt-3 small"><span><i class="bi bi-envelope me-1 text-success"></i>${esc(f.email)}</span><span><i class="bi bi-telephone me-1 text-success"></i>+91 ${esc(f.mobile)}</span></div></div></div>` +
                    sec('Personal information', 0, dl({ Name: f.name, Email: f.email + (D.ver.email ? ' ✓ verified' : ''), Mobile: '+91 ' + f.mobile + (D.ver.mobile ? ' ✓ verified' : '') })) +
                    sec('Professional summary', 3, `<p class="mb-0">${esc(f.summary) || 'No summary added yet.'}</p>`) +
                    sec('Employment history', 1, exp ? dl({ Status: 'Experienced', Experience: (f.expY || '0') + ' yrs ' + (f.expM || '0') + ' mo', Company: f.company, Designation: f.designation, 'Current CTC': f.ctc ? '₹ ' + f.ctc + ' LPA' : '', 'Notice period': f.notice, 'Job type': f.etype }) : dl({ Status: 'Fresher', 'Job type': f.etype || 'Full-time' })) +
                    sec('Education', 2, D.edu.map(e => `<div class="mb-2"><b>${esc(e.course)}</b>${e.spec ? ' in ' + esc(e.spec) : ''}<div class="small text-secondary">${esc(e.inst)} · ${esc(e.qual)} · ${esc(e.year)} · ${esc(e.mark)} ${e.grade == 'Percentage' ? '%' : 'CGPA'}</div></div>`).join('')) +
                    sec('Skills', 3, tg(D.tags.skills)) +
                    sec('Career preferences', 3, dl({ Roles: D.tags.roles.join(', '), Industries: D.tags.inds.join(', '), Locations: D.tags.locs.join(', '), 'Expected salary': f.exp ? '₹ ' + f.exp + ' LPA' : '', 'Work mode': f.mode })) +
                    sec('Resume details', 4, dl({ Resume: D.files.resume?.name, Photo: D.files.photo?.name, Certificate: D.files.cert?.name }))
            }

            /* draft + submit */
            function saveDraft(manual) { syncF(); readEdu(); try { localStorage.setItem('ht_draft', JSON.stringify({ ...D, f: { ...D.f, pw: '', pw2: '' }, cur })) } catch (e) { } if (manual) toast('Progress saved. Log in anytime to resume.') }
            function resumeDraft() {
                try {
                    const x = JSON.parse(localStorage.getItem('ht_draft')); if (!x) return toast('No saved progress found.'); Object.assign(D, x); Object.entries(D.f).forEach(([n, v]) => { $$(`#form [name="${n}"]`).forEach(e => { if (n == 'etype' || n == 'mode') return; if (e.type == 'radio') e.checked = e.value == v; else if (e.type == 'checkbox') e.checked = !!v; else e.value = v }) });
                    (D.f.etype || '').split(', ').forEach(v => { const e = $(`[name=etype][value="${v}"]`); if (e) e.checked = true }); const m = $(`[name=mode][value="${D.f.mode}"]`); if (m) m.checked = true;
                    $('#expFields').classList.toggle('d-none', D.f.status != 'Experienced'); $('#eduList').innerHTML = ''; (D.edu.length ? D.edu : [{}]).forEach(addEdu); Object.keys(D.tags).forEach(drawTags);['resume', 'photo', 'cert'].forEach(drawFile);
                    ['email', 'mobile'].forEach(k => { if (D.ver[k]) { const b = $('#vb-' + k); b.classList.add('ok'); b.innerHTML = '<i class="bi bi-check2"></i> Verified' } }); toast('Welcome back! Re-enter your password to continue.'); go(Math.min(x.cur || 0, 5))
                } catch (e) { toast('Could not restore progress.') }
            }
            function submit() { const b = $('#next'); b.disabled = true; b.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating profile'; setTimeout(() => { $('#form').classList.add('d-none'); $('#top').classList.add('d-none'); $('#success').classList.remove('d-none'); $('#sName').textContent = D.f.name.split(' ')[0]; $('#rid').textContent = 'HT-' + new Date().getFullYear() + '-' + Math.floor(100000 + Math.random() * 900000); const p = Math.max(pct(), 80); $('#sPct').textContent = p + '%'; $('#pct').textContent = p + '%'; $('#bar').style.width = p + '%'; cur = 6; $('#tl').innerHTML = STEPS.map(s => `<li class="done"><span class="dot"><i class="bi bi-check-lg"></i></span><span><div class="tt">${s[1]}</div><div class="ts">Completed</div></span></li>`).join(''); try { localStorage.removeItem('ht_draft') } catch (e) { } toTop(false) }, 900) }
            addEdu(); go(0); ready = true;
            window.CR = { paint, sendOtp, checkOtp, go, addEdu, pick, addTag, saveDraft, resumeDraft, delFile };
        })();
    </script>
@endsection