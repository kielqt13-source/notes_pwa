<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sign Up - Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Crimson+Pro:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --paper:         #F5F0E4;
            --paper-deep:    #EBE4D0;
            --ink:           #1A1712;
            --ink-faded:     #524D3E;
            --ink-muted:     #9B9282;
            --margin-line:   rgba(210, 50, 50, 0.55);
            --rule-line:     rgba(180, 165, 130, 0.45);
            --accent:        #1B3FBD;
            --accent-dark:   #122B8A;
            --accent-glow:   rgba(27,63,189,0.13);
            --border:        #C8BAA0;
            --shadow-page:   rgba(60,50,20,0.18);
            --shadow-lift:   rgba(60,50,20,0.25);
            --hole:          #D5C8AD;

            /* Fluid spacing tokens */
            --page-pad-left: clamp(52px, 14vw, 72px);
            --page-pad-x:    clamp(18px, 6vw, 36px);
            --page-pad-y:    clamp(20px, 5vw, 28px);
            --margin-left:   clamp(40px, 11vw, 58px);
        }

        * { margin:0; padding:0; box-sizing:border-box; -webkit-tap-highlight-color:transparent; }

        html { height: 100%; }

        body {
            font-family: 'Crimson Pro', serif;
            min-height: 100%;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(16px, 5vw, 28px) clamp(12px, 4vw, 16px) clamp(24px, 6vw, 40px);
            overflow-x: hidden;
            position: relative;

            background-color: #E8DFC8;
            background-image:
                radial-gradient(circle at 1px 1px, rgba(140,120,80,0.2) 1px, transparent 0);
            background-size: 28px 28px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 50% at 20% 15%, rgba(255,255,240,0.45) 0%, transparent 70%),
                radial-gradient(ellipse 50% 60% at 80% 85%, rgba(210,190,140,0.3) 0%, transparent 70%);
            pointer-events: none;
        }

        /* ── Notebook Card ── */
        .notebook {
            position: relative;
            width: 100%;
            max-width: 430px;
            z-index: 1;
            animation: pageOpen 0.55s cubic-bezier(0.34,1.56,0.64,1) both;
        }

        @keyframes pageOpen {
            from { opacity:0; transform: translateY(24px) rotateX(4deg); }
            to   { opacity:1; transform: translateY(0) rotateX(0); }
        }

        /* Spiral holes strip across top */
        .spiral-strip {
            background: var(--paper-deep);
            border-radius: 12px 12px 0 0;
            border: 1px solid var(--border);
            border-bottom: none;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(10px, 4vw, 20px);
            padding: 0 10px;
            position: relative;
            overflow: hidden;
        }

        .hole {
            width: clamp(14px, 4vw, 18px);
            height: clamp(14px, 4vw, 18px);
            border-radius: 50%;
            background: #E8DFC8;
            border: 1.5px solid var(--hole);
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.15), 0 1px 2px rgba(255,255,255,0.5);
            flex-shrink: 0;
        }

        /* Main page */
        .page {
            background: var(--paper);
            border: 1px solid var(--border);
            border-top: none;
            border-radius: 0 0 6px 6px;
            padding: var(--page-pad-y) var(--page-pad-x) clamp(28px, 7vw, 36px) var(--page-pad-left);
            position: relative;
            overflow: hidden;

            background-image: none;
            background-size: 100% 32px, var(--margin-left) 100%, 100% 100%;
            background-position: 0 36px, 0 0, 0 0;

            box-shadow:
                3px 4px 0 0 var(--border),
                6px 8px 0 0 rgba(180,165,130,0.3),
                0 20px 60px var(--shadow-page);
        }

        .page::before {
            content: '';
            position: absolute;
            bottom: -5px; right: -5px;
            width: calc(100% - 4px);
            height: calc(100% - 8px);
            background: var(--paper-deep);
            border: 1px solid var(--border);
            border-radius: 0 0 6px 6px;
            z-index: -1;
        }

        .margin-tab {
            position: absolute;
            top: 0; left: var(--margin-left);
            width: 1px;
            height: 100%;
            background: var(--margin-line);
        }

        /* ── Logo / Heading ── */
        .logo {
            text-align: center;
            margin-bottom: 6px;
            padding-top: 4px;
            animation: inkDrop 0.7s ease-out 0.15s both;
        }

        @keyframes inkDrop {
            from { opacity:0; transform: translateY(-8px); }
            to   { opacity:1; transform: translateY(0); }
        }

        .logo h1 {
            font-family: 'Caveat', cursive;
            font-size: clamp(36px, 11vw, 48px);
            font-weight: 700;
            letter-spacing: 4px;
            color: var(--ink);
            line-height: 1;
        }

        .logo-underline {
            height: 2px;
            background: var(--ink);
            width: 60px;
            margin: 2px auto 2px;
            border-radius: 2px;
            opacity: 0.75;
        }

        .logo p {
            font-family: 'Caveat', cursive;
            font-size: clamp(12px, 3.5vw, 14px);
            color: var(--ink-muted);
            letter-spacing: 2px;
            font-weight: 400;
        }

        /* ── Welcome ── */
        .welcome-text {
            margin-bottom: clamp(18px, 5vw, 24px);
            animation: inkDrop 0.7s ease-out 0.35s both;
        }

        .welcome-text h2 {
            font-family: 'Caveat', cursive;
            font-size: clamp(22px, 6.5vw, 26px);
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 2px;
        }

        .welcome-text p {
            font-family: 'Crimson Pro', serif;
            font-size: clamp(13px, 3.8vw, 14px);
            font-style: italic;
            color: var(--ink-faded);
        }

        /* ── Error ── */
        .error-message {
            background: rgba(210,50,50,0.08);
            border-left: 3px solid rgba(210,50,50,0.7);
            color: #8B1A1A;
            padding: 10px 14px;
            border-radius: 0 4px 4px 0;
            margin-bottom: 20px;
            font-family: 'Crimson Pro', serif;
            font-size: clamp(14px, 4vw, 15px);
            animation: inkDrop 0.5s ease-out both;
        }

        .text-danger {
            font-family: 'Crimson Pro', serif;
            font-size: clamp(12px, 3.5vw, 13px);
            color: #8B1A1A;
            font-style: italic;
            display: block;
            margin-top: 4px;
        }

        /* ── Form ── */
        .form-group {
            margin-bottom: clamp(22px, 6vw, 26px);
            animation: inkDrop 0.7s ease-out 0.45s both;
        }

        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-family: 'Caveat', cursive;
            font-size: clamp(14px, 4vw, 15px);
            font-weight: 600;
            color: var(--ink-faded);
            letter-spacing: 0.5px;
        }

        .input-wrapper { position: relative; }

        .input-wrapper input {
            width: 100%;
            padding: clamp(8px, 2.5vw, 6px) 2px;
            padding-right: 52px;
            background: transparent;
            border: none;
            border-bottom: 2px solid var(--ink-muted);
            border-radius: 0;
            font-family: 'Caveat', cursive;
            font-size: max(16px, clamp(16px, 5vw, 19px));
            font-weight: 500;
            color: var(--ink);
            outline: none;
            transition: border-color 0.25s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        .input-wrapper input::placeholder {
            color: var(--ink-muted);
            opacity: 0.6;
            font-style: italic;
        }

        .input-wrapper input:focus {
            border-bottom-color: var(--accent);
        }

        .input-wrapper::after {
            content: '';
            display: block;
            height: 2px;
            width: 0;
            background: var(--accent);
            border-radius: 2px;
            transition: width 0.3s ease;
            margin-top: -2px;
        }

        .input-wrapper:focus-within::after {
            width: 100%;
        }

        .input-wrapper input.is-invalid {
            border-bottom-color: rgba(210,50,50,0.8);
        }

        /* Show/hide password toggle */
        .password-toggle {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-family: 'Caveat', cursive;
            font-size: clamp(14px, 4vw, 15px);
            color: var(--ink-muted);
            cursor: pointer;
            min-width: 44px;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 0 0 8px;
            transition: color 0.2s;
        }

        .password-toggle:hover { color: var(--accent); }

        /* ── Submit Button ── */
        .submit-btn {
            width: 100%;
            padding: clamp(13px, 4vw, 14px) 20px;
            min-height: 44px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-family: 'Caveat', cursive;
            font-size: clamp(19px, 5.5vw, 22px);
            font-weight: 700;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            animation: inkDrop 0.7s ease-out 0.55s both;
            -webkit-appearance: none;
            appearance: none;

            box-shadow:
                0 4px 0 var(--accent-dark),
                0 6px 12px rgba(27,63,189,0.25);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, transparent 60%);
            pointer-events: none;
        }

        .submit-btn:hover {
            background: var(--accent-dark);
            box-shadow: 0 6px 0 #0E2070, 0 10px 20px rgba(27,63,189,0.3);
            transform: translateY(-2px);
        }

        .submit-btn:active {
            transform: translateY(3px);
            box-shadow: 0 1px 0 var(--accent-dark), 0 2px 6px rgba(27,63,189,0.2);
        }

        .submit-btn:disabled { opacity:0.55; cursor:not-allowed; }

        /* ── Login link ── */
        .signup-link {
            text-align: center;
            margin-top: clamp(18px, 5vw, 24px);
            font-family: 'Crimson Pro', serif;
            font-size: clamp(14px, 4vw, 15px);
            font-style: italic;
            color: var(--ink-muted);
            animation: inkDrop 0.7s ease-out 0.65s both;
        }

        .signup-link a {
            font-family: 'Caveat', cursive;
            font-size: clamp(15px, 4.5vw, 17px);
            font-style: normal;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1.5px solid rgba(27,63,189,0.35);
            transition: border-color 0.2s, color 0.2s;
            display: inline-block;
            padding: 4px 0;
        }

        .signup-link a:hover {
            color: var(--accent-dark);
            border-bottom-color: var(--accent-dark);
        }

        /* ── Decorative pencil mark in margin ── */
        .margin-note {
            position: absolute;
            left: clamp(4px, 2vw, 10px);
            top: 50%;
            transform: translateY(-50%) rotate(-90deg);
            font-family: 'Caveat', cursive;
            font-size: clamp(9px, 2.5vw, 11px);
            color: var(--ink-muted);
            opacity: 0.5;
            letter-spacing: 1.5px;
            white-space: nowrap;
            pointer-events: none;
            user-select: none;
        }

        /* ── Touch device overrides ── */
        @media (hover: none) and (pointer: coarse) {
            .submit-btn:hover { transform: none; }
            .submit-btn:active { transform: scale(0.97); }
            .weather-widget:hover { transform: rotate(-1.2deg); }
        }

        /* ── Very small phones (< 360px) ── */
        @media (max-width: 359px) {
            :root {
                --page-pad-left: 44px;
                --page-pad-x: 14px;
                --margin-left: 36px;
            }

            .spiral-strip { gap: 8px; }

            .hole { width: 12px; height: 12px; }

            .weather-temp { font-size: 22px; }

            .margin-note { font-size: 8px; }
        }
    </style>
