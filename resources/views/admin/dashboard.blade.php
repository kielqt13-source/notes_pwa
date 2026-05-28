<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
        }

        .top-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .brand h1 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            letter-spacing: -0.3px;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
        }

        .user-info {
            text-align: right;
        }

        .user-info .name {
            font-size: 0.875rem;
            font-weight: 600;
            color: #0f172a;
            white-space: nowrap;
        }

        .user-info .role {
            font-size: 0.75rem;
            color: #10b981;
            font-weight: 500;
        }

        .logout-btn {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #475569;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            white-space: nowrap;
        }

        .logout-btn:hover {
            background: #fef2f2;
            border-color: #ef4444;
            color: #ef4444;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        .logout-label {
            display: inline;
        }

        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 32px 24px 48px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.admin-badge:hover {
            transform: translateY(-2px);
            color: white;
        }

        .page-header h2 {
            font-size: clamp(1.75rem, 4vw, 2.25rem);
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 8px 0;
            letter-spacing: -0.5px;
            word-break: break-word;
        }

        .page-header p {
            font-size: 0.95rem;
            color: #64748b;
            margin: 0;
            font-weight: 400;
        }

        .notes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .notes-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #0f172a;
            margin: 0;
        }

        .notes-count {
            font-size: 0.85rem;
            color: #10b981;
            background: #d1fae5;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
        }

        .notes-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .note-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .note-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #10b981, #059669);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        @media (hover: hover) and (pointer: fine) {
            .note-card:hover {
                border-color: #10b981;
                box-shadow: 0 12px 40px rgba(16, 185, 129, 0.12);
                transform: translateY(-4px);
            }

            .note-card:hover::before {
                opacity: 1;
            }
        }

        .note-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 12px 0;
            word-break: break-word;
            line-height: 1.4;
        }

        .note-content {
            font-size: 0.9rem;
            color: #475569;
            line-height: 1.7;
            margin-bottom: 20px;
            word-break: break-word;
            font-weight: 400;
        }

        .note-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .author-tag {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
            min-width: 0;
        }

        .author-avatar {
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .author-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-delete {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #ef4444;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 64px 24px;
            background: #ffffff;
            border: 2px dashed #e2e8f0;
            border-radius: 16px;
        }

        .empty-state-icon {
            width: 72px;
            height: 72px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .empty-state-icon i {
            font-size: 2rem;
            color: #94a3b8;
        }

        .empty-state h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.9rem;
            color: #64748b;
            margin: 0;
        }

        @media (min-width: 640px) {
            .notes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            .main-container {
                padding: 36px 28px 56px;
            }
            .page-header h2 {
                font-size: 2rem;
            }
        }

        @media (min-width: 1024px) {
            .notes-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 24px;
            }
            .header-content {
                padding: 0 32px;
            }
            .main-container {
                padding: 40px 32px 64px;
            }
            .page-header h2 {
                font-size: 2.25rem;
            }
            .note-card {
                padding: 28px;
            }
            .brand h1 {
                font-size: 1.35rem;
            }
        }

        @media (max-width: 380px) {
            .logout-label {
                display: none;
            }
            .logout-btn {
                padding: 8px 12px;
            }
            .user-info {
                display: none;
            }
        }
    </style>
</head>
<body>

    @if(auth()->check() && auth()->user()->role == 1)
    <div class="top-header">
        <div class="header-content">
            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h1>Admin Panel</h1>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <div class="name">{{ auth()->user()->name }}</div>
                    <div class="role">{{ auth()->user()->role == 1 ? 'Administrator' : 'User' }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="logout-label">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="page-header">
            <h2>Hello, {{ auth()->user()->name }}</h2>
            <p>Overview of all notes and their authors across the platform</p>
        </div>

        @if(isset($notes) && count($notes) > 0)
            <div class="notes-header">
                <h3>All Notes</h3>
                <span class="notes-count">{{ count($notes) }} {{ count($notes) === 1 ? 'note' : 'notes' }}</span>
            </div>

            <div class="notes-grid">
                @foreach($notes as $note)
                    <div class="note-card">
                        <h4 class="note-title">{{ $note->title }}</h4>
                        <p class="note-content">{{ $note->content }}</p>
                        <div class="note-footer">
                            <span class="author-tag">
                                <span class="author-avatar">
                                    {{ strtoupper(substr($note->user->name ?? 'U', 0, 1)) }}
                                </span>
                                <span class="author-name">{{ $note->user->name ?? 'Unknown User' }}</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="bi bi-journal-x"></i>
                </div>
                <h3>No notes found</h3>
                <p>There are no notes created by any users yet</p>
            </div>
        @endif

    </div>
    @else
    <div class="main-container" style="display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px;">
        <div class="empty-state" style="width: 100%; max-width: 450px; padding: 48px 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">
            <div class="empty-state-icon" style="background: #fef2f2;">
                <i class="bi bi-shield-lock" style="color: #ef4444;"></i>
            </div>
            <h3 style="color: #ef4444;">Access Denied</h3>
            <p>You must be an administrator to view this page.</p>
            <a href="/dashboard" class="admin-badge" style="margin-top: 24px;">
                <i class="bi bi-arrow-left"></i> Return to Dashboard
            </a>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>