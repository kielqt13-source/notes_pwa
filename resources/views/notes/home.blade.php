<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Poster</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(236, 72, 153, 0.08) 0%, transparent 50%);
            animation: backgroundMove 20s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes backgroundMove {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(2%, -2%) rotate(1deg); }
            66% { transform: translate(-2%, 2%) rotate(-1deg); }
        }

        .poster-container {
            width: 100%;
            max-width: 500px;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.95) 100%);
            backdrop-filter: blur(24px);
            border-radius: 24px;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: containerFadeIn 0.8s ease-out;
        }

        @keyframes containerFadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .decorative-top {
            height: 180px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            position: relative;
            overflow: hidden;
        }

        .decorative-top::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 70% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 40%);
            animation: pulseGlow 4s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .content {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            padding: 40px 28px 48px;
            position: relative;
            margin-top: -30px;
            border-radius: 30px 30px 24px 24px;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
        }

        .profile-section {
            text-align: center;
            margin-bottom: 36px;
            animation: profileSlideIn 0.8s ease-out 0.2s both;
        }

        @keyframes profileSlideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -80px auto 20px;
            border: 4px solid #1e293b;
            box-shadow: 
                0 8px 32px rgba(99, 102, 241, 0.4),
                0 0 0 4px rgba(99, 102, 241, 0.1);
            position: relative;
            overflow: hidden;
            animation: avatarFloat 3s ease-in-out infinite;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes avatarFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .name {
            font-size: 28px;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .tagline {
            font-size: 14px;
            color: #94a3b8;
            font-weight: 400;
        }

        .tagline a {
            color: #818cf8;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .tagline a:hover {
            color: #a5b4fc;
        }

        .info-grid {
            display: grid;
            gap: 16px;
            margin-bottom: 24px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 18px 20px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.08);
            opacity: 0;
            animation: cardSlideIn 0.6s ease-out forwards;
            position: relative;
            overflow: hidden;
        }

        .info-card:nth-child(1) { animation-delay: 0.3s; }
        .info-card:nth-child(2) { animation-delay: 0.4s; }
        .info-card:nth-child(3) { animation-delay: 0.5s; }
        .info-card:nth-child(4) { animation-delay: 0.6s; }

        @keyframes cardSlideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .info-card:hover {
            background: rgba(99, 102, 241, 0.15);
            transform: translateX(8px) scale(1.02);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.2);
        }

        .icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .info-card:hover .icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
        }

        .icon svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 11px;
            color: #818cf8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 15px;
            color: #e2e8f0;
            font-weight: 400;
            word-break: break-word;
        }

        @media (max-width: 480px) {
            .name {
                font-size: 24px;
            }
            
            .avatar {
                width: 100px;
                height: 100px;
            }
            
            .content {
                padding: 32px 20px 40px;
            }
        }
    </style>
</head>
<body>
    <div class="poster-container">
        <div class="decorative-top"></div>
        
        <div class="content">
            <div class="profile-section">
                <div class="avatar">
                    <img src="https://scontent.fmnl4-3.fna.fbcdn.net/v/t39.30808-6/574573333_2565796100453495_8148876678047365968_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeEOMaQOr5px84IiT72dxYv9mblkHUFJ-guZuWQdQUn6C8G4PcQYP0XpDdKU2oDJFDJ5mMmJMZN8zVM2TFTFq0aL&_nc_ohc=UEE4wUQ8zHIQ7kNvwFM3p_h&_nc_oc=Adkrg0yp1WUT12YRFWJx31e5U7gpQS8ZdRd7kzDlBiUpQf9q9vYpFm8Ei2AD2JmuTk9xpcsvTp_UJzRHqw1vsn1G&_nc_zt=23&_nc_ht=scontent.fmnl4-3.fna&_nc_gid=duL8USRTVPmvVqTRPYH5Ew&oh=00_Afq06Ax7mN1_cuJjh1dePROaZFNdyBEolfNEh5ih7LMaTg&oe=69828DA6" alt="Profile">
                </div>
                <h1 class="name">Chauncey Edulan</h1>
                <a href="{{ route('login') }}"><p class="tagline">Go Back</p></a>
            </div>

            <div class="info-grid">
                <div class="info-card">
                    <div class="icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Email</div>
                        <div class="info-value">chaunceyedulan2020@gmail.com</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Phone</div>
                        <div class="info-value">09973666290</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Location</div>
                        <div class="info-value">Brgy. Rizal Sogod Southern Leyte</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Skills</div>
                        <div class="info-value">Design • Development • Marketing</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>