</head>
<body>

    <div class="notebook">

        <!-- Spiral binding strip -->
        <div class="spiral-strip">
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
            <div class="hole"></div>
        </div>

        <!-- Main notebook page -->
        <div class="page">
            <div class="margin-tab"></div>

            <!-- Logo -->
            <div class="logo">
                <h1>Notes</h1>
                <div class="logo-underline"></div>
                <p>enterprise portal</p>
            </div>

            <!-- Welcome -->
            <div class="welcome-text">
                <h2>Create account</h2>
                <p>Sign up to get started</p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <!-- Register Form -->
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <div class="input-wrapper">
                        <input
                            type="text"
                            id="fullname"
                            name="name"
                            placeholder="Your full name"
                            value="{{ old('name') }}"
                            class="@error('name') is-invalid @enderror"
                            required
                            autofocus
                            autocomplete="name"
                        >
                    </div>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="your.email@company.com"
                            value="{{ old('email') }}"
                            class="@error('email') is-invalid @enderror"
                            required
                            autocomplete="email"
                        >
                    </div>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            class="@error('password') is-invalid @enderror"
                            required
                            autocomplete="new-password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('password', this)">Show</button>
                    </div>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="admin_key">Admin Key <span style="font-weight:400;opacity:0.6;">(optional)</span></label>
                    <div class="input-wrapper">
                        <input
                            type="text"
                            id="admin_key"
                            name="admin_key"
                            placeholder="Enter admin key if you have one"
                            value="{{ old('admin_key') }}"
                            autocomplete="off"
                        >
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Sign Up →
                </button>
            </form>

            <div class="signup-link">
                Already have an account? <a href="/">Sign in</a>
            </div>

        </div><!-- /page -->
    </div><!-- /notebook -->

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            if (input.type === 'password') {
                input.type = 'text';
                btn.textContent = 'Hide';
            } else {
                input.type = 'password';
                btn.textContent = 'Show';
            }
        }
    </script>

</body>
</html>