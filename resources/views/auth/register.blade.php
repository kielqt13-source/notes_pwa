<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sign Up - Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #047857;
            --surface: #ffffff;
            --surface-secondary: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --border: #e2e8f0;
            --border-focus: #10b981;
            --error: #ef4444;
            --error-light: #fef2f2;
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --radius-md: 12px;
            --radius-xl: 20px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; -webkit-tap-highlight-color: transparent; }

        html { height: 100%; }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100%;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(16px, 5vw, 28px) clamp(12px, 4vw, 16px) clamp(24px, 6vw, 40px);
            overflow-x: hidden;
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: 
                radial-gradient(ellipse 60% 50% at 80% 20%, rgba(255, 255, 255, 0.12) 0%, transparent 70%),
                radial-gradient(ellipse 50% 60% at 20% 85%, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .notebook {
            position: relative;
            width: 100%;
            max-width: 430px;
            z-index: 1;
            animation: pageOpen 0.55s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes pageOpen {
            from { opacity: 0; transform: translateY(24px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .page {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-xl);
            padding: clamp(32px, 6vw, 40px);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-xl), 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo {
            text-align: center;
            margin-bottom: 24px;
            padding-top: 4px;
            animation: fadeIn 0.7s ease-out 0.15s both;
        }

        .logo-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary) 0%, #059669 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }

        .logo-icon svg {
            width: 28px;
            height: 28px;
            fill: white;
        }

        .logo h1 {
            font-size: clamp(36px, 11vw, 48px);
            font-weight: 700;
            letter-spacing: -1px;
            color: var(--text-primary);
            line-height: 1;
            margin-bottom: 8px;
        }

        .logo p {
            font-size: clamp(12px, 3.5vw, 14px);
            color: var(--text-muted);
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .welcome-text {
            margin-bottom: clamp(18px, 5vw, 24px);
            animation: fadeIn 0.7s ease-out 0.35s both;
        }

        .welcome-text h2 {
            font-size: clamp(22px, 6.5vw, 26px);
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .welcome-text p {
            font-size: clamp(13px, 3.8vw, 14px);
            color: var(--text-secondary);
            font-weight: 400;
        }

        .error-message {
            background: var(--error-light);
            border-left: 4px solid var(--error);
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: clamp(14px, 4vw, 15px);
            font-weight: 500;
            animation: fadeIn 0.5s ease-out both;
        }

        .text-danger {
            font-size: clamp(11px, 3vw, 12px);
            color: var(--error);
            font-weight: 500;
            display: block;
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: clamp(22px, 6vw, 26px);
            animation: fadeIn 0.7s ease-out 0.45s both;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: clamp(12px, 3.5vw, 13px);
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper { position: relative; }

        .input-wrapper input {
            width: 100%;
            padding: clamp(10px, 3vw, 12px) 16px;
            padding-right: 52px;
            background: var(--surface-secondary);
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            font-family: 'Poppins', sans-serif;
            font-size: max(16px, clamp(15px, 4vw, 16px));
            font-weight: 400;
            color: var(--text-primary);
            outline: none;
            transition: all 0.3s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        .input-wrapper input::placeholder {
            color: var(--text-muted);
            opacity: 0.7;
            font-weight: 300;
        }

        .input-wrapper input:focus {
            border-color: var(--border-focus);
            background: white;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-wrapper input.is-invalid {
            border-color: var(--error);
            background: var(--error-light);
        }

        .password-toggle {
            position: absolute;
            right: 4px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(13px, 3.5vw, 14px);
            font-weight: 600;
            color: var(--primary);
            cursor: pointer;
            min-width: 44px;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            transition: all 0.2s;
            border-radius: 8px;
        }

        .password-toggle:hover {
            color: var(--primary-dark);
            background: rgba(16, 185, 129, 0.08);
        }

        .submit-btn {
            width: 100%;
            padding: clamp(13px, 4vw, 14px) 20px;
            min-height: 44px;
            background: linear-gradient(135deg, var(--primary) 0%, #059669 100%);
            color: #fff;
            border: none;
            border-radius: var(--radius-md);
            font-family: 'Poppins', sans-serif;
            font-size: clamp(16px, 5vw, 18px);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.7s ease-out 0.55s both;
            -webkit-appearance: none;
            appearance: none;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            letter-spacing: 0.3px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.3);
        }

        .submit-btn:disabled { opacity: 0.6; cursor: not-allowed; }

        .signup-link {
            text-align: center;
            margin-top: clamp(18px, 5vw, 24px);
            font-size: clamp(14px, 4vw, 15px);
            color: var(--text-secondary);
            animation: fadeIn 0.7s ease-out 0.65s both;
        }

        .signup-link a {
            font-size: clamp(15px, 4.5vw, 16px);
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s, border-color 0.2s;
            display: inline-block;
            padding: 4px 0;
            border-bottom: 2px solid transparent;
        }

        .signup-link a:hover {
            color: var(--primary-dark);
            border-bottom-color: var(--primary-dark);
        }

        @media (hover: none) and (pointer: coarse) {
            .submit-btn:hover { transform: none; }
            .submit-btn:active { transform: scale(0.97); }
        }

        @media (max-width: 380px) {
            .page {
                padding: 24px 18px;
            }
        }
    </style>
</head>
<body>

    <div class="notebook">
        <div class="page">
            <div class="logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                    </svg>
                </div>
                <h1>Notes</h1>
                <p>enterprise portal</p>
            </div>

            <div class="welcome-text">
                <h2>Create account</h2>
                <p>Sign up to get started</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

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
                            placeholder="Create a strong password"
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

        </div>
    </div>

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